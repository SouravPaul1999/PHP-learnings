<!DOCTYPE html>
<html>
<body>

<?php
// final class Car { //final - keyword can be used to prevent class inheritance or to prevent method overriding.
  class Car{
  const GENARATION = "Parent Genaration";
  public $color;
  public $model;
  protected $mileage; 
  private $reg_date= 2025;
  //protected - the property or method can be accessed within the class and by classes derived from that class.
  // private - the property or method can ONLY be accessed within the class.
  public function __construct($color, $model,$mileage,$Reg_date='2022') {
    $this->color = $color;
    $this->model = $model;
    $this->c_mileage = $mileage;
    $this->registration = $Reg_date;
  }
  final public function message() {
    return "My car is a " . $this->color . " " . $this->model . "!";
  }

  public function message2() {
    return $this->model . " is my first car which color is " . $this->color;
  }

  public function car_mileage($fast="normal speed"){
  // protected function car_mileage($fast="normal speed"){

    return "The mileage of " . $this->model . " is " . $this->c_mileage ." Km/l." ."this is ". $fast ." veichle";
  }
  // echo $reg_date ;

  public function __destruct()
  {
    // echo "it used to perform some task before deleting the class obj & deallocating the memory.";
  }
}

class Bike extends Car{
  public function maintainance($m_cost='normal'){
    echo "<br> {$this->model } maintanance cost is {$m_cost}";
    // echo $this->car_mileage(); //using this method we can print/fetch a protected variable or method from parent class
  }
  public function message2() { //overriding parent class method, we can also override constructor of parent class.
    return '<br>' . $this->model . " is my first MotorBike which color is " . $this->color; 
  }
  public static function staticMethod() { //Static methods can be called directly - without creating an instance of the class first.
    echo "<br> Hello World!";
  }
}

$myCar = new Car("white", "Skoda" , 40);
echo $myCar -> message();
echo "<br>";
$myCar = new Car("red", "Toyota" , 70);
echo $myCar -> message();
echo"<br>";
$fstcar = new Car("purple","xuv 700" , 180);
print $fstcar -> message2();
echo $fstcar -> car_mileage("high speed ");


$bike = new Bike('black','Pulsar 220','45');
$bike -> maintainance(); //if car_mileage() is protected function then maintainance function can print/fetch data of protected method
echo $bike-> message2() . "<br>";
echo $bike -> car_mileage() . "<br>";
echo $bike::GENARATION . "<br>";  //we can print constant using scope resolution operator (::)
Bike::staticMethod();
// echo "<br>". $bike ->c_mileage;
// echo $bike -> registration;
?>

</body>
</html>
