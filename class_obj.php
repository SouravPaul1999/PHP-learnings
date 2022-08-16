<!DOCTYPE html>
<html>
<body>

<?php
class Car {
  public $color;
  public $model;
  public function __construct($color, $model) {
    $this->color = $color;
    $this->model = $model;
  }
  public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }

  public function message2() {
    return $this->model . " is my first car which color is " . $this->color;
  }
}

$myCar = new Car("white", "Skoda");
echo $myCar -> message();
echo "<br>";
$myCar = new Car("red", "Toyota");
echo $myCar -> message();
echo"<br>";
$fstcar = new Car("purple","xuv 700");
print $fstcar -> message2();
?>

</body>
</html>
