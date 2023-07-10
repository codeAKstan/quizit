<?php 
include "../user-points.php";

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['last_login']) 
&& isset($_SESSION['withdraw'])) {
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
  <title>My Profile</title>
  <link rel="shortcut icon" href="../img/ideas.png" type="image/x-icon">
</head>
<style>
  * {
    margin: 0;
    padding: 0
}

body {
    background-color: rgba(173, 211, 232, 0.2);
    font-family: 'Courier New', Courier, monospace;
}

.card {
    width: 350px;
    background-color: #3C91E6;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%;
    background-color: rgba(173, 211, 232, 0.2);
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #fff;
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: rgba(173, 211, 232, 0.2);
    color: white;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
a{
    color:white;
    text-decoration:none;
}
</style>
<body>
  <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
      <div class=" image d-flex flex-column justify-content-center align-items-center"> 
       <button class="btn btn-secondary"> 
         <img src="../img/programmer.png" height="100" width="100" />
       </button> <span class="name mt-3">@<?=$_SESSION['fname']?></span> 
       <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
       <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
         <span class="number"><i class="fas fa-coins" style="color:#FFD700;"> </i> Points available<b>
                <center style="font-size:30px;color:#4387CC;"><?php echo ($points);?>qp</center> <br>
         <span style="color:#4387CC;text-align:center;">
                 <a href="../redeem.php"><i class="fa fa-exchange" style="color:#fff;text-align:center;">Redeem</i></a></span>
         </span> </div> <div class=" d-flex mt-2"> 
           <button class="btn1 btn-dark"><a href="bank-acct.php"><i class="fas fa-bank"></i> Bank Account</a></button> </div> 
         <div class="text mt-3"> 
          <div class=" d-flex mt-2"> 
            <button class="btn1 btn-dark"><a href=""><i class="bx bxs-cog"></i> Settings</a></button> </div> 
          <div class="text mt-3">
            <div class=" d-flex mt-2"> 
              <button class="btn1 btn-dark"><a href="../logout.php">
                <i class="bx bxs-log-out-circle" style="color:#990000;"> Logout</i> </a></button> </div> 
            <div class="text mt-3">
            <div class=" px-2 rounded mt-4 date "> 
           <span class="join">&copy 2023 quizyit</span> 
         </div> 
       </div> 
     </div>
 </div>
</body>
</html>
<?php }else {
	header("Location: ../login.php");
	exit;
} ?>