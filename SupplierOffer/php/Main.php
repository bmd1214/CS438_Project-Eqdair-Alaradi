<?php


// this is the main program where objects have been created,
// and where queries excuted.
// and the connection with the dataBase is created

require_once 'Connect_db.php';
require_once 'SupplierOffer.php';
require_once 'Validation.php';

// check if the submit button been pressed

if(isset($_POST['submit'])){

    // sign the inserted data into variables
    $supplierName = $_POST['name'];
    $supplierCompany = $_POST['company'];
    $supplierEmail = $_POST['phone'];
    $supplierPhone = $_POST['email'];
    $carType = $_POST['carType'];
    $makeYear = $_POST['year'];
    $carPrice = $_POST['price'];
    $pictures = $_FILES['pictures'];
}
else{
    echo "There is somthing wrong with the submission.";
    exit;
}

// Validate the inputs using a static function in class Validation

try{

    Validation::validateData($supplierName,$supplierCompany, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice, $pictures);

}catch(Exception $e){

    echo $e->getMessage();
    exit;  // here will exit the program if the user entered data that are not allowed.
}
    $uploadDirectory = "uploads/";

    // Check if the directory exists, and create it if not
    if (!is_dir($uploadDirectory)) {
       mkdir($uploadDirectory, 0755, true);
    }

    // Process file upload
    $uploadedFiles = [];
    if (isset($_FILES['pictures'])) {
        foreach ($_FILES['pictures']['tmp_name'] as $key => $tmpName) {
            $fileName = $_FILES['pictures']['name'][$key];
            $filePath = $uploadDirectory . $fileName;
            move_uploaded_file($tmpName, $filePath);
            $uploadedFiles[] = $filePath;
        }
    }
    


$conn = new DataBaseConnection();

$supplierOffer = new MyNamespace\SupplierOffer($supplierName, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice);

    // insert data in table named supplier

    $picturesString = implode(",", $uploadedFiles);

    $query = mysqli_query($conn->getConnection(), "INSERT INTO supplier_offers (name, company, phone, email, car_type, year, price, pictures) 
    VALUES ('$name', '$company', '$phone', '$email', '$carType', '$year', '$price', '$picturesString')");

    // here i check if the queries is excuted succussfully Or not.
    if($query){
        echo "Tha Queries has been Excuted Successfully." . '<br>';
    } else{
        echo "The Queries Didn't Excute for some reason";
    }

//$supplierOffer->display();

?>