<?php

class DataBaseConnection{
    private $host = "localhost";
    private $userName = "root";
    private $password = "";
    private $dbName = "cic_db";
    private $connection;  // to create an objec from mysqli


    //when an object is created the construct will call function to make connection with DB.
    public function __construct(){
        $this->connect();
        
    }
    public function __destruct(){
        $this->closeConnection(); // function to close connection

    }
    // make connection with db
    private function connect(){
        $this->connection = new mysqli($this->host, $this->userName, $this->password, $this->dbName);

        if($this->connection->connect_error){
            die("Connevtion Failed: " . $this->connection->connect_error);
        }

    }
    // return the connection to main program
    public function getConnection(){
        return $this->connection;
    }

    // close connection when the object is destructed
    private function closeConnection(){
        if($this->connection){
            $this->connection->close();
        }
    }
}

?>