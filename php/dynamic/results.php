<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../../css/search.css">
    <script src="../../js/results.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>
    <?php include '../static/navbar.php';
    activePage("search"); ?>
    
    <div class="title">
        <h1 class="centre">Results</h1>
    </div>
    
    <?php
    //connect to database
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //get search parameters if they are set
        $search_name = isset($_POST["search_name"]) ? $_POST["search_name"] : "";
        $search_rating = isset($_POST["search_rating"]) ? $_POST["search_rating"] : "";
        $search_location = isset($_POST["search_location"]) ? $_POST["search_location"] : "";
    //get current location
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
    //list of markers initializer
        $list_markers = "";
        //prepare sql statement
        $sql = "SELECT *,avg(r.rating) AS avgRat FROM paths
        JOIN reviews r ON r.path_id = paths.path_id
        WHERE 1=1";

    //append where clauses according to search parameters
        if ($search_name != "") {
            $stmt = $connect -> prepare($sql . " AND name = :nsearch;");
            $stmt->bindParam(':nsearch', $search_name);
        }
        if($search_rating != ""){
            $stmt = $connect -> prepare($sql . " AND rating >= :rsearch GROUP BY paths.path_id;");
            $stmt->bindParam(':rsearch', $search_rating);
        }
        if($search_location != ""){
            $stmt = $connect -> prepare($sql . " AND latitude between :lat-0.1 AND :lat+0.1 AND longitude between :long-0.1 and :long+0.1;");
            $stmt->bindParam(':lat', $latitude);
            $stmt->bindParam(':long', $longitude);
        }
        else{
            $stmt = $connect -> prepare($sql . " GROUP BY paths.path_id;");
        }

        //execute and fetch results
        $stmt->execute();
        $data = $stmt ->fetchAll();
    
        //Results table
        //display all results by appending each set of parameters in loop
        if (sizeof($data)==0){
            echo '<h1 class="centre">No Results Found</h1>';
        }
        else{
            echo'<table><tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Average Rating</th>
                </tr>';
            foreach ($data as $path){
                echo '<tr><td><a href="./pathdetails.php?id='. $path['path_id'] . '">' . $path['name'] . '</a></td>';
                echo '<td> lat:' . $path['latitude'] . ', long: ' . $path['longitude'] . '</td>';
                echo '<td>' . $path['avgRat'] . '</td></tr>';


                $list_markers = $list_markers . '["' . $path['name'] .
                '",' . $path['latitude'] .
                ',' . $path['longitude'] .
                ', "./pathdetails.php?id='.$path['path_id'] . '"
                ],';
                

            }
        }
    ?>
        
    <script>
        function drawMap() {
            //array of lcoations including names, lat, long and links
            var locations = <?php echo '['.$list_markers.']' ;?>;   
        
            //initialize map with zoom and center options
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: (locations.length!=0) ? new google.maps.LatLng(locations[0][1], locations[0][2]) : new google.maps.LatLng(0,0)
            });
            
            //draw the markers and the infowindows
            drawMarkers(map,locations);
        }

    </script>

    <?php
        echo '</table>
            <div id="map"></div>';
        
        include '../static/footer.php'
    ?>
    
    
</body>
</html>