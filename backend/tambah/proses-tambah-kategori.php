<?php

include_once('../../connection.php');

$kategori = $_POST['tambahKategori'];

$query = mysqli_query($conn, "INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES (NULL, '$kategori');");

header('Location:../../admin/kategori.php');
