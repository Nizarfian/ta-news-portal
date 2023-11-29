-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 05:24 PM
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
(18, 5, 'Profil Maruli Simanjuntak, Sosok KSAD Baru yang Dilantik Jokowi', 'Christopher', 'Jakarta - Presiden Joko Widodo (Jokowi) telah melantik Maruli Simanjuntak sebagai Kepala Staf Angkatan Darat (KSAD). Maruli mengisi posisi yang sebelumnya diemban oleh Jenderal Agus Subiyanto, yang kini telah resmi menjadi Panglima TNI.\r\nDengan jabatannya sebagai KSAD, Maruli Simanjuntak kini menyandang pangkat Jenderal TNI. Sebelumnya, Maruli menjabat sebagai Panglima Komando Cadangan Strategis Angkatan Darat (Pangkostrad)\r\n\r\nLantas, seperti apa sosok Jenderal TNI Maruli Simanjuntak yang kini telah resmi dilantik menjadi KSAD baru? Simak informasi profil Maruli Simanjuntak berikut ini:\r\n\r\nDihimpun dari catatan redaksi detikcom, Maruli Simanjuntak, M.Sc. sebelumnya menjabat sebagai Panglima Kostrad (Pangkostrad) sejak tanggal 31 Januari 2022. Maruli Simanjuntak adalah seorang Abituren Akademi Militer (Akmil) tahun 1992.\r\n\r\nMaruli lahir pada tanggal 27 Februari 1970 di Bandung, Jawa Barat (Jabar). Maruli merupakan anak ketiga dari lima bersaudara dari pasangan Batak yang merantau ke Jawa. Ayahnya berprofesi sebagai guru dan ibunya seorang perawat.\r\n\r\nSejak awal karier, Maruli pernah dipercaya memegang sejumlah jabatan strategis di Korps Baret Merah. Di antaranya yaitu, Komandan Batalyon (Danyon) 21 Grup 2 Kopassus, Komandan Sekolah Komando Pusat Pendidikan dan Latihan Pasukan Khusus (Pusdikpassus).\r\n\r\nMaruli juga dipercaya sebagai Wakil Komandan Grup 1 Kopassus. Dia lalu dipercaya mengisi posisi sebagai Komandan Grup 2 Kopassus sampai tahun 2014. Di tahun yang sama, Maruli dipercaya menjadi Komandan Grup A Pasukan Pengamanan Presiden (Paspampres) sampai tahun 2016.\r\n\r\nPada tahun 2016, Maruli mengemban jabatan sebagai Komandan Korem (Danrem) 074/Warastratama. Saat menjabat Danrem 074, Maruli meraih Penghargaan sebagai Danrem terbaik dalam bidang Upaya Khusus (Upsus) Ketahanan Pangan Tingkat Nasional tahun 2016.\r\n\r\nPada tahun 2017 hingga 2018, Maruli kemudian ditunjuk untuk menduduki jabatan sebagai Wakil Komandan Paspampres. Satu tahun berikutnya, Maruli Simanjuntak menjabat sebagai Kepala Staf Komando Daerah Militer (Kasdam) IV/Diponegoro.\r\n\r\nSelanjutnya, sosok Maruli Simanjuntak mendapatkan promosi menjabat sebagai Komandan Paspampres dan berlanjut memegang tongkat komando sebagai Pangdam IX/Udayana. Maruli mulai menjabat sebagai Pangkostrad pada awal tahun 2022 lalu.\r\n\r\nKini, usai dilantik oleh Presiden Jokowi pada tanggal 29 November 2023, Maruli Simanjuntak telah resmi menjabat sebagai KSAD baru, menggantikan Jenderal Agus Subiyanto, yang kini menjadi Panglima TNI. Maruli kini juga resmi menyandang pangkat sebagai Jenderal TNI.\r\n', '2023-11-29', 'ksad-jenderal-maruli-simanjuntak-dok-youtube-sekretariat-presiden_169.png'),
(19, 1, 'Francesco Camarda Sabtu Bikin Sejarah, Senin Masuk Sekolah', 'Christopher', 'Penyerang AC Milan berumur 15 tahun, Francesco Camarda, mencetak sejarah baru pada hari Sabtu (25/11/2023). Selang dua hari, dia harus kembali menuntut ilmu. Partai pekan ke-13 Liga Italia 2023-2024 antara Milan vs Fiorentina, Sabtu (25/11/2023) atau Minggu (26/11/2023) dini hari WIB, menjadi panggung bersejarah bagi Francesco Camarda. Camarda yang merupakan kelahiran tahun 2008 dimainkan oleh pelatih Milan, Stefano Pioli pada menit ke-83. Ketika hendak masuk lapangan, Camarda diantar publik San Siro dengan pekik menggelegar. Seisi San Siro kompak meneriakkan nama “Camarda!” usai sang announcer pertandingan mengucapkan “Francesco”.\r\n\r\nSejarah tercipta. Bermain dalam usia 15 tahun, 8 bulan, plus 15 hari, Camarda resmi menjadi pemain termuda yang pernah mentas di ajang Liga Italia. Camarda mengusangkan rekor pemain Bologna, Wisdom Amey, yang menuai debut di Serie A Liga Italia pada usia 15 tahun, 9 bulan, plus 1 hari. Sehari setelah mencatat debut bersejarah bersama Milan, Camarda kembali ke sentra latihan klub di Milanello, Minggu (26/11/2023). Ia datang bersama kedua orangtuanya dan sang anjing peliharaan. Tak lupa, Camarda membawa traktiran berupa kue-kue manis untuk rekan setimnya di Milan. Camarda meneruskan tradisi lama di Milan, di mana seorang debutan wajib membawa produk pastry untuk dilahap bersama-sama.', '2023-11-29', '6562d3c74b3cd.jpg');

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
(1, 'Olahraga'),
(2, 'Makanan'),
(3, 'Kesehatan'),
(4, 'Pendidikan'),
(5, 'Politik'),
(6, 'K-Pop');

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
(1, 18, 2, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '2023-11-29 07:48:31'),
(2, 18, 3, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '2023-11-29 12:48:31'),
(3, 19, 4, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '2023-11-30 14:50:16');

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
(1, 6, 2, 'Berita 6', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '6562d3c74b3cd.jpg'),
(2, 3, 3, 'Berita 3', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '6562d3c74b3cd.jpg'),
(3, 1, 5, 'Berita 1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.', '6562d3c74b3cd.jpg');

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
(4, 'Christoper', 'user3', 'user'),
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
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saran_berita`
--
ALTER TABLE `saran_berita`
  MODIFY `id_saran_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
