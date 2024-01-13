<?php
require_once '../includes/configSession.inc.php';
require_once '../includes/views/loginView.inc.php';
require_once '../includes/views/postsView.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/styleMain.css">
    <title>Cyber Bunker</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="../main/index.php" id="Main">Main Page</a></li>
                <li><a href="../about/about.php" id="About">About</a></li>
                <li><a href="../updates/updates.php" id="Updates">Updates</a></li>
                <?php
                if(!isset($_SESSION["user_id"])){ ?>
                    <li><a href="../login/login.php" id="Login">Login</a></li>
                <?php } else {?>
                    <li><a href="../profile/profile.php" id="Profile"><?php outputUsername()?></a></li>
                    <form action="../includes/logout.inc.php" method="POST">
                        <button type="submit">Logout</button>
                    </form>
                <?php } ?>
            </ul> 
        </nav>
    </header>

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
            <?php
                outputAllPostSummaries();
            ?>
        </article>
    </main>
    <footer></footer>
    <script src="../js/hover.js"></script>
</body>
</html>
