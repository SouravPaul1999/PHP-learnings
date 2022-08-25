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
  <link rel="stylesheet" href="mail_style.css">
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
                
                $mail->setFrom('souravpaul505@gmail.com', 'form submission');
                
            /* Add a recipient. */
            $mail->addAddress($email, 'subscriber');
            
            // $mail->addCC('admiral@empire.com', 'Fleet Admiral');
            // $mail->addBCC('luke@rebels.com', 'Luke Skywalker');
            
            // adding reply address
            $mail->addReplyTo('kunal.singh@innoraft.com', 'Admin');



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