<?php

class database{
  private $servername = "172.31.22.43";
  private $username   = "Arisht200520339";
  private $password   = "VO7sja45ck";
  private $database   = "Arisht200520339";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  // Insert customer data into customer table
  public function insertData($post)
  {
    $name = $this->con->real_escape_string($_POST['name']);
    $email = $this->con->real_escape_string($_POST['email']);
    $phone = $this->con->real_escape_string($_POST['phone']);
    $profession = $this->con->real_escape_string($_POST['profession']);
    $pronoun = $this->con->real_escape_string($_POST['pronoun']);
    $about = $this->con->real_escape_string($_POST['about']);
    $query="INSERT INTO customers(name,email,phone,profession,pronoun,about) VALUES('$name','$email','$phone','$profession','$pronoun','$about')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }

  // Fetch customer records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM customers";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "No records found !";
    }
  }

  // Fetch single data for edit from customer table
  public function displyaRecordById($id)
  {
    $query = "SELECT * FROM customers WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

  // Update customer data into customer table
  public function updateRecord($postData)
  {
    $name = $this->con->real_escape_string($_POST['uname']);
    $email = $this->con->real_escape_string($_POST['uemail']);
    $phone = $this->con->real_escape_string($_POST['uphone']);
    $profession = $this->con->real_escape_string($_POST['uprofession']);
    $pronoun = $this->con->real_escape_string($_POST['upronoun']);
    $about = $this->con->real_escape_string($_POST['uabout']);
    $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE customers SET name = '$name', email = '$email', phone = '$phone', profession = '$profession', pronoun = '$pronoun', about = '$about' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Update failed, try again!";
      }
    }

  }

  // Delete customer data from customer table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM customers WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Error deleting ! try again.";
    }
  }
}
