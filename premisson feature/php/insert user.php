<?php
require_once 'connect.php';
require_once 'validation.php';
require_once 'premission class.php';
require_once 'test.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nEmployee = $_POST['nEmployee'];
  $nUser = $_POST['nUser'];
  $userName = $_POST['userName'];
  $password = $_POST['password'];
  $vPassword = $_POST['vPassword'];
  $premission = $_POST['premission'];
 
  $premission = new premission($nEmployee,$nUser,  $userName, $password, $vPassword,$premission);
  
  try{
    validation::validateData($nUser,  $userName, $password, $vPassword);
}
catch(Exception $e){
    echo '<script>alert("'.$e->getMessage().'")</script>';
    
    exit();
}
  try {
    $data = array(
      'employeeNational' => $nEmployee,
      'userNumber' => $nUser,
      'userName' => $userName,
      'password' => $password,
      'vPassword' => $vPassword,
      'premission'=>$premission
    );
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      

    }
    // تحقق من وجود رقم الموظف في جدول الموظفين
    $employeeNumber = $_POST['nEmployee'];
    $checkQuery = "SELECT employeeNational FROM employee WHERE employeeNational = '$employeeNumber'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
      $sql = "INSERT INTO user (employeeNational, userNumber, userName, password1, vPassword,premission) VALUES ";
      $values = array();
      foreach ($data as $key => $value) {
        $values[] = "'" . $value . "'";
      }
      $sql .= "(" . implode(", ", $values) . ")";
      if ($conn->query($sql) === TRUE) {
        echo '<script>alert("تم الاضافة بنجاح")</script>';
       
      } else {
        throw new Exception("Error: " . $conn->error);
      }
    } else {
      echo '<script>alert("لايوجد موظف بهذا الرقم")</script>';
      
    }
    $conn->close(); 
  } catch (Exception $e) {
    echo '<script>alert("' . $e->getMessage() . '")</script>';
   
  }
$test->testAddition();
}