<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <title>Marksheet</title>
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
    <h2>Genarate your marksheet</h2>
    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
      Enter your marks: <textarea name="Allmarks" id="" class="form-control" placeholder="follow this pattern (subject|marks)" cols="20" rows="10" autofocus></textarea>
      <br>
      <input class="btn w-100 btn-lg btn-primary btn-block" type="submit" name="submit" value="Submit">
    </form>

    <ul class="pagination pagination-md justify-content-center">
      <li class="page-item"><a class="page-link" href="./mail.php">Prev</a></li>
      <li class="page-item"><a class="page-link" href="./name.php">1</a></li>
      <li class="page-item"><a class="page-link" href="./photo_upload.php">2</a></li>
      <li class="page-item"><a class="page-link" href="./mobile.php">3</a></li>
      <li class="page-item"><a class="page-link" href="./mail.php">4</a></li>
      <li class="page-item active"><a class="page-link" href="./marksheet.php">5</a></li>
      <li class="page-item"><a class="page-link" href="./pdf_Marksheet.php">6</a></li>
      <li class="page-item"><a class="page-link" href="./pdf_Marksheet.php">Next</a></li>
    </ul>

    <div class="text-center">
      <a href="logout.php" class="text-dark text-decoration-none" tite="Logout"><button class="btn w-25 btn-md btn-warning btn-block" id="lb" type="submit">Logout</button></a>
    </div>
  </div>

  <div class="container form-signin">

    <?php
    function grade_card($input)
    {

      if (strlen($input) > 3) {

        $arr_newline = explode("\n", $input);
        $l1 = "<table class=' w-100 h-auto table table-dark table-hover table-bordered'><thead class='table-light'><tr><th class='text-center'>subject</th><th class='text-center'>Marks</th></tr></thead>";
        $l2 = "<tbody>";
        echo $l1;
        echo $l2;
        // $arr = array();
        // for ($i = 0; $i < count($arr_newline); $i++) 
        foreach ($arr_newline as $rows) {
          if (substr_count($rows, "|") == 1) {

            $arr = explode("|", $rows);
            // array_push($arr, explode("|", $arr_newline[$i]));

            // $arr[$i+$i] = ltrim(rtrim($arr[$i+$i]));
            $arr[0] = ltrim(rtrim($arr[0]));
            $arr[1] = ltrim(rtrim($arr[1]));
            // $arr[(2*$i)+1] = ltrim(rtrim($arr[(2*$i)+1]));

            if ((preg_match("/^([a-zA-Z' ]+)$/", $arr[0]) && is_string($arr[0])) && is_numeric($arr[1])  && ($arr[1] >= 0)) { //&& (strlen($arr[1]) < 4)

              $l3 = "<tr><td class='text-center'>$arr[0]</td><td class='text-center'>$arr[1]</td></tr>";
              // return $arr[0];
              // return $arr[1];
              echo $l3;
              // return $arr;
              // return $arr;
            } else {
              $l4 = "<tr><td class='text-center'> write valid input!</td><td class='text-center'> write valid input!</td></tr>";
              echo $l4;
            }
          } else {
            echo "<tr><td class='text-center'> write valid input!</td><td class='text-center'> write valid input!</td></tr>";
          }
        }
        // return $arr1;
        $l5 = "</tbody>";
        echo $l5;
        $l6 = "</table>";
        echo $l6;
      } else {
        echo "you didn't put your marks <br>";
      }
    }

    if (!isset($_SESSION['username'])) {
      header('Refresh: 0; URL = login_user.php');
    } else {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        grade_card($_POST["Allmarks"]);
      }
    }
    ?>

  </div>

</body>

</html>