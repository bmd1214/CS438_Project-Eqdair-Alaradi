<?php
class User {
    
    private $username;    
    private $password;     // declare user
    public $conn;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    public static function getInstance($username, $password) {
        return new self($username, $password);                            
    }
    public function login() {
        try{
       
        require_once 'connects.php';
        $conn = new \mysqli($servername, $username, $password, $dbname);
     
    
        // التحقق من وجود أخطاء في الاتصال
        if ($conn->connect_error) {
            throw new \Exception("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
        }

        // استعلام قاعدة البيانات للتحقق من المستخدم بناءً على بيانات الاعتماد المطابقة
        $query = "SELECT userName, password1,isadmin FROM user WHERE userName = '$this->username' AND password1 = '$this->password'";
        $result = $conn->query($query);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['isadmin'] == 1) {
                // دخول الى اختصاص المدير في النظام
                echo 'تم تسجيل الدخول بنجاح كمسؤول';
                header('Location:http://localhost/Graduate2/%D9%82%D8%A7%D8%A6%D9%85%D8%A9%20%D8%A7%D9%84%D9%85%D8%AF%D9%8A%D8%B1%20%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9/main%20admin%20selections.html');
                
            } else {
                  // دخول الى اختصاص الموظف في النظام
                echo 'تم تسجيل الدخول بنجاح كمستخدم عادي';
                header('Location:http://localhost/Graduate2/%D9%82%D8%A7%D8%A6%D9%85%D8%A9%20%D8%A7%D9%84%D9%85%D9%88%D8%B8%D9%81%20%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9/main%20user%20selections.html');
            }
        } else {
            echo 'اسم المستخدم أو كلمة المرور غير صحيحة';
            throw new Exception("خطأ في تسجيل الدخول");
        }
    } catch (Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
}
}
