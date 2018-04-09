<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../../css/path.css">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>
    <?php //include navbar with the active page
    include '../static/navbar.php';
    activePage("search");
    //get path_id from URL
        $path_id = $_GET['id'];

        //connect to database
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //prepare sql statement, and bind the parameters
        $path_stmt = $connect -> prepare("SELECT * FROM paths WHERE path_id = :id;");
        $path_stmt->bindParam(':id', $path_id);
        //execute and get all results
        $path_stmt->execute();
        $path_data = $path_stmt->fetchAll();

        //bind all user inputs to parameters
        $path_name = $path_data[0]['name'];
        $path_lat = $path_data[0]['latitude'];
        $path_long = $path_data[0]['longitude'];
        $path_rating = $path_data[0]['avgRating'];
        $path_ground = $path_data[0]['ground_type'];
        $path_hills = $path_data[0]['num_hills'];
        $path_usertype = $path_data[0]['user_type'];
        $path_season = $path_data[0]['season'];
        $path_difficulty = $path_data[0]['difficulty'];
        $path_image = $path_data[0]['img_add'];

        //get all reviews for specific paath
        $review_stmt = $connect -> prepare("SELECT * FROM reviews WHERE path_id = :id;");
        $review_stmt->bindParam(':id', $path_id);
        //execute and fetch results
        $review_stmt->execute();
        $review_data = $review_stmt->fetchAll();

    ?>
    

    <!-- Page Main Title, Name of Path -->
    <div class="title">
        <?php echo '<h1 class="centre">' . $path_name .'</h1>'?>
    </div>

    <!-- Wrapper of elements -->
    <div class="wrapper">
        <!-- Path information-->
        
        <?php
        //display path details
            echo '<div class="info">
            <b>Ground:         </b>' . $path_ground .
            '<br><b>Number of Hills: </b>' . $path_hills .
            '<br><b>Good for:        </b>' . $path_usertype . 
            '<br><b>Season:          </b>' . $path_season . 
            '<br><b>Difficulty:      </b>' . $path_difficulty .
            '<br><b>Location:        </b>lat: ' . $path_lat . ', long: ' . $path_long . 
            '<br><b>Overall Rating:  </b>' . $path_rating;
        //submit a review for this path if logged in
            $tab = ($_SESSION['id']!=null) ? 
            '<a href="../review.php?id='. $path_id . '">Submit a Review</a>' :
            //otherwise display message
            'To review, please log in!';
            //include the image for this path
            echo '<br>' . $tab . '

            </div>
            
            <!-- Path image -->
                <div class="img" alt="picture of bruce trail">
                <img src="'.$path_image.'"/>
            </div>'
        ?>
        
        <!-- Map -->
        <div id="map"></div>

        <!-- Reviews -->
        <?php
        //if no reviews found, display message, otherwise display all reviews in table
            if (sizeof($review_data)==0){
                echo '<h1 class="centre">No Reviews Yet!</h1>';
            }
            else{
                echo'<table><tr>
                        <th>User</th>
                        <th>Review</th>
                        <th>Rating</th>
                    </tr>';
                foreach ($review_data as $review){
                    echo '<tr><td>' . $review['user_id'] . '</td>';
                    echo '<td>' . $review['review'] . '</td>';
                    echo '<td>' . $review['rating'] . '</td></tr>';
                }
                echo '</table>';
            }
        ?>
    </div>
    
    <?php include '../static/footer.php'; ?>
</body>
<script>
function drawMap() {
    //set coordinates, hardcoded for now
    var latitude = <?php echo $path_lat;?>;
    var longitude = <?php echo $path_long;?>;

    //initialize map with zoom and center options
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 11,
        center: {lat: latitude , lng: longitude}
    });

    //draw marker in map at position, lat and lng
    var marker = new google.maps.Marker({
        map: map,
        position: {lat: latitude , lng: longitude}
    });
}
</script>
</html>