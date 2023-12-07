<?php
session_start();

$login = $_SESSION['login'] ?? null;

include_once('connection.php');

$records_per_page = 9; //jumlah maksimal dalam 1 halaman
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($current_page - 1) * $records_per_page;
$searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';


$berita_utama = mysqli_query($conn, "SELECT * FROM `berita` JOIN kategori ON berita.id_kategori=kategori.id_kategori ORDER BY tgl_rilis ASC LIMIT 3;");
$berita_utama_ids = [];

// Mengambil ID dari berita yang ditampilkan pada fitur utama
foreach ($berita_utama as $data) {
    $berita_utama_ids[] = $data['id_berita'];
}

// Query untuk berita terbaru dengan menghindari data yang sudah ditampilkan pada fitur utama
$latest_news_query = "SELECT * FROM `berita` JOIN kategori ON berita.id_kategori=kategori.id_kategori 
                      WHERE judul LIKE '%$searchKeyword%'";

if (!empty($berita_utama_ids)) {
    $latest_news_query .= " AND id_berita NOT IN (" . implode(",", $berita_utama_ids) . ")";
}

$latest_news_query .= " ORDER BY tgl_rilis DESC LIMIT $start_from, $records_per_page";

$berita = mysqli_query($conn, $latest_news_query);




// Hitung total berita sesuai dengan pencarian
$total_berita = mysqli_query($conn, "SELECT COUNT(*) FROM berita WHERE judul LIKE '%$searchKeyword%'");
$total_records = mysqli_fetch_row($total_berita)[0];
// Perhitungan total halaman
$total_pages = ceil($total_records / $records_per_page);

$menu = mysqli_query($conn, "SELECT * FROM `kategori` LIMIT 8;"); //maksimal kategori yang masuk dalam menu

function custom_echo($x, $length)
{
  if (strlen($x) <= $length) {
    echo $x;
  } else {
    $y = substr($x, 0, $length) . '...';
    echo $y;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>K3L NEWS</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/k.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/fontawesome-5.0.8/css/fontawesome-all.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
					<a href="index.php"><img src="images/logo-k3l2.png" alt="LOGO"></a>
				</div>

				<!-- Search -->
				<div class="banner-header">
					<form action="" method="GET">
						<div class="pos-relative size-a-2 bo-1-rad-22 of-hidden bocl11 m-tb-6">
							<input class="f1-s-1 cl6 plh9 s-full p-l-25 p-r-45" type="text" name="search" placeholder="Search" autocomplete="off" value="<?= isset($_GET['search']) ? $_GET['search'] : ''; ?>">
							<button type="submit" class="flex-c-c size-a-1 ab-t-r fs-20 cl2 hov-cl10 trans-03">
								<i class="zmdi zmdi-search"></i>
							</button>
						</div>
					</form>
				</div>
			</div>

			<!--  -->
			<div class="wrap-main-nav">
				<div class="main-nav">
					<!-- Menu desktop -->
					<nav class="menu-desktop">
						<a class="logo-stick" href="index.php">
							<img src="images/logo-k3l2.png" alt="LOGO">
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

	<!-- Feature post -->
	<section class="bg0">
		<div class="container">
			<div class="row m-rl-0 justify-content-center">
			<?php foreach ($berita_utama as $data) : ?>
				<div class="col-md-4 p-rl-1 p-b-2">
					<div class="bg-img1 size-a-11 how1 pos-relative" style="background-image: url(img/<?= $data['gambar']; ?>);">
						<a href="detail.php?idBerita=<?= $data['id_berita']; ?>&idKategori=<?= $data['id_kategori']; ?>" class="dis-block how1-child1 trans-03"></a>
						<div class="flex-col-e-s s-full p-rl-25 p-tb-20">
							<a href="menu.php?idKategori=<?= $data['id_kategori']; ?>" class="dis-block bo-1-rad-20 how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn2 trans-03 p-rl-5 p-t-2">
								<?= $data['nama_kategori']; ?>
							</a>
							<h3 class="how1-child2 m-t-10">
								<a href="detail.php?idBerita=<?= $data['id_berita']; ?>&idKategori=<?= $data['id_kategori']; ?>" class="f1-l-1 cl0 hov-cl10 trans-03 respon1">
									<?php custom_echo($data["judul"], 50) ?>
								</a>
							</h3>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
			
	
	</section>
	
	<!-- Berita Terbaru -->
	<section class="bg0 p-t-60 p-b-35">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-12 p-b-20">
					<div class="how2 how2-cl2 flex-s-c m-r-10 m-r-0-sr991">
						<h3 class="f1-m-5 cl1 tab01-title">
							Berita Terbaru
						</h3>
					</div>

					<div class="row p-t-20">
						<?php foreach ($berita as $data) : ?>
							<div class="col-sm-4 p-r-25 p-r-15-sr991">
								<!-- Item latest -->
								<div class="m-b-45">
									<a href="detail.php?idBerita=<?= $data['id_berita']; ?>&idKategori=<?= $data['id_kategori']; ?>" class="wrap-pic-w hov1 trans-03">
										<img src="img/<?= $data['gambar']; ?>" alt="IMG" height="200">
									</a>

									<div class="p-t-16">
										<h5 class="p-b-5">
											<a href="detail.php?idBerita=<?= $data['id_berita']; ?>&idKategori=<?= $data['id_kategori']; ?>" class="f1-m-3 cl2 hov-cl10 trans-03">
												<?= $data['judul']; ?>
											</a>
										</h5>

										<h3 class="p-b-5">
											<a href="menu.php?idKategori=<?= $data['id_kategori']; ?>" class="f1-s-4 cl8 hov-cl10 trans-03">
												<?= $data['nama_kategori']; ?>
											</a>
										</h3>

										<span class="cl8">
											<span class="f1-s-4 cl8 hov-cl10 trans-03">
												<?= $data['penulis']; ?>
											</span>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												<?= date("d M", strtotime($data["tgl_rilis"])); ?>
											</span>
										</span>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<!-- Pagination -->
					<div class="flex-wr-s-c m-rl--7 p-t-10">
						<?php for ($i = 1; $i <= $total_pages; $i++) : ?>
							<a href="index.php?page=<?= $i ?>" class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7 <?= $i == $current_page ? 'pagi-active' : ''; ?>"><?= $i ?></a>
						<?php endfor; ?>
					</div>


				</div>
			</div>
		</div>
	</section>

	<!-- Kategori -->
	<section class="bg0 p-b-35">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-12 p-b-20">
					<div class="how2 how2-cl2 flex-s-c m-r-0-sr991">
						<h3 class="f1-m-5 cl1 tab01-title">
							Kategori
						</h3>
					</div>
					<div class="row p-t-20">
						<div class="col-md-9 col-lg-9 p-b-20">
							<div class="row">
								<?php foreach ($menu as $data) : ?>
									<div class="col-sm-3 p-r-25 p-r-15-sr991 m-b-15">
										<!-- Item latest -->
										<h5>
											<a href="menu.php?idKategori=<?= $data['id_kategori']; ?>" class="f1-m-2 cl5 hov-cl10 trans-03">
												<?= $data['nama_kategori']; ?>
											</a>
										</h5>
									</div>
								<?php endforeach; ?>
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
								<img class="max-s-full" src="images/logo-k3l.png" alt="LOGO">
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
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>