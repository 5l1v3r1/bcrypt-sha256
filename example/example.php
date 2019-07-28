<?php

include(dirname(__FILE__) . "/../lib/bcrypt_sha256.php");

// hash the plaintext 'password'
$hash = BcryptSHA256::password_hash('password');
echo "bcrypt_sha256('password') = " . $hash . "\n";

// use custom cost factor
$hash = BcryptSHA256::password_hash('password', ["cost" => 13]);
echo "bcrypt_sha256('password', ['cost' => 13]) = " . $hash . "\n";

// check 'password'
$check = (BcryptSHA256::password_verify($hash, 'password')) ? "correct" : "incorrect";
echo $hash . " <-> 'password' => " . $check . "\n";

// check 'letmein'
$check = (BcryptSHA256::password_verify($hash, 'letmein')) ? "correct" : "incorrect";
echo $hash . " <-> 'letmein' => " . $check . "\n";
