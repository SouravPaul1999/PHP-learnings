<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetch & Show</title>
</head>

<body>

  <?php
  echo "<table style='border: solid 1px black;'>";
  // echo "<tr><th>Id</th><th>venue</th><th>Date of match</th><th>Team1</th><th>Team2</th><th>Data_Reg datetime</tr>";
  // echo "<tr><th>Team1</th><th>Team2</th><th>Venue</th></tr>";
  // echo "<tr><th>employee code name</th><th>salary</th></tr>";

  // echo "<tr><th>First Name</th><th>salary > 50k</th></tr>"; //q1
  // echo "<tr><th>Last Name</th><th>Percentile</th></tr>"; //q2
  // echo "<tr><th>Code name</th><th>Percentile</th></tr>"; //q3
  // echo "<tr><th>First name</th><th>Last name</th></tr>"; //q4
  // echo "<tr><th>Domain name</th><th>Total Salary</th></tr>"; //q5,q6
  echo "<tr><th>Employee id of unassigned employee code</th></tr>"; //q7




  class TableRows extends RecursiveIteratorIterator
  {
    function __construct($it)
    {
      parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
      return "<td style='width: 150px; border: 1px solid black;'><center>" . parent::current() . "</center></td>";
    }

    function beginChildren()
    {
      echo "<tr>";
    }

    function endChildren()
    {
      echo "</tr>" . "\n";
    }
  }

  $servername = "localhost";
  $username = "root";
  $password = "Souravpaul505@";
  // $db = "IPL_2022";
  $db = "Employee";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM IPL_FIXTURES";
    $sql1 = "SELECT team1,team2 FROM IPL_FIXTURES where date_of_match='15/4/2022'";
    $sql2 = ("SELECT team1,team2,venue_of_match FROM IPL_FIXTURES ORDER BY venue_of_match");
    $sql3 = ("SELECT team1,team2,venue_of_match FROM IPL_FIXTURES ORDER BY venue_of_match LIMIT 1 OFFSET 2 "); //LIMIT clause that is used to specify the number of records to show. OFFSET will show - return only 1 records, start on record 3 (OFFSET 2);
    $sql4 = "SELECT employee_code_name,employee_salary FROM employee_code_table,employee_salary_table WHERE employee_code_table.employee_code = employee_salary_table.employee_code ORDER BY employee_salary";

    $q1 = "SELECT employee_first_name,employee_salary 
    FROM employee_salary_table,employee_details_table 
    WHERE employee_salary_table.employee_id = employee_details_table.employee_id 
    AND employee_salary> 50000 ";

    $q2 = "SELECT employee_last_name,Graduation_percentile 
    FROM employee_details_table 
    WHERE Graduation_percentile > 70 ";

    $q3 = "SELECT employee_code_name,Graduation_percentile 
    FROM employee_code_table,employee_salary_table,employee_details_table 
    WHERE employee_code_table.employee_code = employee_salary_table.employee_code 
    AND employee_salary_table.employee_id = employee_details_table.employee_id 
    AND Graduation_percentile < 70 ORDER BY Graduation_percentile";

    $q4 = "SELECT employee_first_name,employee_last_name 
    FROM employee_code_table,employee_salary_table,employee_details_table 
    WHERE employee_code_table.employee_code = employee_salary_table.employee_code 
    AND employee_salary_table.employee_id = employee_details_table.employee_id 
    AND employee_domain != 'Java' ";

    $q5 = "SELECT employee_domain, SUM(employee_salary) AS 'Total salary'
    FROM employee_code_table,employee_salary_table
    WHERE employee_code_table.employee_code = employee_salary_table.employee_code
    GROUP BY employee_domain";

    $q6 = "SELECT employee_domain, SUM(employee_salary) AS 'Total salary'
    FROM employee_code_table,employee_salary_table
    WHERE employee_code_table.employee_code = employee_salary_table.employee_code AND employee_salary > 30000
    GROUP BY employee_domain";

    $q7= "SELECT employee_id
    FROM employee_salary_table
    WHERE employee_code = '' ";

    $fetch_data = $conn->prepare($q7);
    $fetch_data->execute();

    // set the resulting array to associative
    $result = $fetch_data->setFetchMode(PDO::FETCH_ASSOC);

    foreach (new TableRows(new RecursiveArrayIterator($fetch_data->fetchAll())) as $k => $v) {
      echo $v;
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table>";
  ?>

</body>

</html>