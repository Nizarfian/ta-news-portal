-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 06:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beritakel3`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `penulis` varchar(30) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `tgl_rilis` date DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `judul`, `penulis`, `isi_berita`, `tgl_rilis`, `gambar`) VALUES
(1, 4, 'asdfadg', 'asdasd', 'asdgadg', '2023-12-05', '6562d3c74b3cd.jpg'),
(2, 4, 'asd', 'asd', 'asdasd', '2023-12-20', 'ksad-jenderal-maruli-simanjuntak-dok-youtube-sekretariat-presiden_169.png'),
(3, 4, 'asdfasd', 'asdasd', 'asdasdasda', '2023-12-04', '3.jpg'),
(4, 1, 'asdasd', 'asdasd', 'asdasd', '2023-12-05', '6562d3c74b3cd.jpg'),
(5, 1, 'asdasd', 'asdasd', 'asdasd', '2023-12-03', 'ksad-jenderal-maruli-simanjuntak-dok-youtube-sekretariat-presiden_169.png'),
(6, 1, 'asdasd', 'asdasd', 'asdasd', '2023-12-03', '3.jpg'),
(7, 5, 'asdasd', 'asdasd', 'asdasd', '2023-12-04', '2.jpg'),
(8, 2, 'asdasd', 'asdasd', 'asdasd', '2023-12-03', '6562d3c74b3cd.jpg'),
(9, 3, 'asdasd', 'asdasd', 'asdasd', '2023-12-01', '6562d3c74b3cd.jpg'),
(10, 3, 'asdasd', 'asdasd', 'asdasd', '2023-12-03', 'ksad-jenderal-maruli-simanjuntak-dok-youtube-sekretariat-presiden_169.png'),
(11, 5, 'asdasd', 'asdasd', 'asdasd', '2023-12-04', '6562d3c74b3cd.jpg'),
(12, 5, 'asdasd', 'asdasd', 'asdasd', '2023-12-04', 'ksad-jenderal-maruli-simanjuntak-dok-youtube-sekretariat-presiden_169.png'),
(13, 5, 'asdasd', 'asdasd', 'asdasd', '2023-12-01', '3.jpg'),
(14, 1, 'asdasd', 'asdasd', 'asdasd', '2023-12-20', '2.jpg'),
(15, 5, 'asdasd', 'asdasd', 'asdasd', '2023-12-10', 'Dihantam Pandemi Covid-19, Peringkat Indonesia di PISA 2022 Naik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, ' Entertaiment'),
(2, 'Otomotif'),
(3, 'Olahraga'),
(4, 'Edukasi'),
(5, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi_komentar` text NOT NULL,
  `tgl_komen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_berita`, `id_user`, `isi_komentar`, `tgl_komen`) VALUES
