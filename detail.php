<?php
session_start();

$login = $_SESSION['login'] ?? null;

$user = $_SESSION['id_user'] ?? null;

include_once('connection.php');

$idBerita = $_GET['idBerita'];
$idKategori = $_GET['idKategori'];

$menu = mysqli_query($conn, "SELECT * FROM `kategori`;");

$berita = mysqli_query($conn, "SELECT * FROM `berita` JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE `id_berita` = $idBerita;");

$beritaTerkait = mysqli_query($conn, "SELECT * FROM `berita` JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE berita.id_kategori = $idKategori;");

$komentar = mysqli_query($conn, "SELECT * FROM `komentar` JOIN user ON komentar.id_user=user.id_user WHERE id_berita = $idBerita;");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>K3L NEWS</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/k.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/main.css" />
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
            <a href="index.php" class="left-topbar-item">
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

      <!--  -->
      <div class="wrap-logo container">
        <!-- Logo desktop -->
        <div class="logo">
          <a href="index.php"><img src="images/logo-k3l2.png" alt="LOGO" /></a>
        </div>
      </div>

      <!--  -->
      <div class="wrap-main-nav">
        <div class="main-nav">
          <!-- Menu desktop -->
          <nav class="menu-desktop">
            <a class="logo-stick" href="index.php">
              <img src="images/icons/logo-01.png" alt="LOGO" />
            </a>

            <ul class="main-menu">
              <?php foreach ($menu as $data) : ?>
                <li class="mega-menu-item">
                  <a href="menu.php?idKategori=<?= $data['id_kategori']; ?>"><?= $data['nama_kategori']; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>



  <!-- Breadcrumb -->
  <div class="container">
    <div class="headline bg0 flex-wr-sb-c p-tb-8">
      <div class="f2-s-1 p-r-30 m-tb-6">
        <a href="index.php" class="breadcrumb-item f1-s-3 cl9"> Home </a>

        <?php foreach ($berita as $data) : ?>
          <a href="menu.php?idKategori=<?= $data['id_kategori']; ?>" class="breadcrumb-item f1-s-3 cl9">
            <?= $data['nama_kategori']; ?>
          </a>

          <span class="breadcrumb-item f1-s-3 cl9"><?= $data['judul']; ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Content -->
  <section class="bg0 p-b-100 p-t-10">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-9 p-b-30">
          <div class="p-r-10 p-r-0-sr991">
            <?php foreach ($berita as $data) : ?>
              <!-- Blog Detail -->
              <div class="p-b-30">
                <h3 class="f1-l-3 cl2 p-b-16 respon2"><?= $data['judul']; ?></h3>

                <div class="flex-wr-s-s p-b-20">
                  <span class="f1-s-3 cl8 m-r-15">
                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
                      <?= $data['penulis']; ?>
                    </a>

                    <span class="m-rl-3">-</span>

                    <span><?= date("d F Y", strtotime($data["tgl_rilis"])); ?></span>
                  </span>
                </div>

                <div class="wrap-pic-max-w p-b-30">
                  <img src="img/<?= $data['gambar']; ?>" alt="IMG" width="900" height="529">
                </div>

                <p class="f1-s-11 cl6 p-b-25">
                  <?= $data['isi_berita']; ?>
                </p>
              </div>

            <?php endforeach; ?>

            <!-- Leave a comment -->
            <div class="p-b-50">
              <h4 class="f1-l-4 cl3 p-b-12">Berikan Komentar</h4>

              <form action="
              <?php if (isset($user)) {
                echo 'backend/tambah/proses-tambah-komentar.php';
              } else {
                echo 'login/login.php';
              } ?>
              " method="post" id="komentar">
                <input type="hidden" id="tglKomen" name="tglKomen">
                <input type="hidden" id="idBerita" name="idBerita" value="<?= $idBerita; ?>">
                <input type="hidden" id="idUser" name="idUser" value="<?= $user; ?>">
                <input type="hidden" id="idKategori" name="idKategori" value="<?= $idKategori; ?>">
                <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" id="isiKomentar" name="isiKomentar" required placeholder="Komentar..."></textarea>

                <button type="submit" name="submit" class="size-a-17 bg2 borad-3 f1-s-11 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                  Kirim Komentar
                </button>
              </form>
            </div>

            <!-- comment -->
            <div class="bo-1-rad-1 bocl13 p-b-20" style="background-color: #dddddd;">
              <h3 class="f1-l-2 cl2 p-b-16 p-l-20 p-r-20 p-t-20 respon2">Komentar</h3>

              <?php foreach ($komentar as $data) : ?>
                <div class="p-l-20 p-r-20 p-b-10">
                  <div class="flex-wr-s-s">
                    <span class="f1-s-3 cl8 m-r-15">
                      <span class="f1-s-7 cl3 hov-cl10 trans-03">
                        <?= $data['username']; ?>
                      </span>
                      <span class="m-rl-3">-</span>
                      <span><?= date("d M Y | H:i:s", strtotime($data["tgl_komen"])); ?></span>
                    </span>
                  </div>
                  <p class="f1-s-11 cl6">
                    <?= $data['isi_komentar']; ?>
                  </p>
                </div>
              <?php endforeach; ?>

            </div>

          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-md-10 col-lg-3 p-b-30">
          <div class="p-l-10 p-rl-0-sr991 p-t-3">
            <!-- Category -->
            <div class="p-b-60">
              <div class="how2 how2-cl4 flex-s-c">
                <h3 class="f1-m-2 cl3 tab01-title">Berita Terkait</h3>
              </div>

              <div class="row">
                <?php
                $limit = 5;
                $counter = 0;
                ?>
                <?php foreach ($beritaTerkait as $data) : ?>
                  <?php if ($data['id_berita'] == $idBerita) {
                    continue;
                  } ?>
                  <div class="col-12">
                    <!-- Item post -->
                    <div>
                      <span class="cl8">
                        <a href="menu.php?idKategori=<?= $data['id_kategori']; ?>" class="f1-s-6 cl8 hov-cl10 trans-03">
                          <?= $data['nama_kategori']; ?>
                        </a>

                        <span class="f1-s-3 m-rl-3"> - </span>

                        <span class="f1-s-3"><?= date("d M", strtotime($data["tgl_rilis"])); ?></span>
                      </span>

                      <a href="detail.php?idBerita=<?= $data['id_berita']; ?>&idKategori=<?= $data['id_kategori']; ?>" class="wrap-pic-w hov1 trans-03">
                        <img src="img/<?= $data['gambar']; ?>" alt="IMG" height="150">
                      </a>

                      <div class="p-t-10 p-b-10">
                        <h5 class="p-b-5">
                          <a href="detail.php?idBerita=<?= $data['id_berita']; ?>&idKategori=<?= $data['id_kategori']; ?>" class="f1-s-5 cl3 hov-cl10 trans-03">
                            <?= $data['judul']; ?>
                          </a>
                        </h5>
                      </div>
                    </div>
                  </div>
                <?php
                  $counter++;
                  if ($counter >= $limit) {
                    break;
                  }
                endforeach;
                ?>
              </div>
            </div>
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
              <a href="index.php">
                <img class="max-s-full" src="images/logo-k3l.png" alt="LOGO" />
              </a>
            </div>

            <div>
              <p class="f1-s-1 cl11 p-b-16">
                K3lnews adalah salah satu pionir media online yang dibuat oleh
                5 orang putra/i terbaik Indonesia dan pertama kali hadir di
                Internet pada 29 Desember 2023.
              </p>

              <p class="f1-s-1 cl11 p-b-16">Call us on (+62) 85 127 1366</p>

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
        <span class="f1-s-1 cl0 txt-center"> Copyright © 2023 </span>
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
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="js/main.js"></script>
  <script>
    // function untuk set tanggal dan waktu terkini
    function setCurrentDateTime() {
      var now = new Date();
      var datetimeField = document.getElementById('tglKomen');

      // format tanggal menjadi "YYYY-MM-DD HH:mm:ss"
      var formattedDateTime =
        now.getFullYear() +
        '-' +
        ('0' + (now.getMonth() + 1)).slice(-2) +
        '-' +
        ('0' + now.getDate()).slice(-2) +
        ' ' +
        ('0' + now.getHours()).slice(-2) +
        ':' +
        ('0' + now.getMinutes()).slice(-2) +
        ':' +
        ('0' + now.getSeconds()).slice(-2);

      datetimeField.value = formattedDateTime;
    }

    document.getElementById('komentar').addEventListener('submit', setCurrentDateTime);
  </script>

</body>

</html>