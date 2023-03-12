<?php

require_once '../config/dbConnect.php';

        $get_department_id = $_POST['depart_id'];
        $get_department_name = $_POST['department_name'];

        $sql_check_department = "SELECT * 
                                 FROM `department_tbl` 
                                 WHERE `department_name` = '$get_department_name' 
                                 LIMIT 1" ;

        $sql_upadate = "UPDATE `department_tbl` 
                        SET `department_name` = '$get_department_name' 
                        WHERE `departments_tbl`.`department_id` = '$get_department_id' ";
      
        $check_department = mysqli_query($connectionString,$sql_check_department)
                             or die(mysqli_error($connectionString));

        if(mysqli_num_rows($check_department) > 0){
        	 echo "already";
        }else{	
        $updateDepartment = mysqli_query($connectionString,"$sql_upadate") or die(mysqli_error($connectionString));
        if($updateDepartment){
            echo "success";
        }
        }