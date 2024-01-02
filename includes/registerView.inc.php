<?php
// This file handles outputs

declare(strict_types=1); // Require data type in function declaration

function signupInputs() {

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["usernameTaken"])) {
        echo '<label for="username">Username:</label></br>
        <input type="text" name="username" value="' . $_SESSION["signup_data"]["username"] . '" required></br>';
    } else {
        echo '<label for="username">Username:</label></br>
        <input type="text" name="username" required></br>';
    }

    echo '<label for="password">Password:</label></br>
    <input type="password" name="password" required></br>
    <label for="password">Confirm password:</label></br>
    <input type="password" name="confirm" required></br>';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["invalidEmail"]) && !isset($_SESSION["errors_signup"]["emailTaken"])) {
        echo '<label for="email">E-mail:</label></br>
        <input type="text" name="email" value="' . $_SESSION["signup_data"]["email"] . '" required></br>';
    } else {
        echo '<label for="email">E-mail:</label></br>
        <input type="text" name="email" required></br>';
    }
}

function checkSignupErrors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo '</br>';

        foreach ($errors as $error) {
            echo '<p class="formError">' . $error . '</p>';
        }

        unset($_SESSION['errors_signup']);
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo '</br>';
        echo '<p class="formSuccess">Signup success!</p>';
    }
}