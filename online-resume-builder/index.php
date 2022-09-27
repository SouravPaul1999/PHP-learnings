<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:./view/loginpage.php');
}
else{
  header('location:./view/landingpage.php');
}

?>