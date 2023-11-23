<?php

include "koneksi.php";

$id_kategori = $_POST['id_kategori'];
$judul = $_POST['judul'];
$tgl_rilis = $_POST['tgl_rilis'];
$isi_berita = $_POST['isi_berita'];

// menampung data file yang diupload
$filename = $_FILES['gambar']['name'];
$tmp_name = $_FILES['gambar']['tmp_name'];

$typel = explode('.', $filename);
$type2 = $typel[1];

$newname = 'gambar' . time() . '.' . $type2;

// menampung data format file yang diizinkan
$tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

// validasi format file
if (!in_array($type2, $tipe_diizinkan)) {
	// jika format file tidak ada di dalam tipe diizinkan
	echo '<script>alert("Format file tidak diizinkan")</script>';
} else {
	// jika format file sesuai dengan yang ada di dalam array tipe diizinkan
	// proses upload file sekaligus insert ke database
	move_uploaded_file($tmp_name, './gambar/' . $newname);

	$insert = mysqli_query($koneksi, "INSERT INTO berita VALUES (
        null,
        '" . $id_kategori . "',
        '" . $judul . "',
        '" . $tgl_rilis . "',
        '" . $isi_berita . "',
        '" . $newname . "'
    );");

	if ($insert) {
		echo 'Simpan data berhasil';
	} else {
		echo 'Gagal' . mysqli_error($koneksi);
	}

	header("Location:index.php");
}