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
	<title>Halaman Detail</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- bootstrap icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-lg fixed-top ">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 fw-bold" href="index.php">Halaman Detail Data Siswa!</a>
		</div>
	</nav>
	<!-- Akhir Navbar -->

	<!-- Content -->
	<section class="jumbotron jumbotron-fluid text-center mt-5 flex-fill mb-1">
		<?php $i = 1; ?>
		<?php foreach ($mahasiswa as $row) : ?>
			<div class="card mt-5 mb-5 mx-auto shadow" style="width: 18em;">
				<img src="img/<?= $row["gambar"]; ?>" class="card-img-top mx-auto mt-2" style="width: 120px;" alt="foto">
				<div class="card-body">
					<h5 class="card-title">Data Siswa</h5>
					<p class="card-text"><span class="fw-bold text-secondary"><?= $row["nama"]; ?></span></p>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">Alamat : <span class="fw-bold text-secondary"><?= $row["alamat"]; ?></span></li>
					<li class="list-group-item">Tgl Lahir: <span class="fw-bold text-secondary"><?= $row["tgl_lahir"]; ?></span></li>
					<li class="list-group-item">No.Telp : <span class="fw-bold text-secondary"><?= $row["telepon"]; ?></span></li>
					<li class="list-group-item d-none sembunyi">Nama Ayah: <span class="fw-bold text-secondary"><?= $row["nama_ortu"]; ?></span></li>
					<li class="list-group-item d-none sembunyi">Asal sekolah : <span class="fw-bold text-secondary"><?= $row["asal_sekolah"]; ?></span></li>
					<li class="list-group-item d-none sembunyi">Alamat Sekolah: <span class="fw-bold text-secondary"><?= $row["alamat_sekolah"]; ?></span></li>
				</ul>
				<div class="card-body">
					<a href="#" class="card-link lihat-semua" onclick="toggleVisibility(this); return false;">Lihat Semua</a>
					<a href="biodata.php" class="card-link">kembali</a>
				</div>
			</div>
			<?php $i++; ?>
		<?php endforeach; ?>
	</section>
	<!-- Akhir Content -->
	<!-- footer -->
	<footer class="bg-info text-white shadow-lg text-center py-2 mt-auto">
		<p>Dibuat<i class="bi bi-emoji-smile-upside-down"></i> oleh <a href="index.php" class="text-white fw-bold">Kelompok Pomo</a></p>
	</footer>
	<!-- akhir footer -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script>
		function toggleVisibility(link) {
			// Mendapatkan card element yang berisi tombol yang diklik
			var card = link.closest('.card');
			// Mendapatkan semua elemen dengan class 'sembunyi' di dalam card tersebut
			var elements = card.querySelectorAll('.sembunyi');
			// Looping melalui semua elemen dan menghapus kelas 'd-none'
			elements.forEach(function(element) {
				element.classList.remove('d-none');
			});
			// Menghapus tombol Lihat Semua di card yang sama
			card.querySelector('.lihat-semua').style.display = 'none';
		}
	</script>
</body>