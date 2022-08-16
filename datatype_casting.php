<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datatype Casting</title>
</head>
<body>
<?php
$s="hello server";
$n1=456.7;
$n2=1.3e287;
$n3= true;
var_dump($n3);

echo "<br>";

$n3= (int)$n3;
var_dump($n3);

echo "<br>";

$strOfn3= (string)$n3;
var_dump($strOfn3);

echo "<br>";

$intOfs= (int)$s; //any string changes to 0 after type casting from string to int
var_dump($intOfs);

echo "<br>";

$intOfn2= (int)$n2; //any infinite number changes to 0 after type casting from infinite to int
var_dump($intOfn2);

echo "<br>";

$intOfn1= (int)$n1;
var_dump($intOfn1);


?>
</body>
</html>