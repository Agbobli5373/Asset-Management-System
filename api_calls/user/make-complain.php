
<?php
require_once '../../config/dbConnect.php';
$get_complain_detail = $_POST['detail'];
$get_asset_id = $_POST['asset_id'] ;
$get_user_id = $_COOKIE['user_id'];
$get_department_id = $_COOKIE['department_id'];

//first check if category already exists 



$check_complain_sql = "SELECT * 
        FROM `complain_tbl` 
        WHERE `asset_id` = '$get_asset_id' AND `isResolve` = 'NO'
        LIMIT 1" ;

$update_complain_sql = "UPDATE  `complain_tbl` 
         SET  `complain_detail` = '$get_complain_detail', `user_id` = '$get_user_id'
         WHERE  `asset_id` = '$get_asset_id' 
         LIMIT 1";

$insert_complain_sql = "INSERT 
        INTO `complain_tbl` (`complain_detail`, `asset_id`, `user_id`, `department_id`, `isResolve`,`complain_timestamp`) 
        VALUES ('$get_complain_detail','$get_asset_id','$get_user_id','$get_department_id','NO',current_timestamp())";

$check_camplain = mysqli_query($connectionString,$check_complain_sql )or 
                  die(mysqli_error($connectionString));

if (mysqli_num_rows($check_camplain) > 0){

     $update_complain = mysqli_query($connectionString, $update_complain_sql) or
     die(mysqli_error($connectionString)) ;
     if($update_complain){
        echo "success" ;
     }

}else{	
     $addcomplain = mysqli_query($connectionString,$insert_complain_sql) 
     or die(mysqli_error($connectionString));
     if($addcomplain){
        echo "success" ;
     }
}  ?>