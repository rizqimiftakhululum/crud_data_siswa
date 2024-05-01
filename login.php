<?php
session_start();

// cek cookie
if (isset($_COOKIE['login'])) {
	if ($_COOKIE['login'] == 'true') {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

require 'functions.php';

if (isset($_POST['login'])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE
                            username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1) {
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if (isset($_POST['remember'])) {
				// buat cookie
				setcookie('login', 'true', time() + 60);
			}


			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}

?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- bootstrap icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-lg fixed-top ">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 fw-bold" href="index.php">Halaman Form Login</a>
		</div>
	</nav>
	<!-- Akhir Navbar -->
	<!-- Content -->
	<section class="jumbotron jumbotron-fluid text-center mt-5 flex-fill mb-1">

		<!-- Form Login -->
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-body bg-info">
							<h3 class="card-title text-center fw-bold text-white">Login</h3>
							<?php if (isset($error)) : ?>
								<p style="color: red; font-style: italic;">username / password salah</p>
							<?php endif; ?>
							<form action="" method="post">
								<div class="mb-3">
									<label for="username" class="form-label">Username :</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username kamu...">
								</div>
								<div class="mb-3">
									<label for="password" class="form-label">Password :</label>
									<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password kamu...">
								</div>
								<div class="d-grid gap-2">
									<button type="submit" name="login" class="btn btn-primary">Login</button>
									<p class="text-secondary mt-2 fw-bold">Belum Punya Akun?</p>
									<button type="button" class="btn btn-secondary" id="registerButton">Register</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Akhir Form Login -->

	</section>
	<!-- Akhir Content -->
	<!-- footer -->
	<footer class="bg-info text-white shadow-lg text-center py-2 mt-auto">
		<p>Dibuat<i class="bi bi-emoji-smile-upside-down"></i> oleh <a href="index.php" class="text-white fw-bold">Kelompok Pomo</a></p>
	</footer>
	<!-- akhir footer -->
	<script>
		document.getElementById('registerButton').addEventListener('click', function() {
			window.location.href = 'registrasi.php';
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>