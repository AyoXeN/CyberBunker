<?php
require_once '../includes/configSession.inc.php';
require_once '../includes/loginView.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/styleMain.css">
    <title>Cyber Bunker</title>
</head>

<body>
    
    <nav>
        <a href="../main/index.php" id="Main">Main Page</a>
        <a href="../about/about.php" id="About">About</a>
        <a href="../updates/updates.php" id="Updates">Updates</a>
        <?php
        if(!isset($_SESSION["user_id"])){ ?>
            <a href="../login/login.php" id="Login">Login</a>
        <?php } else {?>
            <a href="../profile/profile.php" id="Profile"><?php outputUsername()?></a>
        <?php } ?> 
        <form action="../includes/logout.inc.php" method="POST">
            <button type="submit">Logout</button>
        </form>
    </nav>

    <h1 id="welcomeBanner">Welcome to CyberBunker! This is a one man honeypot project created to better understand the web security.</h1>

    <main>
        <form class="searchForm" action="../posts/postSearch.php" method="POST">
            <label for="search">Search for post:</label>
            <input id="search" type="text" name="postSearch" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
        
        <div id="newPost">
            <a href="../posts/add_post.php"><h2>Add New Post</h2></a>
        </div>

        <article>
            <iframe src="posts.php" width="100%" height="400" frameborder="0"></iframe>
        </article>
    </main>
    <footer></footer>
</body>
</html>
