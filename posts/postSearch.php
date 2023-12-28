<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $postSearch = $_POST['postSearch'];

    // Create a PDO database connection
    try {
        require_once "dbh.inc.php";
        if($pass != $confirm){
            header("Location: ../login/register.php");
            die();
        } else {
            // Query to add the user
            $query = "SELECT * FROM blogposts WHERE title = :postSearch;";
            // Not secure way below:
            // $query = "INSERT INTO users (username, pass, email) VALUES ($username, $pass, $email);";
            
            $sql = $pdo->prepare($query);

            $sql->bindParam(":username", $username);
            $sql->bindParam(":pass", $pass);
            $sql->bindParam(":email", $email);

            $sql->execute();
            
            $pdo = null;
            $sql = null;

            header("Location: ../main/index.php");
            die();
        }
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

        <div class="post-container">
            <iframe src="posts.php" width="100%" height="400" frameborder="0"></iframe>
        </div>

    </main>
    <footer></footer>
    <!-- <script src="hover.js"></script> -->
    <script src="welcome.js"></script>
    <script src="blogPost.js"></script>
</body>
</html>
