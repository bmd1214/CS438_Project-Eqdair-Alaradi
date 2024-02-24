<?php 
class Premission{
    public $nEmployee;
    public $nUser;
    public $userName;
    public $password;
    public $vPassword;
    public $premission;
    public function __construct($nEmployee,$nUser,  $userName, $password, $vPassword,$premission){
        $this->nEmployee= $nEmployee;
        $this->nUser=$nUser;
        $this->userName= $userName;
        $this->password =$password;
        $this->vPassword=$vPassword;
        $this->premission=$premission;        
    }
    public function getnEmployee(){
        return  $this->nEmployee;  
    }
    public function getnUser(){
        return  $this->nUser;  
    }
    public function getuserName(){
        return  $this->userName;  
    }
    public function getpassword(){
        return  $this->password;  
    }
    public function getvPassword(){
        return  $this->vPassword;  
    }
    public function getpremission(){
        return  $this->premission;  
    }
}