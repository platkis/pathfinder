<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/search.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>
    <?php include '../php/navbar.php';?>
    

    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Search Path</h1>
    </div>
    <!-- Searching text box, button, criteria -->
    <form>
        <input type="text" placeholder="Search..">
        <button type="submit"><i class="fa fa-search"></i></button>
        <br>
        Search By
        <input type="checkbox">Name
        <input type="checkbox">Location
        <input type="checkbox">Type of Ground
        <input type="checkbox">Rating
    </form>          
    <br><br>

    <button onclick="getLocation()">GET YOUR LOCATION</button>
    <div id="currentLoc"></div>

    <!-- Results table -->
    <table>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Average Rating</th>
        </tr>
        <tr>
            <td><a href="./railtrail.php">Rail Trail</a></td>
            <td>Hamilton, ON</td>
            <td>8</td>
        </tr>
        <tr>
            <td><a href="./brucetrail.php"></a>Bruce Trail</td></td>
            <td>Hamilton</td>
            <td>6</td>
        </tr>
    </table>

     <!-- Map -->
     <div id="map"></div>

     <!-- Footer -->
    <footer>
        <p>Created by: Sharon Platkin</p>
        <p>Contact information: <a href="mailto:sharonplatkin@hotmail.com">sharonplatkin@hotmail.com</a></p>
    </footer>
</body>
</html>