<?php

require 'functions.php';

if (isset($_POST["register"])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
                alert('user baru berhasil ditambahkan!');
              </script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Registrasi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- bootstrap icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-lg fixed-top ">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 fw-bold" href="index.php">Halaman Form Registrasi</a>
		</div>
	</nav>
	<!-- Akhir Navbar -->
	<!-- Content -->
	<section class="jumbotron jumbotron-fluid text-center mt-5 flex-fill mb-1">

		<!-- Form Login -->
		<form action="" method="post">
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card">
							<div class="card-body bg-info">
								<h3 class="card-title text-center fw-bold text-white">Registrasi</h3>
								<form>
									<div class="mb-3">
										<label for="username" class="form-label">Username :</label>
										<input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username kamu...">
									</div>
									<div class="mb-3">
										<label for="password" class="form-label">Password :</label>
										<input type="text" name="password" class="form-control" id="password" placeholder="Masukkan Password kamu...">
									</div>
									<div class="mb-3">
										<label for="password2" class="form-label">Konfirmasi Password :</label>
										<input type="text" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password kamu...">
									</div>
									<div class="d-grid gap-2">
										<button type="submit" name="register" class="btn btn-primary">Register!</button>
										<p class="text-secondary mt-2 fw-bold">Sudah Punya Akun?</p>
										<button type="button" class="btn btn-secondary" id="loginButton">Login!</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- Akhir Form Login -->

	</section>
	<!-- Akhir Content -->
	<!-- footer -->
	<footer class="bg-info text-white shadow-lg text-center py-2 mt-auto">
		<p>Dibuat<i class="bi bi-emoji-smile-upside-down"></i> oleh <a href="index.php" class="text-white fw-bold">Kelompok Pomo</a></p>
	</footer>
	<!-- akhir footer -->
	<script>
		document.getElementById('loginButton').addEventListener('click', function() {
			window.location.href = 'login.php';
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>