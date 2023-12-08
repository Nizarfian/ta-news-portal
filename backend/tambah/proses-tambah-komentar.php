<?php

include_once('../../connection.php');

$idBerita = $_POST['idBerita'];
$idUser = $_POST['idUser'];
$idKategori = $_POST['idKategori'];
$isiKomentar = $_POST['isiKomentar'];
$tglKomen = $_POST['tglKomen'];

$query = mysqli_query($conn, "INSERT INTO `komentar` (`id_komentar`, `id_berita`, `id_user`, `isi_komentar`, `tgl_komen`) VALUES (NULL, '$idBerita', '$idUser', '$isiKomentar', '$tglKomen');");

header("Location:../../detail.php?idBerita=$idBerita&idKategori=$idKategori");
