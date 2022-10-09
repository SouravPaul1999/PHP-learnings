<?php
require('../model/insert_fetch.php');
class login_signup 
{
  function login($post)
  {
  session_start();

  $obj=  new user;
  $obj->insertData_fetch($post);

  }

  function signup($post)
  {
    # code...
    $obj = new user;
    $obj->insertData_user($post);
  }
}


?>