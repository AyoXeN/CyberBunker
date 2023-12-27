<?php
@include 'database/connection.php';

// Retrieve blog posts from the database
$query = "SELECT * FROM blog_posts ORDER BY created_at DESC";
$stmt = $pdo->query($query);

// Fetch and display the posts
?>

<h1>Recent updates:</h1>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
        <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
        <p>Posted on: <?php echo htmlspecialchars($row['created_at']); ?></p>
        <hr>
    <?php endwhile; ?>