<?php

use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    public function testValidData()
    {
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

    public function testInvalidEmail()
    {
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

    public function testInvalidPhoneNumber()
    {
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

}
