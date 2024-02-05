<?php
try {
    require_once 'connect.php';
    require_once 'Validation.php';
    $id = $_POST['nEmployee'];
    // اتصال بقاعدة البيانات
    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
    }
    // التحقق من البيانات المجلوبة 
    if (isset($_POST['nEmployee'])&& ($_POST['nameEmployee']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['state']) && isset($_POST['nationality']) && isset($_POST['user'])) {
        $nameEmployee = $_POST['nameEmployee'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $state = $_POST['state'];
        $nationality = $_POST['nationality'];
        $user = $_POST['user'];
        
        //امر التعديل 

        $sql = "UPDATE employee SET nameEmployee = '$nameEmployee', phone = '$phone', email = '$email', stat = '$state', nationality = '$nationality', users = '$user' WHERE employeeNational = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "تم تحديث بيانات الموظف بنجاح!";
            header("../الوظائف الفرعية للمستخدم/اجراءات موظفين/modified an employee.html");
        } else {
            throw new Exception("حدث خطأ في تحديث بيانات الموظف");
        }
    }
    mysqli_close($conn);
} catch (Exception $e) {
    echo "حدث خطأ: " . $e->getMessage();
}