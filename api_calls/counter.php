<?php 
   require_once '../config/dbConnect.php' ;

   //Admin
   $assetsql = mysqli_query($connectionString, "SELECT * FROM `asset_tbl`;");
   $assetNumber = mysqli_num_rows($assetsql);
   
   $usersql = mysqli_query($connectionString, "SELECT * FROM `user_tbl`;");
   $userNumber = mysqli_num_rows($usersql);

   $departmentsql = mysqli_query($connectionString, "SELECT * FROM `department_tbl`;");
   $departmentNumber = mysqli_num_rows($departmentsql);

   $categorysql = mysqli_query($connectionString, "SELECT * FROM `category_tbl`;");
   $categoryNumber = mysqli_num_rows($categorysql);

   $complainsql = mysqli_query($connectionString, "SELECT * FROM `complain_tbl` WHERE `isResolve` = 'NO';");
   $complainNumber = mysqli_num_rows($complainsql);

   $requestSql = mysqli_query($connectionString, "SELECT * FROM `request_tbl`;");
   $requestNumber = mysqli_num_rows($requestSql);

   $stockSql = mysqli_query($connectionString, "SELECT * FROM `stock_tbl` WHERE product_quantity > 0 ;");
   $stockNumber = mysqli_num_rows($stockSql);
   //user
   $department = $_COOKIE['department_id'];
   $dptassetsql = mysqli_query($connectionString, "SELECT * FROM `asset_tbl` WHERE `department_id` = '$department'; ");
   $dptAssetNumber = mysqli_num_rows($dptassetsql);

   $dptComplainsql = mysqli_query($connectionString, "SELECT * FROM `complain_tbl` WHERE `department_id` = '$department' AND `isResolve` = 'NO'; ");
   $dptComplainNumber = mysqli_num_rows($dptComplainsql);

   $dptResolvesql = mysqli_query($connectionString, "SELECT * FROM `complain_tbl` WHERE `department_id` = '$department' AND `isResolve` = 'YES'; ");
   $dptResolveNumber = mysqli_num_rows($dptResolvesql);




?>