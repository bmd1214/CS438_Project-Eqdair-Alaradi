<?php

namespace MyNamespace;

class CostumerOrder{
    private $costumerName;
    private $costumerPhone;
    private $costumerEmail;
    private $carType;
    private $makeYear;
    private $carPrice;

    public function __construct($costumerName, $costumerPhone, $costumerEmail, $carType, $makeYear, $carPrice){
        $this->costumerName = $costumerName;
        $this->costumerPhone = $costumerPhone;
        $this->costumerEmail = $costumerEmail;
        $this->carType = $carType;
        $this->makeYear = $makeYear;
        $this->carPrice = $carPrice;      
    }

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

