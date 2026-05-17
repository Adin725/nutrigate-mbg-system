-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2026 pada 08.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutrigate_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mbg_distributions`
--

CREATE TABLE `mbg_distributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `mbg_menu_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `total_boxes_sent` int(11) NOT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'Diproses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mbg_distributions`
--

INSERT INTO `mbg_distributions` (`id`, `school_id`, `mbg_menu_id`, `delivery_date`, `total_boxes_sent`, `delivery_status`, `created_at`, `updated_at`) VALUES
(1, 7, 11, '2026-05-07', 203, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:58'),
(3, 2, 11, '2026-05-06', 212, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(5, 14, 7, '2026-04-26', 295, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:31'),
(6, 11, 12, '2026-05-01', 332, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:43'),
(8, 11, 10, '2026-05-03', 332, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:51'),
(9, 10, 15, '2026-04-28', 192, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:35'),
(10, 13, 11, '2026-05-04', 356, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(11, 3, 8, '2026-05-02', 193, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(12, 8, 20, '2026-05-09', 384, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:27:09'),
(13, 1, 4, '2026-04-30', 311, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(15, 20, 9, '2026-05-03', 179, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:27:02'),
(16, 10, 3, '2026-05-02', 192, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:46'),
(17, 2, 4, '2026-05-08', 212, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:27:06'),
(18, 11, 17, '2026-05-10', 332, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:27:13'),
(19, 4, 11, '2026-05-05', 391, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:54'),
(20, 8, 16, '2026-05-01', 384, 'Selesai', '2026-05-16 11:41:28', '2026-05-16 22:26:40'),
(27, 23, 22, '2026-05-18', 123, 'Diproses', '2026-05-16 21:20:16', '2026-05-16 22:27:20'),
(28, 2, 7, '2026-05-17', 212, 'Dikirim', '2026-05-16 21:47:47', '2026-05-16 22:27:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mbg_menus`
--

CREATE TABLE `mbg_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_package` varchar(255) NOT NULL,
  `calories` int(11) NOT NULL,
  `protein` double NOT NULL,
  `status_gizi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mbg_menus`
--

INSERT INTO `mbg_menus` (`id`, `menu_package`, `calories`, `protein`, `status_gizi`, `created_at`, `updated_at`) VALUES
(1, 'Paket Sehat 1', 472, 29.4, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(2, 'Paket Sehat 2', 577, 21.5, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(3, 'Paket Sehat 3', 651, 27.5, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(4, 'Paket Sehat 4', 685, 22, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(5, 'Paket Sehat 5', 593, 17.2, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(6, 'Paket Sehat 6', 629, 27.9, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(7, 'Paket Sehat 7', 557, 18, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(8, 'Paket Sehat 8', 486, 20.3, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(9, 'Paket Sehat 9', 570, 19.5, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(10, 'Paket Sehat 10', 459, 17.2, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(11, 'Paket Sehat 11', 490, 28.7, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(12, 'Paket Sehat 12', 445, 30, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(13, 'Paket Sehat 13', 451, 16.2, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(14, 'Paket Sehat 14', 657, 26.6, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(15, 'Paket Sehat 15', 500, 16.2, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(16, 'Paket Sehat 16', 670, 16.5, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(17, 'Paket Sehat 17', 557, 27.5, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(18, 'Paket Sehat 18', 401, 19.9, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(19, 'Paket Sehat 19', 634, 15.4, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(20, 'Paket Sehat 20', 567, 30.4, 'Sangat Baik', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(22, 'Paket Katsu', 600, 32.5, 'Sangat Baik', '2026-05-16 21:19:25', '2026-05-16 21:19:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_17_000001_create_schools_table', 1),
(5, '2026_05_17_000002_create_mbg_menus_table', 1),
(6, '2026_05_17_000003_create_mbg_distributions_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `total_students` int(11) NOT NULL,
  `district` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `total_students`, `district`, `created_at`, `updated_at`) VALUES
(1, 'SD Negeri 1 Banda Aceh', 311, 'Banda Raya', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(2, 'SD Negeri 2 Banda Aceh', 212, 'Baiturrahman', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(3, 'SD Negeri 3 Banda Aceh', 193, 'Meuraxa', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(4, 'SD Negeri 4 Banda Aceh', 391, 'Lueng Bata', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(5, 'SD Negeri 5 Banda Aceh', 325, 'Kuta Raja', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(6, 'SD Negeri 6 Banda Aceh', 358, 'Ulee Kareng', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(7, 'SD Negeri 7 Banda Aceh', 203, 'Syiah Kuala', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(8, 'SD Negeri 8 Banda Aceh', 384, 'Kuta Alam', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(9, 'SD Negeri 9 Banda Aceh', 265, 'Syiah Kuala', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(10, 'SD Negeri 10 Banda Aceh', 192, 'Kuta Alam', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(11, 'SD Negeri 11 Banda Aceh', 332, 'Syiah Kuala', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(12, 'SD Negeri 12 Banda Aceh', 199, 'Lueng Bata', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(13, 'SD Negeri 13 Banda Aceh', 356, 'Syiah Kuala', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(14, 'SD Negeri 14 Banda Aceh', 295, 'Syiah Kuala', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(15, 'SD Negeri 15 Banda Aceh', 223, 'Syiah Kuala', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(16, 'SD Negeri 16 Banda Aceh', 167, 'Ulee Kareng', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(17, 'SD Negeri 17 Banda Aceh', 252, 'Kuta Alam', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(18, 'SD Negeri 18 Banda Aceh', 284, 'Kuta Alam', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(19, 'SD Negeri 19 Banda Aceh', 352, 'Jaya Baru', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(20, 'SD Negeri 20 Banda Aceh', 179, 'Banda Raya', '2026-05-16 11:41:28', '2026-05-16 11:41:28'),
(21, 'SMA LABSCHOOOL USK', 100, 'Syiah Kuala', '2026-05-16 12:02:50', '2026-05-16 12:02:50'),
(22, 'SMA LABSCHOOOL USK', 300, 'Syiah Kuala', '2026-05-16 21:09:00', '2026-05-16 21:09:00'),
(23, 'SD 1 MBG', 123, 'Kuta Alam', '2026-05-16 21:20:00', '2026-05-16 21:20:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3fiXDq0e71H7APZSjNT6Uw0SpQ1eBIdWsSbbmfkQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0', 'eyJfdG9rZW4iOiJiQWJEVXRUbmR3OUpvdW1wWVpWWWFJamtRd1RLaUtaenNnTUpLUjlHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJtYmcuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1778995642);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mbg_distributions`
--
ALTER TABLE `mbg_distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mbg_distributions_school_id_foreign` (`school_id`),
  ADD KEY `mbg_distributions_mbg_menu_id_foreign` (`mbg_menu_id`);

--
-- Indeks untuk tabel `mbg_menus`
--
ALTER TABLE `mbg_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mbg_distributions`
--
ALTER TABLE `mbg_distributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `mbg_menus`
--
ALTER TABLE `mbg_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mbg_distributions`
--
ALTER TABLE `mbg_distributions`
  ADD CONSTRAINT `mbg_distributions_mbg_menu_id_foreign` FOREIGN KEY (`mbg_menu_id`) REFERENCES `mbg_menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mbg_distributions_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
