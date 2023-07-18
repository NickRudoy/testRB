<?php

$host = 'localhost';
$dbname = 'test';
$username = 'username';
$password = 'userpassword';


try {
    $pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
} catch (PDOException $exception) {
    var_dump($exception -> getMessage());
}