<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include '../connection.php';
include '../vendor/PHPMailer/src/Exception.php';
include '../vendor/PHPMailer/src/PHPMailer.php';
include '../vendor/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'christopherarie147@gmail.com';
$mail->Password = 'edcfbsbbspfahxuu';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('christopherarie147@gmail.com');

$email = $_POST['email'];

$mail->addAddress("$email");

$query = mysqli_query($conn, "SELECT * FROM `user` WHERE email='$email'");
if (mysqli_num_rows($query) === 0) {
  echo "
  <script>
  alert('Email anda tidak terdaftar. Silahkan periksa kembali email anda.');
  document.location.href = '../login/lupa-password.php';
  </script>
  ";
  exit();
}
$row = mysqli_fetch_assoc($query);
$idUser = $row['id_user'];

$token = md5(uniqid(rand(), true));
$timestamp = time();

mysqli_query($conn, "INSERT INTO `reset_password` (`id_reset`, `email`, `token`, `timestamp`) VALUES (NULL, '$email', '$token', '$timestamp');");
$reset_link = "http://localhost/eduwork/ta-news-portal/login/reset-password.php?token=$token&idUser=$idUser";

$mail->isHTML(true);
$mail->Subject = "Reset Password";
$mail->Body    = "Silakan klik link berikut untuk mereset kata sandi Anda: $reset_link";

$mail->send();

echo "
<script>
alert('Email dengan petunjuk reset kata sandi telah dikirim ke alamat email Anda.');
document.location.href = '../login/login.php';
</script>
";
