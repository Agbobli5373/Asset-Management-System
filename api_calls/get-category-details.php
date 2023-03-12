<?php require_once '../config/dbConnect.php';
header('Content-type: application/json; charset=UTF-8');
     
   

    $response = array();
    
    if ($_POST['id']) {
        
        $pid = intval($_POST['id']);

        $sql = "SELECT * FROM category_tbl 
        WHERE `category_id`='$pid' 
        LIMIT 1";
        
        $getcategoryInfo = mysqli_query($connectionString,$sql)or die(mysqli_error($connectionString));
        $categoryDetails = mysqli_fetch_array($getcategoryInfo);  

        $response['name']  = $categoryDetails['category_name'];
        
        echo json_encode($response);
    }

    ?>