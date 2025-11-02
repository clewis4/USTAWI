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
$con = mysqli_connect($host, $user, $pass, $dbname);

if(mysqli_connect_errno()) {
    echo "Unable to connect to database";
    exit();
}

?>

