<?php require_once '../config/dbConnect.php';
header('Content-type: application/json; charset=UTF-8');
     
   

    $response = array();
    
    if ($_POST['id']) {
        
        $pid = intval($_POST['id']);

        $sql = "SELECT * FROM department_tbl 
        WHERE `department_id`='$pid' 
        LIMIT 1";
        
        $getDepartmentInfo = mysqli_query($connectionString,$sql)or die(mysqli_error($connectionString));
        $departmentDetails = mysqli_fetch_array($getDepartmentInfo);  

        $response['name']  = $departmentDetails['department_name'];
        
        echo json_encode($response);
    }

    ?>