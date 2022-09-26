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

    function beginChildren():void
    {
      echo "<tr>";
    }

    function endChildren():void
    {
      echo "</tr>" . "\n";
    }
  }

  $servername = "localhost";
  $username = "root";
  $password = "Souravpaul505@";
  $db = "Employee";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

    $fetch_data = $conn->prepare($q1);
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