<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Name validation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      /* background-color: #ADABAB; */
    }

    p {
      margin: 0 auto;
      text-align: center;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
      color: #017572;
      font-size: large;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }

    .form-signin .checkbox {
      font-weight: normal;
    }

    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    /* .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
      border-color: #017572;
    } */

    .form-signin input {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      border-color: #017572;
    }

    h2 {
      text-align: center;
      color: #017572;
      text-decoration: underline 2px solid #017572;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(
      function update() {
        $("#fn").add($("#ln")).keyup(function(event) {
          $('#full').val($("#fn").val() + " " + $("#ln").val());
        });

      }
    );
  </script>
</head>

<body>
  <div class="container">
    <h2>Enter your Full name</h2>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      First name: <input type="text" class="form-control" id="fn" name="fname" pattern="[a-z A-Z]{1,12}" autofocus required>
      Last name: <input type="text" class="form-control" id="ln" name="lname" pattern="[a-z A-z]{1,20}" required>
      <br>
      Full name: <input class="form-control" type="text" name="fullname" id="full" disabled>
      <br>
      <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
    </form>

    <ul class="pagination pagination-md justify-content-center">
      <li class="page-item active"><a class="page-link" href="./name.php">1</a></li>
      <li class="page-item"><a class="page-link" href="./photo_upload.php">2</a></li>
      <li class="page-item"><a class="page-link" href="./mobile.php">3</a></li>
      <li class="page-item"><a class="page-link" href="./mail.php">4</a></li>
      <li class="page-item"><a class="page-link" href="./marksheet.php">5</a></li>
      <li class="page-item"><a class="page-link" href="./pdf_Marksheet.php">6</a></li>
      <li class="page-item"><a class="page-link" href="./photo_upload.php">Next</a></li>

    </ul>

    <div class="text-center">
      <a href="logout.php" class="text-dark text-decoration-none" tite="Logout"><button class="btn w-25 btn-md btn-warning btn-block" id="lb" type="submit">Logout</button></a>
    </div>

  </div>

  <div class="container form-signin">

    <?php
    // session_start();
    $fname = $lname = "";

    function checking($form_data)
    {
      $form_data = htmlspecialchars($form_data);
      $form_data = trim($form_data);
      $form_data = stripslashes(($form_data));

      $chars = preg_match("/^([a-zA-Z' ]+)$/", $form_data);
      if ($chars) {

        return $form_data;
      }
    }

    if (!isset($_SESSION['username'])) {
      header('Refresh: 0; URL = login_user.php');
    } else {

      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fname']) && isset($_POST['lname'])) {

        $fname = checking($_POST["fname"]);
        $lname = checking($_POST["lname"]);
        echo "hello " . $fname . " " . $lname . "<br><br>";
        echo "you will be redirected to next page in 5 second";
        header('Refresh: 5; URL = photo_upload.php');
      }
    }
    ?>
  </div>
</body>

</html>