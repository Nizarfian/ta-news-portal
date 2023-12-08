<?php

include_once('../../connection.php');

$id = $_POST["idUser"];
$username = $_POST['editUsername'];
$kategori = $_POST['editPassword'];

$query = mysqli_query($conn, "UPDATE `user` SET `username` = '$username', `password` = '$kategori' WHERE `user`.`id_user` = $id;");

header('Location:../../profile.php');
