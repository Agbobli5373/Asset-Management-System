<?php

require_once '../config/dbConnect.php';


	
	if ($_POST['id']) {
		
		$pid = intval($_POST['id']);
        $sql = "DELETE FROM `department_tbl` WHERE `department_tbl`.`department_id` = '$pid'";
		$query = mysqli_query($connectionString,$sql) or die(mysqli_error($connectionString));

		if($query){
			echo 'success';
		} else {
            echo "error" ;
        }
	} ?>