-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2025 at 08:03 AM
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
-- Database: `antrianpx`
--

-- --------------------------------------------------------

--
-- Table structure for table `apam_cek_kontrol`
--

CREATE TABLE `apam_cek_kontrol` (
  `id` int(20) NOT NULL,
  `no_antrian` varchar(30) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  `status` enum('menunggu','dipanggil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apam_cek_kontrol`
--

INSERT INTO `apam_cek_kontrol` (`id`, `no_antrian`, `poli`, `datetime`, `status`) VALUES
(1, 'B001', 'Poli Cek Kontrol', '2025-09-22 15:00:55', 'menunggu'),
(2, 'B001', 'Poli Cek Kontrol', '2025-09-26 19:15:49', 'menunggu'),
(3, 'B001', 'Poli Cek Kontrol', '2025-09-27 07:06:45', 'dipanggil'),
(4, 'B002', 'Poli Cek Kontrol', '2025-09-27 07:07:13', 'dipanggil'),
(5, 'B003', 'Poli Cek Kontrol', '2025-09-27 07:09:00', 'dipanggil'),
(6, 'B004', 'Poli Cek Kontrol', '2025-09-27 07:10:32', 'dipanggil'),
(7, 'B005', 'Poli Cek Kontrol', '2025-09-27 07:10:43', 'dipanggil'),
(8, 'B006', 'Poli Cek Kontrol', '2025-09-27 07:10:57', 'menunggu'),
(9, 'B007', 'Poli Cek Kontrol', '2025-09-27 07:12:15', 'menunggu'),
(10, 'B008', 'Poli Cek Kontrol', '2025-09-27 08:06:43', 'menunggu'),
(11, 'B009', 'Poli Cek Kontrol', '2025-09-27 08:26:44', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `apam_poli_umum`
--

CREATE TABLE `apam_poli_umum` (
  `id` int(30) NOT NULL,
  `no_antrian` varchar(50) NOT NULL,
  `poli` varchar(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('menunggu','dipanggil') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apam_poli_umum`
--

INSERT INTO `apam_poli_umum` (`id`, `no_antrian`, `poli`, `datetime`, `status`) VALUES
(1, 'A001', 'Poli Umum', '2025-09-26 11:40:27', 'dipanggil'),
(3, 'A002', 'Poli Umum', '2025-09-26 11:46:21', 'dipanggil'),
(4, 'A003', 'Poli Umum', '2025-09-26 11:46:41', 'dipanggil'),
(5, 'A004', 'Poli Umum', '2025-09-26 12:10:13', 'dipanggil'),
(6, 'A005', 'Poli Umum', '2025-09-26 12:26:12', 'dipanggil'),
(7, 'A006', 'Poli Umum', '2025-09-26 12:26:21', 'dipanggil'),
(8, 'A007', 'Poli Umum', '2025-09-26 12:26:38', 'dipanggil'),
(9, 'A008', 'Poli Umum', '2025-09-26 12:27:45', 'dipanggil'),
(10, 'A009', 'Poli Umum', '2025-09-26 12:28:28', 'dipanggil'),
(11, 'A010', 'Poli Umum', '2025-09-26 12:41:43', 'dipanggil'),
(12, 'A011', 'Poli Umum', '2025-09-26 12:44:01', 'dipanggil'),
(13, 'A012', 'Poli Umum', '2025-09-26 12:39:20', 'menunggu'),
(14, 'A013', 'Poli Umum', '2025-09-26 12:45:36', 'menunggu'),
(15, 'A001', 'Poli Umum', '2025-09-26 23:35:18', 'dipanggil'),
(16, 'A002', 'Poli Umum', '2025-09-27 00:00:33', 'dipanggil'),
(17, 'A003', 'Poli Umum', '2025-09-27 00:12:43', 'dipanggil'),
(18, 'A004', 'Poli Umum', '2025-09-27 01:06:25', 'dipanggil'),
(19, 'A005', 'Poli Umum', '2025-09-27 01:07:10', 'menunggu'),
(20, 'A006', 'Poli Umum', '2025-09-27 01:26:49', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(20) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `alamat_instansi` varchar(30) NOT NULL,
  `background` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `video1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nama_instansi`, `alamat_instansi`, `background`, `logo`, `video1`) VALUES
(1, 'RS', 'JL.Nasional, Kota, ,Kediri', 'images/bg.jpg', 'assets/favicon.ico', 'https://www.youtube.com/embed/fXo64uBdD_M');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `fullnama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullnama`, `username`, `password`, `role`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'dia', '001', 'dc5c7986daef50c1e02ab09b442ee34f', ''),
(3, 'rudi', '003', 'bb97e651ac096eeb14d099758690c851', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apam_cek_kontrol`
--
ALTER TABLE `apam_cek_kontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apam_poli_umum`
--
ALTER TABLE `apam_poli_umum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apam_cek_kontrol`
--
ALTER TABLE `apam_cek_kontrol`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `apam_poli_umum`
--
ALTER TABLE `apam_poli_umum`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
