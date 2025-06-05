-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 08:49 AM
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
-- Database: `mbg_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockchain`
--

CREATE TABLE `blockchain` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `data_transaksi` text NOT NULL,
  `hash_prev` varchar(64) NOT NULL,
  `hash_curr` varchar(64) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blockchain`
--

INSERT INTO `blockchain` (`id`, `transaksi_id`, `data_transaksi`, `hash_prev`, `hash_curr`, `timestamp`) VALUES
(1, 5, '{\"tanggal\":\"2025-05-23\",\"nama_sekolah\":\"SMAN 19 Jakarta Selatan\",\"vendor\":\"Sambal bakar\",\"jumlah_porsi\":\"689\",\"harga_per_porsi\":\"18000\",\"asal_dana\":\"Bantuan Pemerintah\",\"status_pembayaran\":\"Belum Lunas\",\"total_biaya\":12402000}', '0', '4695c72a7dd81252adfbf0dac03c43c9b663adb6aea4123a43f9c9c410f73122', '2025-05-25 18:00:14'),
(2, 5, '{\"tanggal\":\"2025-05-23\",\"nama_sekolah\":\"SMAN 19 Jakarta Selatan\",\"vendor\":\"Sambal bakar\",\"jumlah_porsi\":\"689\",\"harga_per_porsi\":\"18000.00\",\"asal_dana\":\"Bantuan Pemerintah\",\"status_pembayaran\":\"Lunas\",\"total_biaya\":12402000}', '4695c72a7dd81252adfbf0dac03c43c9b663adb6aea4123a43f9c9c410f73122', '517fd63c6e32bbe5f18cca56e7dca22c312d2811b89c17fed50048ef08c2670a', '2025-05-25 18:00:32'),
(3, 6, '{\"tanggal\":\"2024-11-29\",\"nama_sekolah\":\"SMP Labschool Kebayoran Jakarta\",\"vendor\":\"Javanine Resto\",\"jumlah_porsi\":\"572\",\"harga_per_porsi\":\"18000\",\"asal_dana\":\"Bantuan Pemerintah\",\"status_pembayaran\":\"Lunas\",\"total_biaya\":10296000}', '517fd63c6e32bbe5f18cca56e7dca22c312d2811b89c17fed50048ef08c2670a', 'cbd03ee4561d224b0ec58ba8f6701962c967c5891942363f05b3173f094d339c', '2025-05-25 18:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `duitmbg`
--

CREATE TABLE `duitmbg` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_sekolah` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `jumlah_porsi` int(11) NOT NULL,
  `harga_per_porsi` decimal(15,2) NOT NULL,
  `total_biaya` decimal(15,2) NOT NULL,
  `asal_dana` varchar(255) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duitmbg`
--

INSERT INTO `duitmbg` (`id`, `tanggal`, `nama_sekolah`, `vendor`, `jumlah_porsi`, `harga_per_porsi`, `total_biaya`, `asal_dana`, `status_pembayaran`) VALUES
(3, '2025-05-08', 'MAN 2 Kota Malang', 'RM Pedesan', 1020, '15000.00', '15300000.00', 'Bantuan Pemerintah', 'Belum Lunas'),
(4, '2024-07-10', 'SMAN 2 Tebing tinggi', 'Warung Anti Galau', 987, '12000.00', '11844000.00', 'Bantuan Pemerintah', 'Lunas'),
(5, '2025-05-23', 'SMAN 19 Jakarta Selatan', 'Sambal bakar', 689, '18000.00', '12402000.00', 'Bantuan Pemerintah', 'Lunas'),
(6, '2024-11-29', 'SMP Labschool Kebayoran Jakarta', 'Javanine Resto', 572, '18000.00', '10296000.00', 'Bantuan Pemerintah', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(7, 'a', 'a', 'a'),
(8, 'Pakcik Aseng', 'ITS Surabaya', 'Mantap ini komen saya 25 mei'),
(9, 'Khainur Wicak', 'Itera', 'Kenapa Reza Gay ,dan Kenapa DIa Gila'),
(10, 'rawrra', 'a', 'aa aaa aaa aaaaaa aaa'),
(11, 'aaa', 'aaaaa', 'aaaa aaa aaa aa a aa'),
(12, 'aaa', 'aaaaa', 'aaaa aaa aaa aa a aa'),
(13, 'bbbb', 'ITS Surabaya', 'bbbbb bbbbb bbbbbb bbbbb bbbbb bbbbb'),
(14, 'bbbb', 'ITS Surabaya', 'bbbbb bbbbb bbbbbb bbbbb bbbbb bbbbb'),
(15, 'bbbb', 'ITS Surabaya', 'bbbbb bbbbb bbbbbb bbbbb bbbbb bbbbb'),
(16, 'rezamaulana', 'wrewrwr', 'wrewrew wrwerw wer wer wer wer ');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Pemasukan','Pengeluaran') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `tanggal`, `keterangan`, `jenis`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2025-05-07', 'aaaaaaa', 'Pemasukan', 100000, '2025-05-25 10:22:03', '2025-05-25 10:22:03'),
(2, '2025-05-07', 'aaaaaaa', 'Pemasukan', 100000, '2025-05-25 10:24:31', '2025-05-25 10:24:31'),
(3, '2025-05-07', 'aaaaaaa', 'Pemasukan', 100000, '2025-05-25 10:25:41', '2025-05-25 10:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','vendor','sekolah') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `nama` varchar(100) DEFAULT NULL,
  `nik_ktp` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'aktif',
  `longitude` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `nama`, `nik_ktp`, `status`, `longitude`, `latitude`) VALUES
(1, 'admin', '$2y$10$0wIdTyU19sFYI6.w7wOi0uF1BnrJcEzCyq8xuyn1vOtI8cnEdlHxG', 'admin', '2025-05-25 14:15:05', NULL, NULL, 'aktif', '', ''),
(2, 'vendor', '$2y$10$0wIdTyU19sFYI6.w7wOi0uF1BnrJcEzCyq8xuyn1vOtI8cnEdlHxG', 'vendor', '2025-05-25 14:15:05', NULL, NULL, 'aktif', '', ''),
(3, 'user', '$2y$10$0wIdTyU19sFYI6.w7wOi0uF1BnrJcEzCyq8xuyn1vOtI8cnEdlHxG', '', '2025-05-25 14:15:05', NULL, NULL, 'aktif', '', ''),
(4, 'benben', '$2y$10$VTHXb0FAMoqVXaejbz5sVOAYv4bLprYekIrzV/dHPn6CLL1SvX1Ha', '', '2025-05-25 15:55:36', NULL, NULL, 'aktif', '', ''),
(5, 'james', '$2y$10$tg9YM9f/iWHH7kjAotHwLODGzHZpKcniT.vw3voo39ZVXfrE6/A6u', '', '2025-05-25 20:03:01', NULL, NULL, 'aktif', '', ''),
(8, 'ariuntung12', '$2y$10$vUhGlz81ZPCm72tZ5zOWk.m5eAtO5IAEGwhDQCw7IHK2Oq5yA8/t2', 'sekolah', '2025-06-03 06:59:29', 'ari ges', '12231231231232', 'aktif', '112.6071462', '-7.9528786'),
(9, 'admin1', 'asdasd', 'admin', '2025-06-03 07:26:11', 'udin', '123123123', 'aktif', '', ''),
(10, 'rezambg17', '$2y$10$J6iMXA1T674P4rdq5h7Pd.tJJ4vmT6PnSca6fr/.zzaDTY48VrlGS', 'sekolah', '2025-06-03 07:41:40', 'rezamaulana', '80128738712389', 'aktif', '-172.4775111', '30.7257442'),
(11, 'aan12', '$2y$10$HAEvtGgOoRXjdaUMI0JbYeMAf8NIaohgJr7Jib.LqoIJ.qtEPoPrS', 'vendor', '2025-06-04 01:53:00', 'aan santoso', '123123123321', 'aktif', '112.6130984', '-7.9523543');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blockchain`
--
ALTER TABLE `blockchain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duitmbg`
--
ALTER TABLE `duitmbg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blockchain`
--
ALTER TABLE `blockchain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `duitmbg`
--
ALTER TABLE `duitmbg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
