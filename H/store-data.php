<?php
session_start();

if (isset($_POST['coin']) && 
    isset($_POST['network']) &&
    isset($_POST['address'])) {

    include "../db_conn.php";

    // Retrieve the form data
    $coin = $_POST['coin'];
    $net = $_POST['network'];
    $address = $_POST['address'];
    $userId = $_SESSION['id']; 

    $sql = "UPDATE users SET coin = ?, network = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$coin, $net, $address, $userId]);

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        $em = "Wallet address added successfully.";
        header("Location: crypto.php?success=$em");
    } else {
        $em = "Failed to save wallet address.";
        header("Location: crypto.php?error=$em");
    }

    
    $conn = null;

} else {
    header("Location: ../login.php?error=error");
    exit;
}



