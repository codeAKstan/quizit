<?php
session_start();

include "db_conn.php";

try {
    
    $userId = $_SESSION['id'];

    $redeemPoints = $_POST['redeem_points'];

    // Query the database to get the user's current points and redeemed points based on their ID
    $sql = "SELECT points, redeemed_points FROM users WHERE id = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $user = $stmt->fetch();
    $currentPoints = $user['points'];
    $redeemedPoints = $user['redeemed_points'];

    $requiredPoints = 20000;
    if ($currentPoints < $requiredPoints) {
        echo "<p style='background-color: #ffcccc; color: #ff0000;'>You don't have enough points to redeem.</p>";
        exit;
    }

    // Deduct the redeem points from the user's current points
    $newPoints = $currentPoints - $redeemPoints;

    // Add the redeemed points to the user's existing redeemed points
    $newRedeemedPoints = $redeemedPoints + $redeemPoints;

    // Update the user's points and redeemed points in the database
    $updateSql = "UPDATE users SET points = :newPoints, redeemed_points = :newRedeemedPoints WHERE id = :userId";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bindParam(':newPoints', $newPoints);
    $updateStmt->bindParam(':newRedeemedPoints', $newRedeemedPoints);
    $updateStmt->bindParam(':userId', $userId);
    $updateStmt->execute();

    // Display a success message to the user
    echo "<p style='background-color: #ccffcc; color: #008000;'>Points redeemed successfully. Your new points balance is: " . $newPoints . "</p>";


} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}

// Close the database connection
$conn = null;
exit;
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
