<?php

// this is the main program where objects have been created,

require_once 'SupplierOffer.php';
require_once 'Validation.php';

// check if the submit button been pressed

if(isset($_POST['submit'])){

    // sign the inserted data into variables
    $supplierName = $_POST['name'];
    $supplierCompany = $_POST['company'];
    $supplierPhone = $_POST['phone'];
    $supplierEmail = $_POST['email'];
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
   // this directory will contain the images that been uploaded throw the server
    $uploadDirectory = "C:/xampp/htdocs/uploads/";

    // check if the directory exists, and create it if not
    if (!is_dir($uploadDirectory)) {
       mkdir($uploadDirectory, 0755, true);
    }

    // process file upload
    $uploadedFiles = [];
    if (isset($_FILES['pictures'])) {
        foreach ($_FILES['pictures']['tmp_name'] as $key => $tmpName) {
            $fileName = $_FILES['pictures']['name'][$key];
            $filePath = $uploadDirectory . $fileName;
            move_uploaded_file($tmpName, $filePath);
            $uploadedFiles[] = $filePath;
        }
    }

// create an instence of supplier
$supplier = new Supplier($supplierName, $supplierCompany, $supplierPhone, $supplierEmail);
// create an instence of car
$car = new Car($carType, $makeYear, $carPrice);
    
$picturesString = implode(",", $uploadedFiles);

try{
    $supplierOffer = new SupplierOffer($supplier,$car, $picturesString);
    $supplierOffer->sendOffer();
}catch(Exception $e){
    echo $e->getMessage();
    exit;
}

echo "Thank You For Contacting With Us";
//$supplierOffer->display();

?>