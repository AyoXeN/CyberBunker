<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/styleLogin.css">
    <title>Login</title>
</head>
<body>
    <main>
        <div id="welcomeBanner">Identify Yourself</div>
        <form action="login.php" method="post">
            <label for="username">Username:</label></br>
            <input type="text" id="username" name="username" required></br>
            <label for="password">Password:</label></br>
            <input type="password" id="password" name="password" required></br>

            <button type="submit">Login</button>
        </form>
    </main>
</body>
</html>

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
        echo "Login successful!";
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

