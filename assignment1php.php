<?php
session_start();
require('./composer-project/vendor/setasign/fpdf/fpdf.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Form</title>
</head>

<body>

  <?php

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

  function upload_pic($k)
  {
    if (isset($_FILES[$k]) && !empty($_FILES[$k]['name'])) {
      $upload_folder = "photos/";
      $file_location = $upload_folder . basename($_FILES[$k]["name"]);
      $file_name = ($_FILES[$k]["name"]);
      $imagef = $image = "";
      $check = getimagesize($_FILES[$k]["tmp_name"]);
      if (move_uploaded_file($_FILES[$k]['tmp_name'], $file_location) && $check != false) {
        $image = "<img src='photos/$file_name' height='100px' width='150px'>";
        $imagef = "photos/" . $file_name;
        return $imagef;
      } else {
        $image = "you didn't add your photo";
        return $image;
      }
    } else {
      echo "no file was uploaded<br>";
    }
  }

  function validate_number($number)
  {
    // var_dump($number);
    if (preg_match('/^\+[9]{1,2}[1]{1}[0-9]{10}$/', $number)) {
      // return "your contact number is $number <br>";
      return $number;
    } else {
      // return "enter valid number along with correct country code <br>";
      echo "enter valid number along with correct country code<br>";
    }
  }

  function validate_email($email)
  {

    if (strlen($email) > 5 && preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
      //(filter_var($email, FILTER_VALIDATE_EMAIL) == $email) &&
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
        // return "this  <b>$email</b> is valid Email. <br>";
        return $email;
      } else {
        // return "this email id is not exist <br>";
        return "this email id is not exist";
      }
    } else {
      echo "Enter valid email id <br>";
      // return "Enter valid email id";
    }
  }

  function grade_card($input)
  {

    if (strlen($input) > 3) {

      $arr_newline = explode("\n", $input);

      $l1 = "<table class=' w-25 h-auto table table-dark table-hover table-bordered'><thead class='table-light'><tr><th class='text-center'>subject</th><th class='text-center'>Marks</th></tr></thead>";
      $l2 = "<tbody>";
      // return $l1;
      // return $l2;
      $arr = array();
      // foreach ($arr_newline as $rows) 
      for ($i = 0; $i < count($arr_newline); $i++) {
        // $arr=explode("|", $rows);
        array_push($arr, explode("|", $arr_newline[$i]));

        // f(n)=2*n+1,
        // $arr[$i+$i] = ltrim(rtrim($arr[$i+$i]));
        // $arr[$i] = ltrim(rtrim($arr[$i]));
        // $arr[(2*$i)+1] = ltrim(rtrim($arr[(2*$i)+1]));
        // $arr[$i+1] = ltrim(rtrim($arr[$i+1]));

        if ((preg_match("/^([a-zA-Z' ]+)$/", $arr[$i + $i]) && is_string($arr[$i + $i])) && is_numeric($arr[(2 * $i) + 1]) && (strlen($arr[(2 * $i) + 1]) < 4) && ($arr[(2 * $i) + 1] < 101)) {

          $l3 = "<tr><td class='text-center'>$arr[0]</td><td class='text-center'>$arr[1]</td></tr>";
          // return $arr[0];
          // return $arr[1];
          // return $l3;
          // return $arr;
          return $arr;
        } else {
          $l4 = "<tr><td class='text-center'> write valid input!</td><td class='text-center'> write valid input!</td></tr>";
          // return $l4;
        }
      }
      // return $arr1;
      $l5 = "</tbody>";
      // return $l5;
      $l6 = "</table>";
      // return $l6;
    } else {
      return "you didn't put your marks <br>";
    }
  }

  function new_grade_card($input)
  {
    $sub = array();
    if (strlen($input) > 3) {

      $arr_newline = explode("\n", $input);
      // $marks=array();
      $arr = array();
      for ($i = 0; $i < count($arr_newline); $i++) {
        $arr = explode("|", $arr_newline[$i]);
        $arr[0] = ltrim(rtrim($arr[0]));
        $arr[1] = ltrim(rtrim($arr[1]));
        array_push($sub, $arr[0]);
        array_push($sub, $arr[1]);
      }

      for ($i = 0; $i < count($sub); $i += 2) {
        if (preg_match("/^([a-zA-Z' ]+)$/", $sub[$i]) && ctype_alpha($sub[$i])) {
          return $sub;
        } else {
          $sub[$i] = "write proper subject name";
          return $sub;
        }
      }

      for ($i = 1; $i < count($sub); $i += 2) {
        if (is_numeric($sub[$i]) && (strlen($sub[$i]) < 4) && ($sub[$i] < 101)) {
          return $sub;
        } else {
          $sub[$i] = "write proper marks";
          return $sub;
        }
      }
    } else {
      return "you didn't put your marks <br>";
    }
  }

  if (!isset($_SESSION['username'])) {

    header('Refresh: 0; URL = login_user.php');

  }
  else
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $fname = checking($_POST["fname"]);
      $lname = checking($_POST["lname"]);
      $fullname = $fname . " " . $lname;
      // echo "hello " . $fname . " " . $lname . "<br>";
      $form_num = trim($_POST["phone"], " ");
      $cnumber = validate_number($form_num);
      $email_id = validate_email($_POST["email"]);
      // $msheet= grade_card($_POST["Allmarks"]);
      $msheet = new_grade_card($_POST["Allmarks"]);
      // echo var_dump(new_grade_card($_POST["Allmarks"]));
      $imagef = upload_pic('avatar');
      ob_start();
      $pdf = new FPDF('p', 'mm', 'A4');
      $pdf->AddPage('p');
      $pdf->SetFont('Arial', "B", 16);
      $pdf->SetDrawColor(50, 60, 100);
      $pdf->Cell(0, 10, "MARK SHEET", 'B', 1, 'C');
      $pdf->Ln(5);
      $pdf->SetFont('Arial', "", 12);
      $pdf->Cell(100, 10, "Fullname - " . $fullname, 0, 0, 'L');
      if (!empty($imagef)) {
        $pdf->Image($imagef, 150, 30, 40, 40, '');
      } else {
        $pdf->Cell(150, 10, "not uploaded", 0, 2, 'C');
      }
      $pdf->Ln();
      $pdf->Cell(100, 10, "Contact No - " . $cnumber, 0, 2, 'L');
      $pdf->Cell(100, 10, "Email Id - " . $email_id, 0, 2, 'L');
      $pdf->SetXY(10, 120);

      if ($_POST["Allmarks"] != "") {

        $pdf->Cell(95, 10, "Subject Name", 1, 0, 'C');
        $pdf->Cell(95, 10, "Marks Obtained", 1, 0, 'C');
        $pdf->Ln();
        if ($msheet != is_string($msheet)) {
          for ($i = 0; $i < count($msheet) / 2; $i++) {
            $pdf->Cell(95, 10, $msheet[$i + $i], 1, 0, 'C');
            $pdf->Cell(95, 10, $msheet[(2 * $i) + 1], 1, 0, 'C');
            $pdf->Ln();
          }
        } else {
          $pdf->Cell(190, 10, "you didn't enter your marks in right way", 1, 0, 'C');
        }
      } else {
        echo "You didn't enter your marks.";
      }

      $pdf->Output('F', 'gradecard/Marksheet.pdf');
      $pdf->Output('D', 'Marksheet.pdf');
      ob_end_flush();
    }
    
  }

  ?>

</body>

</html>