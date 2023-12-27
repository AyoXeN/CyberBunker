<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cyber Bunker</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h1>Add a New Blog Post</h1>
    <form method="post" action="add_post.php">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>
        
        <label for="content">Content:</label><br>
        <textarea name="content" id="content" rows="5" required></textarea><br><br>
        
        <input type="submit" value="Add Post">
    </form>
</body>
</html>

<?php
@include 'database/connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the post data from the form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Insert the new post into the database
    $query = "INSERT INTO blog_posts (title, content) VALUES (:title, :content)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':content', $content, PDO::PARAM_STR);

    try {
        $stmt->execute();
        echo "Blog post added successfully!";
    } catch (PDOException $e) {
        die("Error adding blog post: " . $e->getMessage());
    }
}
?>

