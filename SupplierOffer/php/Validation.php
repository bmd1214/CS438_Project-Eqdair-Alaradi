<?php

class Validation{

    public static function validateData($supplierName, $supplierCompany, $supplierPhone, $supplierEmail, $carType, $year, $price, $pictures): bool{

        if (!(filter_var($supplierEmail, FILTER_VALIDATE_EMAIL))){ //check the supplier Email
            throw new Exception("The E-mail address is not valid!");
        }


        $length = strlen($supplierName);
        if(!(empty($supplierName)) && ($length < 8 || $length > 20)){ //check the supplier Name length
            throw new Exception("The Name should be in the range of 8 to 20 characters!");
        }

        // validate if the fields are empty
        if(empty($supplierName)){ 
            throw new Exception("The supplierName field is empty!");
        }
        if(empty($supplierCompany)){ 
            throw new Exception("The supplierCompany field is empty!");
        }
        if(empty($supplierPhone)){
            throw new Exception("The supplierPhone field is empty!");
        }
        if(empty($supplierEmail)){
            throw new Exception("The supplierEmail field is empty!");
        }
        if(empty($carType)){
            throw new Exception("The carType field is empty!");
        }
        if(empty($price)){
            throw new Exception("The price field is empty!");
        }
        if(empty($year)){
            throw new Exception("The year field is empty!");
        }
        // validate the uploaded pictures
        if(empty($pictures['name'][0])){
            throw new Exception("The picture field is empty!");
        }

        // the supplier Name should be all characters
        if(!preg_match('/^[a-zA-Z\s]+$/',$supplierName)){
            throw new Exception("The name Can't contain any numbers or a special character!");
        }
        if(!preg_match('/^[a-zA-Z\s]+$/',$supplierCompany)){
            throw new Exception("The company name Can't contain any numbers or a special character!");
        }

        // supplier Phone number should be all digits
        if (!is_numeric($supplierPhone)) {
            throw new Exception("The Phone Number should be all digits!");
        }

        return true;
    }
}
?>
