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
                header('Location:http://localhost/Cs438%20project/login%20feature/login/main%20admin%20selections.html');
                
            } else {
                  // دخول الى اختصاص الموظف في النظام
                echo 'تم تسجيل الدخول بنجاح كمستخدم عادي';
                header('Location: http://localhost/Cs438%20project/login%20feature/login/main%20user%20selections.html');
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