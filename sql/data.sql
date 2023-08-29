-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2023 at 08:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommarce_livewire`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `highlight` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_alt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `category_id`, `highlight`, `photo_alt`, `thumbnail`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Man', 2, 'Spring 2023', 'Man', 'cBxrk7KJyQBOprGfvKzWbM98XPCAcKxocOvCygQj.jpg', 1, NULL, NULL, '2023-08-24 01:58:46', '2023-08-24 01:58:46'),
(2, 'Woman ', 1, 'Spring 2023', 'woman', 'KRVB7YGvTYXrfm5hZDn0r03182rVDrlm8AGAvZg8.jpg', 1, NULL, NULL, '2023-08-24 02:02:25', '2023-08-24 02:02:25'),
(3, 'Accesories', 1, 'New Trends', 'new trends', 'Z5mpjIUCzuKsb2qi9B4M1d4D6yco3HPI3IEoXCmj.jpg', 1, NULL, NULL, '2023-08-24 02:03:52', '2023-08-24 02:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `updated_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Woman ', 'woman', NULL, 1, NULL, NULL, '2023-08-24 01:43:20', '2023-08-24 01:43:20'),
(2, 'Man ', 'man', NULL, 1, NULL, NULL, '2023-08-24 01:43:31', '2023-08-24 01:43:31'),
(3, 'Bag ', 'bag', NULL, 1, NULL, NULL, '2023-08-24 02:29:30', '2023-08-24 02:29:30'),
(4, 'Shoes ', 'shoes', NULL, 1, NULL, NULL, '2023-08-24 02:29:49', '2023-08-24 02:29:49'),
(5, 'Watches ', 'watches', NULL, 1, NULL, NULL, '2023-08-24 02:30:03', '2023-08-24 02:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_08_23_093512_create_colors_table', 3),
(10, '2023_08_23_093630_create_sizes_table', 3),
(14, '2023_08_20_083643_create_categories_table', 5),
(15, '2023_08_24_065126_create_banners_table', 5),
(16, '2023_08_23_110929_create_products_table', 6),
(17, '2023_08_27_131532_create_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `country`, `state`, `postal_code`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Rajbari', '7700', '1', '2023-08-28 02:06:32', '2023-08-28 02:06:32'),
(2, 'Bangladesh', 'Rajbari', '7700', '1', '2023-08-28 02:07:16', '2023-08-28 02:07:16');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` bigint UNSIGNED NOT NULL,
  `size_id` bigint UNSIGNED NOT NULL,
  `sales_price` double(8,2) NOT NULL,
  `short_description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multiple_image` json NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `photo_alt`, `color_id`, `size_id`, `sales_price`, `short_description`, `long_description`, `multiple_image`, `thumbnail`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 5, 'Calvin Ward', 'Eligendi iste nulla ', 'Eum velit est nostr', 4, 1, 965.00, 'In nihil cupidatat u', 'Qui ea deserunt est ', '[]', 'NfxcZ5UfCreG2GfiaQ8NCxN90unJAMae4XhfgWQ0.jpg', 0, NULL, '2023-08-24 05:54:03', '2023-08-29 01:07:11'),
(2, 5, 'Calvin Ward', 'Eligendi iste nulla ', 'Eum velit est nostr', 4, 1, 965.00, 'In nihil cupidatat u', 'Qui ea deserunt est ', '[]', 'ftMlNBqYuySb0w8s39TNhXvoTOGu98UtFiKPO38v.jpg', 0, NULL, '2023-08-24 05:55:49', '2023-08-29 01:06:55'),
(3, 3, 'Cleo Beard', 'Cillum suscipit cupi', 'Consequatur In atqu', 3, 4, 972.00, 'Omnis et irure vitae', 'Numquam qui accusant', '[]', '7tylyYBtwl0tQbkfqvGczngUQDAX5yf8xtJAqENf.jpg', 0, NULL, '2023-08-24 06:06:24', '2023-08-29 01:06:38'),
(4, 1, 'Alika Rios', 'Et ut asperiores min', 'Dolor sequi magni qu', 3, 4, 796.00, 'Non fuga Ullam unde', 'Modi ipsa officiis ', '[]', 'g3ZcXuruHEckBuKcqHLrFsCClZZ9Mwzgmtgp8WZx.jpg', 0, NULL, '2023-08-27 00:17:20', '2023-08-29 01:06:22'),
(5, 3, 'Bag 1', 'bag', 'bag', 1, 1, 200.00, 'This is a short description', 'This is a long description', '[]', 's4KIPaoUMQQOfDhRZk0cqpIMe1UHiM16cebQJQNz.jpg', 0, NULL, '2023-08-27 03:37:44', '2023-08-29 01:05:04'),
(6, 2, 'Vivian Joseph', 'Atque aut illum aut', 'Dolorem in dolores i', 2, 1, 91.00, 'Eius qui dolores ips', 'Dolorum aspernatur v', '[]', 'q2eOpLbwOY11jw6Rznb3C1CAWoaP4JOJZfUboIob.jpg', 0, NULL, '2023-08-27 03:54:47', '2023-08-29 01:04:52'),
(7, 4, 'Victor Faulkner', 'Eligendi voluptatem ', 'Consectetur sed pla', 1, 1, 733.00, 'Sed itaque ut vero e', 'Repudiandae cupidata', '[]', 'GnqJfOBJ7y81mkku7k117TfV35D8EKkImLcgEKkP.jpg', 0, NULL, '2023-08-27 03:57:32', '2023-08-29 01:04:35'),
(8, 3, 'Lionel Meyer', 'my_product', 'Eos similique incid', 2, 1, 749.00, 'Non asperiores magni', 'Repellendus Error l', '[]', 'JJUUWHBLIG37jHhBHJew206tQb2k8XLIDXZiqmYc.jpg', 0, NULL, '2023-08-27 03:58:32', '2023-08-29 01:04:04'),
(9, 2, 'Dieter Carter', 'Magna dolorum quis q', 'Cum distinctio Aspe', 4, 2, 747.00, 'Non expedita sit cu', 'Aliqua Quia odio no', '[]', '7FwO83l6hOP3ZbRDwq4Gu1rQ7jFXtBOdKZokLdAI.jpg', 0, NULL, '2023-08-29 00:48:49', '2023-08-29 01:03:37'),
(10, 2, 'Rajah Bernard', 'Cupiditate nulla sol', 'Culpa eos rerum quas', 3, 2, 947.00, 'Dolores dolores veli', 'Duis perspiciatis e', '[]', 'xX9qL9rjqMl1MMvKpzLeW23nnEuuCSAuNkOSolte.jpg', 0, NULL, '2023-08-29 00:50:22', '2023-08-29 01:03:17'),
(11, 5, 'Melvin Miles', 'Eiusmod ut non perfe', 'Eu maiores magnam eu', 4, 4, 925.00, 'Temporibus voluptate', 'Quasi dolor quisquam', '[]', 'NiqPoDrHMJSsx59kJa8QX9DfP49TuZutSn6aaFHE.jpg', 0, NULL, '2023-08-29 00:51:16', '2023-08-29 01:02:19'),
(12, 1, 'Catherine Massey', 'Et in qui molestiae ', 'Eos fugiat molestiae', 2, 2, 36.00, 'Nihil corrupti perf', 'Laboriosam consequa', '[\"mnwj4ZkOFhPTtbNeGW8mgUvQqXEwebTVMHjyIaPM.jpg\", \"mTPFNZTyk6BVx2AaPm7FYxB2aFy5Ui9LyuIbnPlE.jpg\", \"vtsYyoqV8CIyBIn8V4vEOVlNMqNMWtaPDPNRLcNl.jpg\"]', '5ibactrUwe8ScHhtUh6ZDcBrsBJ4TjtlRly3Pb9q.jpg', 0, NULL, '2023-08-29 01:03:03', '2023-08-29 01:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Od3By4JC5opTzwvLCyB.lepCudg1tYGWSOrsds0NYsfQZ7STfkmGC', NULL, NULL, NULL, NULL, NULL, '2023-08-19 10:34:52', '2023-08-19 10:35:04'),
(2, 'sfd', 'admin1@gmail.com', NULL, '12345678', NULL, NULL, NULL, NULL, NULL, '2023-08-23 07:23:54', '2023-08-23 07:23:54'),
(3, '1234567', 'admindf@gmail.com', NULL, '12345678', NULL, NULL, NULL, '2023-08-23 22:58:19', NULL, '2023-08-23 07:24:44', '2023-08-23 22:58:19'),
(4, 'Amity Ortiz', 'wyqa@mailinator.com', NULL, 'Pa$$w0rd!', NULL, NULL, NULL, NULL, NULL, '2023-08-23 07:26:53', '2023-08-23 07:26:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
