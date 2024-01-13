<?php

// Get user input
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$confirm = $_POST['confirm'];

try {
    require_once "dbh.inc.php";
    require_once "models/registerModel.inc.php";
    require_once "controllers/registerController.inc.php";

    // Error handlers

    $errors = [];

    if (emptyInput($username, $pass, $confirm, $email)) {
        $errors["emptyInput"] = "Fill in all fields!";
    }    
    if (wrongPassConfirm($pass, $confirm)) {
        $errors["noConfirm"] = "Passwords do not match!";
    }
    if (invalidEmail($email)) {
        $errors["invalidEmail"] = "Invalid email used!";
    }
    if (usernameTaken($pdo, $username)) {
        $errors["usernameTaken"] = "Username already taken!";
    }
    if (emailTaken($pdo, $email)) {
        $errors["emailTaken"] = "Email already registered!";
    }

    require_once "configSession.inc.php";

    if($errors) {
        $_SESSION["errors_signup"] = $errors;

        $signupData = [
            "username" => $username,
            "email" => $email
        ];
        $_SESSION["signup_data"] = $signupData;

        header("Location: ../login/register.php");
        die();
    }

    createUser($pdo, $username, $pass, $email);

    header("Location: ../login/register.php?signup=success");
    
    $pdo = null;
    $sql = null;

    die();
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}