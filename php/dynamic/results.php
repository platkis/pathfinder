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

    $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $search_name = isset($_POST["search_name"]) ? $_POST["search_name"] : "";
    $search_rating = isset($_POST["search_rating"]) ? $_POST["search_rating"] : "";
    $search_location = isset($_POST["search_location"]) ? $_POST["search_location"] : "";

    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    $sql = "SELECT * FROM paths";

    if ($search_name != "") {
        $stmt = $connect -> prepare($sql . " WHERE name = :nsearch;");
        $stmt->bindParam(':nsearch', $search_name);
    }
    else if($search_rating != ""){
        $stmt = $connect -> prepare($sql . " WHERE rating = :rsearch;");
        $stmt->bindParam(':rsearch', $search_rating);
    }
    // else if($search_location != ""){
    //     getLocation();
    //     $latitude = $_POST['latitude'];
	//     $longitude = $_POST['longitude'];
	// $stmt = $pdo -> prepare("SELECT farmID, name, latitude, longitude, imagePath, dateJoined, averageRating, 111.045* DEGREES(ACOS(COS(RADIANS(latpoint)) * COS(RADIANS(latitude)) * COS(RADIANS(longpoint) - RADIANS(longitude)) + SIN(RADIANS(latpoint)) * SIN(RADIANS(latitude)))) AS distance_in_km FROM Farms JOIN ( SELECT :latitude AS latpoint, :longitude AS longpoint ) AS p ON 1=1 LEFT JOIN (SELECT farm, avg(rating) AS averageRating FROM reviews GROUP BY farm) AS averages ON farms.farmID = averages.farm HAVING distance_in_km < 30 ORDER BY distance_in_km LIMIT 15");
	// $stmt -> bindValue(':latitude', $latitude);
	// $stmt -> bindValue(':longitude', $longitude);
    //}
    else{
        $stmt = $connect -> prepare($sql);
    }


    $stmt->execute();
    $data = $stmt ->fetchAll();
    ?>
    <!-- Results table -->
    <table>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Average Rating</th>
        </tr>
    <?php
        foreach ($data as $path){
            echo '<tr><td><a href="./pathdetails.php?id='. $path['path_id'] . '">' . $path['name'] . '</a></td>';
            echo '<td> long:' . $path['longitude'] . ', lat: ' . $path['latitude'] . '</td>';
            echo '<td>' . $path['rating'] . '</td></tr>';
        }
    ?>
    </table>
    <div id="map"></div>
    <button onclick="getLocation()">GET YOUR LOCATION</button>
    <div id="currentLoc"></div>
    
</body>
</html>