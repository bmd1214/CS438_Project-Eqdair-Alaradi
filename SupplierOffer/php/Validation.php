<?php

class Validation{

    public static function validateData($supplierName, $supplierCompany, $supplierPhone, $supplierEmail, $carType, $year, $price, $pictures): bool{

        // if (filter_var($supplierEmail, FILTER_VALIDATE_EMAIL)){ //check the supplier Email
            
        // } else {
        //     throw new Exception("The E-mail address is not valid!");
        // }

        $length = strlen($supplierName);
        if($length < 8 || $length > 16){ //check the supplier Name length
            throw new Exception("The Name should be in the range of 8 to 16 characters!");
        }

        // Validate if the fields are empty
        if(empty($supplierName)){ 
            throw new Exception("The supplier Name field is empty!");
        }
        if(empty($supplierCompany)){ 
            throw new Exception("The supplier Company field is empty!");
        }
        if(empty($supplierPhone)){
            throw new Exception("You should enter the supplier Phone number!");
        }
        if(empty($supplierEmail)){
            throw new Exception("The supplier Email field is empty!");
        }
        if(empty($carType)){
            throw new Exception("You should input the car Type");
        }
        if(empty($price)){
            throw new Exception("You should enter the Price!");
        }
        if(empty($year)){
            throw new Exception("You should enter the Address!");
        }

        // The supplier Name should be all characters
        if(!(ctype_alpha($supplierName))){
            throw new Exception("The Name Can't contain any numbers or a special character!");
        }

        // Supplier Phone number should be all digits
        if(is_numeric($supplierPhone)){
            throw new Exception("The Phone Number should be all digits!");
        }

        // Validate the uploaded pictures
        if(empty($pictures['name'][0])){
            throw new Exception("You should choose at least one picture for the car!");
        }

        return true;
    }
}
?>
