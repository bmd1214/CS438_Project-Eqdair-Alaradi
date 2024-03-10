<?php

require_once 'VehicleFactoryInterface.php';
require_once 'Sedan.php';
require_once 'Validation.php';

class SedanFactory implements VehicleFactoryInterface {
    public static function createVehicle($type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity) {
        try {
            // Validate the inputs
            Validation::validateData($type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
            // create an object from the vehicle type then return it
            return new Sedan($type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
}

?>