<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/css/all.css">
    <title>footer</title>
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        footer{
            background-color: black;
            color: white;
            padding: 20px 20px 5px 5px;
            position: fixed;
            bottom:0;
            width:100%;
            height: 150px;
        }
        footer ul{
            list-style-type: none;
        }
        footer p{
            text-align: right;
            color: #898A9B;
            font-family: 'Courier New', Courier, monospace;
        }
        footer #ig{
            background-image: linear-gradient(to bottom right, #feda75, #fa7e1e, #d62976, #4f5bd5);
            border-radius: 3px;

        }
        footer li a i{
            font-size: 20px;
        }
        form{
            position: absolute;
            left: 150px;
            top: 30px;
        }
        input{
            padding: 10px;
            background-color: transparent;
            outline: none;
            border: #898A9B 1px solid;
            color: white;
        }
        .btn{
            padding: 6px;
            color: #4f5bd5;
            background-color: #898A9B;
            border: none;
            cursor: pointer;
            
        }
    </style>
</head>
<body>
    <footer>
        <ul>
            <li><a href="#"><i class="fab fa-facebook"></i></a></li><br>
            <li><a href="#"><i class="fab fa-twitter" style="color:rgb(125, 167, 245);"></i></a></li><br>
            <li><a href="#"><i class="fab fa-instagram" id="ig"></i></a></li><br>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
        </ul>
        <form action="">
            <h4>CONTACT US</h4>
            <input type="email" name="email" id="email" placeholder="Enter your email...">
            <a href="mailto:quizit@quizyit.com.ng"> <i class="fas fa-arrow-right btn"></i></a>
        
        <p>Copyright&copy; 2023 quizyit</p>
        </form>
    </footer>
</body>
</html>