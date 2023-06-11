-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:26 PM
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
(28, 1, 'penting banget', 'roda 2', 'ab 2222 ca', '2023-06-09', '2023-06-15', '2023-06-10', '2023-06-15', '2023-06-30', 'KC MANADO', 'Analisis Penyakit.pdf'),
(29, 2, 'ini ano', 'roda 4', 'ab2222ca', '2023-06-02', '2023-06-08', '2023-06-17', '2023-06-21', '2023-06-30', 'KC MANADO', 'ILMU PENGETAHUAN.pdf');

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
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_mas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_mas`) REFERENCES `masyarakat` (`id_mas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
