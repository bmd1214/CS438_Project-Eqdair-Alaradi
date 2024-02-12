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
    $supplierEmail = $_POST['email'];
    $supplierPhone = $_POST['phone'];
    $carType = $_POST['carType'];
    $makeYear = $_POST['year'];
    $carPrice = $_POST['price'];
}
else{
    echo "There is somthing wrong with the submission.";
}

// Validate the inputs using a static function in class Validation

try{

    Validation::validateData($supplierName, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice);

}catch(Exception $e){

    echo $e->getMessage();
    exit;
}

// her will exit the program if the user entered data that are not allowed.

$conn = new DataBaseConnection();

$person = new MyNamespace\SupplierOffer($supplierName, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice);

    // insert data in table named supplier

    $query1 = mysqli_query($conn->getConnection(), "insert into supplier(name, email, phone) values ('$supplierName','$supplierEmail','$supplierPhone') ");
    
    // get the id that the DBMS assigned, to enter it into junction table
    $supplierId = mysqli_insert_id($conn->getConnection());

    $query2 = mysqli_query($conn->getConnection(), "insert into car(name, year, price) values ('$carType','$makeYear','$carPrice') ");
    
    // get the id that the DBMS assigned, to enter it into junction table
    $carId= mysqli_insert_id($conn->getConnection()) ;

    // insert to junction table between cars and order
    $query3 = mysqli_query($conn->getConnection(), "insert into cars_order(car_id, supplier_id) values ('$carId','$supplierId') ");

    // here i check if the queries is excuted succussfully Or not.
    if($query1 && $query2 && $query3){
        echo "Tha Queries has been Excuted Successfully." . '<br>';
    } else{
        echo "The Queries Didn't Excute for some reason";
    }

$person->display();

?>