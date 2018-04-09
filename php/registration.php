<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../css/register.css">
    <title>PathFinder</title>
</head>
<body>
    <?php //include navbar and active page
    include './static/navbar.php';
    activePage("registration");?>
    
    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Register</h1>
    </div>

    <!-- Registration form including type validation-->
    <form onsubmit="return validate()" action ="./query/submit_user.php" method='post'>
        First name: <input required type="text" name="fname" id="fname"><br><br>
        Last name: <input required type="text" name="lname" id="lname"><br><br>
        Email: <input required  type="email" name="email" id="email"><br><br>
        Date of birth <input required type="date" name="bday"  id="bday" n><br><br>
        Password: <input required  type="password" name="pass" id="pass"><br><br>
        <input type="submit" value="Register">
    </form>
    <div class="centre" id="errorMessage"></div>
    

    <?php include '../php/static/footer.php'; ?>
    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../js/registration.js"></script>
</html>