<?php
    //login validation
    session_start();
    //connect to databse
    $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //get user inputs
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    //compare statement
    $pass_stmt = $connect->prepare("SELECT password, email FROM users WHERE email=:email_add;");
    $pass_stmt->bindParam(':email_add', $email);
    $pass_stmt->execute();
    $data = $pass_stmt->fetchall();
    //if a row is returned, i.e. there is a match in username and password
    if(sizeof($data)==1){
        //then set the session id to their userid and redirect to home
        if(password_verify($pass,$data[0]['password'])){
            $_SESSION['id'] = $data[0]['email'];
            echo '<script>window.location.href = "/";</script>';
        }
    }
?>