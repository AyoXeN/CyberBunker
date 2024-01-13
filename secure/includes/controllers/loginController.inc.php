<?php
// This file handles user inputs

declare(strict_types=1); // Require data type in function declaration 

function emptyInput(string $username, string $pass) {
    if (empty($username || empty($pass))) {
        return true;
    } else {
        return false;
    }
}

function wrongUsername(bool|array $result) { // $result is bool if empty and array if not empty
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function wrongPassword(string $pass, string $hashedPass) {
    if (!password_verify($pass, $hashedPass)) {
        return true;
    } else {
        return false;
    }
}
