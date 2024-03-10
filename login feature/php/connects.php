<?php

class DatabaseConnection {
    private static $instance = null;
    private $conn;

    private function __construct($servername, $username, $password, $dbname) {
        try {
            $this->conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "فشل الاتصال بقاعدة البيانات: " . $e->getMessage();
        }
    }

    public static function getInstance($servername, $username, $password, $dbname) {
        if (self::$instance == null) {
            self::$instance = new self($servername, $username, $password, $dbname);
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

$servername = "localhost";
$username = "roota";
$password = "12345678";
$dbname = "car_import_company";

$connection = DatabaseConnection::getInstance($servername, $username, $password, $dbname);
$conn = $connection->getConnection();

// استخدم الاتصال بقاعدة البيانات هنا
