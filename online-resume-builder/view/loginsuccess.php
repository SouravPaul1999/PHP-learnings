<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';

      echo "<a href='./logout.php'>Logout</a>";
 }  
 else  
 {  
      header("location:../controller/loginc.php");  
 }  
 ?>  