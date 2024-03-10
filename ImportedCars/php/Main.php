<?php


require_once 'Sedan.php';
require_once 'SedanFactory.php';
require_once 'ManageCar.php';
require_once 'Validation.php';


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // check if the submit button been pressed
    if(isset($_POST['submit'])){

        // sign the inserted data into variables
        $factoryName = 'Sedan' ; // 'Sedan' since this is the only type that the company imports
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
        // adding the word 'Factory' to specify which class will be called
        $factoryName .= 'Factory';

        if(!class_exists($factoryName)){
            throw new Exception("The Vehicle type does not Exist!");
        }
        
        // 
        $sedan = $factoryName::createVehicle($type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
        
        new ManageCar($sedan);

    }catch(Exception $e){

        echo $e->getMessage();
        exit;  // here will exit the program if the user entered data that are not allowed.
    }

    // stay in the same page after succeful submission
    header("refresh:2;url=../html/importedCars.html");
}
 
?>