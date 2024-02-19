<?php

use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase{

    public function testValidData(){

        $this->assertTrue(Validation::validateData(
            'Ahmad alaradi',
            'MAYAR',
            '0911755332',
            'libyabmd@email.com',
            'Sedan',
            '2022',
            '10000',
            ['name' => ['car_picture.jpg']]
        ));
    }

    public function testInvalidEmail(){

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The E-mail address is not valid!");

        Validation::validateData(
            'Ahmad alaradi',
            'MAYAR',
            '0911755332',
            'invalid-email', // Invalid email format
            'Sedan',
            '2022',
            '10000',
            ['name' => ['car_picture.jpg']]
        );
    }

    public function testInvalidPhoneNumber(){

        // Invalid phone number (contains non-digit characters)
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The Phone Number should be all digits!");

        Validation::validateData(
            'Ahmad Alaradi',
            'MAYAR',
            'invalid-phone', // Invalid phone number
            'libyabmd@email.com',
            'Sedan',
            '2022',
            '10000',
            ['name' => ['car_picture.jpg']]
        );
    }
    public function testInvalidNameLength(){
        // test whent the name is shorter than expected
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The Name should be in the range of 8 to 20 characters!");

        Validation::validateData(
            'Ahmad',// short name
            'MAYAR',
            '0911755332', 
            'libyabmd@email.com',
            'Sedan',
            '2022',
            '10000',
            ['name' => ['car_picture.jpg']]
        );
    }
    public function testInvalidName(){
        // test whent the name is Invalid
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The name Can't contain any numbers or a special character!");

        Validation::validateData(
            '#@aAhmad',// invalid name
            'MAYAR',
            '0911755332', 
            'libyabmd@email.com',
            'Sedan',
            '2022',
            '10000',
            ['name' => ['car_picture.jpg']]
        );
    }
    public function testInvalidCompanyName(){
        // test when the company name is invalid
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The company name Can't contain any numbers or a special character!");

        Validation::validateData(
            'Ahmad Alaradi',
            '#$MMAYAR',// invalid company name
            '0911755332', 
            'libyabmd@email.com',
            'Sedan',
            '2022',
            '10000',
            ['name' => ['car_picture.jpg']]
        );
    }

    private function assertEmptyFieldException($fieldName, $fieldValue, $data){

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The $fieldName field is empty!");

        $data[$fieldName] = $fieldValue;

        Validation::validateData(...array_values($data));
    }
    // this function to test the fileds when empt
    public function testEmptyFields(){
        
        $originalData = [
            'supplierName' => 'Ahmad alaradi',
            'supplierCompany' => 'MAYAR',
            'supplierPhone' => '0911755332',
            'supplierEmail' => 'libyabmd@email.com',
            'carType' => 'Sedan',
            'year' => '2022',
            'price' => '10000',
            'picture' => ['name' => ['car_picture.jpg']]
        ];

        // this to try every input alone if it is empty or not
        $this->assertEmptyFieldException('supplierName', '', $originalData);
        $this->assertEmptyFieldException('supplierCompany', '', $originalData);
        $this->assertEmptyFieldException('supplierPhone', '', $originalData);
        $this->assertEmptyFieldException('supplierEmail', '', $originalData);
        $this->assertEmptyFieldException('carType', '', $originalData);
        $this->assertEmptyFieldException('year', '', $originalData);
        $this->assertEmptyFieldException('price', '', $originalData);
        $this->assertEmptyFieldException('picture',['name'=>['']],$originalData);
    }

}