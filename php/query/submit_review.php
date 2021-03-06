<?php
        session_start();
        //connect to database
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //get user input and path params
        $user_id = $_SESSION['id'];
        $path_id = $_GET['id'];
        $review = $_POST["review"];
        $rating = $_POST["rating"];

        //prepare insert statement and append params
        $stmt = $connect->prepare("INSERT INTO reviews(user_id,path_id,rating,review)
        VALUES (:userid,:pathid,:rate,:rev);");
        $stmt->bindParam(':userid', $user_id);
        $stmt->bindParam(':pathid', $path_id);
        $stmt->bindParam(':rate', $rating);
        $stmt->bindParam(':rev', $review);
        $stmt->execute();

        //redirect back to the path's page
        echo '<script>window.location.href = "../dynamic/pathdetails.php?id='.$path_id.'";</script>';
?>