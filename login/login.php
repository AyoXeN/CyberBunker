<?php
require_once '../includes/configSession.inc.php';
require_once '../includes/loginView.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Login</title>
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
                <?php } ?>
            </ul> 
        </nav>
    </header>

    <main>
        <?php
        if(!isset($_SESSION["user_id"])){ ?>
            <h1 id="welcomeBanner">Identify Yourself</h1>

            <form action="../includes/login.inc.php" method="post">

                <label for="username">Username:</label></br>
                <input type="text" name="username" required></br>
                <label for="password">Password:</label></br>
                <input type="password" name="password" required></br>
                <button type="submit">Enter</button>

            </form>

            <?php
            checkLoginErrors();
            ?>


            <a href="register.php">Join the legion</a>
        <?php } ?>

        
    </main>
    <script src="../js/hover.js"></script>
</body>
</html>


