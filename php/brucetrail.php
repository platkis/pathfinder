<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../css/path.css">
    <script src="../js/path.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>
    <?php include 'php/navbar.php';?>
    

    <!-- Page Main Title, Name of Path -->
    <div class="title">
        <h1 class="centre">Bruce Trail</h1>
    </div>

    <!-- Wrapper of elements -->
    <div class="wrapper">
        <!-- Path information-->
        <div class="info">
            <b>Ground:          </b> Gravel <br>
            <b>Number of Hills: </b> 4 <br>
            <b>Good for:        </b> Pedestrians, Cyclers <br>
            <b>Season:          </b> Year-Round <br>
            <b>Difficulty:      </b> 40/100 <br>
            <b>Location:        </b> Hamilton <br>
            <b>Overall Rating:  </b> 6
        </div>
        <!-- Path image -->
        <div class="img" alt="picture of bruce trail">
            <img src="../img/railtrail.png"/>
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
    
    <?php include './footer.php'; ?>
</body>
</html>