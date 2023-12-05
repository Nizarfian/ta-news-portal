<?php

include_once('../../connection.php');

$id = $_GET["idKategori"];

$query = mysqli_query($conn, "DELETE FROM `kategori` WHERE `id_kategori` = $id;");

header('Location:../../admin/kategori.php');
