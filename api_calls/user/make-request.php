
<?php
require_once '../../config/dbConnect.php';
$get_asset_name = $_POST['asset_name'];
$get_reason = $_POST['reason'] ;
$get_department_id = $_COOKIE['department_id'];



$check_request_sql = "SELECT * 
        FROM `request_tbl` 
        WHERE `asset_name` = '$get_asset_name' AND `department_id` = '$get_department_id' 
        LIMIT 1" ;



$insert_request_sql = "INSERT 
        INTO `request_tbl` (`asset_name`,`request_reason`,`department_id`, `status`,`request_timestamp`) 
        VALUES ('$get_asset_name','$get_reason','$get_department_id','PENDING',current_timestamp())";

$check_request = mysqli_query($connectionString,$check_request_sql )or 
                  die(mysqli_error($connectionString));

if (mysqli_num_rows($check_request) > 0){
   echo 'already' ;
}else{	
     $addRequest = mysqli_query($connectionString,$insert_request_sql) 
     or die(mysqli_error($connectionString));
     if($addRequest){
        echo "success" ;
     }
} 
  
?>