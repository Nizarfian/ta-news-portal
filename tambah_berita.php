<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <title>Tambah Data Berita</title>
</head>

<body>
    <div class="container">
        <div class="m-5 shadow-lg p-3 mb-5 bg-body-tertiary rounded">
            <h1 class="text-center">Tambah Data Berita</h1>
            <form id="form_tambah" action="proses_tambah_berita.php" method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <div class="form-label">ID Kategori</div>
                    <select name="id_kategori" class="required form-control">
                        <option value="">--Pilih--</option>
                        <?php
                        include "koneksi.php";
                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                        while ($kategori_data = mysqli_fetch_assoc($kategori)) {
                        ?>
                        <option value="<?php echo $kategori_data['id_kategori']; ?>">
                            <?php echo $kategori_data['id_kategori'] . ' - ' . $kategori_data['nama_kategori']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Judul</div>
                    <input type="text" name="judul" data-name="Judul" required="" class="required form-control"
                        autocomplete="off" maxlength="50">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Tanggal Rilis</div>
                    <input type="date" name="tgl_rilis" data-name="Tanggal Rilis" class="required form-control">
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Isi Berita</div>
                    <textarea name="isi_berita" data-name="Isi Berita" required="" class="required form-control"
                        autocomplete="off" rows="5"></textarea>
                </div>
                <div class="form-group mb-3">
                    <div class="form-label">Gambar</div>
                    <input type="file" name="gambar" data-name="Gambar" class="required form-control">
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <a href="index.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>Kembali</a>
                    <input type="submit" name="Submit" value="Submit" class="btn btn-success btn-sm">
                </div>
            </form>
        </div>
    </div>
</body>

</html>