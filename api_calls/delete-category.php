<?php

require_once '../config/dbConnect.php';


	
	if ($_POST['id']) {
		
		$pid = intval($_POST['id']);
        $sql = "DELETE FROM `category_tbl` WHERE `category_tbl`.`category_id` = '$pid'";
		$query = mysqli_query($connectionString,$sql) or die(mysqli_error($connectionString));

		if($query){
			echo 'success';
		} else {
            echo "error" ;
        }
	} ?>