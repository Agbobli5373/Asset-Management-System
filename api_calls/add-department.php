
<?php
require_once '../config/dbConnect.php';
$get_department_name = $_POST['department_name'];

//first check if department already exists 

$check_department_sql = "SELECT * 
        FROM `department_tbl` 
        WHERE `department_name` = '$get_department_name' 
        LIMIT 1" ;

$insert_department_sql = "INSERT 
        INTO `department_tbl` (`department_name`, `department_timestamp`) 
        VALUES ('$get_department_name', current_timestamp())";

$check_department = mysqli_query($connectionString,$check_department_sql)or die(mysqli_error($connectionString));

if(mysqli_num_rows($check_department) > 0){
     echo "already";
}else{	
$addDepartment = mysqli_query($connectionString,$insert_department_sql) or die(mysqli_error($connectionString));
if($addDepartment){
    echo "success";
}
}  ?>