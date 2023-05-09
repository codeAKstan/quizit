
<!doctype HTML5>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin login</title>
</head>
<body>
<form class="container my-5 border" method="post" action="php/ad-log.php" >
    <div class="mb-3">
        <h3 class="text-center my-4">ADMIN LOGIN</h3>
        <?php if(isset($_GET['error'])){ ?>
    		<div style="color:red; background-color:#eba8aa;padding:10px;">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?><br>
    </div>
  <div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" class="form-control" name="uname" autocomplete="off">

  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary my-2">Submit</button>
</form>
</body>
</html>