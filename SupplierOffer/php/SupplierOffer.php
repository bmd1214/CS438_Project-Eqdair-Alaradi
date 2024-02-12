<?php

namespace MyNamespace;

class SupplierOffer{
    private $supplierName; // supplier name
    private $supplierPhone; // supplier phone
    private $supplierEmail; //supplier email
    private $carType;   // the type of the car that ordered by the supplier
    private $makeYear;  // the make year of the car
    private $carPrice;  // car price

    public function __construct($supplierName, $supplierPhone, $supplierEmail, $carType, $makeYear, $carPrice){
        $this->supplierName = $supplierName;
        $this->supplierPhone = $supplierPhone;
        $this->supplierEmail = $supplierEmail;
        $this->carType = $carType;
        $this->makeYear = $makeYear;
        $this->carPrice = $carPrice;      
    }
   // show the data after insertion if needed
    public function display(){
        print "Name: " . $this->supplierName . '<br>' ;
        print "supplierPhone Number: " . $this->supplierPhone . '<br>';
        print "E-Mail: " . $this->supplierEmail . '<br>';
        print "car type: " . $this->carType . '<br>';
        print "makeYear: " . $this->makeYear . '<br>';
        print "Car carPrice: " . $this->carPrice ;
    }

}

?>

