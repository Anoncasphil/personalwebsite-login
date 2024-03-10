<?php
// Your PHP code for sending emails
// Example: Send email using PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Email subject
$subject = "WEBSITE QUERY";

// Email body
$body = "Hello,\n\n";
$body .= "You have received a message from the website:\n\n";
$body .= "Name: $name\n";
$body .= "Email: $email\n\n";
$body .= "Message:\n$message\n\n";
$body .= "Thank you,\n";

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'antoineochea2@gmail.com'; // Your Gmail email address
    $mail->Password = 'kuzkhbdgpczqrgwh'; // Your Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient settings
    $mail->setFrom($email, $name);
    $mail->addAddress('antoineochea0321@gmail.com'); // Recipient email address
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    $mail->send();

    // Send a JSON response indicating success
    $response = array('status' => 'success', 'message' => 'Email sent successfully!');
    echo json_encode($response);

} catch (Exception $e) {
    // Send a JSON response indicating error
    $response = array('status' => 'error', 'message' => 'Email sending failed. Error: ' . $mail->ErrorInfo);
    echo json_encode($response);
}
?>
