<?php
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $bday = $_POST["bday"];
        $pass = $_POST["pass"];

        $stmt = $connect->prepare("INSERT INTO users(fname,lname,email,bday,password) VALUES (:first_name,:last_name,:email_add,:birth_date,:password)");
        $stmt->bindParam(':first_name', $fname);
        $stmt->bindParam(':last_name', $lname);
        $stmt->bindParam(':email_add', $email);
        $stmt->bindParam(':birth_date', $bday);
        $stmt->bindValue(':password', password_hash($pass, PASSWORD_BCRYPT));

        $stmt->execute();
        
    //$reviewId = $connect->lastInsertId();
    ?>