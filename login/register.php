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
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <label for="username">Username:</label></br>
            <input type="text" id="username" name="username" required></br>
            <label for="password">Password:</label></br>
            <input type="password" id="password" name="password" required></br>
            <label for="password">Confirm password:</label></br>
            <input type="password" id="confirm" name="confirm" required></br>

            <button type="submit">Join</button>
        </form>

        <div id="oldOrNew">
            <a href="register.php">Join the legion</a>
        </div>
        
        <div id="response">
        <?php
        // Database configuration
        $db_host = "localhost";
        $db_user = "AyoXeN";
        $db_password = "test";
        $db_name = "cyberbunker";

        // Create a database connection
        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get user input
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to check if the user exists
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            
            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Successful login
                header("Location: ../main/index.php");
            } else {
                // Incorrect password
                echo "Incorrect password. Please try again.";
            }
        } else {
            // User not found
            echo "User not found. Please register or try again.";
        }

        // Close the database connection
        $conn->close();
        ?>
        </div>
    </main>
</body>
</html>


