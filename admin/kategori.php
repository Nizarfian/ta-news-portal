<?php
//session login
session_start();

if(!isset($_SESSION["submit"])){
	header("Location: ../login/login.php");
	exit;
}

//query sql
include_once('../connection.php');

$query = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | Kategori</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

  <!-- DataTables CSS, JS, JQUERY -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/k.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo-k3l2.png" alt="logo" /></a>
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
            <a class="nav-link" href="../backend/logout.php">
              <i class="mdi mdi-logout me-2 text-success"></i> Logout </a>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
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
            <h3 class="page-title"> Kategori </h3>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="" class="btn btn-success btn-sm mb-3" data-bs-toggle="modal"
                      data-bs-target="#ModalTambahKategori">
                      + Tambah Kategori
                    </a>
                  </h4>
                  <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr class="text-center align-middle">
                        <th class="text-center" scope="col" width="10px">No. </th>
                        <th class="text-center" scope="col" width="650px">Nama Kategori</th>
                        <th class="text-center" scope="col" width="450px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1 ?>
                      <?php foreach ($query as $data) : ?>
                      <tr>
                        <td class="text-center align-middle"><?= $i; ?></td>
                        <td style="padding-left: 40px;"><?= $data['nama_kategori']; ?></td>
                        <td width="100px" class="text-center align-middle">
                          <a href="#ModalEditKategori<?= $data['id_kategori'] ?>"
                            class="btn btn-warning btn-sm text-white" data-bs-toggle="modal"
                            data-bs-target="#ModalEditKategori<?= $data['id_kategori'] ?>"><i
                              class="bi bi-pencil-square"></i></a>
                          <a href="#" class="btn btn-danger btn-sm"
                            onclick="confirmDelete(<?= $data['id_kategori'] ?>)"><i class="bi bi-trash"></i></a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      <div class="modal fade" id="ModalEditKategori<?= $data['id_kategori'] ?>" tabindex="-1"
                        aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="modalTitle">Edit Kategori</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="../backend/edit/proses-edit-kategori.php" method="post">
                                <div class="form-group">
                                  <label for="editKategori">Kategori</label>
                                  <input type="text" class="form-control" id="editKategori" name="editKategori"
                                    value="<?= $data["nama_kategori"] ?>" autocomplete="off">
                                  <input type="hidden" name="idKategori" value="<?= $data["id_kategori"] ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary" id="editKategoriBtn">Edit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-center">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">
              Copyright 2023 © KELOMPOK 3 </span>
          </div>
        </footer>
        <!-- partial -->
      </div>

      <div class="modal fade" id="ModalTambahKategori" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalTitle">Tambah Kategori</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../backend/tambah/proses-tambah-kategori.php" method="post">
                <div class="form-group">
                  <label for="genre">Kategori</label>
                  <input type="text" class="form-control" id="tambahKategori" name="tambahKategori" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary" id="tambahKategoriBtn">Tambah</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  function confirmDelete(idKategori) {
    if (confirm('Yakin ingin menghapus kategori ini?')) {
      window.location.href = '../backend/hapus/proses-hapus-kategori.php?idKategori=' + idKategori;
    } else {
      console.log('Hapus dibatalkan');
    }
  }
  </script>


  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>

</html>