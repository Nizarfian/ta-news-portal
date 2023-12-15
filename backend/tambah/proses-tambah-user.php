<?php

include_once('../../connection.php');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email'");
$cekEmail = mysqli_fetch_assoc($query);

if ($cekEmail) {
  echo "
        <script>
        alert('Email sudah digunakan. Gunakan email lain.');
        window.location.href = '../../login/sign-up.php';
        </script>
    ";
} else {
  $query = mysqli_query($conn, "INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `role`) VALUES (NULL, '$email', '$username', '$password', 'user');");

  header('Location:../../login/login.php');
}