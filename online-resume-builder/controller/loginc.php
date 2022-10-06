<?php
session_start();
require('../model/insert_fetch.php');

  $obj=  new user;
  $d= $obj->insertData_fetch($_POST);
  echo $d;


?>