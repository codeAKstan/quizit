<?php
// Connect to the database
include "db_conn.php";
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['fname']) &&isset($_SESSION['last_login'])) {
    // Get the user ID from the session
    // Retrieve the user's current point value
    $id = $_SESSION['id'];
    $query = "UPDATE users SET last_login = NOW() WHERE id = $id";
    // execute the query using your database connection
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $query = "SELECT points FROM users WHERE id = $id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $points = $row['points'];

    // Check if a day has passed since the user last logged in
    $last_login = $_SESSION['last_login']; 
    $current_date = date('Y-m-d');
    if ($current_date > $last_login) {
        // Update the user's point value
        $new_points = $points + 10; // Increment the user's points by 10
        $query = "UPDATE users SET points = $new_points WHERE id = $id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        // Update the last login date in the session
        $_SESSION['last_login'] = $current_date;
        
        // Update the points variable
        $points = $new_points;
    }
}

?>
