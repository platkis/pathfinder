<?php
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $path_name = $_POST["path_name"];
        $path_long = $_POST["path_long"];
        $path_lat = $_POST["path_lat"];
        $path_rating = $_POST["path_rating"];
        $path_ground_array= $_POST["path_ground"];
        $N = count($path_ground_array);
        $path_ground = "";
        for($i=0;$i < $N; $i++){
            $path_ground = $path_ground . "," . $path_ground_array[$i];
        }

        $path_hills = $_POST["path_hills"];
        $path_user_type_array = $_POST["path_user_type"];
        $M = count($path_user_type_array);
        $path_user_type = "";
        for($i=0;$i < $M; $i++){
            $path_user_type = $path_user_type . "," . $path_user_type_array[$i];
        }
        $path_season = $_POST["path_season"];
        $path_difficulty = $_POST["path_difficulty"];

        $stmt = $connect->prepare("INSERT INTO paths(name,longitude,latitude,rating,ground_type,num_hills,user_type,season,difficulty) 
                                VALUES (:name,:longitude,:latitude,:rating,:ground_type,:num_hills,:user_type,:season,:difficulty)");
        $stmt->bindParam(':name', $path_name);
        $stmt->bindParam(':longitude', $path_long);
        $stmt->bindParam(':latitude', $path_lat);
        $stmt->bindParam(':rating', $path_rating);
        $stmt->bindParam(':ground_type', $path_ground);
        $stmt->bindParam(':num_hills', $path_hills);
        $stmt->bindParam(':user_type', $path_user_type);
        $stmt->bindParam(':season', $path_season);
        $stmt->bindParam(':difficulty', $path_difficulty);

        $stmt->execute();

        $path_id = $connect->lastInsertId();
    ?>