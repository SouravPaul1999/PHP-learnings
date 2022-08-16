<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Logout Page</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<?php
   // session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   // session_unset();
   
   echo '<p class="text-center">You have successfully logout and clean your previous session & you will be redirect to next page</p>';
   header('Refresh: 2; URL = login_user.php');
   session_destroy();
?>
</body>
</html>