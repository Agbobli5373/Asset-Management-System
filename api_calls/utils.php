<?php 
   
   function filter($attribute, $dbConnection){
    //protect mysql injection
    $attribute = stripcslashes($attribute);
    $attribute = htmlspecialchars($attribute);
    $attribute = mysqli_real_escape_string($dbConnection ,$attribute,);
    return $attribute ;
  }

?>