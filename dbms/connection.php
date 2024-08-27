<?php
$dbHost = 'localhost';
$dbName = 'testing';
$dbUsername = 'root';
$dbPassword = '';

// Establish MySQL database connection
$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check if the connection is successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
