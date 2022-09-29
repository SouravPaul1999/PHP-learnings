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
        echo "you have successfully registered. you will be redirect to login page shortly";
        header("Refresh: 4; URL = ../view/loginpage.php");
      } 
    }
    else {
      echo "Registration failed try again!";
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
                  echo "bye";
                }
            }
          
          } else {
            $message = '<label>Wrong Data</label>';
            echo $message;
          }
        }
      }
    } catch (PDOException $error) {
      $message = $error->getMessage();
      echo $message;
    }
  }
}

?>