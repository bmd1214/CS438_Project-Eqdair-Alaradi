<?php

// this is the main program where objects have been created,

require_once 'Car.php';
require_once 'ManageCar.php';
require_once 'Validation.php';

// check if the submit button been pressed

if(isset($_POST['submit'])){

    // sign the inserted data into variables
    $carType = $_POST['carType'];
    $makeYear = $_POST['year'];
    $fuelType = $_POST['fuelType'];
    $mileage = $_POST['mileage'];
    $vin = $_POST['vin'];
    $carPrice = $_POST['price'];
    $color = $_POST['color'];
    $transmissionType = $_POST['transmissionType'];
    $quantity = $_POST['Quantity'];


}else{
    echo "There is somthing wrong with the submission.";
    exit;
}

// Validate the inputs using a static function in class Validation

try{
    $car = new Car($carType, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
    Validation::validateData($car);
    new ManageCar($car);

}catch(Exception $e){

    echo $e->getMessage();
    exit;  // here will exit the program if the user entered data that are not allowed.
}

header("refresh:2;url=../html/importedCars.html");
 
?>