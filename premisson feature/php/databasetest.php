<?php 
require_once 'connect.php';
require_once 'insert user.php';
require_once 'premission class.php';

use PHPUnit\Framework\TestCase;

class SendData extends TestCase
{
    public function testIsOfferNotUnique()
    {
       
        
        // insert the data into the database to make it non-unique for this test
        $conn = new mysqli($servername,$username,$password,$dbname);
        

        // call the isDataUnique method
      $result=  mysqli_query($conn, "INSERT INTO user (`employeeNational`, `userNumber`, `userName`, `password`, `vPassword`, `premission`)
        VALUES ('212250', '2000', 'hassan1', '12345678', '12345678', 'مستخدم مالية')");

        // assert that the result is false (not unique)
        $this->assertFalse($result);

        // clean up the database after the test
        mysqli_query($conn, "DELETE FROM user WHERE 
        'employeeNational' = '212250' AND
        'userNumber' = '2000' AND
        'userName' = 'hassan1' AND
        'password' = '12345678' AND
        'vPassword' = '12345678' AND
        'premission' = 'مستخدم مالية'");
}
}
