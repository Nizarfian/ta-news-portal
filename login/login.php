<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

            <a href="../req-news.php" class="left-topbar-item">
              Saran Berita
            </a>
          </div>

          <div class="right-topbar">
            <a href="sign-up.php" style="font-size: 12px;">
              Daftar
            </a>
            <a href="login.php" style="font-size: 12px; padding: 0 13px;">
              Masuk
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
        <div class="col-md-5 col-lg-6 p-b-80">
          <h2 class="f1-l-1 cl2 m-b-20" style="text-align: center;">
            LOGIN
          </h2>
          <div class="p-r-10 p-r-0-sr991">
            <form action="../backend/cek_login.php" method="post">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Username</label>
                <input type="text" id="form2Example1" class="form-control" name="username" autocomplete="off" required>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <div class="input-group">
                  <input type="password" id="form2Example2" class="form-control" name="password" required>
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"
                    onclick="tampilPassword('#form2Example2')">
                    <span class="fa fa-fw fa-eye field-icon" id="tampil-password-icon"></span>
                  </button>
                </div>
                <a href="lupa-password.php">Lupa Password?</a>
              </div>


              <div class="row">
                <div style="display: block; margin: auto;">
                  <div class="g-recaptcha mb-1" data-sitekey="6LexSi8pAAAAAAEVK_dq4Ej2pIsk2yghpRPrr1Qg"></div>
                  <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'captcha_gagal') : ?>
                  <p style="color: red;">Verifikasi Captcha gagal. Silahkan coba lagi.</p>
                  <?php endif; ?>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block mt-4 mb-4">Sign
                in</button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>Tidak Punya Akun? <a href="sign-up.php">Daftar</a></p>
              </div>
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
  <script>
  function tampilPassword(targetId) {
    var passwordField = $(targetId);
    var passwordFieldType = passwordField.attr("type");
    passwordField.attr("type", passwordFieldType === "password" ? "text" : "password");

    var eyeIcon = $("#tampil-password-icon");
    eyeIcon.toggleClass("fa-eye fa-eye-slash");
  }
  </script>

</body>

</html>