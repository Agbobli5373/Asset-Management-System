<?php

require_once '../config/dbConnect.php';


	
	if ($_POST['id']) {
		
		$pid = intval($_POST['id']);
        $sql = "UPDATE `request_tbl` 
                                 SET `status` = 'DISAPPROVED' 
                                 WHERE `request_tbl`.`request_id` = '$pid' ";
		$query = mysqli_query($connectionString,$sql) or die(mysqli_error($connectionString));

		if($query){
			echo 'success';
		} else {
            echo "error" ;
        }
	} ?>