<?php require_once '../config/dbConnect.php';
header('Content-type: application/json; charset=UTF-8');
     
   

    $response = array();
    
    if ($_POST['id']) {
        
        $pid = intval($_POST['id']);

        $sql = "SELECT * FROM user_tbl 
        WHERE `user_id`='$pid' 
        LIMIT 1";
        
        $getuserInfo = mysqli_query($connectionString,$sql)or die(mysqli_error($connectionString));
        $userDetails = mysqli_fetch_array($getuserInfo);  

        $response['name']  = $userDetails['user_name'];
        $response['email']  = $userDetails['email'];
        
        echo json_encode($response);
    }

    ?>