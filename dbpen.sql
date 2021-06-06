-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 07:47 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `perusahaan_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `nama`, `perusahaan_id`) VALUES
(1, 'Pemotongan', 1),
(2, 'Penyaringan', 1),
(3, 'QC', 2),
(4, 'Pemotongan', 2),
(5, 'Penyaringan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tubuh`
--

CREATE TABLE `jenis_tubuh` (
  `id` int(5) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_tubuh`
--

INSERT INTO `jenis_tubuh` (`id`, `jenis`) VALUES
(1, 'Tubuh bagian atas'),
(2, 'Tubuh bagian tengah'),
(3, 'Tubuh bagian bawah'),
(4, 'Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tubuh_pertanyaan`
--

CREATE TABLE `jenis_tubuh_pertanyaan` (
  `id` int(5) NOT NULL,
  `pertanyaan_id` int(5) DEFAULT NULL,
  `jenis_tubuh_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_tubuh_pertanyaan`
--

INSERT INTO `jenis_tubuh_pertanyaan` (`id`, `pertanyaan_id`, `jenis_tubuh_id`) VALUES
(59, 101, 2),
(60, 101, 3),
(63, 102, 1),
(64, 102, 2),
(65, 102, 3),
(66, 103, 1),
(67, 103, 2),
(68, 103, 3),
(69, 104, 1),
(70, 104, 2),
(71, 105, 1),
(72, 105, 2),
(73, 106, 2),
(74, 106, 3),
(75, 107, 2),
(76, 107, 3),
(77, 108, 2),
(78, 108, 3),
(79, 109, 2),
(80, 109, 3),
(81, 110, 2),
(82, 110, 3),
(83, 111, 1),
(84, 111, 2),
(85, 112, 1),
(86, 112, 2),
(87, 113, 1),
(88, 113, 2),
(89, 114, 1),
(90, 114, 2),
(91, 115, 1),
(92, 116, 1),
(93, 117, 1),
(94, 118, 1),
(95, 119, 1),
(96, 119, 2),
(97, 120, 1),
(98, 120, 2),
(99, 121, 2),
(100, 122, 1),
(101, 122, 2),
(102, 123, 1),
(103, 123, 2),
(104, 124, 1),
(105, 124, 2),
(106, 125, 1),
(107, 125, 2),
(108, 126, 1),
(109, 126, 2),
(110, 127, 1),
(111, 128, 1),
(112, 129, 1),
(113, 130, 1),
(114, 131, 1),
(115, 132, 1),
(116, 133, 1),
(117, 134, 1),
(118, 135, 1),
(119, 136, 1),
(120, 137, 4),
(121, 138, 4),
(122, 139, 4),
(123, 140, 4),
(124, 141, 4),
(125, 142, 4),
(126, 143, 4),
(127, 144, 4),
(128, 145, 4),
(129, 146, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`id`, `nama`, `bidang_id`) VALUES
(1, 'Ahmad Hadi', 1),
(2, 'Ahmad Zubair', 2);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(5) NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `jumlah_jenis_1` int(10) DEFAULT NULL,
  `jumlah_jenis_2` int(10) DEFAULT NULL,
  `jumlah_jenis_3` int(10) DEFAULT NULL,
  `jumlah_lingkungan` int(10) DEFAULT NULL,
  `jawaban_otot` varchar(100) DEFAULT NULL,
  `jawaban_lingkungan` varchar(100) DEFAULT NULL,
  `perusahaan_id` int(5) DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL,
  `pekerja_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(5) NOT NULL,
  `pertanyaan` text DEFAULT NULL,
  `gambar_ya` varchar(255) DEFAULT NULL,
  `gambar_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `gambar_ya`, `gambar_no`) VALUES
(101, 'Jika permukaan lantai ditempat anda bekerja tidak rata, landai, licin atau berpegas', 'cat 1.jpg', ''),
(102, 'Apakah ruangan anda terlalu terbatas untuk melakukan gerakan pekerjaan?', '', ''),
(103, 'Apakah peralatan dan perlengkapan yang ada memiliki desain yang tidak sesuai dengan pekerjaan anda?', '', ''),
(104, 'Apakah terjadi kesalahan pengaturan ketinggian posisi kerja?', '', ''),
(105, 'Apakah desain kursi kerja kurang baik atau kesalahan pengaturan terhadap kursi kerja anda?', '', ''),
(106, 'Apakah pekerjaan anda dilakukan dalam posisi berdiri, apakah tidak ada kemungkinan untuk beristirahat?\r\n', '', ''),
(107, 'Apakah terjadi kelelahan dikarenakan pedal kaki?\r\n', '', ''),
(108, 'Apakah terjadi kelelahan penggunaan pedal kaki seperti langkah berulang pada bangku, saat melangkah dan sebagainya?\r\n', '', ''),
(109, 'Apakah terjadi kelelahan penggunaan pedal kaki seperti Melompat berulang-ulang, jongkok maupun berlutut dalam waktu yang lama?\r\n', '', ''),
(110, 'Apakah terjadi kelelahan penggunaan pedal kaki seperti bertumpu menggunakan satu kaki pada saat berdiri?\r\n', '', ''),
(111, 'Apakah pekerjaan berulang  atau lama anda dilakukan dengan posisi punggung agak menekuk kedepan?\r\n', '', ''),
(112, 'Apakah pekerjaan berulang atau lama anda dilakukan dengan posisi punggung sangat menekuk kedepan?\r\n', '', ''),
(113, 'Apakah pekerjaan berulang atau lama dilakukan dengan posisi punggung membungkuk ke samping atau agak terpelintir?\r\n', '', ''),
(114, 'Apakah pekerjaan berulang atau lama dilakukan dengan posisi punggung sangat terpelintir?\r\n', '', ''),
(115, 'Apakah pekerjaan berulang atau lama dilakukan dengan posisi leher agak menekuk kedepan?\r\n', '', ''),
(116, 'Apakah pekerjaan berulang atau lama dilakukan dengan posisi leher membungkuk ke samping atau agak terpelintir?\r\n', '', ''),
(117, 'Apakah pekerjaan berulang atau lama dilakukan dengan posisi leher sangat terpelintir?\r\n', '', ''),
(118, 'Apakah pekerjaan berulang atau lama dilakukan dengan posisi leher memanjang kebelakang?\r\n', '', ''),
(119, 'Apakah pekerjaan anda dalam mengangkat beban dilakukan secara manual? Jika iya apakah mengangkat beban anda dilakukan secara berulang?\r\n', '', ''),
(120, 'Apakah berat badan termasuk faktor penting dalam mengangkat beban secara manual?\r\n', '', ''),
(121, 'Apakah ada bagian tubuh anda sangat terpelintir dalam mengangkat beban secara manual?\r\n', '', ''),
(122, 'Apakah berpengaruh lokasi pengangkatan beban yang tidak biasa pada sisi maupun ujung beban ketika anda mengangkat beban ?\r\n', '', ''),
(123, 'Apakah panjang lengan anda berpengaruh ketika mengangkat beban secara manual?\r\n', '', ''),
(124, 'Apakah mengangkat beban dilakukan secara manual? penanganan dari lutut kebawah?', '', ''),
(125, 'Apakah mengangkat beban dilakukan secara manual? penanganan dari atas ketinggian bahu?\r\n', '', ''),
(126, 'Apakah pekerjaan berulang-ulang atau pekerjaan lama atau kondisi tidak nyaman pada saat membawa, mendorong atau menarik dari beban dilakukan?\r\n', '', ''),
(127, 'Apakah pekerjaan yang dilakukan terus menerus ketika salah satu lengan mencapai kedepan atau kesamping tanpa bantuan?\r\n', '', ''),
(128, 'Apakah ada pengulangan dari gerakan kerja serupa?\r\n', '', ''),
(129, 'Apakah ada pengulangan dari gerakan kerja serupa di luar jangkauan yang nyaman?\r\n', '', ''),
(130, 'Apakah pekerjaan manual dilakukan secara berulang-ulang? berat badan atau peralatan kerja?\r\n', '', ''),
(131, 'Apakah pekerjaan manual dilakukan secara berulang-ulang? canggung dalam memegang bahan atau peralatan?\r\n', '', ''),
(132, 'Apakah ada tuntutan tinggi dalam kapasitas visual?', '', ''),
(133, 'Adakah pekerjaan berulang menggunakan lengan atau tangan dilakukan dengan pergerakan memutar atau melintir?\r\n', '', ''),
(134, 'Adakah pekerjaan berulang menggunakan lengan atau tangan dilakukan dengan pergerakan yang dipaksakan?\r\n', '', ''),
(135, 'Adakah pekerjaan berulang menggunakan lengan atau tangan dilakukan dengan posisi lengan yang tidak nyaman?', '', ''),
(136, 'Adakah pekerjaan berulang menggunakan lengan atau tangan pada saklar atau keyboard?', '', ''),
(137, 'Apakah tidak ada kemungkinan untuk mengambil istirahat atau jeda?', '', ''),
(138, 'Apakah tidak ada kemungkinan untuk memilih urutan jenis pekerjaan maupun tugas atau kecepatan kerja?\r\n', '', ''),
(139, 'Apakah pekerjaan yang dilakukan dibawah tuntunan waktu atau stress psikologis?\r\n', '', ''),
(140, 'Apakah pekerjaan dapat ditemui situasi yang tidak biasa atau situasi yang diharapkan?\r\n', '', ''),
(141, 'Apakah di tempat anda bekerja sedang kondisi dingin?\r\n', '', ''),
(142, 'Apakah di tempat anda bekerja sedang kondisi panas?\r\n', '', ''),
(143, 'Apakah di tempat anda bekerja memiliki aliran udara yang baik?\r\n', '', ''),
(144, 'Apakah di tempat anda bekerja sedang kondisi bising?\r\n', '', ''),
(145, 'Apakah kondisinya visual yang menyulitkan?\r\n', '', ''),
(146, 'Apakah kondisinya sentakan, goncangan, atau getaran?\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`) VALUES
(1, 'PT. Jaya Terus'),
(2, 'PT. Sinar Benderang'),
(3, 'PT. Makin Makmur');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `lama_kerja` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `jenis_kelamin`, `umur`, `lama_kerja`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', 'perempuan', 26, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perusahaan_id` (`perusahaan_id`);

--
-- Indexes for table `jenis_tubuh`
--
ALTER TABLE `jenis_tubuh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_tubuh_pertanyaan`
--
ALTER TABLE `jenis_tubuh_pertanyaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_id` (`pertanyaan_id`),
  ADD KEY `jenis_tubuh_id` (`jenis_tubuh_id`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidang_id` (`bidang_id`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pekerja_id` (`pekerja_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_tubuh_pertanyaan`
--
ALTER TABLE `jenis_tubuh_pertanyaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidang`
--
ALTER TABLE `bidang`
  ADD CONSTRAINT `bidang_ibfk_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`);

--
-- Constraints for table `jenis_tubuh_pertanyaan`
--
ALTER TABLE `jenis_tubuh_pertanyaan`
  ADD CONSTRAINT `jenis_tubuh_pertanyaan_ibfk_1` FOREIGN KEY (`pertanyaan_id`) REFERENCES `pertanyaan` (`id`),
  ADD CONSTRAINT `jenis_tubuh_pertanyaan_ibfk_2` FOREIGN KEY (`jenis_tubuh_id`) REFERENCES `jenis_tubuh` (`id`);

--
-- Constraints for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD CONSTRAINT `pekerja_ibfk_1` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`);

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`pekerja_id`) REFERENCES `pekerja` (`id`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
