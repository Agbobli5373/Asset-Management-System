<?php

require_once '../config/dbConnect.php';

        $get_current_password = $_POST['current-password'];
        $get_new_password = $_POST['new-password'];
        $get_user_id = $_COOKIE['user_id'] ;

        $sql_check_password = "SELECT * 
                                 FROM `user_tbl` 
                                 WHERE `user_id` = '$get_user_id'  AND `password` = '$get_current_password'
                                 LIMIT 1" ;

        $sql_upadate_password = "UPDATE `user_tbl` 
                        SET `password` = '$get_new_password' 
                        WHERE `user_tbl`.`user_id` = '$get_user_id' ";
      
        $check_password = mysqli_query($connectionString,$sql_check_password)
                             or die(mysqli_error($connectionString));

        if(mysqli_num_rows($check_password) > 0){
             $updatePassword = mysqli_query($connectionString,"$sql_upadate_password") or die(mysqli_error($connectionString));
        	 if($updatePassword){
                echo "success";
            }
        }else{	
             echo 'not_match' ;
        }
        ?>