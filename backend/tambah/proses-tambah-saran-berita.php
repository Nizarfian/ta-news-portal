<?php
include("../../connection.php");

$user = $_POST["user"];
$kategori = $_POST["kategori"];
$judul = $_POST["judul"];
$tgl_berita = $_POST["tgl_berita"];
$isi = $_POST["isi"];

if (isset($_FILES["gambar"]) && $_FILES["gambar"]["error"] == UPLOAD_ERR_OK) {
  $targetDirectory = "../../img/";
  $targetFile = $targetDirectory . basename($_FILES["gambar"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["gambar"]["tmp_name"]);
  if ($check === false) {
    header("Location:../../req-news.php");
    echo "error";
    exit();
  }

  if ($_FILES["gambar"]["size"] > 3000000) {
    header("Location:../../req-news.php");
    echo "error ukuran";
    exit();
  }

  $allowedFileTypes = ["jpg", "jpeg", "png"];
  if (!in_array($imageFileType, $allowedFileTypes)) {
    header("Location:../../req-news.php");
    echo "error format";
    exit();
  }

  if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
    $gambar = basename($_FILES["gambar"]["name"]);
  } else {
    header("Location:../../req-news.php");
    echo "error upload";
    exit();
  }
} else {
  header("Location:../../req-news.php");
  echo "belum upload";
  exit();
}

$result = mysqli_query($conn, "INSERT INTO `saran_berita` (`id_saran_berita`, `id_kategori`, `id_user`, `judul`, `tgl_berita`, `isi_berita`, `gambar`) VALUES (NULL, '$kategori', '$user', '$judul', '$tgl_berita', '$isi', '$gambar');");

header("Location:../../req-news.php");
exit();
