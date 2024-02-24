<?php
use Exception;
class Validation{
    public static function validateData($nUser,  $userName, $password, $vPassword) : bool{
        if(empty($userName)){
            throw new Exception("يجب ادخال اسم المستخدم");
        }
        if(strlen($nUser!=4)&&!(preg_match('/^(1[0-9]{3}|2[0-9]{3}|3[0-4][0-9]{2}|3500)$/', $nUser))){
            throw new Exception("يجب أن يتكون رقم المستخدم من 4 ارقام وان يتكون من 1000 للمستخدم العادي 2000 لمستخدم المالية 3000 للادارة الكاملة");
        }
        if($password!=$vPassword){
            throw new Exception("يجب ان تتطابق كلمة المرور مع التأكيد ") ;
        }
       return true; 
}
}