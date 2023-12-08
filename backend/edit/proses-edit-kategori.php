<?php

include_once('../../connection.php');

$id = $_POST["idKategori"];
$kategori = $_POST['editKategori'];

$query = mysqli_query($conn, "UPDATE `kategori` SET `nama_kategori` = '$kategori' WHERE `id_kategori` = $id;");

header('Location:../../admin/kategori.php');
