<?php
require_once '../includes/configSession.inc.php';
require_once '../includes/loginView.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Login</title>
</head>
<body>
<nav>
        <a href="../main/index.php" id="mainPage">Main Page</a>
        <a href="../about/about.php" id="About">About</a>
        <a href="../updates/updates.php" id="Updates">Updates</a>
        <a href="../login/login.php" id="Login"><?php outputUsername()?></a>
    </nav>

    <main>
        <?php
        if(!isset($_SESSION["user_id"])){ ?>
            <div id="welcomeBanner">Identify Yourself</div>

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
</body>
</html>


