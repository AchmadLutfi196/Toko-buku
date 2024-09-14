<?php
$servername = "localhost";
$username = "root";
$password = ""; // If you have a password, specify it here
$dbname = "bukuku"; // Replace with your database name

// Create connection
$koneksi = new mysqli("localhost", "root", "","bukuku");

// // Create connection
// $conn = new mysqli("localhost", "root", "","bukuku");


$host = 'localhost';
$db   = 'bukuku';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}


?>