<?php

include "koneksi.php";

if (isset($_GET['id_berita'])) {
    $id_berita = $_GET['id_berita'];

    // Ambil nama file foto terlebih dahulu
    $query_select = mysqli_query($koneksi, "SELECT gambar FROM berita WHERE id_berita = '$id_berita'");
    $data_berita = mysqli_fetch_assoc($query_select);
    $gambar_berita = $data_berita['gambar'];

    // Hapus data dari database
    $delete = mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita = '$id_berita'");

    if ($delete) {
        // Jika data berhasil dihapus, hapus juga file foto dari direktori
        if (!empty($gambar_berita) && file_exists('./gambar/' . $gambar_berita)) {
            unlink('./gambar/' . $gambar_berita);
        }
        echo 'Hapus data berhasil';
    } else {
        echo 'Gagal menghapus data' . mysqli_error($koneksi);
    }
} else {
    echo 'ID Produk tidak valid';
}

header("Location:index.php");