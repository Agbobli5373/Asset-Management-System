
<?php
require_once '../config/dbConnect.php';

$get_asset_name = $_POST['name'];
$get_asset_category = $_POST['category'];
$get_department = $_POST['department'];
$get_asset_price = $_POST['price'];
$get_asset_depreciate_rate = $_POST['depreciate'];
$get_asset_quantity = $_POST['quantity'];
$get_asset_details = $_POST['detail'];



$insert_asset_sql = "INSERT INTO `asset_tbl` (`asset_name`, `department_id`, 
                           `category_id`,  `asset_price`, 
                           `depreciated_rate`, `details`, `asset_timestamp`) 
                     VALUES ('$get_asset_name','$get_department','$get_asset_category',
                            '$get_asset_price','$get_asset_depreciate_rate','$get_asset_details', current_timestamp());";

$addasset = mysqli_query($connectionString, $insert_asset_sql) or die(mysqli_error($connectionString));
if ($addasset) {
    echo "success";
}else{
    echo "error" ;
}
?>