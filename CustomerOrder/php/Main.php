<?php


// this is the main program where objects have been created,
// and where queries excuted.

require_once 'Connect_db.php';
require_once 'CostumerOrder.php';
require_once 'Validation.php';

// check if the submit button been pressed

if(isset($_POST['submit'])){

    $costumerName = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $carType = $_POST['carType'];
    $year = $_POST['year'];
    $price = $_POST['price'];
}
else{
    echo "There is somthing wrong with the submission.";
}

// Validate the inputs using a static function in class Validation

try{

    Validation::validateData($name, $phone, $email, $carType, $year, $price);

}catch(Exception $e){

    echo $e->getMessage();
    exit;
}

// her will exit the program if the user entered data that are not allowed.

$conn = new DataBaseConnection();

$person = new MyNamespace\CostumerOrder($name, $phone, $email, $carType, $year, $price);

    // insert data in table named client

    $query1 = mysqli_query($conn->getConnection(), "insert into client(name, email, phone) values ('$name','$email','$phone') ");
    
    // get the id that the DBMS assigned, to enter it into junction table
    $client_id = mysqli_insert_id($conn->getConnection());

    $query2 = mysqli_query($conn->getConnection(), "insert into car(name, year, price) values ('$carType','$year','$price') ");
    
    // get the id that the DBMS assigned, to enter it into junction table
    $car_id = mysqli_insert_id($conn->getConnection()) ;

    $query3 = mysqli_query($conn->getConnection(), "insert into cars_order(car_id, client_id) values ('$car_id','$client_id') ");

    // here i check if the queries if excuted succussfully Or not.
    if($query1 && $query2 && $query3){
        echo "Tha Queries has been Excuted Successfully." . '<br>';
    } else{
        echo "The Queries Didn't Excute for some reason";
    }

//$person->display();

?>