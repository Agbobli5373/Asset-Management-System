<?php 
   require_once '../config/dbConnect.php' ;

   $assetsql = mysqli_query($connectionString, "SELECT * FROM `asset_tbl`;");
   $assetNumber = mysqli_num_rows($assetsql);
   
   $usersql = mysqli_query($connectionString, "SELECT * FROM `user_tbl`;");
   $userNumber = mysqli_num_rows($usersql);

   $departmentsql = mysqli_query($connectionString, "SELECT * FROM `department_tbl`;");
   $departmentNumber = mysqli_num_rows($departmentsql);

   $categorysql = mysqli_query($connectionString, "SELECT * FROM `category_tbl`;");
   $categoryNumber = mysqli_num_rows($categorysql);


?>