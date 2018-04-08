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
    <?php include '../php/static/navbar.php';?>
    
    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Search Path</h1>
    </div>
    <!-- Searching text box, button, criteria -->
    <form action ="./dynamic/results.php" method='post'>
        <input type="text" placeholder="Search by Name.." name="search_name">
        
        <br><br>
        <input type="radio" name="search_rating" value="1"> 1
        <input type="radio" name="search_rating" value="2"> 2
        <input type="radio" name="search_rating" value="3"> 3
        <input type="radio" name="search_rating" value="4"> 4
        <input type="radio" name="search_rating" value="5"> 5
        <input type="submit" value="Search by Rating">
        <br><br>
        <input type="submit" value="Search by Current Location" name="search_location">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>  

    <?php include 'static/footer.php';?>

</body>
</html>