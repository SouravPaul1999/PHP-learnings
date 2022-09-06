<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fetch & Show</title>
</head>

<body>

  <table style='border: solid 1px black;'>
  <tr><th>Employee_code</th><th>Employee_code_name</th><th>Employee_domain</th></tr>

  <?php
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

    public function beginChildren():void
    {
      echo "<tr>";
    }

    public function endChildren():void
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
    
    $sql = "SELECT * FROM employee_code_table";
    $fetch_data = $conn->prepare($sql);
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
  ?>
  </table>

</body>

</html>