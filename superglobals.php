<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
<?php

$GLOBALS["lucky"]=17; 

echo "$lucky";
echo "<br>";
// $_SERVER is a PHP super global variable which holds information about headers, paths, and script locations. 

echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
// echo $_SERVER['SCRIPT_NAME'];
// echo "<br>";
// echo $_SERVER['HTTPS'];
// echo "<br>";
// echo $_SERVER['SERVER_SIGNATURE'];
// echo "<br>";
?>

</body>
</html>