
<?php
require_once '../../config/dbConnect.php';
$get_comaplain_id = $_POST['id'] ;


//first check if category already exists 



$resolved_complain_sql = "UPDATE  `complain_tbl` 
         SET  `isResolve` = 'YES'
         WHERE  `complain_id` = '$get_comaplain_id' 
         LIMIT 1";

$resolved_complain = mysqli_query($connectionString,$resolved_complain_sql) or
                     die(mysqli_error($connectionString));
                
if($resolved_complain){
    echo 'resolved';
}

?>