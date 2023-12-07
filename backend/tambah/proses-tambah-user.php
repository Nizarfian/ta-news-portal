<?php

include_once('../../connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'user');");

header('Location:../../login/login.php');
