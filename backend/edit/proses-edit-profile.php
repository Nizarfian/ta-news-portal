<?php

include_once('../../connection.php');

$id = $_POST["idUser"];
$email = $_POST['editEmail'];
$username = $_POST['editUsername'];
$password = $_POST['editPassword'];

$query = mysqli_query($conn, "UPDATE `user` SET `email` = '$email', `username` = '$username', `password` = '$password' WHERE `user`.`id_user` = $id;");

header('Location:../../profile.php');
