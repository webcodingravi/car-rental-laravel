-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2025 at 01:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `pickupDate` varchar(255) NOT NULL,
  `returnDate` varchar(255) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `seating_capacity` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `pricePerDay` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`features`)),
  `isAvailable` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `uuid`, `brand`, `slug`, `model`, `year`, `category`, `seating_capacity`, `fuel_type`, `transmission`, `pricePerDay`, `location`, `features`, `isAvailable`, `description`, `image`, `owner_id`, `created_at`, `updated_at`) VALUES
(8, '8a572894-40fe-4fbd-a4ae-1f764bfd42f0', 'BMW', 'bmw', 'X5', 2021, 'SUV', '4', 'Hybrid', 'Semi-automatic', '2000', 'Delhi', '[\"GPS\",\"360 Camera\",\"Rear View\",\"Bluetooth\",\"Heated Seats\",\"Mirror\"]', 1, 'The BMW X5 is a mid-size luxury SUV produced by BMW. The X5 made its debut in 1999 as the first SUV ever produced by BMW.', '1756981963.png', 1, '2025-09-04 05:02:43', '2025-09-04 05:27:16'),
(9, '356c6e7b-48ef-463d-94d4-32a63cdc5f53', 'Toyota', 'toyota', 'Corolla', 2021, 'Sedan', '4', 'Diesel', 'Menual', '2500', 'Delhi', '[\"GPS\",\"360 Camera\",\"Rear View\",\"Bluetooth\",\"Heated Seats\",\"Mirror\"]', 1, 'The Toyota Corolla is a mid-size luxury sedan produced by Toyota. The Corolla made its debut in 2008 as the first sedan ever produced by Toyota.', '1756984513.png', 1, '2025-09-04 05:45:13', '2025-09-04 05:45:13'),
(10, '59922764-2980-4008-a12f-e296f565b2eb', 'Jeep', 'jeep', 'Wrangler', 2023, 'SUV', '4', 'Hybrid', 'Automatic', '2700', 'Delhi', '[\"GPS\",\"360 Camera\",\"Rear View\",\"Bluetooth\",\"Heated Seats\",\"Mirror\"]', 1, 'The Jeep Wrangler is a mid-size luxury SUV produced by Jeep. The Wrangler made its debut in 2003 as the first SUV ever produced by Jeep.', '1756984626.png', 1, '2025-09-04 05:47:06', '2025-09-04 05:47:06'),
(11, 'b65fe0d7-1a64-4cd8-b652-d80216c9d459', 'Ford', 'ford', 'Neo 6', 2022, 'Sedan', '4', 'Diesel', 'Semi-automatic', '4000', 'Delhi', '[\"GPS\",\"360 Camera\",\"Rear View\",\"Bluetooth\",\"Heated Seats\",\"Mirror\"]', 1, 'This is a mid-size luxury sedan produced by Toyota. The Corolla made its debut in 2008 as the first sedan ever produced by Toyota.', '1756984797.png', 1, '2025-09-04 05:49:57', '2025-09-04 05:49:57');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_29_154707_create_cars_table', 2),
(5, '2025_08_29_155915_create_bookings_table', 2),
(6, '2025_08_31_172632_update_users_table', 3),
(7, '2025_08_31_172845_update_cars_table', 4),
(8, '2025_08_31_182406_update_users_table', 5),
(11, '2025_08_31_182618_update_cars_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','owner','admin') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `role`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ravi Kumar', 'ravi395950@gmail.com', '8076862834', '2025-09-03 10:13:41', '$2y$12$Y9UHzexAXN.7BfuOctdf1ejCuXyU92Ik02KatRX.8b9HI61aUbAj2', 'owner', '1756517417.png', 'WmvL9GmwJjphe3KsA2pjPuAK47KCb2dPa0tDIOXNRd47QQxKZfqWOHALdup6', '2025-08-29 05:40:57', '2025-09-03 10:13:41'),
(2, 'Pankaj', 'pankaj@gmail.com', NULL, NULL, '$2y$12$S49sQ54THGsPj2PaSFBIaOWLWe4fExwn/sYKeyEG/Qsq0Bs3ZE.v6', 'customer', NULL, NULL, '2025-08-29 05:44:41', '2025-08-29 05:44:41'),
(3, 'Krish', 'krish236@gmail.com', NULL, NULL, '$2y$12$s6.4cFYiIcwZ2tB8f4CFA.CSsJuRB6w6NJyh2lNwLYzXFBALZuHBy', 'customer', NULL, NULL, '2025-08-29 05:45:49', '2025-08-29 05:45:49'),
(4, 'Ravi Kumar', 'ravi@gmail.com', NULL, NULL, '$2y$12$c.gQrlvtKBTYsL9/yMI92u9eRWrIxEKGndRgzwSdBMBSxroWiFfoy', 'customer', NULL, NULL, '2025-08-29 07:10:18', '2025-08-29 09:45:25'),
(5, 'Ravi Kumar', 'ravi123@gmail.com', '09821345742', NULL, '$2y$12$VhUqvMRdpxCDkeEMEEaXZ.EHxZFyUAYqV2Hayzt9FkNStnd.g.oLW', 'customer', NULL, NULL, '2025-08-31 12:57:37', '2025-08-31 12:57:37'),
(6, 'pooja', 'pooja@gmail.com', '09821345742', NULL, '$2y$12$lFFSkIHIGKKxoLQMh.OPk.Q/WWyTSWZ/Nf/qxdZrWajqq1/362U9G', 'customer', NULL, 'awdmQaxiD1tOJVUT38UUTboXSgULfG', '2025-09-03 10:03:11', '2025-09-03 10:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_car_id_foreign` (`car_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
