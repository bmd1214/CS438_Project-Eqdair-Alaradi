
<?php

require_once 'Connect_db.php';
require_once 'Sedan.php';
require_once 'Validation.php';

class ManageCar{
    private $sedan;

    public function __construct($sedan){
        $this->sedan = $sedan;
        $this->saveCar();
    }


    // function to check if the data already exists or not
    public function isCarExists($conn,$type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity) {

        $query = mysqli_query($conn, "SELECT * FROM imported_cars WHERE
            make_year = '$makeYear' AND
            car_price = '$carPrice' AND
            fuel_type = '$fuelType' AND
            mileage = '$mileage' AND
            vin = '$vin' AND
            color = '$color' AND
            trans_type = '$transmissionType' AND
            quantity = '$quantity' AND
            car_type = '$type'");

        return mysqli_num_rows($query) === 0; // return true if the data is unique, false otherwise
    }

    public function saveCar() {

        $type = $this->sedan->getCarType();
        $carPrice = $this->sedan->getCarPrice();
        $color = $this->sedan->getColor();
        $fuelType = $this->sedan->getFuelType();

        $makeYear = $this->sedan->getMakeYear();
        $mileage = $this->sedan->getMileage();
        $quantity = $this->sedan->getQuantity();
        $transmissionType = $this->sedan->getTransmissionType();
        $vin = $this->sedan->getVin();

        $conn = new DataBaseConnection;

        if (!$this->isCarExists($conn->getConnection(),$type, $makeYear, $carPrice, $fuelType, $mileage, $vin, $color, $transmissionType, $quantity)) {
            throw new Exception("The offer already exists in the database");
            // exit the function if data already exists
        }
        // insert data into the supplier_offer table
        $query = mysqli_query($conn->getConnection(), "INSERT INTO imported_cars (
            make_year,
            car_price,
            fuel_type,
            mileage,
            vin,
            color,
            trans_type,
            quantity,
            car_type	

        ) VALUES (
            '$makeYear',
            '$carPrice',
            '$fuelType',
            '$mileage',
            '$vin',
            '$color',
            '$transmissionType',
            '$quantity',
            '$type'
        )");
        // check if the query is executed successfully or not
        if (!$query) {
            throw new Exception("the query has not been executed successfully");
        } 
    }

}
?>


