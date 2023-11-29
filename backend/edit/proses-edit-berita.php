<?php
include("../../connection.php");

$id = $_POST["idBerita"];
$kategori = $_POST["kategori"];
$judul = $_POST["judul"];
$penulis = $_POST["penulis"];
$isi = $_POST["isi"];
$tgl_rilis = $_POST["tgl_rilis"];

if (isset($_FILES["gambarBaru"]) && $_FILES["gambarBaru"]["error"] == UPLOAD_ERR_OK) {
  $targetDirectory = "../../img/";
  $targetFile = $targetDirectory . basename($_FILES["gambarBaru"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["gambarBaru"]["tmp_name"]);
  if ($check === false) {
    // header("Location:../../admin/berita.php");
    echo "error";
    exit();
  }

  if ($_FILES["gambarBaru"]["size"] > 3000000) {
    // header("Location:../../admin/berita.php");
    echo "error ukuran";
    exit();
  }

  $allowedFileTypes = ["jpg", "jpeg", "png"];
  if (!in_array($imageFileType, $allowedFileTypes)) {
    // header("Location:../../admin/berita.php");
    echo "error format";
    exit();
  }

  if (move_uploaded_file($_FILES["gambarBaru"]["tmp_name"], $targetFile)) {
    $gambar = basename($_FILES["gambarBaru"]["name"]);
  } else {
    // header("Location:../../admin/berita.php");
    echo "error upload";
    exit();
  }
} else {
  // header("Location:../../admin/berita.php");
  $gambar = $_POST["gambar"];
}

$result = mysqli_query($conn, "UPDATE `berita` SET `id_kategori` = '$kategori', `judul` = '$judul', `penulis` = '$penulis', `isi_berita` = '$isi', `tgl_rilis` = '$tgl_rilis', `gambar` = '$gambar' WHERE `berita`.`id_berita` = $id;");

header("Location:../../admin/berita.php");
exit();
