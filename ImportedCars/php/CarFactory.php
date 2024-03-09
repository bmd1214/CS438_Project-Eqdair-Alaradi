<?php

require_once 'Validation.php';
require_once 'Car.php';

class CarFactory {
    public static function createCar($carType, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity) {
        
        try{

        Validation::validateData($carType, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
        $car = new Car($carType, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);

        }catch(Exception $e){
            echo $e->getMessage();
            exit();
        }

        return $car;
    }
}

?>