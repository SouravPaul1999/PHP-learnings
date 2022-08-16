<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
</head>
<body>
  
  <?php
  // A variable declared outside a function has a GLOBAL SCOPE and can only be accessed outside a function.
  $a=5;
  $b=10;
  $fname="sourav";
  $lname=" paul";

  // this function will print the value of variable
  var_dump($a,$b);

  echo " <br> sum of a + b is" .$a+$b;

  echo " <br> Hello world! $fname";

  echo "<br> hello ". $fname . $lname . " !"; //we use "." for concatination between two variables, specially for str

  function local_global(){
    // A variable declared within a function has a LOCAL SCOPE and can only be accessed within that function: ***You can have local variables with the same name in different functions, because local variables are only recognized by the function in which they are declared.
    $c=10;
    $d=15;
    

    echo "<br> sum of local varibles of this function is ". $c+$d;

    global $a,$b; //The global keyword is used to access a global variable from within a function. without this keyword we can't perform bottom line.

    echo "<br> sum of global variables inside the function" . $a+$b ;
  }

  local_global();
  
  $x = 5;
  $y = 10;

  function myTest() {
    // PHP also stores all global variables in an array called $GLOBALS[index]. The index holds the name of the variable. This array is also accessible from within functions and can be used to update global variables directly.

    // this function will update the value of global variable y

    $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
  } 

  myTest();
  echo "<br>". $y; 

  function static_v(){

    // *Normally, when a function is completed/executed, all of its variables are deleted. However, sometimes we want a local variable NOT to be deleted. We need it for a further job.Then, each time the function is called, that variable will still have the information it contained from the last time the function was called.          ***The variable is still local to the function.

    $k=3;
    static $k=3;
    $k++;
    echo "<br>".$k;
  }
  static_v();
  static_v();

  ?>

  

</body>
</html>