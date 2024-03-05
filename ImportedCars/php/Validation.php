<?php

require_once 'Car.php';

class Validation {

    public static function validateData(Car $car) {
        $carType = $car->getCarType();
        $makeYear = $car->getMakeYear();
        $carPrice = $car->getCarPrice();
        $fuelType = $car->getFuelType();
        $mileage = $car->getMileage();
        $vin = $car->getVin();
        $color = $car->getColor();
        $transmissionType = $car->getTransmissionType();
        $quantity = $car->getQuantity();

        // Validation logic for the Car properties

        // validate if the carType is not empty
        if (empty($carType)) {
            throw new Exception("The carType field is empty!");
        }

        // validate if the makeYear is a valid 4-digit year
        if (!is_numeric($makeYear) || strlen($makeYear) !== 4) {
            throw new Exception("Invalid makeYear!");
        }

        // validate if carPrice is a positive number
        if (!is_numeric($carPrice) || $carPrice <= 0) {
            throw new Exception("Invalid carPrice!");
        }

        // validate if fuelType is not empty
        if (empty($fuelType)) {
            throw new Exception("The fuelType field is empty!");
        }

        // validate if mileage is a non-negative number
        if (!is_numeric($mileage) || $mileage < 0) {
            throw new Exception("Invalid mileage!");
        }

        // validate if VIN is not empty and has a valid format 
        if (empty($vin) || !preg_match('/^[A-HJ-NPR-Z0-9]{17}$/i', $vin)) {
            throw new Exception("Invalid VIN!");
        }

        // validate if color is not empty
        if (empty($color)) {
            throw new Exception("The color field is empty!");
        }

        // validate if transmissionType is not empty
        if (empty($transmissionType)) {
            throw new Exception("The transmissionType field is empty!");
        }

        // validate if quantity is a positive integer
        if (!is_int($quantity) || $quantity <= 0) {
            throw new Exception("Invalid quantity!");
        }

        return true;
    }
}

?>
