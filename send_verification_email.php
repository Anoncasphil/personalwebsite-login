<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["email"]) && isset($_POST["code"])) {
        $to_email = $_POST["email"];
        $subject = "Verification Code for Password Reset";
        $code = $_POST["code"];
        $message = "Your verification code is: " . $code;
        $headers = "From: your_email@example.com"; // Change this to your email address

        if (mail($to_email, $subject, $message, $headers)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "message" => "Email sending failed."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Invalid request."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method."));
}
?>
