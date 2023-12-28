<?php
// Database connection settings
$host = 'localhost';      // Database host
$db = 'cyberbunker';    // Database name
$dbuser = 'AyoXeN';  // Database username
$dbpass = 'aA4G$@NyzYmv8Yx2M&@#Uzsu';  // Database password

// Create a PDO database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

session_start();
$_SESSION['pdo'] = $pdo;