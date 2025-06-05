-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 08:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbg`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `komentar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `instansi`, `komentar`) VALUES
(1, 'coba', 'coba', 'coba'),
(2, 'bisa ges', 'anjay', 'bet'),
(3, 'bisa ges', 'anjay', 'bet'),
(4, 'busett', 'wadidw', 'iyyah'),
(5, 'duh', 'malas', 'buset'),
(6, 'a', 'a', 'a'),
(7, 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah_penerima`
--

CREATE TABLE `sekolah_penerima` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `Tahun` int(11) NOT NULL,
  `total_bantuan` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jenjang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah_penerima`
--

INSERT INTO `sekolah_penerima` (`id`, `nama_sekolah`, `alamat`, `Tahun`, `total_bantuan`, `status`, `jenjang`) VALUES
(1, 'SDN Coba 1', 'bumi', 2025, 12000, 'Aktif', 'SD'),
(2, 'SMP coba', 'mars', 2024, 12000, 'Tidak aktif', 'SMP'),
(3, 'SMA coba', 'pluto', 2025, 5000, 'Aktif', 'SMA'),
(4, 'SMP coba 2', 'jupiter', 2025, 15000, 'Aktif', 'SMP\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `id_instansi` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_instansi`, `id_instansi`, `email`, `password`, `level`) VALUES
(1, 'ub', 122212122, 'ub@gmail.com', 'coba', 'sekolah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah_penerima`
--
ALTER TABLE `sekolah_penerima`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sekolah_penerima`
--
ALTER TABLE `sekolah_penerima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
