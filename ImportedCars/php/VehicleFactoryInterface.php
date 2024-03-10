<?php

// carFactoryInterface
interface VehicleFactoryInterface {
    public static function createVehicle($type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity);
}

?>
