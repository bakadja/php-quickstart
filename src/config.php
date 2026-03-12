<?php
// Basic connection settings
$databaseHost = '100.95.147.14';
$databaseUsername = 'baki';
$databasePassword = 'Nasa1994';
$databaseName = 'rolodex';

// Connect to the database
$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
