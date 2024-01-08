<?php

declare(strict_types=1); // Require data type in function declaration

try {
    require_once "dbh.inc.php";
    require_once "postsModel.inc.php";
    require_once "postsController.inc.php";

    $result = getPosts($pdo);

    require_once "postsView.inc.php";

    $pdo = null;
    $sql = null;

    die();
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}