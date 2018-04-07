<!DOCTYPE html>
<html>
<!-- Stylesheets, scripts and title -->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/shared.css">
    <link rel="stylesheet" type="text/css" href="../css/submit.css">
    <script src="../js/submission.js"></script>
    <title>PathFinder</title>
</head>
<body>
    <?php include '../php/navbar.php';?>
    

    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Add New Path</h1>
    </div>

    <!-- Wrapper for submission form -->
    <form class="form-wrapper">
        <!-- Fields on the left of the page -->
        <div class="left">
            Name of Trail <input required pattern="[A-Za-z]{1,32}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Name must contain letters only!')" type="text"><br><br>
            Picture <input required type="file" accept="image/*"><br>
            Type of Ground
            <input type="checkbox">Dirt
            <input type="checkbox">Pavement
            <input type="checkbox">Gravel
            <br><br>
            Number of Hills <input type="number"><br>
            Good for
            <input type="checkbox">Pedestrians
            <input type="checkbox">Cyclers
            <input type="checkbox">In-ine Skaters
            <input type="checkbox">Equestrians
            <br>
        </div>
        <!-- Fields on the right of the page -->
        <div class="right">
            <div class="custom-select" style="width:200px;">
                Season
                <select>
                    <option value="0">Select Season:</option>
                    <option value="1">Fall-Winter</option>
                    <option value="2">Spring-Summer</option>
                    <option value="3">Year Round<ption>
                </select>
            </div>
            <br><br>
            Difficulty <input required type="range"><br>
            Latitude <input required type="number" id="lat"><br>
            Longitude <input required type="number" id="long"><br>
            Overall Rating 
            <input type="radio" name="rating" value="1"> 1
            <input type="radio" name="rating" value="2"> 2
            <input type="radio" name="rating" value="3"> 3
            <input type="radio" name="rating" value="4"> 4
            <input type="radio" name="rating" value="5"> 5
        </div>
        <!-- Submission button -->
        <input type="submit" onclick = "setLocation()" value="Submit">
    </form>

    <!-- Footer -->
    <footer>
        <p>Created by: Sharon Platkin</p>
        <p>Contact information: <a href="mailto:sharonplatkin@hotmail.com">sharonplatkin@hotmail.com</a></p>
    </footer>    
</body>
</html>