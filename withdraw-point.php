<?php
include 'db_conn.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    // Check if the user ID is provided in the query parameter
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Fetch the user data from the database based on the provided ID
        $sql = "SELECT * FROM `users` WHERE `id` = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if a user is found with the provided ID
        if ($user) {
            // Display the user details and an edit form
            ?>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
                integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
                <title>Edit User</title>
            </head>
            <body>
                <div class="container">
                    <h3>Edit User: <?php echo $user['uname']; ?></h3>
                    <form method="POST" action="update_user.php">
                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $user['fname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="uname" class="form-label">Username</label>
                            <input type="text" class="form-control" id="uname" name="uname" value="<?php echo $user['uname']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $user['pass']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </body>
            </html>
            <?php
        } else {
            // User not found, redirect to the user listing page or show an error message
            header("Location: user_list.php");
            exit;
        }
    } else {
        // No user ID provided, redirect to the user listing page or show an error message
        header("Location: user_list.php");
    }
    ?>