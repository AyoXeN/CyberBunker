<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $postSearch = $_POST['postSearch'];

    // Create a PDO database connection
    try {
        require_once "../includes/dbh.inc.php";
            // Query to add the user
            $query = "SELECT * FROM blogposts WHERE title LIKE '%:postSearch%';";
            // Not secure way below:
            // $query = "INSERT INTO users (username, pass, email) VALUES ($username, $pass, $email);";
            
            $sql = $pdo->prepare($query);

            $sql->bindParam(":postSearch", $postSearch);

            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            
            $pdo = null;
            $sql = null;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
} else {
header("Location: ../login/login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Bunker</title>
    <link rel="stylesheet" href="../styles/styleMain.css">
</head>
<body>
    
    <nav>
        <a href="../main/index.php" id="Main">Main Page</a>
        <a href="../about/about.php" id="About">About</a>
        <a href="../updates/updates.php" id="Updates">Updates</a>
        <a href="../login/login.php" id="Login">Login</a>
    </nav>

    <main>
        <div>
            <h1 id="welcomeBanner">Welcome to CyberBunker! This is a one man honeypot project created to better understand the web security.</h1>
        </div>
        
        <div id="newPost">
            <a href="../posts/add_post.php"><h2>Add New Post</h2></a>
        </div>
        <section>
            <h2>Search results: </h2>

            <div class="post-container">
                <?php
                    if (empty($result)) {
                        echo "<div>"
                        echo "<p>There are no results found.</p>"
                        echo "</div>"
                    } else {
                        foreach ($result as $row) {
                            //To be continued...
                        }
                    }
                ?>
            </div>
        </section>
    </main>
    <footer></footer>
    <!-- <script src="hover.js"></script> -->
    <script src="welcome.js"></script>
    <script src="blogPost.js"></script>
</body>
</html>
