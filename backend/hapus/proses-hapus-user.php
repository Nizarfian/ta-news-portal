<?php

include_once('../../connection.php');

$id = $_GET["idUser"];

$query = mysqli_query($conn, "DELETE FROM `user` WHERE `id_user` = $id;");

header('Location:../../admin/user.php');
