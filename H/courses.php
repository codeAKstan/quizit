<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['points'])) {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/c1fbfe0463.js" crossorigin="anonymous"></script>
		<!-- My CSS -->
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="fonts/css/all.css">
		<link rel="shortcut icon" href="../img/ideas.png" type="image/x-icon">

		<title>Home Courses</title>
	</head>

	<body>


		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<i class='bx bxs-bulb'></i>

				<span class="text">QuizIt</span>
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="../home.php">
						<i class='bx bxs-dashboard'></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="courses.php">
						<i class='bx bxs-book-content'></i>
						<span class="text">Courses</span>
					</a>
				</li>
				<li>
					<a href="ide/ui/ide.html">
						<i class='bx bxs-truck'></i>
						<span class="text">Code Environment</span>
					</a>
				</li>
				<li>
					<a href="profile.php">
						<i class='bx bxs-user'></i>
						<span class="text">My Profile</span>
					</a>
				</li>
				<li>
			</ul>
			<ul class="side-menu">
				<li>
					<a href="#">
						<i class='bx bxs-cog'></i>
						<span class="text">Settings</span>
					</a>
				</li>
				<li>
					<a href="faqs.php">
						<i class='bx bxs-help-circle'></i>
						<span class="text">Faqs</span>
					</a>
				</li>
				<li>
					<a href="../logout.php" class="logout">
						<i class='bx bxs-log-out-circle'></i>
						<span class="text">Logout</span>
					</a>

				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->



		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu'></i>
				<a href="#" class="nav-link">Categories</a>
				<form action="#" hidden>
					<div class="form-input">
						<input type="search" placeholder="Search...">
						<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
					</div>
				</form>
				<input type="checkbox" id="switch-mode" hidden>
				<label for="switch-mode" class="switch-mode"></label>


			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
						<ul class="breadcrumb">
							<li>
								<a href="../home.php">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="../home.php">Home</a>
							</li>
						</ul>
						<h3 style="color:#3C91E6">Hello,
							<?= $_SESSION['fname'] ?>
						</h3> <br>
						<em>choose a course...</em>
					</div>

				</div>

				<div class="container">
					<div class="box">
						<h3><a href="courses/html.php">HTML</a></h3>
					</div>
					<div class="box">
						<img src="img/css-3.png" alt="">
						<h3><a href="courses/css.php">CSS</a></h3>
					</div>
					<div class="box">
						<img src="img/js.png" alt="">
						<h3><a href="courses/js.php">JAVASCRIPT</a></h3>
					</div>
					<div class="box">
						<img src="img/python.png" alt="">
						<h3><a href="courses/python.php">PYTHON</a></h3>
					</div>
					<div class="box">
						<img src="img/php.png" alt="">
						<h3><a href="courses/php.php">PHP</a></h3>
					</div>
					<div class="box">
						<img src="img/c-sharp.png" alt="">
						<h3><a href="courses/csharp.php">C#</a></h3>
					</div>
				</div>
			</main>
		</section>

		<script src="../script.js"></script>
	</body>

	</html>
<?php } else {
	header("Location: login.php");
	exit;
} ?>