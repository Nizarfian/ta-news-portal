<?php

include_once('../../connection.php');

$id = $_GET["idSaran"];

$query = mysqli_query($conn, "DELETE FROM `saran_berita` WHERE `id_saran_berita` = $id;");

header('Location:../../admin/saran.php');
