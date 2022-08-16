<?php
ob_start();
session_start();
?>

<?
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
?>

<html lang="en">

<head>
  <title>Tutorialspoint.com</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
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

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
      border-color: #017572;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      border-color: #017572;
    }

    h2 {
      text-align: center;
      color: #017572;
    }
  </style>

</head>

<body>

  <!-- <h2>Enter Username and Password</h2> -->
  <div class="container form-signin">

    <?php
    $msg = '';

    if (isset($_POST['login']) && !empty($_POST['username'])
      && !empty($_POST['password'])) {

      if ($_POST['username'] == 'innoraft' &&
        $_POST['password'] == '1234') {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = 'innoraft';

        echo 'You have entered valid username and password, you willbe redirect to name validation page';
        header('Refresh: 2; URL = name.php');
      } 
      else {
        // $msg = 'Wrong username or password';
        echo '<h4 class="form-signin-heading">Wrong username or password</h4>';
      }
    }
    ?>
  </div> <!-- /container -->

  <!-- <div class="container">

    <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

      <h4 class="form-signin-heading"></h4>
      <input type="text" class="form-control" name="username" placeholder="username = tutorialspoint" required autofocus></br>
      <input type="password" class="form-control" name="password" placeholder="password = 1234" required>
      <br>
      <button class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
    </form>
    <br>
    <p>
      Click here to clean <a href="logout.php" tite="Logout">Session.
    </p>

  </div> -->

</body>

</html>