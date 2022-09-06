<?php
 
  // Include database file
  include "./employees.php";
 
  $employeeObj = new employee();
 
  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $employeeObj->insertData_code($_POST);
  }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert data</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>
 
<div class="card text-center" style="padding:15px;">
  <h4>Insert Employee code Data</h4>
</div><br> 
 
<div class="container">
  <form action="indexd.php" method="POST">
    <div class="form-group">
      <label for="ecode">Employee_code:</label>
      <input type="text" class="form-control" name="ecode" placeholder="Enter Employee code like <su_poppy>" required="">
    </div>
    <div class="form-group">
      <label for="ecode_name">Employee_code_name:</label>
      <input type="text" class="form-control" name="ecode_name" placeholder="Enter employee CodeName <ru_poppy>" required="">
    </div>
    <div class="form-group">
      <label for="edomain">Employee_domain</label>
      <input type="text" class="form-control" name="edomain" placeholder="Enter employee domain <Python3>" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

