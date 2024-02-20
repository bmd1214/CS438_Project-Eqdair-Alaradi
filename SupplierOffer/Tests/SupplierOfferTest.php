<?php

require 'php\SupplierOffer.php';

use PHPUnit\Framework\TestCase;

class SupplierOfferTest extends TestCase
{
    public function testIsOfferNotUnique()
    {
        // instantiate the SupplierOffer class
        $supplier = new Supplier('Ahmad', 'lexus', '091111221', 'libyabmd@gmail.com');
        $car = new Car('toyota', 2023, 20000);
        $supplierOffer = new SupplierOffer($supplier, $car, 'picture1,picture2');

        // insert the offer into the database to make it non-unique for this test
        $conn = new DataBaseConnection();
        $supplierOffer->sendOffer();

        // call the isOfferUnique method
        $result = $supplierOffer->isOfferUnique($conn->getConnection(), 'Ahmad', 'lexus', '091111221', 'libyabmd@gmail.com', 'toyota', 2023, 20000);

        // assert that the result is false (not unique)
        $this->assertFalse($result);

        // clean up the database after the test
        mysqli_query($conn->getConnection(),"DELETE FROM supplier_offer WHERE 
            supplier_name = 'Ahmad' AND
            supplier_company = 'lexus' AND
            supplier_phone = '091111221' AND
            supplier_email = 'libyabmd@gmail.com' AND
            car_type = 'toyota' AND
            make_year = '2023' AND
            car_price = '20000' ");
            
    }


    public function testIsOfferUnique()
    {
        // instantiate the SupplierOffer class
        $supplier = new Supplier('Ahmad', 'lexus', '091111221', 'libyabmd@gmail.com');
        $car = new Car('toyota', 2023, 20000);
        $supplierOffer = new SupplierOffer($supplier, $car, 'picture1,picture2');

        // dataBase connection
        $conn = new DataBaseConnection();

        // call the isOfferUnique method
        $result = $supplierOffer->isOfferUnique($conn->getConnection(), 'Ahmad', 'lexus', '091111221', 'libyabmd@gmail.com', 'toyota', 2023, 20000);

        // assert that the result is True (unique)
        $this->assertTrue($result);

    }
}