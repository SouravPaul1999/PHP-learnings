<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Download history</title>
</head>
<body>
  <h1 class="bg-primary text-center text-warning">Downloaded Resume History</h1>
<p class='text-center'>
  <?php
  session_start();
  // $files = scandir($_SESSION["user_folder"]);
  $files = scandir("../user_resume_folder/{$_SESSION['username']}");
  foreach ($files as $file) {
    $l= "../user_resume_folder/{$_SESSION['username']}"."/".$file ;
    echo " <a href= $l>".basename($file)."</a>  Last access: ".date("F d Y H:i:s.", fileatime($l))."<br>";
  }
  ?>
</p>
  <p class="text-end me-5">
        <a href="../controller/logout.php" class="btn btn-primary btn-md fw-normal "> Logout </a>
      </p>
</body>
</html>