<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:./view/loginpage.php');
}
else{
  echo "hi";
}

?>