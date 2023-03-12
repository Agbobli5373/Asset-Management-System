
<?php
require_once '../config/dbConnect.php';
$get_category_name = $_POST['category_name'];

//first check if category already exists 

$check_category_sql = "SELECT * 
        FROM `asset-category_tbl` 
        WHERE `category_name` = '$get_category_name' 
        LIMIT 1" ;

$insert_category_sql = "INSERT 
        INTO `asset-category_tbl` (`category_name`, `category_timestamp`) 
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