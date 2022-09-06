<?php

$servername = "localhost";
$username = "root";
$password = "Souravpaul505@";
$db = "IPL_2022";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql1 = "CREATE DATABASE IPL_2022";
  $sql2 = "CREATE TABLE RESULTS_AND_CAPTAIN(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    venue_of_match VARCHAR(50) NOT NULL,
    team1_captain VARCHAR(50) NOT NULL,
    team2_captain VARCHAR(50) NOT NULL,
    toss_won_by VARCHAR(50) NOT NULL,
    match_won_by VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ";
  $sql3 = "INSERT INTO IPL_FIXTURES (venue_of_match,date_of_match,team1,team2)
    VALUES('Eden Gardens', '3/4/2022', 'KKR', 'GT')";

  $sql4 = "INSERT INTO RESULTS_AND_CAPTAIN(venue_of_match,team1_captain,team2_captain,toss_won_by,match_won_by)
    VALUES('Eden Gardens','Gautam gambhir','Hardik Pandya','GT','KKR')";
  $last_id = $conn->lastInsertId();
  // sql to delete a record
  $sql5 = "DELETE FROM RESULTS_AND_CAPTAIN WHERE id=2";

  $sql6 = "UPDATE IPL_FIXTURES set team1='SRH' where id = 3";

  $sql7 = "CREATE DATABASE Employee";

  $sql8 = "CREATE TABLE Employee.employee_code_table (
      employee_code varchar(50) NOT NULL PRIMARY KEY,
      employee_code_name VARCHAR(50) NOT NULL,
      employee_domain VARCHAR(50) NOT NULL) ";

  $sql9 = "CREATE TABLE Employee.employee_salary_table (
      employee_id varchar(50) NOT NULL PRIMARY KEY,
      employee_salary INT(10) NOT NULL,
      employee_code VARCHAR(50) NOT NULL,CONSTRAINT fks  FOREIGN KEY(employee_code) REFERENCES Employee.employee_code_table(employee_code))";
  $sql10 = "CREATE TABLE Employee.employee_details_table (
      employee_id varchar(50) NOT NULL,
      employee_first_name INT(10) NOT NULL,
      employee_last_name VARCHAR(50) NOT NULL,
      Graduation_percentile INT(3) NOT NULL,CONSTRAINT fkd  FOREIGN KEY(employee_id) REFERENCES Employee.employee_salary_table(employee_id))";
      
  // $conn->exec($sql7);
  // $conn->exec($sql8);
  // $conn->exec($sql9);
  // $conn->exec($sql10);


  // begin the transaction
  $conn->beginTransaction();
  // // our SQL statements
  // $conn->exec("INSERT INTO IPL_FIXTURES (venue_of_match,date_of_match,team1,team2)
  // VALUES ('Motera', '15/4/2022', 'RCB', 'MI')");
  // $conn->exec("INSERT INTO RESULTS_AND_CAPTAIN (venue_of_match,team1_captain,team2_captain,toss_won_by,match_won_by)
  // VALUES ('Motera', 'Virat', 'Rohit','RCB', 'MI')");

  // //employee_code_table
  // $conn->exec("INSERT INTO Employee.employee_code_table (employee_code,employee_code_name,employee_domain)
  //   VALUES ('su_john', 'ru_john', 'java')");

  // $conn->exec("INSERT INTO Employee.employee_code_table (employee_code,employee_code_name,employee_domain)
  //   VALUES ('su_denny', 'ru_denny', 'PHP')");

  // $conn->exec("INSERT INTO Employee.employee_code_table (employee_code,employee_code_name,employee_domain)
  //   VALUES ('su_cory', 'ru_cory', 'java')");

  // $conn->exec("INSERT INTO Employee.employee_code_table (employee_code,employee_code_name,employee_domain)
  //   VALUES ('su_tony', 'ru_tony', 'Angular JS')");

  // employee_salary_table
//   $conn->exec("INSERT INTO Employee.employee_salary_table (employee_id,employee_salary,employee_code)
// VALUES ('RU_122', '60000', 'su_john')");

//   $conn->exec("INSERT INTO Employee.employee_salary_table (employee_id,employee_salary,employee_code)
// VALUES ('RU_123', '25000', 'su_denny')");

//   $conn->exec("INSERT INTO Employee.employee_salary_table (employee_id,employee_salary,employee_code)
// VALUES ('RU_124', '44000', 'su_cory')");

//   $conn->exec("INSERT INTO Employee.employee_salary_table (employee_id,employee_salary,employee_code)
// VALUES ('RU_125', '85000', 'su_tony')");

// employee_details_table
$conn->exec("INSERT INTO Employee.employee_details_table (employee_id,employee_first_name,employee_last_name,Graduation_percentile)
VALUES ('RU_122', 'John', 'Snow' , 60)");

$conn->exec("INSERT INTO Employee.employee_details_table (employee_id,employee_first_name,employee_last_name,Graduation_percentile)
VALUES ('RU_123', 'Denny', 'Tagore' , 88)");

$conn->exec("INSERT INTO Employee.employee_details_table (employee_id,employee_first_name,employee_last_name,Graduation_percentile)
VALUES ('RU_122', 'Cory', 'Lee' , 72)");

$conn->exec("INSERT INTO Employee.employee_details_table (employee_id,employee_first_name,employee_last_name,Graduation_percentile)
VALUES ('RU_122', 'Tony', 'Luke' , 64)");
  // // commit the transaction
  $conn->commit();
  // // echo "New records created successfully";

  echo "New record created successfully. Last inserted ID is: " . $last_id;

  // echo "TABLE created successfully<br>";
  // echo "Connected successfully";
} catch (PDOException $e) {
  // echo "Connection failed: " . $e->getMessage();
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
