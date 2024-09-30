<?php
$host = 'localhost';
$username = 'u311273531_elifesure';
$password = '@Elifesure123';
$dbname = 'u311273531_elifesure';

$conn = new mysqli($host, $username, $password, $dbname);
if (!$conn) {
    die("Cannot connect to the database." . $conn->error);
}