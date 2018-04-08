<script src="../../js/search.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
</script>
<?php
$connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$search_name = $_POST["search_name"];
$search_rating = $_POST["search_rating"];
$search_location = $_POST["search_location"];

echo "location=" . $search_location;
$sql = "SELECT * FROM paths";

if ($search_name != "") {
    $stmt = $connect -> prepare($sql . " WHERE name = :nsearch;");
    $stmt->bindParam(':nsearch', $search_name);
}
else if($search_rating != 0){
    $stmt = $connect -> prepare($sql . " WHERE rating = :rsearch;");
    $stmt->bindParam(':rsearch', $search_rating);
}
// else if($search_location != ""){
    
// }


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
        echo '<tr><td>' . $path['name'] . '</td>';
        echo '<td> long:' . $path['longitude'] . ', lat: ' . $path['latitude'] . '</td>';
        echo '<td>' . $path['rating'] . '</td></tr>';
    }


?>
</table>

<button onclick="getLocation()">GET YOUR LOCATION</button>
<div id="currentLoc"></div>
<div id="map"></div>
