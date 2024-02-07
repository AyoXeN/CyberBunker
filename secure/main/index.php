<?php
require_once '../includes/errorHandler.inc.php';
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
                <li><a href="#" id="About">About</a></li>
                <li><a href="#" id="Updates">Updates</a></li>
                <?php
                if(!isset($_SESSION["user_id"])){ ?>
                    <li><a href="../login/login.php" id="Login">Login</a></li>
                <?php } else {?>
                    <li><a href="../profile/profile.php" id="Profile"><?php outputUsername()?></a></li>
                    <li>
                    <form action="../includes/logout.inc.php" method="POST">
                        <button type="submit">Logout</button>
                    </form>
                    </li>
                <?php } ?>
            </ul> 
        </nav>
    </header>

    <main>
    <h1 id="welcomeBanner">
        <div id="lineOne">Welcome to CyberBunker!</div>
        <div id="lineTwo">This is a one man honeypot project</div>
        <div id="lineThree">created to better understand the web security.</div>
    </h1>


        <article>
            <div class="matrix"></div>
            <form class="searchForm" action="../posts/postSearch.php" method="POST">
                <input type="text" name="postSearch" placeholder="Search for post">
                <button type="submit">Search</button>
            </form>
            
            <!-- <div id="newPost">
                <a href="#"><h2>Add New Post</h2></a>
            </div> -->

            <?php
                outputAllPostSummaries();
                echo $var; // test logging
            ?>
        </article>
    </main>
    <footer></footer>
    <script src="../js/hover.js"></script>
    <!-- <script src="../js/matrix.js"></script> -->
</body>
</html>
