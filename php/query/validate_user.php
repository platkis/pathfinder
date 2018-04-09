<?php
    session_start();
    $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $pass_stmt = $connect->prepare("SELECT password, email FROM users WHERE email=:email_add;");
    $pass_stmt->bindParam(':email_add', $email);
    $pass_stmt->execute();
    $data = $pass_stmt->fetchall();
    if(sizeof($data)==1){
        if(password_verify($pass,$data[0]['password'])){
            $_SESSION['id'] = $data[0]['email'];
            echo '<script>window.location.href = "/";</script>';
        }
    }
?>