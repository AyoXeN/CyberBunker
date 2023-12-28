<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
                    // Query to add the user
                    $query = "INSERT INTO users (username, pass, email) VALUES (:username, :pass, :email);";
                    // Not secure way below:
                    // $query = "INSERT INTO users (username, pass, email) VALUES ($username, $pass, $email);";
                    
                    $sql = $pdo->prepare($query);

                    $sql->bindParam(":username", $username);
                    $sql->bindParam(":pass", $pass);
                    $sql->bindParam(":email", $email);

                    $sql->execute();
                    
                    $pdo = null;
                    $sql = null;

                    header("Location: ../main/index.php");
                    die();
                }
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
} else {
    header("Location: ../login/login.php");
}