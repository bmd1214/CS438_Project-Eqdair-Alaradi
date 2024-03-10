<?php

require_once 'prepare.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    try {
        $user = User::getInstance($username, $password);
        $user->login();
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
