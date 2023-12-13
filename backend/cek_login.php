<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include '../connection.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

$recaptcha_secret_key = "6LexSi8pAAAAAB4iOAoT3vKl8NjcRW-iCFo7qOfv";
$recaptcha_response = $_POST['g-recaptcha-response'];
$recaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret_key&response=$recaptcha_response";
$recaptcha_data = json_decode(file_get_contents($recaptcha_url));

if (!$recaptcha_data->success) {
	header("location:../login/login.php?pesan=captcha_gagal");
	exit();
}


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn, "select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['role'] == "admin") {

		// buat session login dan username
		$_SESSION["submit"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../admin/");

		// cek jika user login sebagai pegawai
	} else if ($data['role'] == "user") {
		// buat session login dan username
		$_SESSION["submit"] = true;
		$_SESSION['username'] = $username;
		$_SESSION['role'] = "user";
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['login'] = true;
		// alihkan ke halaman dashboard pegawai
		header("location:../index.php");

		// cek jika user login sebagai pengurus
	} else {

		// alihkan ke halaman login kembali
		header("location:../login/login.php?");
	}
} else {
	header("location:../login/login.php?");
}
