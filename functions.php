<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "utsimk");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$nama_ortu = htmlspecialchars($data["nama_ortu"]);
	$asal_sekolah = htmlspecialchars($data["asal_sekolah"]);
	$alamat_sekolah = htmlspecialchars($data["alamat_sekolah"]);


	// upload gambar
	$gambar = upload();
	if ($gambar === false) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO mahasiswa
                VALUES
            ('', '$nama', '$alamat', '$tgl_lahir', '$telepon', '$nama_ortu', '$asal_sekolah', '$alamat_sekolah', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "
            <script>
                alert('pilih gambar terlebih dahulu');
            </script>";
		return false;
	}
	// cek apakah yang di upload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "
            <script>
                alert('yang anda upload bukan gambar!');
            </script>";
		return false;
	}
	// cek jika ukuran gambar terlalu besar
	if ($ukuranFile > 1000000) {
		echo "
            <script>
                alert('ukuran gambar terlalu besar!');
            </script>";
		return false;
	}
	// lolos pengecekan gambar siap diupload
	// generate nama gambar baru
	$namafileBaru = uniqid();
	$namafileBaru .= '.';
	$namafileBaru .= $ekstensiGambar;


	move_uploaded_file($tmpName, 'img/' . $namafileBaru);
	return $namafileBaru;
}

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tgl_lahir = htmlspecialchars($data["tgl_lahir"]);
	$telepon = htmlspecialchars($data["telepon"]);
	$nama_ortu = htmlspecialchars($data["nama_ortu"]);
	$asal_sekolah = htmlspecialchars($data["asal_sekolah"]);
	$alamat_sekolah = htmlspecialchars($data["alamat_sekolah"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}

	// query insert data
	$query = "UPDATE mahasiswa SET
                nama = '$nama',
                alamat = '$alamat',
                tgl_lahir = '$tgl_lahir',
                telepon = '$telepon',
                nama_ortu = '$nama_ortu',
                asal_sekolah = '$asal_sekolah',
                alamat_sekolah = '$alamat_sekolah',
                gambar = '$gambar'
              WHERE id = $id
            ";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
	$query = "SELECT * FROM mahasiswa
                WHERE
              nama LIKE '%$keyword%' OR
              id LIKE '%$keyword%'
            ";
	return query($query);
}

function registrasi($data)
{
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE
                    username = '$username'");
	if (mysqli_fetch_assoc($result)) {
		echo "<script>
                alert('username sudah terdaftar!');
              </script>";
		return false;
	}

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username'
                , '$password')");

	return mysqli_affected_rows($conn);
}
