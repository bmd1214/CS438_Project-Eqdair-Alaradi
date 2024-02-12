<?php

namespace MyNamespace;

require_once 'Connect_db.php';

use DataBaseConnection;

class Car {
    private $carType;
    private $makeYear;
    private $carPrice;

    public function __construct($carType, $makeYear, $carPrice) {
        $this->carType = $carType;
        $this->makeYear = $makeYear;
        $this->carPrice = $carPrice;
    }

    // Getter methods
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

    // Getter methods
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
    private $supplier; // Composition with Supplier class
    private $car; // Composition with Car class
    private $picturesString;

    public function __construct(Supplier $supplier, Car $car, $picturesString) {
        $this->supplier = $supplier;
        $this->car = $car;
        $this->picturesString = $picturesString;
    }

    // Show the data after insertion if needed
    public function display() {
        print "Name: " . $this->supplier->getSupplierName() . '<br>';
        print "Supplier Phone Number: " . $this->supplier->getSupplierPhone() . '<br>';
        print "E-Mail: " . $this->supplier->getSupplierEmail() . '<br>';
        print "Car type: " . $this->car->getCarType() . '<br>';
        print "Make Year: " . $this->car->getMakeYear() . '<br>';
        print "Car Price: " . $this->car->getCarPrice();
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

        // Insert data into the supplier_offer table
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

        // Check if the query is executed successfully or not
        if ($query) {
            echo "The query has been executed successfully." . '<br>';
        } else {
            echo "The query didn't execute for some reason.";
        }
    }
}

?>
