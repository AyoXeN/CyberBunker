<?php
// This file handles user inputs

declare(strict_types=1); // Require data type in function declaration 

function emptyInput(string $username,string $pass,string $confirm,string $email): bool {
    if (empty($username) || empty($pass) || empty($confirm) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function wrongPassConfirm(string $pass,string $confirm): bool {
    if($pass != $confirm) {
        return true;
    } else {
        return false;
    }
}

function invalidEmail(string $email): bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function usernameTaken(object $pdo, string $username): bool {
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}

function emailTaken(object $pdo, string $email): bool {
    if (getEmail($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function createUser(object $pdo, string $username, string $pass, string $email){
    setUser($pdo, $username, $pass, $email);
}