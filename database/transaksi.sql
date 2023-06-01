-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 05:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kode`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(15, 'BRG-7', 'Koran', '30000.00', '2023-05-27 03:31:24', '2023-05-27 03:31:24'),
(16, 'BRG-8', 'Sepatu', '80000.00', '2023-05-27 11:14:13', '2023-05-27 11:14:13'),
(17, 'BRG-9', 'Sandal', '20000.00', '2023-05-27 11:14:31', '2023-05-27 11:14:31'),
(18, 'BRG-10', 'Jaket', '120000.00', '2023-05-27 11:14:54', '2023-05-27 11:14:54'),
(19, 'BRG-11', 'Baju', '65000.00', '2023-05-27 11:15:15', '2023-05-27 11:15:15'),
(20, 'BRG-12', 'Celana', '140000.00', '2023-05-27 11:15:43', '2023-05-27 11:15:43'),
(21, 'BRG-13', 'Buku aku', '5000.00', '2023-05-28 13:12:11', '2023-05-28 13:12:11'),
(22, 'BRG-14', 'dafaf', '42000.00', '2023-05-28 13:24:10', '2023-05-28 13:24:10'),
(23, 'BRG-15', 'dadasdaas', '82000.00', '2023-05-28 13:24:50', '2023-05-28 13:24:50'),
(24, 'BRG-16', 'oooi', '76000.00', '2023-05-28 13:28:22', '2023-05-28 13:28:22'),
(25, 'BRG-17', 'aaaaaaaa', '3211.00', '2023-05-28 13:33:10', '2023-05-28 13:33:10'),
(26, 'BRG-18', 'reqwa', '3411.00', '2023-05-28 13:34:02', '2023-05-28 13:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `kode`, `nama`, `no_telp`, `created_at`, `updated_at`) VALUES
(4, 'CS-1', 'Salma qq', '075633', '2023-05-27 07:15:21', '2023-05-28 02:37:41'),
(5, 'CS-2', 'Wulan', '0894392731', '2023-05-27 07:35:54', '2023-05-27 07:35:54'),
(6, 'CS-3', 'Rahmat', '08888231', '2023-05-27 09:57:52', '2023-05-27 09:57:52'),
(7, 'CS-4', 'Alifah', '012371', '2023-05-27 09:59:57', '2023-05-27 09:59:57'),
(8, 'CS-5', 'Egi', '08121221300', '2023-05-27 11:27:17', '2023-05-27 11:27:17'),
(19, 'CS-6', 'Ramon', '081212213051', '2023-05-28 06:03:51', '2023-05-28 06:03:51'),
(20, 'CS-7', 'Putri', '081211213051', '2023-05-29 19:41:17', '2023-05-29 19:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_26_074753_create_barangs_table', 2),
(6, '2023_05_26_075317_create_customers_table', 3),
(7, '2023_05_26_075509_create_sales_table', 4),
(8, '2023_05_26_075853_create_sales_dets_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `diskon` decimal(8,2) NOT NULL,
  `ongkir` decimal(8,2) NOT NULL,
  `total_bayar` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `kode`, `tanggal`, `customer_id`, `subtotal`, `diskon`, `ongkir`, `total_bayar`, `created_at`, `updated_at`) VALUES
(5, 'SL-3', '2023-05-29', 5, '100000.00', '20000.00', '10000.00', '90000.00', '2023-05-28 11:29:02', '2023-05-28 11:29:02'),
(6, 'SL-4', '2023-05-21', 19, '50000.00', '5000.00', '10000.00', '55000.00', '2023-05-28 11:29:46', '2023-05-28 11:29:46'),
(7, 'SL-5', '2023-05-21', 19, '50000.00', '10000.00', '10000.00', '50000.00', '2023-05-29 19:39:00', '2023-05-29 19:39:00'),
(8, 'SL-6', '2023-05-22', 4, '50000.00', '5000.00', '10000.00', '55000.00', '2023-05-29 19:40:36', '2023-05-29 19:40:36'),
(9, 'SL-7', '2023-05-21', 8, '500000.00', '10000.00', '20000.00', '510000.00', '2023-05-30 04:45:14', '2023-05-30 04:45:14'),
(10, 'SL-8', '2023-05-26', 6, '1.00', '1000.00', '6000.00', '5001.00', '2023-05-30 06:35:58', '2023-05-30 06:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `sales_dets`
--

CREATE TABLE `sales_dets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `harga_bandrol` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon_pct` decimal(8,2) NOT NULL,
  `diskon_nilai` decimal(8,2) NOT NULL,
  `harga_diskon` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_dets`
--

INSERT INTO `sales_dets` (`id`, `sales_id`, `barang_id`, `harga_bandrol`, `qty`, `diskon_pct`, `diskon_nilai`, `harga_diskon`, `total`, `created_at`, `updated_at`) VALUES
(5, 5, 26, '3411.00', 1, '1.00', '300.00', '3111.00', '3111.00', '2023-05-30 02:47:04', '2023-05-30 06:11:25'),
(6, 8, 15, '30000.00', 1, '1.00', '300.00', '29700.00', '29700.00', '2023-05-30 04:07:16', '2023-05-30 04:07:16'),
(7, 6, 17, '20000.00', 1, '1.00', '200.00', '19800.00', '19800.00', '2023-05-30 04:07:45', '2023-05-30 04:07:45'),
(8, 10, 15, '30000.00', 11, '2.00', '600.00', '29400.00', '323400.00', '2023-05-30 06:36:50', '2023-05-30 06:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_kode_unique` (`kode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_kode_unique` (`kode`),
  ADD UNIQUE KEY `customers_no_telp_unique` (`no_telp`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sales_dets`
--
ALTER TABLE `sales_dets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_dets_sales_id_foreign` (`sales_id`),
  ADD KEY `sales_dets_barang_id_foreign` (`barang_id`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_dets`
--
ALTER TABLE `sales_dets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sales_dets`
--
ALTER TABLE `sales_dets`
  ADD CONSTRAINT `sales_dets_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_dets_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
