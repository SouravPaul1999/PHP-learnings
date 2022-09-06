<?php
class employee
{
  private $servername="localhost";
  private $username = "root";
  private  $password = "Souravpaul505@";
  private $db = "Employee";
  /** @var \PDO $conn */
  private $conn;

  public function __construct()
  {
    
    try {
      $this->conn = new \PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully<br>";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }

        public function insertData_code($post)
        {
            $emp_code = $this->conn->quote($_POST['ecode']);
            $emp_code_name = $this->conn->quote($_POST['ecode_name']);
            $emp_domain = $this->conn->quote($_POST['edomain']);
            $query="INSERT INTO employee_code_table(employee_code,employee_code_name,employee_domain) VALUES($emp_code,$emp_code_name,$emp_domain)";
            $sql = $this->conn->exec($query);
            if ($sql!=false) {
              echo"you insert the data into employee_code_table on {$this->db} successfully.";
              // header("Location:indexd.php?msg1=insert");
              header("Refresh: 4; URL = show_CodeTable.php");
            }else{
                echo "Registration failed try again!";
            }
        }

        public function insertData_salary($post)
        {
            $emp_id = $this->conn->quote($_POST['emp_id']);
            $emp_salary = $this->conn->quote($_POST['emp_salary']);
            $emp_code = $this->conn->quote($_POST['emp_code']);
            $query="INSERT INTO employee_salary_table(employee_id,employee_salary,employee_code) VALUES($emp_id,$emp_salary,$emp_code)";
            $sql = $this->conn->exec($query);
            if ($sql!=false) {
              echo"you insert the data into employee_salary_table on {$this->db} database successfully. & you will show the table in few seconds";
              // header("Location:index_salary.php?msg1=insert");
              header("Refresh: 4; URL = show_SalaryTable.php");

            }else{
                echo "Registration failed try again!";
            }
        }

        public function insertData_details($post)
        {
            $emp_id = $this->conn->quote($_POST['emp_id']);
            $emp_fname = $this->conn->quote($_POST['emp_fname']);
            $emp_lname = $this->conn->quote($_POST['emp_lname']);
            $emp_gp = $this->conn->quote($_POST['emp_gp']);
            $query="INSERT INTO employee_details_table(employee_id,employee_first_name,employee_last_name,Graduation_percentile) VALUES($emp_id,$emp_fname,$emp_lname,$emp_gp)";
            $sql = $this->conn->exec($query);
            if ($sql!=false) {
              echo"you insert the data into employee_salary_table on {$this->db} database successfully.";
              // header("Location:index_details.php?msg1=insert");
              header('Location:show_DetailsTable.php');
            }else{
                echo "Registration failed try again!";
            }
        }
}
