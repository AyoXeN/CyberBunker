<?php
// This file handles outputs

declare(strict_types=1); // Require data type in function declaration 

try {
    require_once "dbh.inc.php";
    require_once "registerModel.inc.php";
    require_once "registerController.inc.php";
    // Retrieve blog posts from the database
    $query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
    $stmt = $pdo->query($query);

    // Fetch and display the posts

    // <h1>Recent updates:</h1>
    //  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
    //         <h2> echo htmlspecialchars($row['title']);</h2>
    //         <p> echo nl2br(htmlspecialchars($row['content']));</p>
    //         <p>Posted on:  echo htmlspecialchars($row['created_at']);</p>
    //         <hr>
    //  endwhile; 

    $pdo = null;
    $sql = null;

    die();
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}