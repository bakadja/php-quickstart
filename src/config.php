<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();
// Basic connection settings
$databaseHost = '<host_address>';
$databaseUsername = '<user_name>';
$databasePassword = '******';
$databaseName = 'rolodex';

// Connect to the database
$conn = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME'],
    (int) $_ENV['DB_PORT']
);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
