<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(
      function update () {
          $("#fn").add($("#ln")).keyup(function(event) {
			      $('#full').val($("#fn").val()+ " " +$("#ln").val());
		      });
        
      }
    );

    // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  <script>
    $(document).ready (function(){

      $('#address').change(function()  
      {  
        var hasNumber = this.value.match(/^[a-zA-Z0-9|]+$/);
        if ( hasNumber) {
          return true;
        } else {
         alert("please write marks in valid syntax");   
         return false; 
        }
      });
    });

  </script>
  </script>
  <title>Marksheet's PDF</title>
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
      text-decoration:underline 2px solid #017572 ;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>
      Genarate PDF of your Marksheet
    </h2>
  <form action="assignment1php.php" class="form-signin" class="form-control" method="post" enctype="multipart/form-data">
  First name:  <input type="text"  id="fn" name="fname" class="form-control" pattern="[a-z A-Z]{1,12}" onkeydown="this.value = this.value.trim()" onkeyup="this.value = this.value.trim()" required autofocus>
  Last name: <input type="text" id="ln" name="lname" class="form-control" pattern="[a-z A-z]{1,20}" onkeydown="this.value = this.value.trim()" onkeyup="this.value = this.value.trim()" required>
  Full name: <input type="text" class="form-control" name="fullname" id="full" disabled>
  <br>
  Contact Number: <input type="tel" class="form-control" pattern="[+]{1}[9]{1}[1]{1}[0-9]{10}" maxlength="13" name="phone" onkeydown="this.value = this.value.trim()" onkeyup="this.value = this.value.trim()" placeholder="Enter +91 before your number"  id="">
  Email ID: <input type="text" name="email" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" onkeydown="this.value = this.value.trim()" onkeyup="this.value = this.value.trim()">
  marks: <textarea name="Allmarks" id="address" class="form-control" placeholder="follow this pattern (subject|marks)" cols="20" rows="10"></textarea>
  <br>
  choose your photo:
  <input type="file" class="form-control" accept="image/*" name="avatar">
  <br>
  <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
  </form>

  <ul class="pagination pagination-md justify-content-center">
  <li class="page-item"><a class="page-link" href="./marksheet.php">Prev</a></li>
  <li class="page-item"><a class="page-link" href="./name.php">1</a></li>
  <li class="page-item"><a class="page-link" href="./photo_upload.php">2</a></li>
  <li class="page-item"><a class="page-link" href="./mobile.php">3</a></li>
  <li class="page-item"><a class="page-link" href="./mail.php">4</a></li>
  <li class="page-item"><a class="page-link" href="./marksheet.php">5</a></li>
  <li class="page-item active"><a class="page-link" href="./pdf_Marksheet.php">6</a></li>
  </ul>

  <div class="text-center">
    <a href="logout.php" class="text-dark text-decoration-none" tite="Logout"><button class="btn w-25 btn-md btn-warning btn-block" id="lb" type="submit">Logout</button></a>
  </div>
</div>

</body>
</html>