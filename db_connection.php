<?php

// Start a session if one is not already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "id21974529_philstudio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
