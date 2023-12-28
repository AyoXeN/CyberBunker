<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get user input
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Create a PDO database connection
            try {
                require_once "dbh.inc.php";
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }

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
} else {
    header("Location: ../login/login.php");
}