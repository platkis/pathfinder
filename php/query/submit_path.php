<?php
        session_start();
        require '../../vendor/autoload.php';
        include '../../credentials/secretKey.php';
        use Aws\S3\S3Client;
        use Aws\Exception\AwsException;

        //get credentials
        $credentials = new Aws\credentials\Credentials($accessKey,$secretKey);

        //connect to database
        $connect = new PDO("mysql:host=localhost;dbname=pathfinder","root","smarTserve91");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //configure s3
        $config = [
            'region' => 'ca-central-1',
            'version' => 'latest',
            'credentials' => $credentials
        ];
        $s3Client = new S3Client($config);
        $path_picture = $_FILES['path_picture'];
        
        //get the name, type and url from files
        try{
            $result = $s3Client -> putObject([
                'Bucket'=> 'pathfinderimgs',
                'ContentType' => $path_picture['type'],
                'Key' => $path_picture['name'],
                'SourceFile' => $path_picture['tmp_name']
            ]);
            $imageURL = $result['ObjectURL'];
        }
        catch(Exception $e){
            echo $e->getMessage();
        }

        //retrieve all user inputs
        $path_name = $_POST["path_name"];
        $path_long = $_POST["path_long"];
        $path_lat = $_POST["path_lat"];
        $path_rating = $_POST["path_rating"];
        $path_ground_array= $_POST["path_ground"];
        $path_review = $_POST["path_review"];
        //append all checkboxes into string array
        $N = count($path_ground_array);
        $path_ground = "";
        for($i=0;$i < $N; $i++){
            $path_ground = $path_ground . $path_ground_array[$i] . ",";
        }

        $path_hills = $_POST["path_hills"];
        $path_user_type_array = $_POST["path_user_type"];
        $M = count($path_user_type_array);
        $path_user_type = "";
        //append all checkboxes into string array
        for($i=0;$i < $M; $i++){
            $path_user_type = $path_user_type . $path_user_type_array[$i] . ",";
        }
        $path_season = $_POST["path_season"];
        $path_difficulty = $_POST["path_difficulty"];

        //prepare insert statement and append all parameters
        $stmt_path = $connect->prepare("INSERT INTO paths(name,longitude,latitude,avgRating,ground_type,num_hills,user_type,season,difficulty,img_add) 
                                VALUES (:name,:longitude,:latitude,:rating,:ground_type,:num_hills,:user_type,:season,:difficulty,:img)");
        $stmt_path->bindParam(':name', $path_name);
        $stmt_path->bindParam(':longitude', $path_long);
        $stmt_path->bindParam(':latitude', $path_lat);
        $stmt_path->bindParam(':rating', $path_rating);
        $stmt_path->bindParam(':ground_type', $path_ground);
        $stmt_path->bindParam(':num_hills', $path_hills);
        $stmt_path->bindParam(':user_type', $path_user_type);
        $stmt_path->bindParam(':season', $path_season);
        $stmt_path->bindParam(':difficulty', $path_difficulty);
        $stmt_path->bindParam(':img', $imageURL);

        //execute and get results
        $stmt_path->execute();
        $path_id = $connect->lastInsertId();

        //also submit a review 
        $stmt_review = $connect->prepare("INSERT INTO reviews(user_id,path_id,rating,review) 
                                VALUES (:userid,:pathid,:rate,:rev)");
        $stmt_review->bindParam(':userid', $_SESSION['id']);
        $stmt_review->bindParam(':pathid', $path_id);
        $stmt_review->bindParam(':rate', $path_rating);
        $stmt_review->bindParam(':rev', $path_review);
        
        $stmt_review->execute();
        //redirect to new path's page using its id
        echo '<script>window.location.href = "../dynamic/pathdetails.php?id='.$path_id.'";</script>';
    ?>