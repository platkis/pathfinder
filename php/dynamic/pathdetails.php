<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../../css/path.css">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>
    <?php include '../static/navbar.php';
    activePage("search");
        $path_id = $_GET['id'];

        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $connect -> prepare("SELECT * FROM paths WHERE path_id = :id;");
        $stmt->bindParam(':id', $path_id);
        $stmt->execute();
        $data = $stmt->fetchAll();

        $path_name = $data[0]['name'];
        $path_long = $data[0]['longitude'];
        $path_lat = $data[0]['latitude'];
        $path_rating = $data[0]['rating'];
        $path_ground = $data[0]['ground_type'];
        $path_hills = $data[0]['num_hills'];
        $path_usertype = $data[0]['user_type'];
        $path_season = $data[0]['season'];
        $path_difficulty = $data[0]['difficulty'];

    ?>
    

    <!-- Page Main Title, Name of Path -->
    <div class="title">
        <?php echo '<h1 class="centre">' . $path_name .'</h1>'?>
    </div>

    <!-- Wrapper of elements -->
    <div class="wrapper">
        <!-- Path information-->
        <div class="info">
        <?php
            echo '<b>Ground:         </b>' . "" .
            '<br><b>Number of Hills: </b>' . $path_hills .
            '<br><b>Good for:        </b>' . "" . 
            '<br><b>Season:          </b>' . $path_season . 
            '<br><b>Difficulty:      </b>' . $path_difficulty .
            '<br><b>Location:        </b>' . $path_lat . ',' . $path_long . 
            '<br><b>Overall Rating:  </b>' . $path_rating 
        ?>
            <form action ="../query/submit_review.php" method='post'>  
                <input type="submit" value="Submit a Review">
            </form>
        </div>
        <!-- Path image -->
        <div class="img" alt="picture of bruce trail">
            <!-- <img src="../img/railtrail.png"/> -->
        </div>
        
        <!-- Map -->
        <div id="map"></div>

        <!-- Reviews -->
        <div class="reviews">
            <u><h2>Reviews</h3></u>
            <br>
            <table>
                <tr>
                    <td>Super fun for cycling in the summer!</td>
                    <td>5/5</td>
                    <td>-trailprincess1</td>
                </tr>
                <tr>
                    <td>Smells like horses.</td>
                    <td>2/5</td>
                    <td>-Paul638</td>
                </tr>
            </table>
        </div>
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