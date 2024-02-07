<?php
// This file handles outputs

declare(strict_types=1); // Require data type in function declaration 

function createSummary(string $content,int $wordsMax = 100) {
    $wordsArray = explode(" ", $content);
    if (count($wordsArray) > $wordsMax) {
        $wordsArray = array_slice($wordsArray, 0, $wordsMax);
        $content = implode(" ", $wordsArray) . "...";
    }
    return $content;
}

function outputPostSummary(array $result,string $summary) {
    echo '<div class="blogPostSummary">';
    echo '<div class="postHeader">';
    echo '  <h4>Author: ' . htmlspecialchars($result["author"]) . '</h4>'; // Prevents XSS - OWASP TOP3
    echo '  <h3>' . htmlspecialchars($result["title"]) . '</h3>'; // Prevents XSS - OWASP TOP3
    echo '  <h4>' . $result["created_at"] . '</h4>'; // Set automatically, not by user
    echo '</div>';
    echo '  <img src="' . htmlspecialchars($result["image_url"]) . '"></br>'; // Prevents XSS - OWASP TOP3
    echo '  <p>' . htmlspecialchars($summary) . '</p></br>'; // Prevents XSS - OWASP TOP3
    echo '  <a href="../posts/article.php?id=' . $result["id"] . '">Read more</a>'; // Set automatically, not by user
    echo '</div>';
}

function outputPost(array $result) {
    echo '<div class="blogPost">';
    echo '  <h4>' . htmlspecialchars($result["author"]) . '</h4>'; // Prevents XSS - OWASP TOP3
    echo '  <h3>' . htmlspecialchars($result["title"]) . '</h3>'; // Prevents XSS - OWASP TOP3
    echo '  <h4>' . $result["created_at"] . '</h4></br>'; // Set automatically, not by user
    echo '  <img src="' . htmlspecialchars($result["image_url"]) . '"></br>'; // Prevents XSS - OWASP TOP3
    echo '  <p>' . htmlspecialchars($result["content"]) . '</p></br>'; // Prevents XSS --- TEST HERE
    echo '  <a href="../broken/broken_' . $result["id"] . '">Test Yourself</a>'; // Set automatically, not by user
    echo '</div>';
}

function outputAllPostSummaries(){
    require_once(__DIR__.'/../dbh.inc.php');
    require_once(__DIR__.'/../models/postsModel.inc.php');
    $result = getPosts($pdo);

    for ($i = 0; $i < count($result); $i++) {
        $content = $result[$i]["content"];
        $summary = createSummary($content);
        outputPostSummary($result[$i], $summary);
    }
}