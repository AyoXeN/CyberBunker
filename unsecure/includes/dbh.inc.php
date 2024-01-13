<?php
// Database connection settings
$host = 'localhost';      // Database host
$db = 'cyberbunker_unsecure';    // Database name
$dbuser = 'root';  // Database username
$dbpass = '';  // Database password

// Create a PDO database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}