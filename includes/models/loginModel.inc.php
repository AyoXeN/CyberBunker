<?php
// This file handles data from database

declare(strict_types=1); // Require data type in function declaration

function getUser(object $pdo, string $username) {
    $query = "SELECT * FROM users WHERE username = :username;";
    $sql = $pdo->prepare($query); // Prevents SQLi
    $sql->bindParam(":username", $username);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return $result;
}