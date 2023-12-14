<?php

include_once('../../connection.php');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `role`) VALUES (NULL,'$email', '$username', '$password', 'user');");

header('Location:../../login/login.php');
