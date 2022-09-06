<?php
 
  // Include database file
  include "./employees.php";
 
  $employeeObj = new employee();
 
  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $employeeObj->insertData_details($_POST);
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
  <h4>Insert Employee Details Data</h4>
</div><br> 
 
<div class="container">
  <form action="index_details.php" method="POST">
    <div class="form-group">
      <label for="emp_id">Employee_id:</label>
      <input type="text" class="form-control" name="emp_id" placeholder="Enter Employee id like <RU_127>" required="">
    </div>
    <div class="form-group">
      <label for="emp_fname">Employee_First_name:</label>
      <input type="text" class="form-control" name="emp_fname" placeholder="Enter employee First Name <Poppy>" required="">
    </div>
    <div class="form-group">
      <label for="emp_lname">Employee_Last_name:</label>
      <input type="text" class="form-control" name="emp_lname" placeholder="Enter employee Last Name <Jeans>" required="">
    </div>
    <div class="form-group">
      <label for="emp_gp">Employee_Graduation_Percentile:</label>
      <input type="text" class="form-control" name="emp_gp" placeholder="Enter employee Graduation Percentile like <86>" required="">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>
</div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

