<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload photo</title>
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
    <h2>Upload your photo</h2>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      choose your photo: <input type="file" accept="image/*" class="form-control" name="avatar" >
      <br>
      <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
    </form>

    <ul class="pagination pagination-md justify-content-center">
      <li class="page-item"><a class="page-link" href="./name.php">Prev</a></li>
      <li class="page-item"><a class="page-link" href="./name.php">1</a></li>
      <li class="page-item active"><a class="page-link" href="./photo_upload.php">2</a></li>
      <li class="page-item"><a class="page-link" href="./mobile.php">3</a></li>
      <li class="page-item"><a class="page-link" href="./mail.php">4</a></li>
      <li class="page-item"><a class="page-link" href="./marksheet.php">5</a></li>
      <li class="page-item"><a class="page-link" href="./pdf_Marksheet.php">6</a></li>
      <li class="page-item"><a class="page-link" href="./mobile.php">Next</a></li>

    </ul>

    <div class="text-center">
      <a href="logout.php" class="text-dark text-decoration-none" tite="Logout"><button class="btn w-25 btn-md btn-warning btn-block" accept="image/*" type="submit">Logout</button></a>
    </div>

  </div>

  <div class="container form-signin">

    <?php

    function upload_pic($k)
    {
      if (isset($_FILES[$k]) && !empty($_FILES[$k]['name'])) {
        $upload_folder = "photos/";
        $file_location = $upload_folder . basename($_FILES[$k]["name"]);
        $file_name = ($_FILES[$k]["name"]);
        $imagef = $image = "";
        $check= getimagesize($_FILES[$k]["tmp_name"]);
        if (move_uploaded_file($_FILES[$k]['tmp_name'], $file_location) && $check!=False ) {
          $image = "<img src='photos/$file_name' height='150px' width='300px'>";
          $imagef = "photos/" . $file_name;
          echo $image;
        } else {
          $image = "you add other fiels rather than photo";
          echo $image;
        }
      } else {
        echo "no file was uploaded";
      }
    }

    function uploadpic1($k)
    {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: PUT, GET, POST");

      $response = array();
      $upload_dir = 'photos/';
      $server_url = 'http://127.0.0.1';

      if ($_FILES[$k]) {
        $avatar_name = $_FILES[$k]["name"];
        $avatar_tmp_name = $_FILES[$k]["tmp_name"];
        $error = $_FILES[$k]["error"];

        if ($error > 0) {
          $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
          );
          echo $response["message"];
        } else {
          $random_name = rand(1000, 1000000) . "-" . $avatar_name;
          $upload_name = $upload_dir . strtolower($random_name);
          $upload_filepath_name = preg_replace('/\s+/', '-', $upload_name);

          if (move_uploaded_file($avatar_tmp_name, $upload_filepath_name)) {
            $response = array(
              "status" => "success",
              "error" => false,
              "message" => "File uploaded successfully",
              "url" => $server_url . "/" . $upload_filepath_name
            );

            echo "<img class='my-5 mx-5' src='photos/$random_name' height='100px' width='150px'>";
          } else {
            $response = array(
              "status" => "error",
              "error" => true,
              "message" => "Error uploading the file!"
            );

            echo $response["message"];
          }
        }
      } else {
        $response = array(
          "status" => "error",
          "error" => true,
          "message" => "No file was sent!"
        );

        echo $response["message"];
      }
    }

    if (!isset($_SESSION['username'])) {
      header('Refresh: 0; URL = login_user.php');
    } else {

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        echo upload_pic('avatar');
      }
    }
    ?>
  </div>

</body>

</html>