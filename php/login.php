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
    <?php include './static/navbar.php';
    activePage("login");?>
    
    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Login</h1>
    </div>

    <!-- Registration form including type validation-->
    <form action ="./query/validate_user.php" method='post'>
        Email: <input required  type="email" name="email"><br><br>
        Password: <input required  type="password" name="pass"><br><br>
        <input type="submit" value="Login">
    </form>
    <div class="centre" id="errorMessage"></div>
    

    <?php include '../php/static/footer.php'; ?>
    
</body>
</html>