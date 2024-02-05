<?php
    require_once 'connect.php'; 
   
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);

     if (!$conn) {
        die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
    }
    // التحقق من الرقم المجلوب منforms
    if (isset($_POST['nEmployee'])) {
        $id = $_POST['nEmployee'];
        $sql = "SELECT employeeNational,nameEmployee,phone,email,nationality,stat,users FROM employee WHERE employeeNational=".$id;
        $data = mysqli_query($conn, $sql);
        if ($data) {
            $query = mysqli_fetch_array($data);
            //عرض بيانات الموظف في forms html
?>
<html lang="ar" dir="rtl">

<head>
    <link rel=" stylesheet" href="../الوظائف الفرعية للمستخدم/اجراءات موظفين/employee.css">
   <link rel="stylesheet" href="../css/bootstrap.css" >
</head>
<body>
<div class="container">
    <h2>تعديل بيانات موظف</h2>
    <form class="form" action="../php/modified2.php" method="POST">
        <div class="right-section">
            <div class="form-group">
                <label for="nEmployee">رقم الموظف</label>
                <input type="number" id="n_em" name="nEmployee" value="<?php echo $query['employee_national']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name_employee">اسم الموظف</label>
                <input type="text" id="name_em" name="nameEmployee" value="<?php echo $query['name_employee']; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input type="number" id="phone" name="phone" value="<?php echo $query['phone']; ?>">
            </div>
            <div class="form-group">
                <label for="email">البريد الالكتروني</label>
                <input type="email" id="email" name="email" value="<?php echo $query['email']; ?>">
            </div>
        </div>
        <div class="left-section">
            <div class="form-group">
                <label for="nationality">جنسية الموظف</label>
                <input type="text" id="nationality" name="nationality" value="<?php echo $query['nationality']; ?>">
            </div>
            <div class="form-group">
                <label for="state">حالة الموظف</label>
                <select name="state" required>
                    <option value="نظامي" <?php if($query['stat'] == "نظامي") echo "selected"; ?>>نظامي</option>
                    <option value="منقطع" <?php if($query['stat'] == "منقطع") echo "selected"; ?>>منقطع</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user">مستخدم للنظام</label>
                <select name="user" aria-placeholder="اختر" required>
                    <option value="نعم" <?php if($query['users'] == "نعم") echo "selected"; ?>>نعم</option>
                    <option value="لا" <?php if($query['users'] == "لا") echo "selected"; ?>>لا</option>
                </select>
            </div>
        </div>
        <button class="btn btn-success" type="submit">تعديل</button>
         <a href="../القائمة الرئيسية للمستخدم/users employee selection.html" class="btn btn-success">الغاءالتعديل</a>
    </form>
    
    </div>
</body>
</html>
<?php
        } else {
            throw new Exception("حدث خطأ في استعلام قاعدة البيانات");
        }
    }
    mysqli_close($conn);


} catch (Exception $e) {
    echo "حدث خطأ: " . $e->getMessage();
}