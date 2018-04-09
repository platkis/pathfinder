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

<?php include './static/navbar.php';
activePage("search");

$path_id = $_GET['id'];

echo'
<br><br><br>
<div class="title">
    <form action ="./query/submit_review.php?id='.$path_id.'" method="post">
        
        Review <input required type="text" name="review">
        <br><br>
        Rating <input type="radio" name="rating" value="1"> 1
            <input type="radio" name="rating" value="2"> 2
            <input type="radio" name="rating" value="3"> 3
            <input type="radio" name="rating" value="4"> 4
            <input type="radio" name="rating" value="5"> 5      
        <br><br>
        <input type="submit" value="Submit">
    </form>   
</div>
';
include './static/footer.php'; ?>
</body>
</html>