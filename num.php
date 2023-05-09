<?php

// Load PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// SMTP configuration
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'your-email@gmail.com';
$mail->Password = 'your-email-password';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Email content
$to_email = "user-email@example.com";
$subject = "Password Reset Request";
$message = "Please click on the following link to reset your password: <a href='http://example.com/reset-password.php?email=".urlencode($to_email)."'>http://example.com/reset-password.php?email=".urlencode($to_email)."</a>";
$headers = "From: your-email@gmail.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

// Send email
$mail->setFrom('your-email@gmail.com', 'Your Name');
$mail->addAddress($to_email);
$mail->Subject = $subject;
$mail->Body = $message;
$mail->isHTML(true);

if($mail->send()) {
    echo 'Password reset link has been sent to your email.';
} else {
    echo 'Unable to send email. Please try again.';
}

?>
<?php
// Set up database connection
include "db_conn.php";

// If the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user's email address from the form
    $email = $_POST['email'];

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
        die("Email not found.");
    }

    // Check if the email exists in the resetpass table
    $stmt = $conn->prepare("SELECT * FROM resetpass WHERE email = ?");
    $stmt->execute([$email]);
    $resetpass = $stmt->fetch(PDO::FETCH_ASSOC);

    // Generate a random token for the password reset link
    $token = random_int(100000,999999);

    if ($resetpass) {
        // If the email already exists, update the token
        $stmt = $conn->prepare("UPDATE resetpass SET token = ? WHERE email = ?");
        $stmt->execute([$token, $email]);
    } else {
        // If the email does not exist, insert a new record with a new token
        $stmt = $conn->prepare("INSERT INTO resetpass (email, token) VALUES (?, ?)");
        $stmt->execute([$email, $token]);
    }

    // Create the email message
    $to = $email;
    $subject = "Password Reset";
    $message = "Dear ".$email ."we have recieved a password reset request from you.\n";
    $message .= "To reset your password, please click the following link:\n\n";
    $message .= "http://localhost/quizy/password-reset-code.php?token=$token";

    // Send the email using PHP's mail() function
    $headers = 'From: quizit@quizyit.com.ng' . "\r\n" .
        'Reply-To: quizit@quizyit.com.ng' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $success = mail($to, $subject, $message, $headers);

    // Display a success or error message
    if ($success) {
        $msg = "<h4 style='color:green;'>Password reset email sent to $email.</h4>.";
    } else {
        $error = "<h4 style='color:red;'>Error sending password reset email.</h4>";
    }
}
