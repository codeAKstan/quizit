<?php
// Set up database connection
include "db_conn.php";

// Check if the token parameter is set
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid
    $stmt = $conn->prepare("SELECT email FROM resetpass WHERE token = ?");
    $stmt->execute([$token]);
    $resetpass = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$resetpass) {
        die("Invalid token.");
    }

    // If the form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the new password and confirm password from the form
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate the form data
        if ($new_password !== $confirm_password) {
            $error = "<h4 style='color:red;'>Passwords do not match.</h4>";
            
        } else {
            // Update the user's password in the "users" table
            $email = $resetpass['email'];
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->execute([$hashed_password, $email]);

            // Delete the record from the "resetpass" table
            $stmt = $conn->prepare("DELETE FROM resetpass WHERE email = ?");
            $stmt->execute([$email]);

            // Display a success message and redirect to the login page
            $msg = "<h4 style='color:green;'>Password reset successfully.</h4>";
            header("Location: login.php");
            exit();
        }
    }
} else {
    die("Token not found.");
}
?>

<!-- Display the password reset form -->


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset password comfirmation</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="shortcut icon" href="img/ideas.png" type="image/x-icon">
</head>
<body>
<div class="login-page">
    	
    	<div class="form">
      <?php if (isset($msg)) {
				  echo $msg;} ?>
			<?php if (isset($error)) {
				  echo $error;} ?>
  <h4>Reset Password Confirmation</h4>
  <form method="post">
    <input type="password" name="new_password" placeholder="New password" required><br><br>
    <input type="password" name="confirm_password" placeholder="comfirm password" required><br><br>
    
    <div>
		    <input type="password" 
				   placeholder="Password"
				   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
    			   title="Must contain at least
				    one number and one uppercase and lowercase letter,
					 and at least 8 or more characters"
		           name="pass"
				   id="psw">
		  </div>
		  <div style="float:left;">
		  <label for="viewPass" style="color:grey;">View password</label>
		  <input type="checkbox" name="psw" id="psw" onclick="showPass()" style="width:10%;">
		  </div>
		  <div id="message">
			<h3>Password must contain the following:</h3>
			<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
			<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
			<p id="number" class="invalid">A <b>number</b></p>
			<p id="length" class="invalid">Minimum <b>8 characters</b></p>
			</div>
		  <div><br>
    <button type="submit" name="password-reset-link">Reset Password</button>
  </form>
      </div>
</div>
    </body>
</html>