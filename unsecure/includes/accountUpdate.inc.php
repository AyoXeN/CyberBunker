<?php

// Get user input
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$confirm = $_POST['confirm'];

// Create a PDO database connection
try {
    require_once "dbh.inc.php";
    if($pass != $confirm){
        header("Location: ../login/register.php");
        die();
    } else {
        $query = "UPDATE users SET username = '$username', pass = '$pass', email ='$email' WHERE id = '$id'";
        $sql = $pdo->query($query);
        
        $pdo = null;
        $sql = null;

        header("Location: ../main/index.php");
        die();
    }
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
