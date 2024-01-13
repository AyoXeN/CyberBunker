<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get user input
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $confirm = $_POST['confirm'];
            // $id = sesja
            // Create a PDO database connection
            try {
                require_once "dbh.inc.php";
                if($pass != $confirm){
                    header("Location: ../login/register.php");
                    die();
                } else {
                    // Query to update the user info
                    $query = "DELETE FROM users WHERE username = :username AND pass = :pass AND id = :id;";
                    
                    // Non secure way below:
                    // $query = "DELETE FROM users WHERE username = $username AND pass = $pass AND id = $id;";
                    // $sql = $pdo->query($query);

                    $sql = $pdo->prepare($query);

                    $sql->bindParam(":username", $username);
                    $sql->bindParam(":pass", $pass);
                    $sql->bindParam(":id", $id);

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