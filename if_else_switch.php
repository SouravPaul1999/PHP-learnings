<!DOCTYPE html>
<html>
<body>

<?php

function conditional()
{
  $t = date("H");
  echo "<p>The hour (of the server) is " . $t; 
  echo ", and will give the following message:</p>";

  if ($t < "12") {
  echo "Have a good morning!";
  } elseif ($t > "11") {
  echo "Have a good day!";
  } else {
  echo "Have a good night!";
  }
}

conditional();

echo "<br>";

$favcolor = "red";

switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>
 
</body>
</html>
