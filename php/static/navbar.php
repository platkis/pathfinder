<!-- Navigation bar -->
<?php
    function activePage($page){
        if(strcmp($page,"home")==0){
            echo '<div class="topnav">
            <a class="active" href="/">Home</a>
            <a href="/php/registration.php">Register</a>
            <a href="/php/search.php">Search</a>
            <a href="/php/submission.php">Submit</a>
            </div>';
        }
        else if(strcmp($page,"registration")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>
            <a class="active" href="/php/registration.php">Register</a>
            <a href="/php/search.php">Search</a>
            <a href="/php/submission.php">Submit</a>
            </div>';
        }
        else if(strcmp($page,"search")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>
            <a href="/php/registration.php">Register</a>
            <a class="active" href="/php/search.php">Search</a>
            <a href="/php/submission.php">Submit</a>
            </div>';
        }
        else if(strcmp($page,"submission")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>
            <a href="/php/registration.php">Register</a>
            <a href="/php/search.php">Search</a>
            <a class="active" href="/php/submission.php">Submit</a>
            </div>';
        }
    }
?>