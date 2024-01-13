<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get user input
            $email = $_POST['email'];
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
                    $query = "UPDATE users SET username = :username, pass = :pass, email =:email WHERE id = :id;";
                    
                    // Non secure way below:
                    // $query = "UPDATE users SET username = $username, pass = $pass, email =$email WHERE id = $id;";
                    // $sql = $pdo->query($query);

                    $sql = $pdo->prepare($query);

                    $sql->bindParam(":username", $username);
                    $sql->bindParam(":pass", $pass);
                    $sql->bindParam(":email", $email);
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