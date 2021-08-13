-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2020 at 03:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efs_bas`
--
CREATE DATABASE IF NOT EXISTS `efs_bas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `efs_bas`;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(10) UNSIGNED NOT NULL,
  `letter_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `letter_number`, `date`, `from`, `title`, `type`, `deleted_at`, `created_by`, `file`, `created_at`, `updated_at`, `trash`) VALUES
(10, '03\\BAS\\INT\\2020', '2020-11-07', 'TELKOM', 'AYO NIKMATI KONTENT GRATIS KAMI', '', NULL, 'Admin', '1605162706_Beranda.PNG', '2020-11-11 23:31:46', '2020-11-20 00:57:52', 'TRUE'),
(12, '55\\IN\\BAS\\2020', '2020-11-18', 'BIZNET', 'DAPATKAN QUOTA GRATIS', '', NULL, 'Gunadhi Pratama', '1605664175_Bmw7LHOCcAAG1ts.jpg large.jpg', '2020-11-17 18:49:35', '2020-11-17 18:49:35', NULL),
(13, '56\\BAS\\2020', '2020-11-10', 'BAA', 'MINTA STAFF AKADEMIK', '', NULL, 'Gunadhi Pratama', '1605664716_jaket-angkatan-2.jpg', '2020-11-17 18:58:36', '2020-11-17 18:58:36', NULL),
(14, '58\\IN\\BAS\\2020', '2020-11-18', 'MICROSOFT', 'INI JUDUL', '', NULL, 'Gunadhi Pratama', '1605680437_jaket-angkatan-ugm-by-the-campus.jpg', '2020-11-17 23:20:37', '2020-11-17 23:20:37', NULL),
(15, '7587/LL4/PJ/2020', '2020-11-13', 'Kemendikbud LLDIKTI 4', 'Kegiatan Bimtek Peningkatan Layanan Melalui Sistem Informasi Penjaminan Mutu Pendidikan Tinggi', '', NULL, 'Gunadhi Pratama', '1605686863_Quote.pdf', '2020-11-18 00:29:56', '2020-11-18 01:07:43', NULL),
(19, '66\\IN\\BAS\\2020', '2020-11-26', 'DARI SIAPA YA', 'Sertifikasi', 'Sertifikasi', NULL, 'Gunadhi Pratama', '1605756267_190511826418.png', '2020-11-18 20:15:39', '2020-11-18 20:36:03', 'TRUE'),
(20, '09\\KEMENDAGRI\\2K20', '2020-11-20', 'KEMENDAGRI', 'PELATIHAN SOF SKILL', 'Undangan', NULL, 'Gunadhi Pratama', '1605930371_6a5dedc0b63db664a55d92d665f14147.jpg', '2020-11-20 20:46:11', '2020-11-20 20:46:11', NULL),
(21, '10\\KEMENDAGRI\\2K20', '2020-11-25', 'Kementrian Dalam Negri', 'SEMINAR DAGANG GES', 'Seminar', NULL, 'Gunadhi Pratama', '1606096335_laporan-pegawai.pdf', '2020-11-22 18:36:25', '2020-11-22 18:52:15', NULL),
(22, '12\\KEMENDAGRI\\2K20', '2020-11-05', 'Kementrian Dalam Negri', 'Penting', '-', NULL, 'Gunadhi Pratama', '1606111873_undraw_Collaboration_re_vyau.png', '2020-11-22 19:46:58', '2020-11-22 23:11:13', NULL),
(23, '123\\IN\\2020', '2020-11-22', 'TELKOM', 'PENTING', 'Sertifikasi', NULL, 'Gunadhi Pratama', '1606112964_Screenshot_2019-11-01 6627414_1317bd54-546a-4964-a379-1d6bc63f4997_740_492 png (PNG Image, 700 × 465 pixels).png', '2020-11-22 23:25:02', '2020-11-22 23:29:24', NULL),
(24, '7614/LL4/PJ/2020', '2020-11-16', 'Kemendikbud LLDIKTI 4', 'Bimtek Internalisasi Merdeka Belajar ke dalam Sistem Penjaminan Mutu Internal', 'Undangan', NULL, 'Ayu Sulistiawati', '1606115040_El.PNG', '2020-11-23 00:04:00', '2020-11-23 00:04:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mail_type`
--

CREATE TABLE `mail_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_type`
--

