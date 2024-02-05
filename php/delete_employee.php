<?php
require_once 'connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nEmployee = $_POST['nEmployee'];

    try {
        //الاتصال بقاعدة البيانات لجلب البيانات 
        $conn = new mysqli($servername, $username, $password, $dbname);
        // امر الحذف بالرقم الوطني
        $sql = "DELETE FROM employee WHERE employeeNational = '$nEmployee'";
        if ($conn->query($sql) === TRUE) {
            echo "delete sucsessful";
        } else {
            throw new Exception("Error: " . $conn->error);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}