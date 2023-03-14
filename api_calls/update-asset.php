<?php

require_once '../config/dbConnect.php';

$get_asset_id = $_POST['asset_id'];
$get_asset_name = $_POST['name'];
$get_asset_category = $_POST['category'];
$get_department = $_POST['department'];
$get_asset_price = $_POST['price'];
$get_asset_depreciate_rate = floatval($_POST['depreciate'])/100;
$get_asset_quantity = $_POST['quantity'];
$get_asset_details = $_POST['detail'];

/*$sql_check_user_email = "SELECT * 
                                 FROM `user_tbl` 
                                 WHERE `email` = '$get_user_email' 
                                 LIMIT 1"; */

$sql_update = "UPDATE `asset_tbl` 
                        SET  `asset_name` =  '$get_asset_name ', `category_id` = '$get_asset_category',
                        `department_id`= '$get_department', `asset_price` = '$get_asset_price',
                        `depreciated_rate` = '$get_asset_depreciate_rate',
                        `asset_quantity` = '$get_asset_quantity', `details` = '$get_asset_details'
                         WHERE `asset_id` = '$get_asset_id' ";

//$check_user = mysqli_query($connectionString, $sql_check_user_email)
    //or die(mysqli_error($connectionString));


$updateasset = mysqli_query($connectionString, "$sql_update") or die(mysqli_error($connectionString));
    if ($updateasset) {
        echo "success";
        
    }

