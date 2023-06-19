
<?php
require_once '../config/dbConnect.php';
$get_product_id = $_POST['asset-id'];

$get_stock = mysqli_query($connectionString, "SELECT * FROM stock_tbl Where `product_id` = '$get_product_id'  ") or die(mysqli_error($connectionString));

$product = mysqli_fetch_array($get_stock);
$product_id = $product['product_id'];
$get_asset_name = $product['product_name'];
$get_asset_price = $product['product_price'];
$get_asset_category = $product['category_id'];
$get_product_quantity = $product['product_quantity'];


$get_asset_details = $_POST['detail'];
$get_asset_depreciate_rate = floatval($_POST['depreciate']) / 100;
$get_department = $_POST['department'];
$get_asset_quantity = $_POST['quantity'];






$insert_asset_sql = "INSERT INTO `asset_tbl` (`asset_name`, `department_id`, 
                           `category_id`,  `asset_price`, `asset_quantity`,
                           `depreciated_rate`, `details`, `asset_timestamp`) 
                     VALUES ('$get_asset_name','$get_department','$get_asset_category',
                            '$get_asset_price','$get_asset_quantity','$get_asset_depreciate_rate','$get_asset_details', current_timestamp());";
$update_qty_sql = "UPDATE `stock_tbl` SET `product_quantity` = `product_quantity` - '$get_asset_quantity' 
                   WHERE `stock_tbl`.`product_id` = '$get_product_id';";

if ($get_product_quantity >= $get_asset_quantity) {
    if (mysqli_query($connectionString, $insert_asset_sql) && mysqli_query($connectionString, $update_qty_sql)) {
        $addasset = mysqli_query($connectionString, $insert_asset_sql) or die(mysqli_error($connectionString));
        if ($addasset) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "Error: " . $insert_asset_sql . "<br>" . mysqli_error($connectionString);
    }
} else {
    echo "enough";
}

?>