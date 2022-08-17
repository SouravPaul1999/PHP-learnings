<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Marksheet Login page</title>
   <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <style>
      body {
         padding-top: 40px;
         padding-bottom: 40px;
         /* background-color: #ADABAB; */
         background-image: url('../sourav_domain/background/joanna-kosinska-1_CMoFsPfso-unsplash.jpg')
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
         /* border: 1px solid black; */
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
         text-decoration: underline 2px solid #017572;
      }
   </style>
</head>

<body>

   
   <div class="container">
      <h2>Enter Username and Password</h2>

      <form class="form-signin" role="form" action="<?php echo htmlspecialchars('login.php');?>" method="POST">
      <fieldset>
         <legend>Login form</legend>
         <input type="text" class="form-control" name="username" placeholder="username = innoraft" required autofocus></br>
         <input type="password" class="form-control" name="password" placeholder="password = 1234" required>
         <button class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
         <br>
      </fieldset>
      </form>
      <br>
      <!-- <p>
         Click here to clean <a href="logout.php" tite="Logout">Session & Logout.
      </p> -->

      <div class="text-center">
         <a href="logout.php" class="text-dark text-decoration-none" tite="Logout"><button class="btn w-25 btn-md btn-warning btn-block border border-2 border-danger" id="lb" type="submit">Click here to clean previous session</button></a>
      </div>

   </div>
</body>

</html>