<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['points'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course HTML</title>
    <link rel="shortcut icon" href="img/ideas.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</head>
<style>
    body{
        background-color: #3C91E6;
        font-family: monospace;
    }
    div h3{
        color: black;
        font-size: 50px;
        text-align: center;

    }
    p{
        text-align: center;
    }
    
    button{
        padding: 20px;
        background-color: black;
        text-emphasis-color: white;
        border-radius: 35px;
        outline: none;
        border:none;
        cursor: pointer;
        color: white;
        font-size: 13px;
        width:150px;
       
    }
    span{
        color:red;
    }
</style>
<body>
    <div class="container">
        <h3>HTML</h3>
        <p>Hyper Text <span><b>Markup</b></span> language</p>
        
        <center><button>Learn HTML</button> <br><br>
        <button>Take Quiz</button></center>
        
    </div>
    <?php include(
        'header.php'
    ); ?>
    
</body>
</html>
<?php }else {
	header("Location: login.php");
	exit;
} ?>