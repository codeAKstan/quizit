<?php
session_start();

if (isset($_SESSION['id']) && isset($_POST['points'])) {
    include "../../../db_conn.php";


    try {
       
        $userId = $_SESSION['id'];

        // Retrieve the earned points from the AJAX request
        $earnedPoints = $_POST['points'];

        // Prepare and execute the SQL statement to update the user's points in the database
        $sql = "UPDATE users SET points = points + :earnedPoints WHERE id = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':earnedPoints', $earnedPoints);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        echo "Points saved successfully.";

    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
}
?>
