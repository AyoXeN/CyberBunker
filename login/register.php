<?php
require_once '../includes/configSession.inc.php';
require_once '../includes/registerView.inc.php';
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
        <a href="../login/login.php" id="Login">Login</a>
    </nav>

    <main>
        <div id="welcomeBanner">Join The Legion</div>

        <form action="../includes/register.inc.php" method="post">
            <?php
            signupInputs();
            ?>
            <button type="submit">Join</button>
        </form>

        <?php
        checkSignupErrors();
        ?>

        <a href="login.php">Enter the CyberBunker</a>

    </main>
</body>
</html>


