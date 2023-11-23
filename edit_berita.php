<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Edit Data Produk</title>
</head>

<?php
include "koneksi.php";

// Ambil data produk berdasarkan id_berita
if (isset($_GET['id_berita'])) {
    $id_berita = $_GET['id_berita'];
    $berita = mysqli_query($koneksi, "SELECT * FROM berita WHERE id_berita = '$id_berita'");
    $berita_data = mysqli_fetch_assoc($berita);
} else {
    // Redirect ke halaman lain jika tidak ada id_berita
    header("Location: index.php");
    exit();
}
?>

<body>
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Edit Data Berita</h1>
            <form id="form_edit" action="proses_edit_berita.php" method="post" enctype="multipart/form-data">
                <!-- Menambahkan input hidden untuk menyimpan id_berita -->
                <input type="hidden" name="id_berita" value="<?php echo $berita_data['id_berita']; ?>">
                <div class="form-group mb-3">
                    <div class="form-label">ID Kategori</div>
                    <select name="id_kategori" class="required form-control">
                        <option value="">--Pilih--</option>
                        <?php
                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($kategori_data = mysqli_fetch_assoc($kategori)) {
                            // Menambahkan atribut 'selected' untuk opsi yang sesuai dengan data produk
                            $selected = ($kategori_data['id_kategori'] == $berita_data['id_kategori']) ? 'selected' : '';
                        ?>
                        <option value="<?php echo $kategori_data['id_kategori']; ?>" <?php echo $selected; ?>>
                            <?php echo $kategori_data['id_kategori'] . ' - ' . $kategori_data['nama_kategori']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Judul</div>
                    <input type="text" name="judul" data-name="Judul" required="" class="required form-control"
                        autocomplete="off" maxlength="50" value="<?php echo $berita_data['judul']; ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Tanggal Rilis</div>
                    <input type="date" name="tgl_rilis" data-name="Tanggal Rilis" class="required form-control"
                        value="<?php echo $berita_data['tgl_rilis']; ?>">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Isi Berita</div>
                    <textarea name="isi_berita" data-name="isi_berita" required="" class="required form-control"
                        autocomplete="off" rows="10"><?php echo $berita_data['isi_berita']; ?></textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Gambar</div>
                    <!-- Menampilkan gambar berita yang sudah ada -->
                    <img src="gambar/<?php echo $berita_data['gambar']; ?>" alt="Gambar Berita"
                        style="max-width: 300px; max-height: 300px;">
                    <br>
                    <input type="file" name="gambar" data-name="Gambar" class="form-control">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="index.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>Kembali</a>
                    <input type="submit" name="Submit" value="Edit Data" class="btn btn-warning btn-sm"
                        onclick="return confirm('Apakah anda yakin ingin mengubah data ini?');">
                </div>
            </form>
        </div>
    </div>
</body>

</html>Tolong apa yang salah? beritahu dalam bahasa indonesia