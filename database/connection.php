<?php
// Database connection settings
$host = 'localhost';      // Database host
$db = 'cyberbunker';    // Database name
$user = 'root';  // Database username
$pass = '';  // Database password

// Create a PDO database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

session_start();
$_SESSION['pdo'] = $pdo;