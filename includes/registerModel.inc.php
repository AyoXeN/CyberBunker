<?php
// This file handles data from database

declare(strict_types=1); // Require data type in function declaration

function getUsername(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $sql = $pdo->prepare($query); // Prevents SQLi
    $sql->bindParam(":username", $username);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getEmail(object $pdo, string $email) {
    $query = "SELECT username FROM users WHERE email = :email;";
    $sql = $pdo->prepare($query); // Prevents SQLi
    $sql->bindParam(":email", $email);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setUser(object $pdo, string $username, string $pass, string $email){
    $query = "INSERT INTO users (username, pass, email) VALUES (:username, :pass, :email);";
    $sql = $pdo->prepare($query); // Prevents SQLi

    $hashOptions = [
        'cost' => 12
    ];

    $hashedPass = password_hash($pass, PASSWORD_BCRYPT, $hashOptions);
    // Hash passwords before saving them in database 

    $sql->bindParam(":username", $username);
    $sql->bindParam(":pass", $hashedPass);
    $sql->bindParam(":email", $email);
    $sql->execute();
}