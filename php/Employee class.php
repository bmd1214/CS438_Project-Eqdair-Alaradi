<?php 
require_once 'connect.php';


class Employee 
{ public $nEmployee; 
    public $nameEmployee; 
    public $phone; 
    public $email;
     public $nationality; 
     public $state; 
     public $user; 
     //تكوين object لهذا class
    public function __construct($nEmployee, $nameEmployee, $phone, $email, $nationality, $state, $user) 
    { 
        $this->nEmployee = $nEmployee; 
        $this->nameEmployee = $nameEmployee; 
        $this->phone = $phone;
         $this->email = $email; 
        $this->nationality = $nationality; 
        $this->state = $state; 
        $this->user = $user; }


    }