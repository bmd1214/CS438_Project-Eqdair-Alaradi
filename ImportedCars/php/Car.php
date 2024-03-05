<?php

class Car {
    private $carType;
    private $makeYear;
    private $carPrice;
    private $fuelType;
    private $mileage;
    private $vin;
    private $color;
    private $transmissionType;
    private $quantity;

    public function __construct($carType, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity) {
        $this->carType = $carType;
        $this->makeYear = $makeYear;
        $this->carPrice = $carPrice;
        $this->fuelType = $fuelType;
        $this->mileage = $mileage;
        $this->vin = $vin;
        $this->color = $color;
        $this->transmissionType = $transmissionType;
        $this->quantity = $quantity;
    }

    // getter methods
    public function getCarType() {
        return $this->carType;
    }

    public function getMakeYear() {
        return $this->makeYear;
    }

    public function getCarPrice() {
        return $this->carPrice;
    }

    public function getFuelType() {
        return $this->fuelType;
    }

    public function getMileage() {
        return $this->mileage;
    }

    public function getVin() {
        return $this->vin;
    }

    public function getColor() {
        return $this->color;
    }

    public function getTransmissionType() {
        return $this->transmissionType;
    }

    public function getQuantity() {
        return $this->quantity;
    }
}


?>