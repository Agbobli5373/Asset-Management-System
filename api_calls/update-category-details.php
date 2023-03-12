<?php

require_once '../config/dbConnect.php';

        $get_category_id = $_POST['depart_id'];
        $get_category_name = $_POST['category_name'];

        $sql_check_category = "SELECT * 
                                 FROM `category_tbl` 
                                 WHERE `category_name` = '$get_category_name' 
                                 LIMIT 1" ;

        $sql_upadate = "UPDATE `category_tbl` 
                        SET `category_name` = '$get_category_name' 
                        WHERE `category_tbl`.`category_id` = '$get_category_id' ";
      
        $check_category = mysqli_query($connectionString,$sql_check_category)
                             or die(mysqli_error($connectionString));

        if(mysqli_num_rows($check_category) > 0){
        	 echo "already";
        }else{	
        $updatecategory = mysqli_query($connectionString,"$sql_upadate") or die(mysqli_error($connectionString));
        if($updatecategory){
            echo "success";
        }
        }
        ?>