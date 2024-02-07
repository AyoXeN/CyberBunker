<?php
require_once '../includes/errorHandler.inc.php';
require_once '../includes/configSession.inc.php';
require_once '../includes/views/registerView.inc.php';
require_once '../includes/views/loginView.inc.php';
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
    
    <?php
        if(!isset($_SESSION["user_id"])){ ?>
        <main>
            <form action="../includes/register.inc.php" method="post">
                <h1 id="welcomeBanner">Join The Legion</h1>
                    <?php
                    signupInputs();
                    ?>
                <button type="submit">Join</button>
            </form>

            <?php
            checkSignupErrors();
            ?>

            <div class="register-link">
                    <p>Already a member? <a href="login.php" id="enterCyberbunker">Enter the CyberBunker</a></p>
            </div>
        
        </main>
    <?php } ?>

    <script src="../js/hover.js"></script>
</body>
</html>


