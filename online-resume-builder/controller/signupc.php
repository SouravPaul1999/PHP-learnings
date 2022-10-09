<?php
require('./login_signup.php');

$user_signup = new login_signup;

$user_signup->signup($_POST)
?>