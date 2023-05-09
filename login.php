<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Quizit Login</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="shortcut icon" href="img/ideas.png" type="image/x-icon">
	<link rel="stylesheet" href="fonts/css/all.css">

</head>
<body>
    <div class="login-page">
    	
    	<div class="form">
		<form action="php/login.php" 
			  class="login-form"
    	      method="post">

    		<h4>QUIZIT LOGIN</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div style="color:red; background-color:#eba8aa;padding:10px;">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?><br>

		  <div>
		    <input type="text" 
		           placeholder="Username"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))?$_GET['uname']:"" ?>">
		  </div>

		  <div>
		    <input type="password" 
		           placeholder="Password"
		           name="pass"
				   id="psw">
		  </div>
		  <div style="float:left;">
			<label for="viewPass" style="color:grey;">View password</label>
			<input type="checkbox" name="psw" id="psw" onclick="showPass()" style="width:10%;">
			
		</div>
		  
		  <button type="submit">Login</button>
        <p class="message">Not registered? <a href="create.php">Create an account</a></p>
		<p class="message"><a href="forgot-password.php">Forgot password?</a></p>
		</form>
		</div>
    </div>
	<script>
		
		function showPass(){
			let x = document.getElementById("psw");
			if(x.type == "password"){
				x.type = "text";
			}
			else{
				x.type = "password"
			}
		}
	</script>
</body>
</html>