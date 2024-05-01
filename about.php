<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Biodata</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- bootstrap icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-lg fixed-top ">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 fw-bold" href="index.php">Tentang Kami</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse me-5" id="navbarNavDropdown">
				<ul class="navbar-nav" style="margin-left: auto">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="biodata.php">Biodata</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about.php">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
					<button type="button" class="btn btn-outline-primary p-0">
						<a class="nav-link text-danger fw-bold" href="logout.php">Logout!</a>
					</button>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Akhir Navbar -->
	<!-- Content -->
	<section class="jumbotron jumbotron-fluid mt-5 flex-fill mb-1">

		<!-- Jumbotron -->
		<div class="container">
			<div class="container my-5 bg-light border rounded-3 text-center">
				<h1 class="display-5 fw-bold">Kelompok Pomo</h1>
				<img src="img/logo.png" alt="foto" width="200" class="">
				<p class="col-md-8 fs-6 mx-auto mt-1">oi asuuu Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, fugiat non cum quod et accusantium dolorem eum incidunt sed sit.</p>
			</div>
		</div>
		<!-- Akhir Jumbotron -->

	</section>
	<!-- Akhir Content -->
	<!-- footer -->
	<footer class="bg-info text-white shadow-lg text-center py-0 mt-auto">
		<p>Dibuat<i class="bi bi-emoji-smile-upside-down"></i> oleh <a href="index.php" class="text-white fw-bold">Kelompok Pomo</a></p>
	</footer>
	<!-- akhir footer -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>