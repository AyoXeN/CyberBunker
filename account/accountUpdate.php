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

        <h2>Update account</h2>
        <form action="../includes/accountUpdate.inc.php" method="post">

            <input type="text" name="email" placeholder="E-mail"></br>
            <input type="text" name="username" placeholder="Username"></br>
            <input type="password" name="password" placeholder="Password"></br>
            <input type="password" name="confirm" placeholder="Confirm password"></br>
            <button type="submit">Update</button>

        </form>

        <h2>Delete account</h2>
        <form action="../includes/accountDelete.inc.php" method="post">

            <input type="text" name="username" placeholder="Username"></br>
            <input type="password" name="password" placeholder="Password"></br>
            <input type="password" name="confirm" placeholder="Confirm password"></br>
            <button type="submit">Delete</button>

        </form>

    </main>
</body>
</html>


