<!-- Navigation bar -->
<?php
    session_start();
    function activePage($page){
        if(strcmp($page,"home")==0){
            echo '<div class="topnav">
            <a class="active" href="/">Home</a>';
            $tab = ($_SESSION['id']==null) ? '<a href="/php/registration.php">Register</a><a href="/php/login.php">Login</a>' : '<a href="/php/logout.php">Log Out</a><a href="/php/submission.php">New Path</a>';
            echo $tab .
            '<a href="/php/search.php">Search</a>
            </div>';
        }
        else if(strcmp($page,"registration")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>';
            $tab = ($_SESSION['id']==null) ? '<a class="active" href="/php/registration.php">Register</a><a href="/php/login.php">Login</a>' : '<a href="/php/logout.php">Log Out</a><a href="/php/submission.php">New Path</a>';
            echo $tab .
            '<a href="/php/search.php">Search</a>
            </div>';
        }
        else if(strcmp($page,"search")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>';
            $tab = ($_SESSION['id']==null) ? '<a href="/php/registration.php">Register</a><a href="/php/login.php">Login</a>' : '<a href="/php/logout.php">Log Out</a><a href="/php/submission.php">New Path</a>';
            echo $tab .
            '<a class="active" href="/php/search.php">Search</a>
            </div>';
        }
        else if(strcmp($page,"submission")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>';
            $tab = ($_SESSION['id']==null) ? '<a href="/php/registration.php">Register</a><a href="/php/login.php">Login</a>' : '<a href="/php/logout.php">Log Out</a><a class="active" href="/php/submission.php">New Path</a>';
            echo $tab .
            '<a href="/php/search.php">Search</a>
            </div>';
        }
        else if(strcmp($page,"login")==0){
            echo '<div class="topnav">
            <a href="/">Home</a>';
            $tab = ($_SESSION['id']==null) ? '<a href="/php/registration.php">Register</a><a class="active" href="/php/login.php">Login</a>' : '<a href="/php/logout.php">Log Out</a><a href="/php/submission.php">New Path</a>';
            echo $tab .
            '<a href="/php/search.php">Search</a>
            </div>';
        }
    }
?>