<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "superstore";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to read random lines from a text file
function getRandomLineFromFile($filename) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES);
    return $lines[array_rand($lines)];
}

for ($i = 1; $i <= 150; $i++) {
    $street = getRandomLineFromFile('streets.txt') . " Street";
    $city = getRandomLineFromFile('cities.txt');
    $state = getRandomLineFromFile('states.txt');
    $zip = rand(10000, 99999);
    $sql = "INSERT INTO address (street, city, state, zip) VALUES ('$street', '$city', '$state', '$zip')";
    $conn->query($sql);

