<?php
// This file handles outputs

declare(strict_types=1); // Require data type in function declaration

function signupInputs() {

    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["usernameTaken"])) {
        echo '<div class="input-box">
        <input type="text" name="username" value="' . $_SESSION["signup_data"]["username"] . '" required>
        </div>';
    } else {
        echo '<div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        </div>';
    }

    echo '<div class="input-box">
    <input type="password" name="password" placeholder="Password" required>
    </div>
    <div class="input-box">
    <input type="password" name="confirm" placeholder="Repeat password" required>
    </div>';

    if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["invalidEmail"]) && !isset($_SESSION["errors_signup"]["emailTaken"])) {
        echo '<div class="input-box">
        <input type="text" name="email" value="' . $_SESSION["signup_data"]["email"] . '" required>
        </div>';
    } else {
        echo '<div class="input-box">
        <input type="text" name="email" placeholder="E-mail" required>
        </div>';
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