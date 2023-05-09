<?php 
include "../user-points.php";

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['last_login']) 
&& isset($_SESSION['withdraw'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="shortcut icon" href="img/ideas.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

    <style>
        body{
            background-image: linear-gradient(to bottom right, #353274, #54346B);
        }
        .user{
            padding: 20px;
            color: #898A9B;
            text-transform: capitalize;
            font-size: 15px;
        }
         img{
            font-size: 50px;
            border: 3px solid white;
            border-radius: 50%;
            size: 30px;
        }
        ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
            
        }
        ul li{
            background-color: rgba(45, 51, 97, 0.2);
            display:  inline-block;
            margin: 6px;
            padding: 20px;
            border-radius: 5px;
            color: #898A9B;

        }
        .second ul{
            margin: 0;
            padding: 0;
            list-style-type: none;
        }
        .second ul li{
            display: block;
            padding: 20px;
            
        }
        .second ul li a{
            text-decoration: none;
            color: #898A9B;
        }
        footer{
            float: right;
            line-height: 40px;
            
        }
        footer p{
            padding-bottom: 2px;
            color:#898A9B ;
        }
        i{
            color: black;
        }
        /* for desktop view */
        @media screen and (min-width: 768px) {
            ul li{
            background-color: rgba(45, 51, 97, 0.2);
            display:  inline-flexbox;
            width: 500px;
            margin: 6px;
            margin-left: 20px;
            padding: 40px;
            border-radius: 5px;
            color: #898A9B; 
            
        }
        .second ul li{
            display: block;
            padding: 20px;
            width: 1300px;
            
        }
        }
    </style>
</head>
<body>
    <div class="user">
        <img src="../img/programmer.png" alt="" onload="goodDay()"><br><br>
        <h3 id="greet" style="display:inline;"></h3> 
        <h3 style="display:inline;"><?=$_SESSION['fname']?></h3>
    </div>
    <p><a href="../home.php"><i class="fas fa-home" style="color:#3C91E6;margin-left:20px;"></i></a></p>
    <div>
        <ul>
            <li><b><center style="font-size:30px;"><?php echo ($points);?></center><br><i class="fas fa-coins" style="color:#FFD700;"> Points available</i> </b></li>
            <li><b><center style="font-size:30px;"><?=$_SESSION['withdraw']?></center> <br> <i class='fa fa-money' style="color:green;"> Points withdrawn</i></b></li>
        </ul>
    </div>
    <div class="second">
        <ul>
            <li><a href=""><span class="iconify" data-icon="bx:money-withdraw" style="color:green;"> </span> Withdraw</a></li>
            <li><a href=""><i class='bx bxs-bank' > <span style='color:#898A9B'>Bank Account</span></i></a></li>
            <li><a href=""><i class="bx bxs-cog"> <span style='color:#898A9B'>Settings </span></i></a></li>
            <li><a href="../logout.php"><i class="bx bxs-log-out-circle" style="color:#990000;"> Logout</i> </a></li>
        </ul>
        
    </div>
    <footer>
        <p>Copyright&copy; 2023 <span style="font-variant:small-caps;">quizyit</span></p>
    </footer>
</body>
</html>
<script>
    var now = new Date();
    var hrs =now.getHours();
    var msg = "";

    function goodDay(){
        if (hrs > 0) msg = "Good morning";
        if (hrs > 12) msg = "Good Afternoon";
        if (hrs > 17) msg = "Good evening";
        if (hrs > 22) msg = "Go to bed";
        document.getElementById("greet").innerHTML = msg;

    }
</script>
<?php }else {
	header("Location: ../login.php");
	exit;
} ?>