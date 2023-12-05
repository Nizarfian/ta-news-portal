<?php
session_start();

$login = $_SESSION['login'] ?? null;

if (!isset($_SESSION["submit"])) {
	header("Location: ../login/login.php");
	exit;
}

$user = $_SESSION['id_user'];

include_once('../connection.php');

$query = mysqli_query($conn, "SELECT * FROM kategori");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Saran Berita</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="../images/icons/k.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/util.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!--===============================================================================================-->
</head>

<body class="animsition">

  <!-- Header -->
  <header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <div class="topbar">
        <div class="content-topbar container h-100">
          <div class="left-topbar">
            <a href="../index.php" class="left-topbar-item">
              Beranda
            </a>

            <a href="req-news.php" class="left-topbar-item">
              Saran Berita
            </a>

            <?php if ($login) { ?>
            <a href="backend/logout.php" class="left-topbar-item">
              Logout
            </a>
            <?php } else { ?>
            <a href="login/sign-up.php" class="left-topbar-item">
              Daftar
            </a>

            <a href="login/login.php" class="left-topbar-item">
              Masuk
            </a>
            <?php } ?>
          </div>

          <div class="right-topbar">
            <a href="#">
              <span class="fab fa-facebook-f"></span>
            </a>

            <a href="#">
              <span class="fab fa-twitter"></span>
            </a>

            <a href="#">
              <span class="fab fa-instagram"></span>
            </a>

            <a href="#">
              <span class="fab fa-youtube"></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Breadcrumb -->
  <div class="container">
    <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
      <div class="f2-s-1 p-r-30 m-tb-6">

      </div>
    </div>
  </div>

  <!-- Content -->
  <section class="bg0 p-b-60">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-8 p-b-80">
          <h2 class="f1-l-1 cl2 m-b-20" style="text-align: center;">
            Informasi Berita
          </h2>
          <div class="p-r-10 p-r-0-sr991">
            <form action="../backend/tambah/proses-tambah-saran-berita.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="user" value="<?= $user; ?>">

              <input class="bo-1-rad-1 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text" id="judul"
                name="judul" autocomplete="off" required placeholder="Judul">

              <select class="bo-1-rad-1 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-14 m-b-20" id="kategori" name="kategori"
                required>
                <?php foreach ($query as $data) { ?>
                <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
                <?php } ?>
              </select>

              <textarea class="bo-1-rad-1 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" id="isi" name="isi"
                required placeholder="Deskripsi"></textarea>

              <input class="f1-s-13" type="file" name="gambar">

              <button type="submit" name="submit" class="m-t-20 btn btn-primary btn-block mb-4">Kirim</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="bg2 p-t-40 p-b-25">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-6 p-b-20">
            <div class="size-h-3 flex-s-c">
              <a href="../index.php">
                <img class="max-s-full" src="../images/logo-k3l.png" alt="LOGO">
              </a>
            </div>

            <div>
              <p class="f1-s-1 cl11 p-b-16">
                K3lnews adalah salah satu pionir media online yang dibuat oleh 5 orang putra/i terbaik Indonesia dan
                pertama kali hadir di Internet pada 29 Desember 2023.
              </p>

              <p class="f1-s-1 cl11 p-b-16">
                Call us on (+62) 85 127 1366
              </p>

              <div class="p-t-15">
                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                  <span class="fab fa-facebook-f"></span>
                </a>

                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                  <span class="fab fa-twitter"></span>
                </a>

                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                  <span class="fab fa-instagram"></span>
                </a>

                <a href="#" class="fs-18 cl11 hov-cl10 trans-03 m-r-8">
                  <span class="fab fa-youtube"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg11">
      <div class="container size-h-4 flex-c-c p-tb-15">
        <span class="f1-s-1 cl0 txt-center">
          Copyright © 2023
        </span>
      </div>
    </div>
  </footer>

  <!-- Back to top -->
  <div class="btn-back-to-top" id="myBtn">
    <span class="symbol-btn-back-to-top">
      <span class="fas fa-angle-up"></span>
    </span>
  </div>


  <!--===============================================================================================-->
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="../js/main.js"></script>

</body>

</html>