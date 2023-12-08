<?php
include("../../connection.php");

$kategori = $_POST["kategori"];
$judul = $_POST["judul"];
$penulis = $_POST["penulis"];
$isi = $_POST["isi"];
$tgl_rilis = $_POST["tgl_rilis"];
$gambar = $_POST["gambar"];

$result = mysqli_query($conn, "INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `penulis`, `isi_berita`, `tgl_rilis`, `gambar`) VALUES (NULL, '$kategori', '$judul', '$penulis', '$isi', '$tgl_rilis', '$gambar');");

header("Location:../../admin/berita.php");
exit();
