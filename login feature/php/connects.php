<?php

class DatabaseConnection {
    private static $instance = null;      // declare singelton for connection
    private $conn;

    private function __construct($servername, $username, $password, $dbname) {
        try {
            $this->conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //connect to database
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "فشل الاتصال بقاعدة البيانات: " . $e->getMessage();
        }
    }

    public static function getInstance($servername, $username, $password, $dbname) {
        if (self::$instance == null) {
            self::$instance = new self($servername, $username, $password, $dbname);   // function singelton for connect 
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;   // connect to database
    }
}

$servername = "localhost";
$username = "roota";
$password = "12345678";
$dbname = "car_import_company";

$connection = DatabaseConnection::getInstance($servername, $username, $password, $dbname);
$conn = $connection->getConnection();

// استخدم الاتصال بقاعدة البيانات هنا
