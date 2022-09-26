<?php   
 //logout.php  
 session_start();  
 session_destroy();  
//  echo "hi";
 header("location:./loginpage.php");
 ?>  