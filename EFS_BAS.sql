-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2020 at 04:54 AM
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `letter_number`, `date`, `from`, `title`, `deleted_at`, `created_by`, `file`, `created_at`, `updated_at`) VALUES
(8, '46346346', '2020-11-25', 'fafasf', 'fasfasf', '2020-11-11 23:55:54', 'Admin', '1605151837_382.GRW 9170.jpg', '2020-11-11 20:30:37', '2020-11-11 23:55:54'),
(9, '05\\BAS\\INT\\2K20', '2020-11-01', 'UNISBA', 'uWu', NULL, 'Admin', '1605161907_67slide.jpg', '2020-11-11 23:18:27', '2020-11-11 23:18:27'),
(10, '03\\BAS\\INT\\2020', '2020-11-07', 'TELKOM', 'AYO NIKMATI KONTENT GRATIS KAMI', NULL, 'Admin', '1605162706_Beranda.PNG', '2020-11-11 23:31:46', '2020-11-11 23:31:46'),
(11, '04\\BAS\\INT\\2020', '2020-11-07', 'AXIS', 'QUOTA MOAL GES ?', NULL, 'Gunadhi Pratama', '1605237178_Screenshot_2018-10-13 The Campus ( thecampuscoid) • Instagram photos and videos.png', '2020-11-12 20:12:58', '2020-11-12 20:12:58');

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
(4, '2020_11_06_080259_create_inboxes_table', 2),
(5, '2020_11_02_042026_create_gambars_table', 3);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`id`, `letter_number`, `date`, `from`, `title`, `deleted_at`, `file`, `created_by`, `created_at`, `updated_at`) VALUES
(11, '01\\BAS\\EXT\\2020', '2020-11-01', 'HIPMI', 'Jualan Yu GES', NULL, '1604979642_759.TYD 2435.JPG', 'Gunadhi Pratama', '2020-11-09 20:40:42', '2020-11-09 20:40:42'),
(12, '02\\BAS\\EXT\\2020', '2020-11-14', 'INDOMERIT', 'BAKAR PRODUK PRANCIS YU GES', NULL, '1604979748_760.TYD 2434.JPG', 'Gunadhi Pratama', '2020-11-09 20:42:28', '2020-11-09 20:42:28'),
(13, '03\\BAS\\EXT\\2020', '2020-11-14', 'ALFA', 'MICIN GES', NULL, '1604979820_761.TKN 2439.JPG', 'Gunadhi Pratama', '2020-11-09 20:43:40', '2020-11-09 20:43:40'),
(14, '03\\BAS\\EXT\\2020', '2020-11-11', 'CAREFOUR', 'DAFTAR BANK MEGA GES', NULL, '1604979859_761.TKN 2439.JPG', 'Gunadhi Pratama', '2020-11-09 20:44:19', '2020-11-09 20:44:19'),
(15, '05\\BAS\\EXT\\2020', '2020-11-25', 'ALFAMIDIA', 'JAJAN SNACK KABUPATEN GES', NULL, '1605151625_390.GRW  9171.jpg', 'Gunadhi Pratama', '2020-11-09 20:45:04', '2020-11-11 20:27:05'),
(20, '10\\BAS\\EXT\\2020', '2020-11-11', 'REY MISTERIO', '619 BUYAKA BUYAKA', '2020-11-12 20:16:27', '1605235203_Hasil_Produksi_Jaket-Parka_UGM_InsanProduktif_WWW.konveksiJogjaku.Com_-768x1024.jpg', 'Gunadhi Pratama', '2020-11-12 19:40:03', '2020-11-12 20:16:27');

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
(1, 'Gunadhi Pratama', 'gunadhi@lpkia.ac.id', '$2y$10$phLZdBgyMlWvjp4x82PbheXtW8.CaTiBTEGanvpxI.pmwdL77vLJS', 'vzhtAxBPtKY6TjRcAevk45wpAE4aQgf59uvxUPlsHlyAoPWbzqPXoeBk9WMW', '2020-11-05 00:38:18', '2020-11-05 00:38:18'),
(2, 'Admin', 'pratamagunadhi@gmail.com', '$2y$10$nDf5ojKCHn79i8x71W5sZOoFwH5dvs6IjfqZILVzICoqOW.ooIbCe', 'poc781Ce7fG7mFrhhf3x6cIbJsm0pBjWEEmtdjhl5qMVar6Pd6dd9i7EnoIf', '2020-11-05 19:34:40', '2020-11-13 00:04:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
