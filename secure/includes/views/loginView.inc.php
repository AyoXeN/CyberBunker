<?php
// This file handles outputs

declare(strict_types=1); // Require data type in function declaration 

function checkLoginErrors() {
    if (isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        echo "</br>";

        foreach ($errors as $error) {
            echo '<p class="formError">' . $error . '</p>';
        }

        unset($_SESSION["errors_login"]);
    } else if (isset($_GET["login"]) && $_GET["login"] === "success") {
        echo "</br>";
        echo '<p class="formSuccess">Login successful!</p>';
    }
}

function outputUsername() {
    if(isset($_SESSION["user_id"])){
        echo htmlspecialchars($_SESSION["user_username"]); //prevents XSS
    }
}