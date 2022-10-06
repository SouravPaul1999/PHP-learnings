<?php

require('../../vendor/setasign/fpdf/fpdf.php');
function upload_pic($k)
{
  if (isset($_FILES[$k]) && !empty($_FILES[$k]['name'])) {
    $upload_folder = "../view/photo/";
    $file_location = $upload_folder . basename($_FILES[$k]["name"]);
    $file_name = ($_FILES[$k]["name"]);
    $imagep = $image = "";
    $check= getimagesize($_FILES[$k]["tmp_name"]);
    if (move_uploaded_file($_FILES[$k]['tmp_name'], $file_location) && $check!=False ) {
      $image = "<img src='../view/photo/$file_name' height='150px' width='300px'>";
      $imagep = "../view/photo/" . $file_name;
      return $imagep;
    } 
    else {
      $image = "you add other fiels rather than photo";
      return $image;
    }
  } else {
    return "no file was uploaded";
  }
}


session_start();

  $path="../user_resume_folder/{$_SESSION['username']}";

  // $_SESSION["user_folder"]=$path;

if (isset($_POST['submit'])) {
  

  

  if (!file_exists($path)) {

    mkdir($path,0775,true);

  }

    $imagef = upload_pic('upic');


    ob_start();
    $pdf = new FPDF('p', 'mm', 'A4');
    $pdf->AddPage('p');
    $pdf->SetFont('Arial', "B", 16);
    $pdf->SetDrawColor(25, 25, 112);
    $pdf->Cell(0, 10, "RESUME", 'B', 1, 'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial', "", 12);
    $pdf->Cell(100, 10, "Fullname - " . $_POST['name'], 0, 0, 'L');
    if (!empty($imagef)) {
      $pdf->Image($imagef, 150, 30, 40, 40, '');
    } else {
      $pdf->Cell(150, 10, "not uploaded", 0, 2, 'C');
    }
    $pdf->Ln();
    $pdf->Cell(100, 10, "DOB - " . $_POST['dob'], 0, 2, 'L');
    $pdf->Cell(100, 10, "Email Id - " . $_POST['email'], 0, 2, 'L');

    
    if (!empty($_POST['lurl'])) {
      $pdf->Cell(100, 10, "Linkedin Url - " . $_POST['lurl'] , 0, 2, 'L');
    }
    $pdf->Ln(20);

    $school= $_POST['sname'];

    if ( ($_POST['sname'][0])!="" && ($_POST['sstream'][0])!="" && ($_POST['spy'][0])!="" && ($_POST['smarks'][0])!=""  ) {

      $pdf->SetFont('Arial', "B", 16);
      $pdf->Cell(50, 10, "School Details:", 'B', 1, 'L');
      $pdf->Ln(5);
      $pdf->SetFont('Arial', "", 12);

      $pdf->Cell(45, 10, "School Name", 1, 0, 'C');
      $pdf->Cell(45, 10, "Stream", 1, 0, 'C');
      $pdf->Cell(45, 10, "Passing year", 1, 0, 'C');
      $pdf->Cell(45, 10, "Marks", 1, 1, 'C');

      $sr=count($_POST['sname']);

      for ($i=0; $i < $sr; $i++) { 
      $pdf->Cell(45, 10, $_POST['sname'][$i] , 1, 0, 'C');
      $pdf->Cell(45, 10, $_POST['sstream'][$i], 1, 0, 'C');
      $pdf->Cell(45, 10, $_POST['spy'][$i], 1, 0, 'C');
      $pdf->Cell(45, 10, $_POST['smarks'][$i], 1, 1, 'C');
      }
    
      $pdf->Ln(15);
      
    }

    if (($_POST['cname'][0])!="" && ($_POST['cstream'][0])!="" && ($_POST['cpy'][0])!="" && ($_POST['cmarks'][0])!="") {

      $pdf->SetFont('Arial', "B", 16);
      $pdf->Cell(50, 10, "College Details:", 'B', 1, 'L');
      $pdf->Ln(5);
      $pdf->SetFont('Arial', "", 12);

      $pdf->Cell(45, 10, "College Name", 1, 0, 'C');
      $pdf->Cell(45, 10, "Stream", 1, 0, 'C');
      $pdf->Cell(45, 10, "Passing year", 1, 0, 'C');
      $pdf->Cell(45, 10, "Marks", 1, 1, 'C');

      $cr=count($_POST['cname']);

      for ($i=0; $i < $cr; $i++) { 
      $pdf->Cell(45, 10, $_POST['cname'][$i] , 1, 0, 'C');
      $pdf->Cell(45, 10, $_POST['cstream'][$i], 1, 0, 'C');
      $pdf->Cell(45, 10, $_POST['cpy'][$i], 1, 0, 'C');
      $pdf->Cell(45, 10, $_POST['cmarks'][$i], 1, 1, 'C');
      }
    
      $pdf->Ln(15);
      
    }

    if (($_POST['pname'][0])!="" && ($_POST['pdes'][0])!="" && ($_POST['pcy'][0])!="") {

      $pdf->SetFont('Arial', "B", 16);
      $pdf->Cell(50, 10, "Project Details:", 'B', 1, 'L');
      $pdf->Ln(5);
      $pdf->SetFont('Arial', "", 12);

      $pdf->Cell(60, 10, "Project Name", 1, 0, 'C');
      $pdf->Cell(80, 10, "Description", 1, 0, 'C');
      $pdf->Cell(40, 10, "Completition year", 1, 1, 'C');

      $pr=count($_POST['pname']);

      for ($i=0; $i < $pr; $i++) { 
      $pdf->Cell(60, 10, $_POST['pname'][$i] , 1, 0, 'C');
      $pdf->Cell(80, 10, $_POST['pdes'][$i], 1, 0, 'C');
      $pdf->Cell(40, 10, $_POST['pcy'][$i], 1, 1, 'C');
      }
    
      $pdf->Ln(15);
    }

    $a=random_int(1,1000);

    $pdf->Output("F", "{$path}/Resume{$a}.pdf");
    $pdf->Output('D', 'Resume.pdf');

    ob_end_flush();
  
}
?>