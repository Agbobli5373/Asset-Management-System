<?php

require_once '../config/dbConnect.php';

$get_user_name = $_POST['name'];
$get_user_department = $_POST['department'];
$get_user_email = $_POST['email'];
$get_user_password = $_POST['password'];
$get_user_role = $_POST['role'];
$get_user_id = $_POST['user_id'];

/*$sql_check_user_email = "SELECT * 
                                 FROM `user_tbl` 
                                 WHERE `email` = '$get_user_email' 
                                 LIMIT 1"; */

$sql_update = "UPDATE `user_tbl` 
                        SET `username` = '$get_user_name' ,`department_id` = '$get_user_department',
                        `email` = '$get_user_email' ,`password` = '$get_user_password' ,`role` = '$get_user_role'
                        WHERE `user_id` = '$get_user_id' ";

//$check_user = mysqli_query($connectionString, $sql_check_user_email)
    //or die(mysqli_error($connectionString));


$updateuser = mysqli_query($connectionString, "$sql_update") or die(mysqli_error($connectionString));
    if ($updateuser) {
        echo "success";
    }

