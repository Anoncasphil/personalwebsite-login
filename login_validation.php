<?php
include('db_connection.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: error.php");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["users"] = "yes";
                $_SESSION["user_id"] = $user["user_id"];
                $_SESSION["email"] = $user["email"];
                header("Location: index.php");
                exit();
            }
        }
    }

    // If credentials are invalid or user not found, display error notification
    displayNotification("Invalid credentials. Please try again.");

    // Redirect back to login page
    header("Location: login.php");
    exit();
}
?>
