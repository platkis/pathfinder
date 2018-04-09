<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../css/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>
    <?php include '../php/static/navbar.php';
    activePage("search");?>
    
    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Search Path</h1>
    </div>
    <!-- Searching  criteria -->
    <form action ="./dynamic/results.php" method='post'>
    
        <!-- Searching by name text box -->
        <input type="text" placeholder="Search by Name.." name="search_name">
        <br><br>
        <!-- Searching by rating radio buttons -->
        Search by Rating
        <input type="radio" name="search_rating" value="1"> 1
        <input type="radio" name="search_rating" value="2"> 2
        <input type="radio" name="search_rating" value="3"> 3
        <input type="radio" name="search_rating" value="4"> 4
        <input type="radio" name="search_rating" value="5"> 5

        <br><br>
        <!-- Searching by location checkbox -->
        <input type="checkbox" value="location" name="search_location" id="cb_location">Search by Current Location

        <br><br>
        
        <button type="submit">Search</button>
        
        <!-- Hidding fields to get user's lat and long -->
        <input name="latitude" value="" type="hidden">
        <input name="longitude" value="" type="hidden">

    </form>  

    <?php include 'static/footer.php';?>

</body>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../js/search.js"></script>
</html>