<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Get user input
            $username = $_POST['username'];
            $pass = $_POST['password'];

            try {
                require_once "dbh.inc.php";
                require_once "models/loginModel.inc.php";
                require_once "controllers/loginController.inc.php";

                // Error handlers

                $errors = [];

                if (emptyInput($username, $pass)) {
                    $errors["emptyInput"] = "Fill in all fields!";
                }    

                $result = getUser($pdo, $username);

                if(wrongUsername($result)){
                    $errors["wrongUsername"] = "User does not exist!";
                }

                if(!wrongUsername($result) && wrongPassword($pass, $result["pass"])){
                    $errors["wrongPassword"] = "Wrong password!";
                }
                
                require_once "configSession.inc.php";

                if($errors) {
                    $_SESSION["errors_login"] = $errors;

                    header("Location: ../login/login.php");
                    die();
                }
                
                $newSessionId = session_create_id();
                $sessionId = $newSessionId . "_" . $result["id"];
                session_id($sessionId);

                $_SESSION["user_id"] = $result["id"];
                $_SESSION["user_username"] = htmlspecialchars($result["username"]); // Prevents XSS

                $_SESSION["last_regeneration"] = time();

                header("Location: ../login/login.php?login=success");

                $pdo = null;
                $sql = null;

                die();
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
} else {
    header("Location: ../login/login.php");
    die();
}