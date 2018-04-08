<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../../css/path.css">
    <script src="../../js/path.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8x7PLHWv7ziI4XWEmQrhbjAPOS-kpdQ4&callback=drawMap">
    </script>
    <title>PathFinder</title>
</head>
<body>

<?php include '../static/navbar.php';
activePage("search");?>
<br><br><br>
<div class="title">
    Review <input required type="text" name="review"><br><br>
    Rating <input type="radio" name="rating" value="1"> 1
            <input type="radio" name="rating" value="2"> 2
            <input type="radio" name="rating" value="3"> 3
            <input type="radio" name="rating" value="4"> 4
            <input type="radio" name="rating" value="5"> 5         
</div>


<?php
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $review = "test";
        $rating = 4;
        $path_id = 3;

        $stmt = $connect->prepare("INSERT INTO reviews(path_id,review,rating))
        VALUES (:id,:rev,:rate);");
        $stmt->bindParam(':rev', $review);
        $stmt->bindParam(':rate', $rating);
        $stmt->bindParam(':id', $rating);

        $stmt->execute();
?>

<?php include '../static/footer.php'; ?>
</body>
</html>