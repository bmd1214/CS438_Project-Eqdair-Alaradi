<?php

require_once 'prepare.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {     // give data from html form
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        $user = User::getInstance($username, $password);   // connect and create instance singelton to database
        $user->login();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
