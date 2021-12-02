-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2021 at 07:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nabungqurban`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'AsncKvXjE9wghQN3unUiEXFO5N4U9fu0JZwqO68m.png', '2021-05-08 08:41:56', '2021-05-08 08:41:56'),
(2, 'lpCYj0kBk6kOgwPHvLXvuMqkSwiQYIpFQD2TX5Uq.png', '2021-05-08 08:44:30', '2021-05-08 08:44:30'),
(3, 'TLFR36g0mfClH0yAwTCyGpC0YzqVY0F7m2ZkKiIf.png', '2021-05-08 08:53:37', '2021-05-08 08:53:37'),
(4, 'PAn9dqWkGpLAUVM3OoVKrBH0GwzcOGz50Zpx6vwN.png', '2021-05-08 08:57:24', '2021-05-08 08:57:24'),
(5, 'SZv9s0xFFmKGgIxJL8RsWT68bSpqCl1Laa7sl47l.jpg', '2021-05-08 09:00:48', '2021-05-08 09:00:48'),
(6, '7IgJtXpz3bWnUPcpJtNHYqeQ3b3PYdgSf8hkJZh0.png', '2021-05-08 09:08:14', '2021-05-08 09:08:14'),
(7, '5AuTp3xuBlk6i1AZvvgf4cWo2P40CNBI2rRX5nXl.jpg', '2021-05-08 11:12:42', '2021-05-08 11:12:42'),
(8, 'iXHApuome1OLvZ9jOzeDxVFVCDyDoshiKgSQSNUl.png', '2021-05-08 21:17:16', '2021-05-08 21:17:16'),
(9, 'AfQhWTywv1UUy98mc3fjyDAtU6uC7zTbjxLzXDIo.jpg', '2021-05-08 21:19:53', '2021-05-08 21:19:53'),
(10, 'pGEsRkchXnDFNqRytS66P9DbuOvMQbVqpp92WurM.jpg', '2021-05-09 10:38:08', '2021-05-09 10:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2021_05_06_100746_create_plans_table', 2),
('2021_05_06_115150_create_users_planning_table', 3),
('2021_05_06_115150_create_users_plannings_table', 4),
('2014_10_12_000000_create_users_table', 5),
('2014_10_12_100000_create_password_resets_table', 5),
('2021_05_07_041534_create_plans_table', 5),
('2021_05_07_042305_create_users_plannings_table', 5),
('2021_05_07_075225_add_is_delete_field_to_users_planinngs_table', 5),
('2021_05_07_101159_create_users_plannings_deposit_table', 5),
('2021_05_07_104103_rename_users_plannings_deposit_table', 5),
('2021_05_07_130648_add_roles_to_users_tables', 5),
('2021_05_07_131314_create_roles_tables', 5),
('2021_05_07_131517_add_roles_to_users_tables_2', 5),
('2021_05_07_132406_create_roles_table', 5),
('2021_05_07_163522_remove_roles_id_on_users_table', 6),
('2021_05_08_023756_create_users_roles_table', 7),
('2021_05_08_072654_add_foreign_key_users_roles_on_users_roles_table', 8),
('2021_05_08_142848_create_images_tables', 9),
('2021_05_08_143402_add_column_images_id_on_plans_tables', 10),
('2021_05_09_051254_add_images_id_column_to_users_plannings_plans', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plans` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plans_images_id_foreign` (`images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plans`, `price`, `description`, `slug`, `is_delete`, `created_at`, `updated_at`, `images_id`) VALUES
(1, 'paket standart', 12500000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 0, NULL, '2021-05-09 10:38:08', 10),
(2, 'paket super', 25000000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 0, NULL, '2021-05-08 09:00:48', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ROLE_ADMIN', '', NULL, NULL),
(2, 'ROLE_SUPERADMIN', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status_id`, `roles_id`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$/JykVGcxk6gC7lXdUbUfb.18t4yu6zeyNF1ANmeZ5j35u/2//u/p.', NULL, '2021-05-07 07:08:13', '2021-05-07 07:08:13', NULL, 0),
(2, 'Aslan gitu loh', 'gopin.ipin@gmail.com', NULL, '$2y$10$NcssYAosTj.RYoALgfzeSenVlKL6pE4tRXCro0PzJ8d2vC0e2bSD6', NULL, '2021-05-07 07:54:16', '2021-05-07 07:54:16', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_plannings`
--

DROP TABLE IF EXISTS `users_plannings`;
CREATE TABLE IF NOT EXISTS `users_plannings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plans_id` bigint(20) UNSIGNED NOT NULL,
  `plans` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `images_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_plannings_plans_id_foreign` (`plans_id`),
  KEY `users_plannings_users_id_foreign` (`users_id`),
  KEY `users_plannings_images_id_foreign` (`images_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_plannings`
--

INSERT INTO `users_plannings` (`id`, `plans_id`, `plans`, `price`, `description`, `users_id`, `is_delete`, `created_at`, `updated_at`, `images_id`) VALUES
(1, 1, 'paket standart', 15000000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 0, '2018-05-07 08:23:18', '2021-05-07 08:23:18', 7),
(2, 2, 'paket super', 25000000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 0, '2019-05-09 00:26:41', '2021-05-09 00:26:41', 5),
(3, 1, 'paket standart', 15000000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 0, '2021-05-09 00:59:35', '2021-05-09 00:59:35', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users_plannings_deposits`
--

DROP TABLE IF EXISTS `users_plannings_deposits`;
CREATE TABLE IF NOT EXISTS `users_plannings_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_plannings_id` bigint(20) UNSIGNED NOT NULL,
  `nominal` double NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_plannings_deposit_users_plannings_id_foreign` (`users_plannings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_plannings_deposits`
--

INSERT INTO `users_plannings_deposits` (`id`, `users_plannings_id`, `nominal`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 0, '2021-05-07 08:34:19', '2021-05-07 08:34:19'),
(2, 1, 20000, 0, '2021-05-07 08:34:25', '2021-05-07 08:34:25'),
(3, 1, 20000, 0, '2021-05-08 11:48:40', '2021-05-08 11:48:40'),
(4, 1, 20000, 0, '2021-05-08 23:36:43', '2021-05-08 23:36:43'),
(5, 1, 100000, 0, '2021-05-09 00:27:37', '2021-05-09 00:27:37'),
(6, 1, 100000, 0, '2021-05-09 00:27:46', '2021-05-09 00:27:46'),
(7, 1, 50000, 0, '2021-05-09 00:37:10', '2021-05-09 00:37:10'),
(8, 2, 50000, 0, '2021-05-09 00:57:26', '2021-05-09 00:57:26'),
(9, 2, 100000, 0, '2021-05-09 00:57:45', '2021-05-09 00:57:45'),
(10, 3, 100000, 0, '2021-05-09 00:59:46', '2021-05-09 00:59:46'),
(11, 3, 20000, 0, '2021-05-09 01:52:03', '2021-05-09 01:52:03'),
(12, 3, 10000, 0, '2021-05-09 10:52:34', '2021-05-09 10:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `roles_id` int(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_roles_users_id_foreign` (`users_id`),
  KEY `users_roles_roles_id_foreign` (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `roles_id`, `users_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2021-05-08 00:54:18', '2021-05-08 00:54:18');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_images_id_foreign` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_plannings`
--
ALTER TABLE `users_plannings`
  ADD CONSTRAINT `users_plannings_images_id_foreign` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_plannings_plans_id_foreign` FOREIGN KEY (`plans_id`) REFERENCES `plans` (`id`),
  ADD CONSTRAINT `users_plannings_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_plannings_deposits`
--
ALTER TABLE `users_plannings_deposits`
  ADD CONSTRAINT `users_plannings_deposit_users_plannings_id_foreign` FOREIGN KEY (`users_plannings_id`) REFERENCES `users_plannings` (`id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_roles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
