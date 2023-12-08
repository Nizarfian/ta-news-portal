<?php
include("../../connection.php");

$kategori = $_POST["kategori"];
$judul = $_POST["judul"];
$penulis = $_POST["penulis"];
$isi = $_POST["isi"];
$tgl_rilis = $_POST["tgl_rilis"];

if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == UPLOAD_ERR_OK) {
  $targetDirectory = "../../img/";
  $targetFile = $targetDirectory . basename($_FILES["gambar"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["gambar"]["tmp_name"]);
  if ($check === false) {
    header("Location:../../admin/berita.php");
    echo "error";
    exit();
  }

  if ($_FILES["gambar"]["size"] > 3000000) {
    header("Location:../../admin/berita.php");
    echo "error ukuran";
    exit();
  }

  $allowedFileTypes = ["jpg", "jpeg", "png"];
  if (!in_array($imageFileType, $allowedFileTypes)) {
    header("Location:../../admin/berita.php");
    echo "error format";
    exit();
  }

  if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
    $gambar = basename($_FILES["gambar"]["name"]);
  } else {
    header("Location:../../admin/berita.php");
    echo "error upload";
    exit();
  }
} else {
  header("Location:../../admin/berita.php");
  echo "belum upload";
  exit();
}

$result = mysqli_query($conn, "INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `penulis`, `isi_berita`, `tgl_rilis`, `gambar`) VALUES (NULL, '$kategori', '$judul', '$penulis', '$isi', '$tgl_rilis', '$gambar');");

header("Location:../../admin/berita.php");
exit();