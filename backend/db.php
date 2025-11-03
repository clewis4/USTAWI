<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Database configuration using environment variables
$host = $_ENV['DB_HOST'] ?? 'localhost';
$user = $_ENV['DB_USER'] ?? 'root';
$pass = $_ENV['DB_PASS'] ?? '';
$dbname = $_ENV['DB_NAME'] ?? 'ustawi';

/*  Syntax for the connection string is -> Server, username, password, database name
**  Using environment variables for security
*/
$con = mysqli_connect('localhost', 'root', '', 'ustawi');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully!";

?>

