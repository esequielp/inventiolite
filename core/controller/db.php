<?php
//DB local details
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'seguros';

//remote

// $dbHost     = 'localhost';
// $dbUsername = 'ecommercepty';
// $dbPassword = 'Panama2K19!..';
// $dbName     = 'banseguro';


// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>