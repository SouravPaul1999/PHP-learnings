<?php
class user
{
  private $servername = "localhost";
  private $username = "root";
  private  $password = "Souravpaul505@";
  private $db = "resume_builder";
  /** @var \PDO $conn */
  private $conn;

  public function __construct()
  {

    try {
      $this->conn = new \PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully<br>";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

  public function insertData_user($post)
  {
    if ($_POST['pw']==$_POST['cpw']) {
      # code...
      $hash=password_hash($_POST['pw'],PASSWORD_DEFAULT);
      $uname = $this->conn->quote($_POST['uname']);
      $password = $this->conn->quote($hash);
      $email = $this->conn->quote($_POST['email']);
      $cpassword = $this->conn->quote($hash);
      $query = "INSERT INTO user(username,email,password,cpassword) VALUES($uname,$email,$password,$cpassword)";
      $sql = $this->conn->exec($query);
      if ($sql != false) {
        echo "<h1><center>you have successfully registered. you will be redirect to login page shortly</center><h1>";
        header("Refresh: 4; URL = ../view/loginpage.php");
      } 
    }
    else {
      echo "<h2><center>Registration failed try again!<center><h2>";
      header("Refresh: 3; URL = ../view/signup.php");
    }
  }

  public function insertData_fetch($post)
  {
    try {
      if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
          $message = '<label>All fields are required</label>';
          echo $message;
        } else {
          
          $query = "SELECT * FROM user WHERE username = :username ";
          $statement = $this->conn->prepare($query);
          $statement->execute(
            array(
              'username'     =>     $_POST["username"]
              
              )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
              while ($row= $statement->fetch(PDO::FETCH_ASSOC)) {
                
                if(password_verify($_POST['password'],$row['password'])){

          
                  session_start();
                  $_SESSION["username"] = $_POST["username"];
                  header("location:../view/landingpage.php");
                }
                else{
                  $error_message= "<center><h2> wrong Password </h2></center>" ;
                  echo $error_message;
                  header("Refresh: 3; URL = ../view/loginpage.php");
                }
            }
          
          } else {
            $message = '<label><h2><center>Wrong Username</center></h2></label>';
            echo $message;
            header("Refresh: 3; URL = ../view/loginpage.php");
          }
        }
      }
    } catch (PDOException $error) {
      $exception_message = $error->getMessage();
      echo $exception_message;
    }
  }
}

?>