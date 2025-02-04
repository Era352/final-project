<?php
$host = "localhost";  // Change if using an online database
$user = "root";       // Default MySQL username
$password = "";       // Default MySQL password (empty for XAMPP)
$database = "hotel_management";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>