
<?php
require_once '../config/dbConnect.php';
$get_complain_detail = $_POST['detail'];
$get_asset_id = $_POST['asset_id'] ;
$get_user_id = $_COOKIE['user_id'];
$get_department_id = $_COOKIE['department_id'];

//first check if category already exists 

$check_complain_sql = "SELECT * 
        FROM `category_tbl` 
        WHERE `category_name` = '$get_category_name' 
        LIMIT 1" ;

$insert_category_sql = "INSERT 
        INTO `category_tbl` (`category_name`, `category_timestamp`) 
        VALUES ('$get_category_name', current_timestamp())";

$check_category = mysqli_query($connectionString,$check_category_sql)or die(mysqli_error($connectionString));

if(mysqli_num_rows($check_category) > 0){
     echo "already";
}else{	
$addcategory = mysqli_query($connectionString,$insert_category_sql) or die(mysqli_error($connectionString));
if($addcategory){
    echo "success";
}
}  ?>