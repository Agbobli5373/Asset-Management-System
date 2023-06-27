
<?php
require_once '../config/dbConnect.php';

$get_product_name = $_POST['name'];
$get_product_category = $_POST['category'];
$get_product_price = $_POST['price'];
$get_product_quantity = $_POST['quantity'];




/*$insert_product_sql = "INSERT INTO `stock_tbl` (`product_name`, 
                            `category_id`,  `product_price`, `product_quantity`,
                            `product_timestamp`) 
                     VALUES ('$get_product_name','$get_product_category',
                            '$get_product_price','$get_product_quantity', current_timestamp());";

$addproduct = mysqli_query($connectionString, $insert_product_sql) or die(mysqli_error($connectionString));
if ($addproduct) {
    echo "success";
}else{
    echo "error" ;
} */
?>