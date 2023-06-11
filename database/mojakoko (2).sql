-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mojakoko`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id_data` int(11) NOT NULL,
  `id_mas` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `jenis_kendaraan` text NOT NULL,
  `plat` varchar(20) NOT NULL,
  `mbl` date NOT NULL,
  `mbl_sd` date NOT NULL,
  `mbb` date NOT NULL,
  `mbb_sd` date NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `lokasi` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `id_mas`, `uraian`, `jenis_kendaraan`, `plat`, `mbl`, `mbl_sd`, `mbb`, `mbb_sd`, `jatuh_tempo`, `lokasi`, `file`) VALUES
(5, 2, 'ini', 'Roda 2', 'ab2222ca', '2023-06-02', '2023-06-08', '2023-06-09', '2023-06-29', '2023-06-09', 'KC MANADO', 'document.pdf'),
(10, 0, 'penting po', 'Roda 4', '333333', '2023-06-15', '2023-06-22', '2023-06-23', '2023-06-28', '2023-06-28', 'KC MANADO', 'document.pdf'),
(12, 0, 'penting banget 3', 'Roda 4', 'ab 2222 ca', '2023-06-16', '2023-06-15', '2023-06-23', '2023-06-17', '2023-06-23', 'KC MANADO', 'KETUA3.pdf'),
(16, 10, 'penting banget to', 'Roda 4', 'ab2222ca', '2023-06-17', '2023-06-30', '2023-06-30', '2023-06-03', '2023-06-30', 'KC MANADO', 'Dokumen tanpa judul.pdf'),
(18, 2, 'penting banget', 'roda 4', 'ab 6666 ca', '2023-06-17', '2023-06-24', '2023-06-24', '2023-06-29', '2023-06-29', 'KC TERNATE', 'Dokumen tanpa judul.pdf'),
(19, 1, 'penting banget', 'roda 2', 'ab 2222 ca', '2023-06-16', '2023-06-30', '2023-06-16', '2023-06-10', '2023-06-23', 'KC MANADO', 'UPAYA-PENINGKATAN-PEMAHAMAN-WAWASAN-NUSANTARA-SEBAGAI-SARANA-DALAM-MENINGKATKAN-SEMANGAT-NASIONALISME-BAGI-WARGA-NEGARA-INDONESIA (1).pdf'),
(20, 1, 'penting banget', 'roda 2', 'ab 2222 ca', '2023-06-16', '2023-06-30', '2023-06-16', '2023-06-10', '2023-06-23', 'KC MANADO', 'UPAYA-PENINGKATAN-PEMAHAMAN-WAWASAN-NUSANTARA-SEBAGAI-SARANA-DALAM-MENINGKATKAN-SEMANGAT-NASIONALISME-BAGI-WARGA-NEGARA-INDONESIA (1).pdf'),
(21, 1, 'penting banget ini', 'roda 4', 'ab 6666 ca', '2023-06-10', '2023-06-30', '2023-06-24', '2023-06-29', '2023-06-30', 'KC MANADO', 'DBC118024_AndreCrisnaldy_LiteratureReview.pdf'),
(22, 1, 'penting banget admin', 'roda 4', 'ab 2222 ca', '2023-06-17', '2023-06-08', '2023-06-10', '2023-06-22', '2023-06-08', 'KC TERNATE', 'Heuristic Search.pdf'),
(23, 1, 'penting banget adminnnn', 'roda 4', '333333', '2023-06-09', '2023-06-15', '2023-06-10', '2023-06-14', '2023-06-22', 'KC MANADO', 'PENGEMBANGAN APLIKASI KASIR PADA SISTEM INFORMASI RUMAH MAKAN PADANG ARIUNG.pdf'),
(24, 2, 'penting banget', 'roda 2', 'ab 2222 ca', '2023-06-14', '2023-06-15', '2023-06-17', '2023-06-20', '2023-06-30', 'KC MANADO', 'MZ2020 MODUL ke enam.pdf'),
(25, 2, 'ini ano', 'roda 4', '44444', '2023-06-22', '2023-06-21', '2023-06-24', '2023-06-13', '2023-06-24', 'KC TERNATE', 'ilovepdf_merged (2).pdf'),
(26, 2, 'ini data milik ano', 'roda 2', 'ab2222ca', '2023-06-16', '2023-06-14', '2023-06-24', '2023-06-14', '2023-06-30', 'KC MANADO', 'Skriba-Bowl01 (2).pdf'),
(27, 1, 'penting banget', 'roda 2', 'ab2222ca', '2023-06-24', '2023-06-13', '2023-06-16', '2023-06-23', '2023-06-29', 'KC MANADO', 'Uts_Riska Destiana_20330035.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_mas` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `level` enum('admin','warga','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_mas`, `nama`, `username`, `password`, `telp`, `level`) VALUES
(1, 'hallo ini admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '123', 'admin'),
(2, 'ano', 'ano', 'bde9dee6f523d6476dcca9cae8caa5f5', '09897654', 'warga'),
(9, 'riska', 'riska', '202cb962ac59075b964b07152d234b70', '123', 'warga'),
(10, 'riska', 't', 'e358efa489f58062f10dd7316b65649e', '123', 'warga'),
(11, 'ana', 'ana', '202cb962ac59075b964b07152d234b70', '1111', 'warga'),
(12, 'ana', 'ana', '202cb962ac59075b964b07152d234b70', '1111', 'warga'),
(13, 'dicxy', 'd', '8277e0910d750195b448797616e091ad', '2', 'warga'),
(14, 'nyab', 'nyab', 'd3bab1625894bc8525d4aced4f24ff6e', '999', 'warga'),
(15, 'nyab', '123', 'd3bab1625894bc8525d4aced4f24ff6e', '111', 'warga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `id_mas` (`id_mas`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_mas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_mas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
