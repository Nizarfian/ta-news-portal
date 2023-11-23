<?php
include "koneksi.php";

if (isset($_POST['id_berita'])) {
    $id_berita = $_POST['id_berita'];
    $id_kategori = $_POST['id_kategori'];
    $judul = $_POST['judul'];
    $tgl_rilis = $_POST['tgl_rilis'];
    $isi_berita = $_POST['isi_berita'];

    // menampung data file yang diupload
    $filename = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // Cek apakah ada perubahan gambar
    if (!empty($filename)) {
        $typel = explode('.', $filename);
        $type2 = $typel[1];
        $newname = 'gambar' . time() . '.' . $type2;

        // menampung data format file yang diizinkan
        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

        // validasi format file
        if (!in_array($type2, $tipe_diizinkan)) {
            // jika format file tidak ada di dalam tipe diizinkan
            echo '<script>alert("Format file tidak diizinkan")</script>';
        } else {
            // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
            // proses upload file
            move_uploaded_file($tmp_name, './gambar/' . $newname);

            // Update data termasuk nama file foto baru
            $update = mysqli_query($koneksi, "UPDATE berita SET
                id_kategori = '$id_kategori',
                judul = '$judul',
                tgl_rilis = '$tgl_rilis',
                isi_berita = '$isi_berita',
                foto = '$newname'
                WHERE id_berita = '$id_berita';");

            if ($update) {
                echo 'Edit data berhasil';
            } else {
                echo 'Gagal' . mysqli_error($koneksi);
            }
        }
    } else {
        // Jika tidak ada perubahan gambar
        $update = mysqli_query($koneksi, "UPDATE berita SET
            id_kategori = '$id_kategori',
            judul = '$judul',
            tgl_rilis = '$tgl_rilis',
            isi_berita = '$isi_berita'
            WHERE id_berita = '$id_berita';");

        if ($update) {
            echo 'Edit data berhasil';
        } else {
            echo 'Gagal' . mysqli_error($koneksi);
        }
    }
    header("Location:index.php");
}