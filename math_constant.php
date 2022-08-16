<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Math and Constants</title>
</head>
<body>
  <?php
  echo(pi()); // returns 3.1415926535898
  echo "<br>";

  echo(min(0, 150, 30, 20, -8, -200));  // returns min value of this set
  echo "<br>";

  echo(max(0, 150, 30, 20, -8, -200));  // returns max value of this set
  echo "<br>";

  echo(abs(-16.78764));  // returns only positive value of the number
  echo "<br>";

  echo(sqrt(144));  // returns 12
  echo "<br>";

  echo(round(3.60));  // returns 3
  echo "<br>";

  echo(rand()); //it will return random value
  echo "<br>";

  echo(rand(-100,-10)); //it will return random value in between -100-> -10
  echo "<br>";

  // how to define constant, SYNTAX- define(name, value, case-insensitive), case-insensitive: Specifies whether the constant name should be case-insensitive. Default is false

  define("name","sourav",true);

  echo name;

  define("cars", [
    "Alfa Romeo",
    "BMW",
    "Toyota"
  ]);
  echo cars[0];

  define("GREETING", "Welcome to World!");
  // This example uses a constant inside a function, even if it is defined outside the function:
  function myTest() {
  echo GREETING;
  }
 
  myTest();

  ?>
</body>
</html>