(6, 14, 4, 'test komen', '2023-12-06 00:55:00'),
(7, 5, 4, 'test', '2023-12-06 00:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `saran_berita`
--

CREATE TABLE `saran_berita` (
  `id_saran_berita` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saran_berita`
--

INSERT INTO `saran_berita` (`id_saran_berita`, `id_kategori`, `id_user`, `judul`, `isi_berita`, `gambar`) VALUES
(1, 4, 4, 'Dihantam Pandemi Covid-19, Peringkat Indonesia di PISA 2022 Naik', 'Hasil studi PISA 2022 dirilis Kemendikbudristek , Selasa (5/12/2023). Berdasarkan hasil PISA 2022, peringkat hasil belajar literasi Indonesia berhasil naik 5 sampai 6 posisi dibanding hasil PISA 2018. Peningkatan ini merupakan capaian paling tinggi secara peringkat (persentil) sepanjang sejarah Indonesia mengikuti PISA. Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi (Mendikbudristek), Nadiem Anwar Makarim, menyampaikan bahwa peningkatan peringkat ini menunjukkan ketangguhan sistem pendidikan Indonesia dalam mengatasi hilangnya pembelajaran (learning loss) akibat pandemi. \r\n\r\n“Untuk literasi membaca, peringkat Indonesia di PISA 2022 naik 5 posisi dibanding sebelumnya. Untuk literasi matematika, peringkat Indonesia di PISA 2022 juga naik 5 posisi, sedangkan untuk literasi sains naik 6 posisi,” jelasnya di Jakarta, melalui siaran pers, Selasa (5/12/2023). \r\n\r\nPeningkatan posisi Indonesia pada PISA 2022 mengindikasikan resiliensi yang baik dalam menghadapi pandemi Covid-19. Skor literasi membaca internasional di PISA 2022 rata-rata turun 18 poin, sedangkan skor Indonesia mengalami penurunan sebesar 12 poin, yang merupakan penurunan dengan kategori rendah dibandingkan negara-negara lain. \r\n\r\nDirektur untuk Pendidikan dan Keterampilan, Organisasi untuk Kerja Sama dan Pembangunan Ekonomi (Organisation for Economic Cooperation and Development, OECD), Andreas Schleicher memuji ketangguhan sistem pendidikan Indonesia, terutama di saat pandemi Covid-19. Beberapa tahun terakhir ini menurutnya merupakan masa yang sangat sulit. Namun, peserta didik Indonesia secara umum berhasil mempertahankan kualitas hasil pembelajaran dalam nilai PISA mereka. \r\n\r\n“Kami sampaikan selamat kepada Indonesia yang telah berhasil menjaga kualitas hasil pembelajaran. Hasil PISA ini juga menunjukkan bahwa para guru di Indonesia memberi dukungan yang baik para murid selama pandemi,” ucapnya bangga. \r\n\r\nIndonesia mengikuti PISA sejak pertama kali diselenggarakan pada tahun 2000. Keikutsertaan dalam PISA memungkinkan Indonesia memantau kualitas pendidikannya dari waktu ke waktu dan membandingkannya dengan negara lain. \r\n\r\nPISA diselenggarakan setiap tiga tahun oleh OECD untuk mengukur literasi membaca, matematika, dan sains pada murid berusia 15 tahun. Pada 2022, PISA diikuti oleh 81 negara, yang terdiri dari 37 negara OECD dan 44 negara mitra. Selain menggunakan PISA, sejak 2021 Indonesia telah melaksanakan Asesmen Nasional (AN) untuk memetakan kualitas pendidikan di setiap sekolah dan daerah secara lebih komprehensif.\r\n\r\nMengapa Peringkat PISA Indonesia Naik?\r\n\r\nMendikbudristek dalam paparannya mengutarakan bahwa relatif kecilnya learning loss mencerminkan ketangguhan para guru yang didukung berbagai program penanganan pandemi dari Kemendikbudristek. Alasan pertama berkaitan dengan akses daring. “Bantuan kuota internet diberikan pada lebih dari 25 juta murid dan 1,7 juta guru agar dapat mengakses materi dan melaksanakan pembelajaran secara daring,” tutur Nadiem.\r\n\r\nFaktor lain yang mendorong naiknya peringkat Indonesia pada PISA 2022 adalah pelatihan guru yang disediakan oleh Kemendikbudristek melalui Platform Merdeka Mengajar disertai adanya materi pembelajaran secara daring dan hibrida (hybrid).\r\n“Berbagai materi pembelajaran dibuat untuk membantu guru melaksanakan pembelajaran di masa pandemi. Ini mencakup materi “Belajar dari Rumah” di TVRI, modul asesmen diagnostik untuk mengukur literasi dan numerasi, modul pembelajaran literasi dan numerasi,” jelasnya. \r\n\r\nTerobosan yang tak kalah penting adalah pemberlakuan Kurikulum Darurat yang menyederhanakan materi kurikulum agar guru dapat fokus pada pembelajaran yang lebih mendalam, terutama untuk penguatan literasi dan numerasi peserta didik. \r\n\r\n“Penyederhanaan materi kurikulum efektif memitigasi learning loss. Sekolah yang menggunakan Kurikulum Darurat mengalami 1 bulan learning loss, dibanding 5 bulan di sekolah yang menerapkan Kurikulum 2013 secara penuh,“ imbuh Nadiem. Penyederhanaan materi ini menjadi salah satu prinsip utama dalam merancang Kurikulum Merdeka. \r\n\r\nDengan prinsip ini, Kurikulum Merdeka mengurangi materi wajib di berbagai mata pelajaran agar guru punya waktu lebih untuk menggunakan pembelajaran yang mendalam, interaktif, dan berbasis projek. \r\n\r\nKurikulum Merdeka menurut Nadiem, mendukung guru melakukan asesmen diagnostik dan pembelajaran yang sesuai dengan kemampuan tiap murid. Buku-buku teks Kurikulum Merdeka juga memuat lebih banyak aktivitas yang dirancang mengasah daya nalar. “Dengan demikian, pembelajaran dengan Kurikulum Merdeka tidak lagi berorientasi pada penyampaian materi, tapi mengasah kompetensi dan karakter murid,” tegasnya.', 'Dihantam Pandemi Covid-19, Peringkat Indonesia di PISA 2022 Naik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'Kelompok3', 'admin', 'admin'),
(2, 'Aprilisa', 'user1', 'user'),
(3, 'Rania', 'user2', 'user'),
(4, 'Christopher', 'user3', 'user'),
(5, 'Irfan', 'user4', 'user'),
(6, 'Nizar', 'user5', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_berita_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `fk_komentar_berita` (`id_berita`),
  ADD KEY `fk_komentar_user` (`id_user`);

--
-- Indexes for table `saran_berita`
--
ALTER TABLE `saran_berita`
  ADD PRIMARY KEY (`id_saran_berita`),
  ADD KEY `fk_saran_user` (`id_user`),
  ADD KEY `fk_saran_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saran_berita`
--
ALTER TABLE `saran_berita`
  MODIFY `id_saran_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_komentar_berita` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_komentar_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `saran_berita`
--
ALTER TABLE `saran_berita`
  ADD CONSTRAINT `fk_saran_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_saran_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
