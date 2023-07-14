<?php
include "user-points.php";
// session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['points']))  {

    include "db_conn.php";
    

    $userId = $_SESSION['id'];
    $sql = "SELECT points FROM users WHERE id = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $user = $stmt->fetch();
    $currentPoints = $user['points'];
    

    $requiredPoints = 20000;
    if ($currentPoints < $requiredPoints) {
        $fname = $_SESSION['fname'];
        
        echo "<p style='background-color: #ffcccc; color: #ff0000;'>Hello <b>$fname</b> You don't have enough qp to redeem.your have ".$points ."qp</p>";
        exit;
    }
    else{
        echo "<form action='process_redeem.php' method='POST' class='mb-3'>";
        echo "Enter the number of points to redeem: <br>";
        echo "<input type='number' col='3' name='redeem_points' required class='form-control'><br> ";
        echo "<center><input type='submit' class='btn btn-primary' value='Redeem'></center>";
        echo "</form>";

    }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redeem quiz points</title>
    <script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/ideas.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
    body{
        background-color:background-color: rgba(173, 211, 232, 0.2);
        font-family: 'Courier New', Courier, monospace;
    }
</style>
<body>
</body>
</html>