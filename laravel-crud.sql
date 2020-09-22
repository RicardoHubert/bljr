-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 12:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_02_045638_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_ormawa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ormawa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_ormawa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `logo_ormawa`, `nama_ormawa`, `kategori_ormawa`, `visi`, `misi`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\phpC54B.tmp', 'HIMA Informatika', 'HMJ', 'Meningkatkan mutu dan kualitas', 'Mengedepankan kualitas', 'infinity2020@kalbis.ac.id', '12345', '2020-07-03 02:41:43', '2020-07-03 02:41:43'),
(4, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\phpA3BA.tmp', 'dsfadf', 'afsdassda', 'fdsafdaf', 'sfadfdsa', 'adsfdsf', 'asdfadssf', '2020-07-03 03:04:30', '2020-07-03 03:04:30'),
(5, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\phpFD01.tmp', 'sadasd', 'fdfsfdsaf', 'fsafdasfsafsd', 'asdfsdd', 'sadffdsafsa', 'fsdafsdafdsadfa', '2020-07-03 03:04:53', '2020-07-03 03:04:53'),
(6, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\php5743.tmp', 'afdsfsafsdf', 'afafasfsaf', 'safsafasf', 'sadfsafafa', 'sdafasdfsaf', 'asdffsadfa', '2020-07-03 03:05:16', '2020-07-03 03:05:16'),
(7, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\php85C3.tmp', 'fdasfsdaf', 'asfdasdfsafsd', 'fsafsafsdafs', 'asdfdsfsa', 'afsdasfsa', 'asfdasfdsafsa', '2020-07-03 03:05:28', '2020-07-03 03:05:28'),
(8, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\phpC6D9.tmp', 'sdafsdfsda', 'sadfsdafsda', 'sdafsadf', 'sadfasdf', 'sdafsdf', 'asdfsafs', '2020-07-03 03:05:45', '2020-07-03 03:05:45'),
(9, 'D:\\Users\\Abdullah Sulthon\\AppData\\Local\\Temp\\php8E8.tmp', 'sdafsds', 'afdaffsa', 'fasdsaf', 'asdfsadfsd', 'sadfaf', 'asdfasdfdsaf', '2020-07-03 03:06:02', '2020-07-03 03:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bahrul Sendi', 'kemahasiswaan@kalbis.ac.id', NULL, '$2y$10$skZUXZQAbuBH/KX9PfVIHeXcO41UANooKSKzrLp9bC.t9Q438DstW', NULL, '2020-07-03 02:27:49', '2020-07-03 02:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
