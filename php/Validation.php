<?php
class Validation{
    public static function validateData($nEmployee, $nameEmployee, $phone, $email, $nationality) : bool{
        try {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                throw new \Exception("البريد الإلكتروني غير صالح");
            }

            if((!strlen($nEmployee)==12)&&!is_numeric($nEmployee)){
                throw new \Exception("يجب في الرقم الوطني ان يتكون من 12 رقم");
            }

            if(empty($nameEmployee)){
                throw new \Exception("يجب ادخال الرقم الوطني للموظف");
            }
            if(empty($email)){
                throw new \Exception("يجب ادخال الايميل");
            }
            if(empty($phone)){
                throw new \Exception("يجب ادخال رقم الهاتف");
            }
            if(empty($nationality)){
                throw new \Exception("يجب ادخال الجنسية ");
            }

            if(!is_numeric($phone)){
                throw new \Exception("يجب ان يتكون على ارقام");
            }

            return true;

        } catch (\Exception $e) {
            echo 'Caught exception: ', $e->getMessage();
        }
    }
}