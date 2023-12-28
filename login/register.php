<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

            <label for="email">E-mail:</label></br>
            <input type="text" name="email" required></br>
            <label for="username">Username:</label></br>
            <input type="text" name="username" required></br>
            <label for="password">Password:</label></br>
            <input type="password" name="password" required></br>
            <label for="password">Confirm password:</label></br>
            <input type="password" name="confirm" required></br>
            <button type="submit">Join</button>

        </form>

        <a href="login.php">Enter the CyberBunker</a>

        <div id="response">
            
        </div>
    </main>
</body>
</html>


