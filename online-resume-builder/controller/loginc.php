<?php
session_start();
require('../model/insert_fetch.php');
// echo $_SESSION['username'];
echo "hello";
if (!isset($_SESSION['username'])) {
  $obj=  new user;
  // require('../view/loginpage.php');
  $d= $obj->insertData_fetch($_POST);
  echo $d;
  // if ($res=='success') {
  //   // header('location:../view/loginsuccess.php');
  //   require('../view/loginsuccess.php');
  // }
}
else{

}

?>