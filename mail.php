<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mail validation</title>
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
</head>

<body>
  <div class="container">
    <h2>Validate Your Email</h2>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      Validate Email ID: <input type="text" class="form-control" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" autofocus>
      <br>
      <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
    </form>

    <ul class="pagination pagination-md justify-content-center">
      
    <li class="page-item"><a class="page-link" href="./mobile.php">Prev</a></li>
      <li class="page-item"><a class="page-link" href="./name.php">1</a></li>
      <li class="page-item"><a class="page-link" href="./photo_upload.php">2</a></li>
      <li class="page-item"><a class="page-link" href="./mobile.php">3</a></li>
      <li class="page-item active"><a class="page-link" href="./mail.php">4</a></li>
      <li class="page-item"><a class="page-link" href="./marksheet.php">5</a></li>
      <li class="page-item"><a class="page-link" href="./pdf_Marksheet.php">6</a></li>
      <li class="page-item"><a class="page-link" href="./marksheet.php">Next</a></li>
    </ul>

    <div class="text-center">
      <a href="logout.php" class="text-dark text-decoration-none" tite="Logout"><button class="btn w-25 btn-md btn-warning btn-block" id="lb" type="submit">Logout</button></a>
    </div>
  </div>

  <div class="container form-signin">

    <?php
    function validate_email($email)
    {
  
      if ( (strlen($email) > 3) && preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        // or (filter_var($email, FILTER_VALIDATE_EMAIL) == $email)
        $curl = curl_init();
  
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.apilayer.com/email_verification/{$email}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: text/plain",
            "apikey: GaxI2X39wJjGHbT6VWIMfuCGsz55D2D1"
          ),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET"
        ));
  
        $mail_response = curl_exec($curl);
  
        curl_close($curl);
        $mail_response = json_decode($mail_response);
        $mail_response = (get_object_vars($mail_response));
        // var_dump ($mail_response["can_connect_smtp"]);
        // var_dump ($mail_response);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        // var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
  
        // (filter_var($email, FILTER_VALIDATE_EMAIL) != "") and
        // var_dump($mail_response);
  
        if (array_key_exists('can_connect_smtp', $mail_response) && ($mail_response["can_connect_smtp"])) {
          return "this  <b>$email</b> is valid Email. <br>";
          // return $email;
        } else {
          return "this <b>$email</b> email-id is not exist <br>";
          // return "this email id is not exist";
        }
      } else {
        return "Enter valid email id <br>";
        // return "Enter valid email id";
      }
    }

    if (!isset($_SESSION['username'])) {
      header('Refresh: 0; URL = login_user.php');
    }
    else{

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email_id = validate_email($_POST["email"]);
        echo $email_id;
      }
    }
    ?>
  </div>

</body>

</html>