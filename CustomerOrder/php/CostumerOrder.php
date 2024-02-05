<?php

namespace MyNamespace;

class CostumerOrder{
    private $costumerName; // costumer name
    private $costumerPhone; // costumer phone
    private $costumerEmail; //costumer email
    private $carType;   // the type of the car that ordered by the costumer
    private $makeYear;  // the make year of the car
    private $carPrice;  // car price

    public function __construct($costumerName, $costumerPhone, $costumerEmail, $carType, $makeYear, $carPrice){
        $this->costumerName = $costumerName;
        $this->costumerPhone = $costumerPhone;
        $this->costumerEmail = $costumerEmail;
        $this->carType = $carType;
        $this->makeYear = $makeYear;
        $this->carPrice = $carPrice;      
    }
   // show the data after insertion if needed
    public function display(){
        print "Name: " . $this->costumerName . '<br>' ;
        print "costumerPhone Number: " . $this->costumerPhone . '<br>';
        print "E-Mail: " . $this->costumerEmail . '<br>';
        print "car type: " . $this->carType . '<br>';
        print "makeYear: " . $this->makeYear . '<br>';
        print "Car carPrice: " . $this->carPrice ;
    }

}

?>

