<?php
// This file handles data from database

declare(strict_types=1); // Require data type in function declaration

function getPosts(object $pdo) {
    $query = "SELECT * FROM blogposts";
    $sql = $pdo->prepare($query); // Prevents SQLi
    $sql->execute();

    $result = $sql->fetchall(PDO::FETCH_ASSOC);
    return $result;
}

function createPost(object $pdo, string $title, string $content, string $author, string $image_url) {
    $query = "INSERT INTO blogposts (title, content, author, image_url) VALUES (:title, :content, :author, :image_url);";
    $sql = $pdo->prepare($query); // Prevents SQLi

    $sql->bindParam(":title", $title);
    $sql->bindParam(":content", $content);
    $sql->bindParam(":author", $author);
    $sql->bindParam(":image_url", $image_url);
    $sql->execute();
}