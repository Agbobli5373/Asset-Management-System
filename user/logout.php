<?php 
     setcookie('role','',time()-3600 ,'/');
     setcookie('username','',time()-3600 ,'/');
     setcookie('email','',time()-3600 ,'/');
     setcookie('department_id','',time()-3600 ,'/');
     setcookie('user_id','',time()-3600 ,'/');   

     header("Location: ../index.php");
     ?>
