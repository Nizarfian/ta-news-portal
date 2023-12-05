<?php

include_once('../../connection.php');

$id = $_GET["idBerita"];

$query = mysqli_query($conn, "DELETE FROM `berita` WHERE `id_berita` = $id;");

header('Location:../../admin/berita.php');
