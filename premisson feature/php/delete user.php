<?php
require_once 'connect.php';

class UserDeletion
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
   
    public function deleteUser($nUser)
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nUser = $_POST['nUser'];
            
            // Check if the user number exists in the database
            $checkQuery = "SELECT * FROM user WHERE userNumber = '$nUser'";
            $result = $this->conn->query($checkQuery);

           if ($result->rowCount() > 0) {
                // The number is valid, so it can be deleted
                $deleteQuery = "DELETE FROM user WHERE userNumber = '$nUser'";
                if ($this->conn->query($deleteQuery) === TRUE) {
                    return "User deleted successfully.";
                } else {
                        return "Error: " . $deleteQuery . "<br>" . $this->conn;
                }
            }
         } else {
                // The number does not exist in the database
                return "Invalid user number.";
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
 $nUser = $_POST['nUser'];
// Create a new instance of DatabaseConnection
$userDeletion = new UserDeletion($conn);

// Call the deleteUser method
$result = $userDeletion->deleteUser($nUser);

// Output the result
echo $result;