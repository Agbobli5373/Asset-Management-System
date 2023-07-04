
<?php
require_once '../config/dbConnect.php';

$get_user_name = $_POST['name'];
$get_user_department = $_POST['department'];
$get_user_email = $_POST['email'];
$get_user_password = md5($_POST['password']);
$get_user_role = $_POST['role'];

//first check if user already exists 

$check_user_sql = "SELECT * 
        FROM `user_tbl` 
        WHERE `email` = '$get_user_email' 
        LIMIT 1";

$insert_user_sql = "INSERT INTO `user_tbl` (`username`, `password`, `email`, `role`, 
                                    `department_id`, `timestamp`) 
                               VALUES ('$get_user_name','$get_user_password','$get_user_email',
                                     '$get_user_role', '$get_user_department', current_timestamp());";

$check_user = mysqli_query($connectionString, $check_user_sql) or die(mysqli_error($connectionString));

if (mysqli_num_rows($check_user) > 0) {
    echo "already";
} else {
    $adduser = mysqli_query($connectionString, $insert_user_sql) or die(mysqli_error($connectionString));
    if ($adduser) {
        echo "success";
    }
}  ?>