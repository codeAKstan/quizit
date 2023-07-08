<?php
session_start();

if (isset($_POST['bank_name']) && 
    isset($_POST['account_number']) &&
    isset($_POST['account_name'])) {

    include "../db_conn.php";

    // Retrieve the form data
    $bankName = $_POST['bank_name'];
    $accountNumber = $_POST['account_number'];
    $accountName = $_POST['account_name'];
    $userId = $_SESSION['id']; 

    $sql = "UPDATE users SET bank_name = ?, account_number = ?, account_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$bankName, $accountNumber, $accountName, $userId]);

    // Check if the update was successful
    if ($stmt->rowCount() > 0) {
        $em = "Bank details saved successfully.";
        header("Location: bank-acct.php?success=$em");
    } else {
        $em = "Failed to save bank details.";
        header("Location: bank-acct.php?error=$em");
    }

    
    $conn = null;

} else {
    header("Location: ../login.php?error=error");
    exit;
}



