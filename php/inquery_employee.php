<?php
   require_once 'connect.php';
   $employeeId = $_POST['nEmployee'];
   try {
    //اتصال بقاعدة البيانات
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // التحقق من وجود أخطاء في الاتصال
    if ($conn->connect_error) {
        throw new Exception("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
    }

    
    $sql = "SELECT nameEmployee,stat FROM employee WHERE employeeNational = $employeeId";
    $result = $conn->query($sql);
    
    // التحقق من وجود نتائج
    if ($result->num_rows > 0) {
        // عرض بيانات الموظف
        $row = $result->fetch_assoc();
            // قم بعرض بيانات الموظف هنا
        echo "اسم الموظف: " . $row["nameEmployee"]." ";
        echo "<br>";
        echo "<br> حالة الموظف :" . $row["stat"];
        } else {
            echo "لا توجد نتائج للموظف المعين";
        }
    
    // إغلاق اتصال قاعدة البيانات
    $conn->close();
} catch (Exception $e) {
    echo "حدث خطأ: " . $e->getMessage();
}