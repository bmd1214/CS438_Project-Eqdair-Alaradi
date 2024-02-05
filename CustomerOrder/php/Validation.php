<?php

class Validation{

    public static function validateData($name, $phone, $email, $carType, $year, $price) : bool{

            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                
            }
            else{
                throw new Exception("The E-mail address is not Valid!");
            }
        
        
            $length = strlen($name);
            if($length < 8 || $length > 16){
                throw new Exception("The Name should be in the range of 8 to 16 !");
            }
        
            if(empty($name)){
                throw new Exception("The name field is empty!");
            }
            if(empty($email)){
                throw new Exception("The email field is empty!");
            }
            if(empty($carType)){
                throw new Exception("You should input the car Type");
            }
            if(empty($phone)){
                throw new Exception("You should enter the phone number!");
            }
            if(empty($price)){
                throw new Exception("You should enter the Price!");
            }
            if(empty($year)){
                throw new Exception("You should enter the Address!");
            }
        

            if(!(ctype_alpha($name))){
                throw new Exception("The Name Can't contain any numbers or A special character!");
        
            }
        
            if(!is_numeric($phone)){
                throw new Exception("The Phone Number should Be all Digits!");
            }

        return true;
    }
}