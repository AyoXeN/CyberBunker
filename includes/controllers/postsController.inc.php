<?php
// This file handles user inputs

declare(strict_types=1); // Require data type in function declaration 

function emptyInput(string $title, string $content, string $author, string $image_url) {
    if (empty($title || empty($content) || empty($author) || empty($image_url))) {
        return true;
    } else {
        return false;
    }
}

function noResults(bool|array $result) { // $result is bool if empty and array if not empty
    if (!$result) {
        return true;
    } else {
        return false;
    }
}