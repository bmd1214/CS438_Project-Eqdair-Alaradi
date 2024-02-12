<?php

class Validation{

    public static function validateData($supplierName, $supplierPhone, $supplierEmail, $carType, $year, $price) : bool{

            if (filter_var($supplierEmail, FILTER_VALIDATE_EMAIL)){ //check the supplier$supplierEmail
                
            }
            else{
                throw new Exception("The E-mail address is not Valid!");
            }
        
        
            $length = strlen($supplierName);
            if($length < 8 || $length > 16){ //check the supplierName length
                throw new Exception("The Name should be in the range of 8 to 16 !");
            }
        // validate if the fields are empty
            if(empty($supplierName)){ 
                throw new Exception("The supplierName field is empty!");
            }
            if(empty($supplierEmail)){
                throw new Exception("The supplier$supplierEmail field is empty!");
            }
            if(empty($carType)){
                throw new Exception("You should input the car Type");
            }
            if(empty($supplierPhone)){
                throw new Exception("You should enter the supplierPhone number!");
            }
            if(empty($price)){
                throw new Exception("You should enter the Price!");
            }
            if(empty($year)){
                throw new Exception("You should enter the Address!");
            }
        // the supplierName should be all characters
            if(!(ctype_alpha($supplierName))){
                throw new Exception("The Name Can't contain any numbers or A special character!");
        
            }
        // supplierPhone number should be all digits
            if(!is_numeric($supplierPhone)){
                throw new Exception("The Phone Number should Be all Digits!");
            }

        return true;
    }
}