INSERT INTO `mail_type` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Undangan', '2020-11-18 19:25:19', '2020-11-18 19:25:19'),
(3, 'Sertifikasi', '2020-11-18 19:38:29', '2020-11-18 19:38:29'),
(4, 'Seminar', '2020-11-22 18:32:08', '2020-11-22 18:32:08'),
(5, '-', '2020-11-22 19:45:40', '2020-11-22 19:45:40'),
(6, 'Surat Tugas', '2020-11-23 00:05:41', '2020-11-23 00:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_07_040757_create_outboxes_table', 1),
(4, '2020_11_06_080259_create_inboxes_table', 2),
(5, '2020_11_02_042026_create_gambars_table', 3),
(7, '2020_11_19_013656_create_mail_types_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE `outbox` (
  `id` int(10) UNSIGNED NOT NULL,
  `letter_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trash` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `letter_number`, `date`, `from`, `title`, `type`, `deleted_at`, `file`, `created_by`, `created_at`, `updated_at`, `trash`) VALUES
(12, '02\\BAS\\EXT\\2020', '2020-11-14', 'INDOMERIT', 'BAKAR PRODUK PRANCIS YU GES', '', NULL, '1604979748_760.TYD 2434.JPG', 'Gunadhi Pratama', '2020-11-09 20:42:28', '2020-11-22 18:54:09', NULL),
(13, '03\\BAS\\EXT\\2020', '2020-11-14', 'ALFA', 'MICIN GES', '', NULL, '1604979820_761.TKN 2439.JPG', 'Gunadhi Pratama', '2020-11-09 20:43:40', '2020-11-09 20:43:40', NULL),
(14, '03\\BAS\\EXT\\2020', '2020-11-11', 'CAREFOUR', 'DAFTAR BANK MEGA GES', '', NULL, '1604979859_761.TKN 2439.JPG', 'Gunadhi Pratama', '2020-11-09 20:44:19', '2020-11-09 20:44:19', NULL),
(21, '188/BM-SUM/ST/XI/2020', '2020-11-18', 'Dindin Ginanjar Sukarman, S.T.', 'Surat Tugas', '-', NULL, '1606100316_undraw_Collaboration_re_vyau.png', 'Gunadhi Pratama', '2020-11-18 00:38:18', '2020-11-22 23:45:11', 'TRUE'),
(22, '090\\IN\\BAS\\2020', '2020-11-12', 'Guna Gunawan, S.T', 'STUDI BANDING', 'Seminar', NULL, '1606112011_thumb-1920-246523.jpg', 'Gunadhi Pratama', '2020-11-19 18:52:19', '2020-11-22 23:13:31', NULL),
(23, '201/BM-SUM/ST/XI/2020', '2020-11-23', 'Deden Sofyan Hamdani, S.T., M.Kom.', 'Bimtek Internalisasi Merdeka Belajar ke dalam Sistem Penjaminan Mutu Internal', 'Undangan', NULL, '1606115625_El.PNG', 'Ayu Sulistiawati', '2020-11-23 00:07:34', '2020-11-23 00:13:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gunadhi Pratama', 'gunadhi@lpkia.ac.id', '$2y$10$phLZdBgyMlWvjp4x82PbheXtW8.CaTiBTEGanvpxI.pmwdL77vLJS', 'DMS9alwmsPQl9WIjk3BXRKvv4CIFKFsIc1w6YDMVJOYkm8cVX3sn5L3zJsTk', '2020-11-05 00:38:18', '2020-11-05 00:38:18'),
(2, 'Admin', 'pratamagunadhi@gmail.com', '$2y$10$A9rxGwCe7n2FpP4wuGy9yOJ1cYfgzsb3hKHs98SOe0XSOFIbk291u', 'MxQr1qJDAtnNcxAJIvJ8gWT2Bul16bMKmNQUizZJ8NRet54r0xHUr0dhHNRy', '2020-11-05 19:34:40', '2020-11-22 23:44:33'),
(3, 'Ayu Sulistiawati', 'ayu.sulistiawati@lpkia.ac.id', '$2y$10$ArG3VBDiW2hyOF94GhOZX.teQxWSKPGMvacTOlSLiKX74ACOkX5my', 'jHYkRvs5EwgCZd90m0haHcvmOxEY9U4CUcPx4yy64y2H7QQuXZzu339oHMQp', '2020-11-23 00:01:32', '2020-11-23 00:12:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_type`
--
ALTER TABLE `mail_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mail_type`
--
ALTER TABLE `mail_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
