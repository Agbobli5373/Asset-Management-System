<?php 
   
   function filter($attribute, $dbConnection){
    //protect mysql injection
    $attribute = stripcslashes($attribute);
    $attribute = htmlspecialchars($attribute);
    $attribute = mysqli_real_escape_string($dbConnection ,$attribute,);
    return $attribute ;
  }

  function Year($created_timestamp){
    if(!is_numeric($created_timestamp)){
        return "Invalid timestamp";
    }
    $current_timestamp = time(); // Current timestamp
    $years_diff = floor((($current_timestamp - $created_timestamp)/3600)/24/365); // Calculate the difference in years
    return $years_diff ;
}


?>