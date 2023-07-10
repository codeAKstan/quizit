<?php
include 'db_conn.php';
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>


<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
    <title>Admin dashboard</title>
</head>
<style>
        body{
            background-color: rgba(173, 211, 232, 0.2);
            color: #3C91E6;
        }
        table th{
            color: #3C91E6;
        }
    </style>
<body>
    
</body>
</html>
    <div class="container-fluid">
    <h3 class="my-5">Welcome admin <?=$_SESSION['username']?></h3>
    <button class="btn btn-primary my-2"><a href="create.php" class="text-light">
        <i class="fas fa-plus">add user</i></a></button>
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">s/n</th>
          <!-- <th scope="col">Fullname</th> -->
          <th scope="col">username</th>
          <!-- <th scope="col">password</th> -->
          <th scope="col">email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Points</th>
          <th scope="col">Bank</th>
          <th scope="col">AcctNo</th>
          <th scope="col">AcctName</th>
          <th scope="col">operation</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM `users`";
        $result = $conn->prepare($sql);
        if ($result->execute()) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                // $fname = $row['fname'];
                $uname = $row['username'];
                // $pass = $row['password'];
                $email = $row['email'];
                $number = $row['number'];
                $points = $row['points'];
                $bankName = $row['bank_name'];
                $accountNumber = $row['account_number'];
                $accountName = $row['account_name'];
                ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <!-- <td><?php echo $fname; ?></td> -->
                    <td><?php echo $uname; ?></td>
                    <!-- <td><?php echo $pass; ?></td> -->
                    <td><?php echo $email; ?></td>
                    <td><?php echo $number; ?></td>
                    <td><?php echo $points; ?></td>
                    <td><?php echo $bankName; ?></td>
                    <td><?php echo $accountNumber; ?></td>
                    <td><?php echo $accountName; ?></td>
                    <td>
                        <button class="btn btn-primary">
                            <a href="withdraw-point.php?id=<?php echo $id; ?>" class="btn btn-primary btn-sm">Approve withdraw</a></button>
                        <button class="btn btn-danger">
                            <a href="delete_user.php?id=<?php echo $id; ?>" class="btn btn-danger btn-sm">Delete</a></button>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
      </tbody>
    </table>
    </div>
<?php } else {
    header("Location: admin-login.php");
    exit;
} ?>
