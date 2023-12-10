<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate the username and password (in a real application, you would do this against a database)
    $validUsername = "demo";
    $validPassword = password_hash("password123", PASSWORD_DEFAULT); // Hashed password

    if ($username == $validUsername && password_verify($password, $validPassword)) {
        // Successful login
        echo "Login successful!";
    } else {
        // Invalid login
        echo "Invalid username or password.";
    }
}
?>
