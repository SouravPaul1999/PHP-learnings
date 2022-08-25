<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mailer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
      color: #017572;
      font-size: large;
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
</head>

<body>

  <div class="container">
    <h2>Validate Your Email</h2>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      Validate Email ID: <input type="text" placeholder="Type your email id" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" autofocus>
      <br>
      <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
    </form>
  </div>

  <?php
  if (isset($_POST["submit"])) {
    // Checking For Blank Fields..
    if ($_POST["email"] == "") {
      echo "Fill the email Field..";
    } else {

      $email = $_POST['email'];
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      $email = filter_var($email, FILTER_VALIDATE_EMAIL);
      if (!$email) {
        echo "Invalid Sender's Email";
      } else {
        $sender_email = "souravpaul505@gmail.com";
        $headers = 'From:' . $sender_email . "rn";
        $headers .= 'Cc:' . $sender_email . "rn";
        $subject = "Thank You from Sourav";
        $message = "Thank You For Your Submission";
        $to= $_POST['email'];
        // echo $to;
        // need smtp setup in php.ini file for exectute mail function
        var_dump(mail($to, $subject, $message, $sender_email));
        echo "Your mail has been sent successfuly, Check your email! ";
      }
    }
  }
  ?>

</body>

</html>