<?php
include 'db_connection.php';

// Initialize variables
$name = "";
$email = "";

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS name, email FROM users WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error executing the query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
    }
}
?>
