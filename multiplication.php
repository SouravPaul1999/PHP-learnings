<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>multipication</title>
</head>
<body>
  <?php

  function multiply(int $num = 1) //If we call the function multiply() without arguments it takes the default value as argument
  {
    for($i=1;$i<11;$i++){
      // if($i==5){
      //   continue;
      // }

      // if($i==5){
      //   break;
      // }
      
      print " $num X $i = " .($i*$num) ."<br>";
      // return " $num X $i = " .($i*$num) ."<br>"; //if you use return statement in loop the code block will execute once.
    }
  }

  function arr(){
    $cars = array("Volvo", "BMW", "Toyota");
    $arrlength = count($cars);

    foreach($cars as $x) {
      echo $x;
      echo "<br>";
    }

    // for($x = 0; $x < $arrlength; $x++) {
    //   echo $cars[$x];
    //   echo "<br>";
    // }

  }
   
  arr();
  echo "<br>";  // multiply();
  multiply(4);
  // print multiply(8);

  ?>
</body>
</html>