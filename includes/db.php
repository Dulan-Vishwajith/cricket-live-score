
<?php
$host = "localhost";
$user = "root";
$pass = "";              // XAMPP default is empty
$db   = "cricket";        // Make sure you create this in phpMyAdmin

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}
?>
