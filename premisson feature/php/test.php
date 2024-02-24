<?php
require_once 'premission class.php';
require_once 'insert premission.php';
require_once 'validation.php';
use PHPUnit\Framework\TestCase;

class TestAddition extends TestCase
{
    public function testInputValues()
{
    $nEmployee = '212250';
    $nUser = '2000';
    $userName = 'hassan1';
    $password = '12345678';
    $vPassword = '12345678';
    $premission = 'مستخدم مالية';

    $premission = new Premission($nEmployee, $nUser, $userName, $password, $vPassword, $premission);

    $this->assertTrue(Validation::validateData(
        $nEmployee,
        $nUser,
        $password,
        $vPassword
    ));
}
}