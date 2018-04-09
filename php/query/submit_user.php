<?php
    //connect to database
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        //get user inputs
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $bday = $_POST["bday"];
        $pass = $_POST["pass"];

        //insert statement and append params
        $stmt = $connect->prepare("INSERT INTO users(fname,lname,email,bday,password) VALUES (:first_name,:last_name,:email_add,:birth_date,:password)");
        $stmt->bindParam(':first_name', $fname);
        $stmt->bindParam(':last_name', $lname);
        $stmt->bindParam(':email_add', $email);
        $stmt->bindParam(':birth_date', $bday);
        //hash user password
        $stmt->bindValue(':password', password_hash($pass, PASSWORD_BCRYPT));

        //execute
        $stmt->execute();
        //redirect back to home so user can log in
        echo '<script>window.location.href = "/";</script>';
 
    ?>