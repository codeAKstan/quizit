<?php
// Import PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Set up database connection
include "db_conn.php";

// Load PHPMailer autoloader
require_once "vendor/autoload.php";

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
    $message = "Dear ".$email ."we have recieved a password reset request from you.\n";
    $message .= "To reset your password, please click the following link:\n\n";
    $message .= "https://quizyit.com.ng/password-reset-code.php?token=$token";
    // Send the email using PHPMailer
    $mail = new PHPMailer(true);

    try {
         //Server settings
         $mail->SMTPDebug = SMTP::DEBUG_OFF; // Enable verbose debug output
         $mail->isSMTP(); // Send using SMTP
         $mail->Host = 'mail.quizyit.com.ng'; // Set the SMTP server to send through
         $mail->SMTPAuth = true; // Enable SMTP authentication
         $mail->Username = 'quizit@quizyit.com.ng'; // SMTP username
         $mail->Password = 'mypassword'; // SMTP password
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
         $mail->Port = 465; // TCP port to connect to

        //Recipients
        $mail->setFrom('quizit@quizyit.com.ng', 'Quizit Support');
        $mail->addAddress($to); // Add a recipient
        $mail->addReplyTo('quizit@quizyit.com.ng', 'Quizit Support');

        //Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body = $message;

        $mail->send();
        $msg = "<h4 style='color:green;'>Password reset email sent to $email.</h4>.";
    } catch (Exception $e) {
        $error = "<h4 style='color:red;'>Error sending password reset email. " . $mail->ErrorInfo . "</h4>";
    }
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quizit Password reset</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="shortcut icon" href="img/ideas.png" type="image/x-icon">
</head>
<body>
    <div class="login-page">
    	
    	<div class="form">
		<form action="forgot-password.php" 
			  class="login-form"
    	      method="post">
              <center><img src="img/reset-password.png" alt="key"></center>
			<?php if (isset($msg)) {
				  echo $msg;} ?>
			<?php if (isset($error)) {
				  echo $error;} ?>
    		<h4>Password Recovery</h4><br>
		  <div>
		    <input type="email" 
		           placeholder="Enter registered email address "
		           name="email" required>
		  </div>	  
		  <button type="submit" name="password-reset-link">Next</button>
		</form>
		</div>
    </div>
</body>
</html>
