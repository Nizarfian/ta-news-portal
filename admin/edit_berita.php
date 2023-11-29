<?php

include("../connection.php");

$id = $_GET["idBerita"];

$berita = mysqli_query($conn, "SELECT * FROM `berita` WHERE `id_berita` = $id;");

foreach ($berita as $data) {
  $id = $data["id_berita"];
  $id_kategori = $data["id_kategori"];
  $judul = $data["judul"];
  $penulis = $data["penulis"];
  $isi_berita = $data["isi_berita"];
  $tgl_rilis = $data["tgl_rilis"];
  $gambar = $data["gambar"];
}

$kategori = mysqli_query($conn, "SELECT * FROM `kategori`");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Tambah Berita</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo-k3l2.png" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-logout me-2 text-success"></i> Logout </a>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="index.php" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/profile.png" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">KELOMPOK 3</span>
                <span class="text-secondary text-small">Admin</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="berita.php">
              <span class="menu-title">Berita</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kategori.php">
              <span class="menu-title">Kategori</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="komentar.php">
              <span class="menu-title">Komentar</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="saran.php">
              <span class="menu-title">Saran Berita</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user.php">
              <span class="menu-title">User</span>
              <i class="mdi mdi-account-circle menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Tambah Berita </h3>
          </div>
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <form class="forms-sample" action="../backend/edit/proses-edit-berita.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="kategori">Nama Kategori</label>
                      <select class="form-control" id="kategori" name="kategori" required>
                        <?php foreach ($kategori as $data) { ?>
                          <option value="<?= $data['id_kategori'] ?>" <?php if ($data['id_kategori'] == $id_kategori) {
                                                                        echo "selected";
                                                                      } ?>><?= $data['nama_kategori'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" id="judul" name="judul" value="<?= $judul; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                      <label for="penulis">Penulis</label>
                      <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $penulis; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-2">
                      <label for="tgl_rilis">Tanggal Rilis</label>
                      <input type="date" class="form-control" id="tgl_rilis" name="tgl_rilis" value="<?= $tgl_rilis; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="isi">Isi Berita</label>
                      <textarea class="form-control" id="isi" rows="6" name="isi" required><?= $isi_berita; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Gambar Baru</label>
                      <input type="file" name="gambarBaru" class="file-upload-default">
                      <div class="input-group col-xs-12 mb-3">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Gambar">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                        </span>
                      </div>
                      <img src="../img/<?= $gambar; ?>" width="300">
                      <input type="hidden" class="form-control" id="gambar" name="gambar" value="<?= $gambar; ?>">
                    </div>
                    <input type="hidden" name="idBerita" value="<?= $id; ?>">
                    <div class="d-flex justify-content-between col-xs-12">
                      <a href="berita.php" class="btn btn-danger btn-sm"><i class="bi bi-chevron-left"></i>
                        Kembali</a>
                      <input type="submit" name="Submit" value="Submit" class="btn btn-success btn-sm">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="container-fluid d-flex justify-content-center">
                <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright
                  2023 © KELOMPOK 3</span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="assets/js/off-canvas.js"></script>
      <script src="assets/js/hoverable-collapse.js"></script>
      <script src="assets/js/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="assets/js/file-upload.js"></script>
      <!-- End custom js for this page -->
</body>

</html>