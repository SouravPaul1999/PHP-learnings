<?php

require('../model/insert_fetch.php');
$obj = new user;
$obj->insertData_user($_POST);
?>