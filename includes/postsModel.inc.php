<?php
// This file handles data from database

declare(strict_types=1); // Require data type in function declaration

function getPosts(object $pdo) {
    $query = "SELECT id, title, created_at, author, image_url FROM blogposts ORDER BY created_at DESC LIMIT 5";
    $sql = $pdo->prepare($query); // Prevents SQLi
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    return $result;
}