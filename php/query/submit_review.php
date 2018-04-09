<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../../css/path.css">
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
        $path_id = 2;
        $user_id = 1;

        $stmt = $connect->prepare("INSERT INTO reviews(user_id,path_id,rating,review)
        VALUES (:userid,:pathid,:rate,:rev);");
        $stmt->bindParam(':userid', $user_id);
        $stmt->bindParam(':pathid', $path_id);
        $stmt->bindParam(':rate', $rating);
        $stmt->bindParam(':rev', $review);
        $stmt->execute();
?>

<?php include '../static/footer.php'; ?>
</body>
</html>