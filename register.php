<?php
include 'db_connection.php';

if (isset($_POST['register'])) {
    // Form data
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $lot = $_POST['lot'];
    $street = $_POST['street'];
    $phase_subdivision = $_POST['phase_subdivision'];
    $country = $_POST['country'];
    $region = isset($_POST['region']) ? $_POST['region'] : null;
    $city = $_POST['city'];
    $barangay = isset($_POST['barangay']) ? $_POST['barangay'] : null;
    $state = isset($_POST['state']) ? $_POST['state'] : null;

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL statement with placeholders
    $sql = "INSERT INTO users (last_name, first_name, phone, email, password, lot, street, phase_subdivision, country, region, city, barangay, state)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sssssssssssss", $last_name, $first_name, $phone, $email, $hashed_password, $lot, $street, $phase_subdivision, $country, $region, $city, $barangay, $state);

        // Execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login.php after successful insertion
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
