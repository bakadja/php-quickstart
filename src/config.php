<?php
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Connect to the database
$conn = new mysqli(
    $_ENV['DB_HOST'] ?? '127.0.0.1',
    $_ENV['DB_USER'] ?? '',
    $_ENV['DB_PASS'] ?? '',
    $_ENV['DB_NAME'] ?? 'rolodex',
    (int) ($_ENV['DB_PORT'] ?? 3306)
);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
