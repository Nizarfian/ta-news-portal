<?php

include_once('../../connection.php');

$id = $_GET["idKomentar"];

$query = mysqli_query($conn, "DELETE FROM `komentar` WHERE `id_komentar` = $id;");

header('Location:../../admin/komentar.php');
