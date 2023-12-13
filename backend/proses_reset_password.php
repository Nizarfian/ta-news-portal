<?php
include '../connection.php';

$idUser = $_POST['idUser'];

$passwordBaru = $_POST['passwordBaru'];

mysqli_query($conn, "UPDATE `user` SET `password` = '$passwordBaru' WHERE `user`.`id_user` = '$idUser';");

echo "
<script>
alert('Password berhasil direset. Silakan masuk dengan kata sandi baru Anda.');
document.location.href = '../login/login.php';
</script>
";
