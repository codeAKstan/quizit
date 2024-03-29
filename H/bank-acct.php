<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank account</title>
    <link rel="shortcut icon" href="../img/ideas.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: rgba(173, 211, 232, 0.2);
    }
</style>
<body>
    <form action="store-bank-data.php" class="container m-5" method="post">
        <h3>Update withdrawal account</h3>
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
    <select class="form-select " name="bank_name" id="bank_name">
          <option selected>Select bank </option>
          <option value="access">Access Bank</option>
          <option value="diamond"> Access Bank PLC (Diamond)</option>
          <option value="citibank">Citibank</option>
          <option value="ecobank">Ecobank</option>
          <option value="fidelity">Fidelity Bank</option>
          <option value="firstbank">First Bank</option>
          <option value="fcmb">First City Monument Bank (FCMB)</option>
          <option value="gtb">Guaranty Trust Bank (GTB)</option>
          <option value="heritage">Heritage Bank</option>
          <option value="keystone">Keystone Bank</option>
          <option value="keystone">Kuda</option>
          <option value="keystone">Moniepoint</option>
          <option value="polaris">Opay Digital Services Limited</option>
          <option value="providus">Providus Bank</option>
          <option value="stanbic">Stanbic IBTC Bank</option>
          <option value="standard">Standard Chartered Bank</option>
          <option value="sterling">Sterling Bank</option>
          <option value="suntrust">Suntrust Bank</option>
          <option value="union">Union Bank</option>
          <option value="uba">United Bank for Africa (UBA)</option>
          <option value="unity">Unity Bank</option>
          <option value="wema">Wema Bank</option>
          <option value="zenith">Zenith Bank</option>
</select> <br>
<input class="form-control"type="text" name="account_name" required placeholder="Account Name" ><br>
<input class="form-control" type="number" name="account_number" required id="account_number" placeholder="Account Number"><br>
<button class="btn btn-primary">Submit</button>
    </form>
    
</body>
</html>