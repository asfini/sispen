-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 01:15 AM
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
-- Database: `dbpenresiko`
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
(2, 'Penyaringan', 1);

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
(58, 101, 1),
(59, 101, 2),
(60, 101, 3),
(61, 202, 2),
(62, 202, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE `pekerja` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `pertanyaan`, `gambar`) VALUES
(101, 'Jika permukaan lantai ditempat anda bekerja tidak rata, landai, lici atau berpegas', 'cat 1.jpg'),
(202, 'IF Then', 'cat 3.jpg');

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
(3, 'test'),
(4, 'test lagi'),
(5, 'ooo'),
(6, 'enam');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
