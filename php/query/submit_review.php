<?php
        session_start();
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $user_id = $_SESSION['id'];
        $path_id = $_GET['id'];
        $review = $_POST["review"];
        $rating = $_POST["rating"];

        $stmt = $connect->prepare("INSERT INTO reviews(user_id,path_id,rating,review)
        VALUES (:userid,:pathid,:rate,:rev);");
        $stmt->bindParam(':userid', $user_id);
        $stmt->bindParam(':pathid', $path_id);
        $stmt->bindParam(':rate', $rating);
        $stmt->bindParam(':rev', $review);
        $stmt->execute();

        
        echo '<script>window.location.href = "../dynamic/pathdetails.php?id='.$path_id.'";</script>';
?>