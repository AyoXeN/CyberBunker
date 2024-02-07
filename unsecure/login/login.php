<?php
require_once '../includes/configSession.inc.php';
require_once '../includes/views/loginView.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        
            <form action="../includes/login.inc.php" method="post">
                <h1 id="welcomeBanner">Identify Yourself</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock' ></i>
                </div>

                <div class="forgot-password">
                    <a href="#" id="forgotPassword">Forgot password?</a>
                </div>

                <button type="submit">Enter</button>

                <div class="register-link">
                    <p>Not a member? <a href="register.php" id="joinLegion">Join the Legion</a></p>
                </div>
                
            </form>

        </main>
    <?php } ?>

    <script src="../js/hover.js"></script>
</body>
</html>


