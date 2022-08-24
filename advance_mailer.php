<?php
require('./vendor/autoload.php')
?>
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
    <h2>Submit Your Email</h2>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      Fill Email ID: <input type="text" placeholder="Type here your email id" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" autofocus>
      <br>
      <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
    </form>
  </div>

  <div class="container form-signin">

    <?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST["submit"])) {
      // Checking For Blank Fields..
      if ($_POST["email"] == "") {
        echo "Fill the email Field..";
      } else {
        // fetch email address from mail.
        $email = $_POST['email'];
        // remove unwanted charecters
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // verifying mail id syntax
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$email) {
          echo "Invalid Sender's Email";
        } else {
          try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();

            /* SMTP server address. */
            $mail->Host = 'smtp.gmail.com';

            /* Use SMTP authentication. */
            $mail->SMTPAuth = TRUE;

            /* Set the encryption system. */
            $mail->SMTPSecure = 'tls';

            /* SMTP authentication username. */
            $mail->Username = 'souravpaul505@gmail.com';

            /* SMTP authentication password. */
            $mail->Password = 'eaorqiqnlkftcfta';

            /* Set the SMTP port. */
            $mail->Port = 587;

            // optional smtp settings, if found som smtp error
            
            // $mail->SMTPOptions = array(
            //   'ssl' => array(
            //     'verify_peer' => false,
            //     'verify_peer_name' => false,
            //     'allow_self_signed' => true
            //   )
            // );

            $mail->setFrom('souravpaul505@gmail.com', 'sourav');

            /* Add a recipient. */
            $mail->addAddress($email, 'sourav_official_email');

            /* Set the subject. */
            $mail->Subject = 'Thank you';

            /* Set the mail message body. */
            $mail->Body = 'Thank you for your submission & have a good day :).';


            /* Finally send the mail. */
            $mail->send();
            // successfull message.
            echo "Message has been sent successfully";
          } 
          catch (Exception $e) {
            // failed message with cause.
            echo "Mailer Error: " . $mail->ErrorInfo;
          }
        }
      }
    }
    ?>
  </div>

</body>

</html>