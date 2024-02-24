<?php
require_once 'connect.php';

class DatabaseManager
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getUser($nUser)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE userNumber = ?");
            $stmt->bind_param("i", $nUser);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

if (isset($_POST['nUser'])) {
    $nUser = $_POST['nUser'];
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            throw new Exception("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
        }

        $dbManager = new DatabaseManager($conn);
        $user = $dbManager->getUser($nUser);

       if ($user) {
            echo "User found: " . $user['userName'] . ", " . $user['nUser'] . ", " . $user['password'];
        } else {
            echo "Invalid user number.";
        }

        $conn->close();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>جدول البيانات</title>
    <style>
    table {
        float: center;
        border-collapse: collapse;
        width: 70%;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }

    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

    td {
        background-color: burlywood;
    }
    </style>
</head>

<body>
    <?php
        // التحقق من وجود نتائج
        if ($result -> $pdo->query($sql)) {
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>الرقم الوطني للموظف</th>";
            echo "<th>رقم المستخدم</th>";
            echo "<th>اسم المستخدم</th>";
            echo "<th>كلمة المرور</th>";
            echo "<th>الاذن</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["employeeNational"] . "</td>";
                echo "<td>" . $row["userNumber"] . "</td>";
                echo "<td>" . $row["userName"] . "</td>";
                echo "<td>" . $row["vPassword"] . "</td>";
                echo "<td>" . $row["premission"] . "</td>";
                echo "</tr>";
                
            }
            
            echo "</tbody>";
            echo "</table>";
            echo "<br>";
        } else {
            echo '<script>alert("لا توجد نتائج للموظف المعين")</script>';
            exit;
            
        }
        // إغلاق اتصال قاعدة البيانات
        $conn->close();
   
    ?>