<?php
require_once 'Connect.php';
include_once 'Employee class.php';
require_once 'Validation.php';
//جلب البيانات من forms
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nEmployee = $_POST['nEmployee'];
    $nameEmployee = $_POST['nameEmployee'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $state = $_POST['state'];
    $user = $_POST['user'];
    //تكوين object class

    $Employee = new Employee($nEmployee, $nameEmployee, $phone, $email, $nationality, $state,$user);
     //اضافة في حقول قواعد البيانات 
    try {
        $data = array(
            'employeeNational' => $nEmployee,
            'nameEmployee' => $nameEmployee,
            'phone' => $phone,
            'email' => $email,
            'stat' => $state,
            'nationality' => $nationality,
            'users' => $user
        );
        //اتصال بقاعدة البيانات لاضافة البيانات 
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO employee (employeeNational, nameEmployee, phone, email, stat, nationality, users) VALUES ";
        $values = array();
        foreach ($data as $key => $value) {
            $values[] = "'" . $value . "'";
        }
        $sql .= "(" . implode(", ", $values) . ")";

        if ($conn->query($sql) === TRUE) {
            echo "Insert successful";
        } else {
            throw new Exception("Error: " . $conn->error);
        }

        $conn->close();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}