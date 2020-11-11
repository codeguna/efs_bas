-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 04:50 AM
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
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `letter_number`, `date`, `from`, `title`, `file`, `created_at`, `updated_at`) VALUES
(1, '123', '2020-11-10', 'ASD', 'ASD', 'ASD', '2020-11-07 03:29:32', '2020-11-07 03:29:32');

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
(15, '05\\BAS\\EXT\\2020', '2020-11-25', 'ALFAMIDI', 'JAJAN SNACK KABUPATEN GES', NULL, '1604979904_765.TYD 2367.JPG', 'Gunadhi Pratama', '2020-11-09 20:45:04', '2020-11-09 20:45:04'),
(16, '06\\BAS\\EXT\\2020', '2020-11-11', 'VITASARI', 'JAJAN MOAL GES ?', NULL, '1604979934_764.TAW 2315 Tan.jpg', 'Gunadhi Pratama', '2020-11-09 20:45:34', '2020-11-09 20:45:34');

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
(1, 'Gunadhi Pratama', 'gunadhi@lpkia.ac.id', '$2y$10$phLZdBgyMlWvjp4x82PbheXtW8.CaTiBTEGanvpxI.pmwdL77vLJS', 'scRlnDZMRZPc5hIQv8tXgFP7KMmfYjc4iAJTgKtAKdREjiqMLg0ZTKhS15sR', '2020-11-05 00:38:18', '2020-11-05 00:38:18'),
(2, 'Admin', 'pratamagunadhi@gmail.com', '$2y$10$1IKbm8Wswxmn439H2da2cO8ikH2tQLX9fVfsN42gbJy7Tj19kqWSq', 'P2p2OLnAsMviqv08bXHW7ISqusN8hDTSg5WNZB8mAn19BXAgLWYxKZ3X4qtR', '2020-11-05 19:34:40', '2020-11-05 19:55:26');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
