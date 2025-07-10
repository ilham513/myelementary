-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 01:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myelementary`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `data_training`
--

CREATE TABLE `data_training` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_training`
--

INSERT INTO `data_training` (`id`, `nama_karyawan`, `hari`, `jam`, `status`) VALUES
(1, 'Andi', 'Senin', '08:00', 'dipilih'),
(2, 'Andi', 'Senin', '10:00', 'tidak'),
(3, 'Budi', 'Senin', '08:00', 'tidak'),
(4, 'Budi', 'Senin', '10:00', 'dipilih'),
(5, 'Citra', 'Selasa', '08:00', 'dipilih'),
(6, 'Citra', 'Selasa', '10:00', 'tidak'),
(7, 'Dewi', 'Selasa', '08:00', 'tidak'),
(8, 'Dewi', 'Selasa', '10:00', 'dipilih'),
(9, 'Andi', 'Rabu', '08:00', 'tidak'),
(10, 'Budi', 'Rabu', '08:00', 'dipilih'),
(11, 'Citra', 'Rabu', '10:00', 'dipilih'),
(12, 'Dewi', 'Rabu', '10:00', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `waktu_kerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nomor_telpon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `jenis_kelamin`, `nomor_telpon`) VALUES
(1, 'Andi Saputro', 'Laki-laki', '081234567890'),
(2, 'Siti Aminah', 'Perempuan', '081298765432'),
(3, 'Budi Hartono', 'Laki-laki', '082112223334'),
(4, 'Dewi Lestari', 'Perempuan', '085612345678'),
(5, 'Rudi Santoso', 'Laki-laki', '083834567891'),
(6, 'Fitriani', 'Perempuan', '082244556677'),
(7, 'Agus Salim', 'Laki-laki', '089911223344'),
(8, 'Maya Sari', 'Perempuan', '081377788899'),
(9, 'Joko Widodo', 'Laki-laki', '085612309876'),
(10, 'Nur Aini', 'Perempuan', '081290076543'),
(11, 'Bapak A (MTK)', 'Laki-laki', '0899876878'),
(13, 'Bapak B (Indonesia)', 'Laki-laki', '08984985');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `password_user` varchar(255) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `password_user`, `id_karyawan`) VALUES
(1, NULL, 12),
(2, NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id`, `hari`, `jam`) VALUES
(1, 'Senin', '07:00 - 08:00'),
(2, 'Senin', '08:00 - 09:00'),
(3, 'Senin', '09:00 - 10:00'),
(4, 'Senin', '10:00 - 11:00'),
(5, 'Senin', '11:00 - 12:00'),
(6, 'Senin', '12:00 - 13:00'),
(7, 'Senin', '13:00 - 14:00'),
(8, 'Selasa', '07:00 - 08:00'),
(9, 'Selasa', '08:00 - 09:00'),
(10, 'Selasa', '09:00 - 10:00'),
(11, 'Selasa', '10:00 - 11:00'),
(12, 'Selasa', '11:00 - 12:00'),
(13, 'Selasa', '12:00 - 13:00'),
(14, 'Selasa', '13:00 - 14:00'),
(15, 'Rabu', '07:00 - 08:00'),
(16, 'Rabu', '08:00 - 09:00'),
(17, 'Rabu', '09:00 - 10:00'),
(18, 'Rabu', '10:00 - 11:00'),
(19, 'Rabu', '11:00 - 12:00'),
(20, 'Rabu', '12:00 - 13:00'),
(21, 'Rabu', '13:00 - 14:00'),
(22, 'Kamis', '07:00 - 08:00'),
(23, 'Kamis', '08:00 - 09:00'),
(24, 'Kamis', '09:00 - 10:00'),
(25, 'Kamis', '10:00 - 11:00'),
(26, 'Kamis', '11:00 - 12:00'),
(27, 'Kamis', '12:00 - 13:00'),
(28, 'Kamis', '13:00 - 14:00'),
(29, 'Jumat', '07:00 - 08:00'),
(30, 'Jumat', '08:00 - 09:00'),
(31, 'Jumat', '09:00 - 10:00'),
(32, 'Jumat', '10:00 - 11:00'),
(33, 'Jumat', '11:00 - 12:00'),
(34, 'Jumat', '12:00 - 13:00'),
(35, 'Jumat', '13:00 - 14:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
