<?php
// This file handles data from database

declare(strict_types=1); // Require data type in function declaration

function getUsername(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = '$username'";
    $sql = $pdo->query($query);

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getEmail(object $pdo, string $email) {
    $query = "SELECT username FROM users WHERE email = '$email'";
    $sql = $pdo->query($query);

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function setUser(object $pdo, string $username, string $pass, string $email){
    $hashedPass = md5($pass);

    $query = "INSERT INTO users (username, pass, email) VALUES ('$username', '$hashedPass', '$email')";
    $sql = $pdo->query($query);
}