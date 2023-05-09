
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
    		<h4 style="color:green;">PASSWORD RECOVERY LINK SENT TO YOUR EMAIL</h4><br>
		  
		</form>
		</div>
    </div>
</body>
</html>