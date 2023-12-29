<?php

$passToHash = "test";
$salt = bin2hex(random_bytes(16)); // Generate random salt
$pepper = '$pp6V2pY49352dk!*KkRoHXM';

$dataToHash = $passToHash . $salt . $pepper;

$hash = hash("sha256", $dataToHash);


/*----*/

$passToHash = "test";
$storedSalt = $salt;
$storedHash = $hash;
$pepper = '$pp6V2pY49352dk!*KkRoHXM';

$dataToHash = $passToHash . $storedSalt . $pepper;

$verificationHash = hash("sha256", $dataToHash);

if($storedHash === $verificationHash) {
    echo $storedHash;
    echo </br>;
    echo $verificationHash;
} else {
    echo "Not the same data!"
}