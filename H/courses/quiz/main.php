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
    <title>Quiz It - Take Quiz</title>
    <link rel="shortcut icon" href="../img/ideas.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel = "stylesheet" href = "style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class = "flex">
    
    <div class = "wrapper">
        <div class = "quiz-container">
            <div class = "quiz-head">
                <h1 class = "quiz-title">Quiz It</h1>
                <div class = "quiz-score flex">
                    <span id = "correct-score"></span>/<span id = "total-question"></span>
                </div>
            </div>
            <div class = "quiz-body">
                <h2 class = "quiz-question" id = "question"></h2>
                <ul class = "quiz-options">
                    
                </ul>
                <div id = "result">
                </div>
                <center><div id = "point">
                </div></center>
            </div>
            <div class = "quiz-foot">
                <button type = "button" id = "check-answer">Check Answer</button>
                <button type = "button" id = "play-again">Play Again!</button>
            </div>
        </div>
    </div>



    <script src = "script.js"></script>
</body>
</html>
<?php }else {
	header("Location: ../../../login.php");
	exit;
} ?>