<?php

require_once '../config/dbConnect.php';
require_once '../api_calls/utils.php';





$get_email = filter($_POST['email'], $connectionString);
$get_password = filter($_POST['password'], $connectionString);;

$sql = "SELECT * 
               FROM user_tbl
               WHERE email ='$get_email' 
               AND  password = '$get_password' LIMIT 1";


$query = mysqli_query($connectionString, $sql);

if (mysqli_num_rows($query) > 0) {
    $user_details = mysqli_fetch_array($query);

    $username = $user_details['username'];
    $email = $user_details['email'];
    $role = $user_details['role'];
    $departmet_id = $user_details['department_id'];

    setcookie('username', $username, time() + 2 * 24 * 60 * 60, '/');
    setcookie('email', $email, time() + 2 * 24 * 60 * 60, '/');
    setcookie('role', $role, time() + 2 * 24 * 60 * 60, '/');
    setcookie('department_id', $departmet_id, time() + 2 * 24 * 60 * 60, '/'); 

    $_SESSION['username'] = $username ;
    $_SESSION['email'] = $email ;
    $_SESSION['role'] = $role ;
    $_SESSION['department_id'] = $departmet_id ;

    if ($role == 'admin') {
        echo "admin";
    } else {
        echo 'user';
    }
} else {
    echo "not_exist";
}
