<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose crypto</title>
    <link rel="shortcut icon" href="../img/ideas.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>

<body>
<form action="store-data.php" class="container m-4" method="post">
    <h3>Add Crypto address</h3>
    <?php if(isset($_GET['error'])){ ?>
    		<div style="color:red; background-color:#eba8aa;padding:10px;">
			  <?php echo $_GET['error']; ?>
			</div>
		    <?php } ?><br>

        <?php if(isset($_GET['success'])){ ?>
        <div style="color:green;background-color:#b9eba8;padding:10px;">
            <?php echo $_GET['success']; ?>
        </div>
        <?php } ?><br>
    <h5>Select coin</h5>
    <select class="form-select" name="coin" id="coin" style="width: 500px;">
        <option value="flow" selected>Flow</option>
        <option value="USDT">USDT</option>
        <option value="BNB"><i>BNB</i></option>
    </select>
    <h5>Select network</h5>
    <select class="form-select" name="network" id="network" style="width: 500px;">
        <option value="BEP-20" selected>BSC</option>
        <option value="TRC20">TRX</option>
        <option value="ERC-20"><i>ETH</i></option>
    </select>
    <h5>Address</h5>
    <input class="form-control"type="text" name="address" style="width: 500px;" required placeholder="Paste Address Here" >
    <br><button class="btn btn-primary">submit</button>
</form>
</body>
</html>
