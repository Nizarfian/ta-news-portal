<?php

include_once('../../connection.php');

$id = $_POST["idUser"];
$username = $_POST['editUsername'];
$role = $_POST['role'];

$query = mysqli_query($conn, "UPDATE `user` SET `username` = '$username', `role` = '$role' WHERE `id_user` = $id;");

header('Location:../../admin/user.php');
