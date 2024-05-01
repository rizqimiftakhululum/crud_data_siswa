<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
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
			<a class="navbar-brand ms-5 fw-bold" href="index.php">Daftar Siswa</a>
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
	<section class="jumbotron jumbotron-fluid  mt-5 flex-fill mb-1">

		<!-- Tambah Data -->
		<div class="row mt-5 justify-content-center">
			<div class="col-lg-6 text-center">
				<button type="button" class="btn btn-info mb-3 shadow "><a href="tambah.php" class="text-decoration-none text-white fw-bold">Tambah Data Siswa➕</a>
				</button>
			</div>
		</div>
		<!-- Akhir Tambah Data -->

		<!-- Pencarian -->
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<form action="" method="post" class="mt-0">
					<div class="input-group">
						<input type="text" name="keyword" class="form-control" placeholder="Cari Nama/id Siswa 🔍..." aria-label="Recipient's username" aria-describedby="button-addon2" name="keyword" id="keyword" autocomplete="off">
						<button class="btn btn-info text-white" type="submit" name="cari">Cari</button>
					</div>
				</form>
			</div>
		</div>
		<!-- Akhir Pencarian -->

		<!-- Daftar Siswa -->
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<h3 class="mt-3 text-center">Daftar Nama Siswa</h3>
				<?php $i = 1; ?>
				<?php foreach ($mahasiswa as $row) : ?>
					<ul class="list-group">
						<li class="list-group-item">
							<?= $row["nama"]; ?>
							<a href="hapus.php?id=<?= $row["id"]; ?>" class="badge text-bg-danger float-end ms-2" onclick="return confirm('yakin?')">hapus</a>
							<a href="ubah.php?id=<?= $row["id"]; ?>" class="badge text-bg-success float-end ms-2">ubah</a>
							<a href="detail.php?id=<?= $row["id"]; ?>" class="badge text-bg-primary float-end ms-2">detail</a>
						</li>
					</ul>
					<?php $i++; ?>
				<?php endforeach; ?>
			</div>
		</div>
		<!-- Akhir Daftar Siswa -->

	</section>
	<!-- Akhir Content -->

	<!-- footer -->
	<footer class="bg-info text-white shadow-lg text-center py-2 mt-auto">
		<p>Dibuat<i class="bi bi-emoji-smile-upside-down"></i> oleh <a href="index.php" class="text-white fw-bold">Kelompok Pomo</a></p>
	</footer>
	<!-- akhir footer -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>