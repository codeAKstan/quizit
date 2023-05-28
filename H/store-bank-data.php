<?php
if(isset($_POST['bname']) && isset($_SESSION['id']) && isset($_SESSION['fname']) &&
isset($_POST['acctno'])){


include "../db_conn.php";

$bname = $_POST['bname'];
$acctno = $_POST['acctno'];
$selectedBank = $_POST['bname'];

$sql = "INSERT INTO users(bname, acctno) 
    	        VALUES(?,?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$bname,$acctno]);
}

?>
<!-- 
// Step 1: Establish a database connection
// $host = 'localhost';
// $username = 'your_username';
// $password = 'your_password';
// $database = 'your_database';

// $conn = new mysqli($host, $username, $password, $database);
// if ($conn->connect_error) {
//     die('Connection failed: ' . $conn->connect_error);
// }

// // Step 3: Process the form submission
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Step 4: Validate the input
//     $accountNumber = $_POST['account_number'];
//     $accountHolder = $_POST['account_holder'];
//     $bankName = $_POST['bank_name'];

//     // Perform validation checks, such as empty field checks, format checks, etc.
//     // ...

//     // Step 5: Insert data into the database
//     $sql = "INSERT INTO bank_accounts (account_number, account_holder, bank_name) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("sss", $accountNumber, $accountHolder, $bankName);
    
//     if ($stmt->execute()) {
//         echo "Bank account added successfully.";
//     } else {
//         echo "Error: " . $stmt->error;
//     }
    
//     $stmt->close();
// }

// $conn->close();
?>


<form method="POST" action="">
    <label for="account_number">Account Number:</label>
    <input type="text" name="account_number" id="account_number" required>
    
    <label for="account_holder">Account Holder:</label>
    <input type="text" name="account_holder" id="account_holder" required>
    
    <label for="bank_name">Bank Name:</label>
    <input type="text" name="bank_name" id="bank_name" required>
    
    <input type="submit" value="Submit">
</form> -->
