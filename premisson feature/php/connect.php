<?php

// معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username ="root";
$password = "";
$dbname = "car_import_company";

try {
    // إنشاء اتصال بقاعدة البيانات
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
    
    
    // تعيين خيارات الاتصال
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    echo "فشل الاتصال بقاعدة البيانات: " . $e->getMessage();
}
