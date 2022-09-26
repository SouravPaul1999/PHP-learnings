<?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
?>  
      <br /><br /><a href='<?php require('../view/logout.php') ?>'>Logout</a>
<?php
 }  
 else  
 {  
      header("location:../online-resume-builder/controller/loginc.php");  
 }  
 ?>  