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
    <?php include '../php/static/navbar.php';
    activePage("submission");?>
    

    <!-- Page Main Title -->
    <div class="title">
        <h1 class="centre">Add New Path</h1>
    </div>

    <!-- Wrapper for submission form -->
    <form class="form-wrapper" action ="./query/submit_path.php" method='post' enctype="multipart/form-data">
        <!-- Fields on the left of the page -->
        <div class="left">
            Name of Trail <input required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Name must contain letters only!')" type="text" name="path_name"><br><br>
            Picture <input required type="file" accept="image/*" name="path_picture"><br>
            Type of Ground
            <input type="checkbox" value="Dirt" name="path_ground[]">Dirt
            <input type="checkbox" value="Pavement" name="path_ground[]">Pavement
            <input type="checkbox" value="Gravel" name="path_ground[]">Gravel
            <br><br>
            Number of Hills <input type="number" name="path_hills"><br>
            Good for
            <input type="checkbox" value="Pedestrians" name="path_user_type[]">Pedestrians
            <input type="checkbox" value="Cyclers"name="path_user_type[]">Cyclers
            <input type="checkbox" value="In-line Skaters" name="path_user_type[]">In-ine Skaters
            <input type="checkbox" value="Equestrians" name="path_user_type[]">Equestrians
            <br><br>
            Review <input required type="text" name="path_review">
            
        </div>
        <!-- Fields on the right of the page -->
        <div class="right">
            <div class="custom-select" style="width:200px;">
                Season
                <select name="path_season">
                    <option value="0">Select Season:</option>
                    <option value="fall-winter">Fall-Winter</option>
                    <option value="spring-summer">Spring-Summer</option>
                    <option value="year-round">Year Round<ption>
                </select>
            </div>
            <br><br>
            Difficulty <input required type="range" name="path_difficulty"><br>
            Latitude <input required type="number" id="path_lat" name="path_lat" min="-90" max="90"><br>
            Longitude <input required type="number" id="path_long" name="path_long" min="-180" max="180"><br>
            Overall Rating 
            <input type="radio" name="path_rating" value="1"> 1
            <input type="radio" name="path_rating" value="2"> 2
            <input type="radio" name="path_rating" value="3"> 3
            <input type="radio" name="path_rating" value="4"> 4
            <input type="radio" name="path_rating" value="5"> 5
        </div>
        <!-- Submission button -->
        <input type="submit" onclick = "setLocation()" value="Submit">
    </form>

    
    <?php include './static/footer.php'; ?>   
</body>
</html>