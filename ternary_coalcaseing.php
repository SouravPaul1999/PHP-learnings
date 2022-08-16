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
 
 echo $name== is_null($name)? "anynomus":"you"; //Returns the value of $name. The value of $name is "anynomus" <- 1st exp if $name  = TRUE.The value of $name is "sourav" <-2nd exp if expr1 = FALSE. 	

 echo "<br>"; 
//  $name = "paul";
  echo $name = $name ?? "sourav"; //Returns the value of $name. If the value of $name is exists, and is not NULL. AND, If expr1 does not exist, or is NULL, the value of $name is "sourav".
  echo "<br>"; 

  echo date("c") //it will print local date time
?>

</body>
</html>