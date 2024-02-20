<?php

require_once 'Connect_db.php';

class Car {
    private $carType;
    private $makeYear;
    private $carPrice;

    public function __construct($carType, $makeYear, $carPrice) {
        $this->carType = $carType;
        $this->makeYear = $makeYear;
        $this->carPrice = $carPrice;
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
}

class Supplier {
    private $supplierName;
    private $supplierCompany;
    private $supplierPhone;
    private $supplierEmail;

    public function __construct($supplierName, $supplierCompany, $supplierPhone, $supplierEmail) {
        $this->supplierName = $supplierName;
        $this->supplierCompany = $supplierCompany;
        $this->supplierPhone = $supplierPhone;
        $this->supplierEmail = $supplierEmail;
    }

    // getter methods
    public function getSupplierName() {
        return $this->supplierName;
    }

    public function getSupplierCompany() {
        return $this->supplierCompany;
    }

    public function getSupplierPhone() {
        return $this->supplierPhone;
    }

    public function getSupplierEmail() {
        return $this->supplierEmail;
    }
}

class SupplierOffer {
    private $supplier; // composition with Supplier class
    private $car; // composition with Car class
    private $picturesString;

    public function __construct(Supplier $supplier, Car $car, $picturesString) {
        $this->supplier = $supplier;
        $this->car = $car;
        $this->picturesString = $picturesString;
    }

    // show the data after insertion if needed
    public function display() {
        print "Name: " . $this->supplier->getSupplierName() . '<br>';
        print "Supplier Phone Number: " . $this->supplier->getSupplierPhone() . '<br>';
        print "E-Mail: " . $this->supplier->getSupplierEmail() . '<br>';
        print "Car type: " . $this->car->getCarType() . '<br>';
        print "Make Year: " . $this->car->getMakeYear() . '<br>';
        print "Car Price: " . $this->car->getCarPrice();
    }
    // function to check if the data already exists or not
    public function isOfferUnique($conn,$supplierName, $supplierCompany, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice) {

        $query = mysqli_query($conn, "SELECT * FROM supplier_offer WHERE
            supplier_name = '$supplierName' AND
            supplier_company = '$supplierCompany' AND
            supplier_phone = '$supplierPhone' AND
            supplier_email = '$supplierEmail' AND
            car_type = '$carType' AND
            make_year = '$makeYear' AND
            car_price = '$carPrice' ");

        return mysqli_num_rows($query) === 0; // return true if the data is unique, false otherwise
    }

    public function sendOffer() {

        $supplierName = $this->supplier->getSupplierName();
        $supplierCompany = $this->supplier->getSupplierCompany();
        $supplierPhone = $this->supplier->getSupplierPhone();
        $supplierEmail = $this->supplier->getSupplierEmail();

        $carType = $this->car->getCarType();
        $carPrice = $this->car->getCarPrice();
        $makeYear = $this->car->getMakeYear();

        $conn = new DataBaseConnection;

        if (!$this->isOfferUnique($conn->getConnection(),$supplierName, $supplierCompany, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice)) {
            throw new Exception("The offer already exists in the database");
            // exit the function if data already exists
        }

        // insert data into the supplier_offer table
        $query = mysqli_query($conn->getConnection(), "INSERT INTO supplier_offer (
            supplier_name,
            supplier_company,
            supplier_phone,
            supplier_email,
            car_type,
            make_year,
            car_price,
            pictures_string
        ) VALUES (
            '$supplierName',
            '$supplierCompany',
            '$supplierPhone',
            '$supplierEmail',
            '$carType',
            '$makeYear',
            '$carPrice',
            '$this->picturesString'
        )");

        // check if the query is executed successfully or not
        if ($query) {
            echo "the query has been executed successfully." . '<br>';
        } else {
            echo "The query didn't execute for some reason.";
        }
    }

}
?>


