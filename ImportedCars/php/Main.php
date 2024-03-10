<?php

// this is the main program where objects have been created,

require_once 'Sedan.php';
require_once 'SedanFactory.php';
require_once 'ManageCar.php';
require_once 'Validation.php';

// check if the submit button been pressed

if(isset($_POST['submit'])){

    // sign the inserted data into variables
    $factoryName = 'Sedan' . 'Factory';
    $type = $_POST['type'];
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


try{
    if(!class_exists($factoryName)){
        throw new Exception("The Vehicle type does not Exist!");
    }
    

    $factory = new $factoryName();
    $sedan = $factory::createVehicle($type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
    
    new ManageCar($sedan);

}catch(Exception $e){

    echo $e->getMessage();
    exit;  // here will exit the program if the user entered data that are not allowed.
}

// stay in the same page after succeful submission
header("refresh:2;url=../html/importedCars.html");
 
?>