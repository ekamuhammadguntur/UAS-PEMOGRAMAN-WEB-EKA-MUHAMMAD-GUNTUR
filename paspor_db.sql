-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2026 at 12:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paspor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ulang`
--

CREATE TABLE `daftar_ulang` (
  `id` int(11) NOT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `hari_datang` varchar(20) DEFAULT NULL,
  `tanggal_datang` date DEFAULT NULL,
  `ktp` enum('Ada','Tidak') DEFAULT NULL,
  `kk` enum('Ada','Tidak') DEFAULT NULL,
  `ijazah_akte` enum('Ada','Tidak') DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `keperluan` enum('Wisata','Umroh','Kerja','Studi','Kunjungan Keluarga') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_ulang`
--

INSERT INTO `daftar_ulang` (`id`, `no_daftar`, `hari_datang`, `tanggal_datang`, `ktp`, `kk`, `ijazah_akte`, `keterangan`, `no_antrian`, `keperluan`) VALUES
(4, '11323', NULL, NULL, 'Ada', 'Ada', 'Ada', 'OK', 4, 'Wisata'),
(5, '11323', NULL, NULL, 'Ada', 'Ada', 'Ada', 'OK', 5, 'Umroh');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `no_daftar`, `nama`, `tanggal_daftar`, `hari`, `tanggal`, `jam`) VALUES
(4, '11323', 'eka', '2026-01-14', 'Friday', NULL, '04:46:50'),
(16, '123', 'huss', '2026-01-12', 'Friday', '2026-01-09', '08:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `pengurusan`
--

CREATE TABLE `pengurusan` (
  `id` int(11) NOT NULL,
  `no_antrian` int(11) DEFAULT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `berkas` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `pembayaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengurusan`
--

INSERT INTO `pengurusan` (`id`, `no_antrian`, `no_daftar`, `nama`, `berkas`, `status`, `keterangan`, `pembayaran`) VALUES
(1, 4, '11323', 'eka', 'Lengkap', 'Diterima', 'OK', 355000),
(2, 5, '11323', 'eka', 'Lengkap', 'Diterima', 'OK', 355000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_antrian` (`no_antrian`),
  ADD KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `pengurusan`
--
ALTER TABLE `pengurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_antrian` (`no_antrian`),
  ADD KEY `no_daftar` (`no_daftar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengurusan`
--
ALTER TABLE `pengurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_ulang`
--
ALTER TABLE `daftar_ulang`
  ADD CONSTRAINT `daftar_ulang_ibfk_1` FOREIGN KEY (`no_daftar`) REFERENCES `pendaftar` (`no_daftar`) ON DELETE CASCADE;

--
-- Constraints for table `pengurusan`
--
ALTER TABLE `pengurusan`
  ADD CONSTRAINT `pengurusan_ibfk_1` FOREIGN KEY (`no_antrian`) REFERENCES `daftar_ulang` (`no_antrian`),
  ADD CONSTRAINT `pengurusan_ibfk_2` FOREIGN KEY (`no_daftar`) REFERENCES `pendaftar` (`no_daftar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
