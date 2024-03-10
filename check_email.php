<?php
// Include your database connection file
include 'db_connection.php';

// Check if email is set and not empty
if (isset($_POST['email']) && !empty($_POST['email'])) {
    // Sanitize the email input
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Query to check if email exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email already exists
        $response = array("status" => "taken", "message" => "Email is already taken");
    } else {
        // Email is available
        $response = array("status" => "available", "message" => "Email is available");
    }
} else {
    // Email parameter is missing
    $response = array("status" => "error", "message" => "Email parameter is missing");
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close database connection
mysqli_close($conn);
?>
