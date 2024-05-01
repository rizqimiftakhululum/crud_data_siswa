<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


	// cek keberhasilan data berhasil di tambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'biodata.php';
            </script>";
	} else {
		echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'biodata.php';
            </script>";
	}
}

?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Tambah Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- bootstrap icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column min-vh-100">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-lg fixed-top ">
		<div class="container-fluid">
			<a class="navbar-brand ms-5 fw-bold" href="index.php">Tambah Data Siswa</a>
		</div>
	</nav>
	<!-- Akhir Navbar -->
	<!-- Content -->
	<section class="jumbotron jumbotron-fluid mt-5 flex-fill mb-1">

		<!-- Card -->
		<form action="" method="post" enctype="multipart/form-data">

			<div class="card mt-5 mb-5 mx-auto shadow" style="width: 75%;">
				<div class="card-header">
					<h1 class="fs-5 text-center">Tambah Data Siswa</h1>
				</div>
				<form action="">
					<div class="card-body">
						<div class="mb-3">
							<label for="nama" class="form-label">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="tgl_lahir" class="form-label">Tgl Lahir</label>
							<input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="telepon" class="form-label">Telepon</label>
							<input type="text" class="form-control" id="telepon" name="telepon" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="nama_ortu" class="form-label">Nama Ortu</label>
							<input type="text" class="form-control" id="nama_ortu" name="nama_ortu" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="asal_sekolah" class="form-label">Asal Sekolah</label>
							<input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="alamat_sekolah" class="form-label">Alamat Sekolah</label>
							<input type="text" class="form-control" id="alamat_sekolah" name="alamat_sekolah" autocomplete="off">
						</div>
						<div class="mb-3">
							<label for="gambar" class="form-label">Foto</label>
							<input type="file" class="form-control" id="gambar" name="gambar" autocomplete="off">
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" name="submit" class="btn btn-info text-white">Tambah Data</button>
						<button type="button" class="btn btn-secondary" id="closeHalaman">Keluar</button>
					</div>
				</form>
			</div>
		</form>

		<!-- Akhir Card -->

	</section>
	<!-- Akhir Content -->
	<!-- footer -->
	<footer class="bg-info text-white shadow-lg text-center py-0 mt-auto">
		<p>Dibuat<i class="bi bi-emoji-smile-upside-down"></i> oleh <a href="index.php" class="text-white fw-bold">Kelompok Pomo</a></p>
	</footer>
	<!-- akhir footer -->

	<script>
		document.getElementById('closeHalaman').addEventListener('click', function() {
			window.location.href = 'biodata.php';
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>