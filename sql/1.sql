-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2023 at 01:13 PM
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
(16, '2023_08_23_110929_create_products_table', 6);

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
(1, 5, 'Calvin Ward', 'Eligendi iste nulla ', 'Eum velit est nostr', 4, 1, 965.00, 'In nihil cupidatat u', 'Qui ea deserunt est ', '[\"PuDBBfhfjTAx6cvDKhBIHP1ZOULWXxzHDhpB5UbG.jpg\", \"E2WfGvTnB9aGa8Nd8EByUb3Kx4av9OiUFBwqxAFD.jpg\", \"insSuG4paYVDtmbkJapGDQtMHJV6ORBwYiRPbRuM.jpg\", \"iBybwj8UcbgZsSn5N94rXhc7hChkZhCdJLuT6RsH.jpg\", \"b4iwk7UOko5zH35P98nRaxMeQRFEcxTXwFmyHrVH.jpg\"]', 'cTxUrnyDhETUgot91ScvYWvLotJ7H6g7I1yjH9Dz.jpg', 0, NULL, '2023-08-24 05:54:03', '2023-08-24 05:54:03'),
(2, 5, 'Calvin Ward', 'Eligendi iste nulla ', 'Eum velit est nostr', 4, 1, 965.00, 'In nihil cupidatat u', 'Qui ea deserunt est ', '[\"E1LxVUu0asy9PsAwPKdjoSVvMrWo6iTPlFy33Hqs.jpg\", \"ZpwV27BTks4yjldMGIM0kGs2MOL7wWvJrjsMzapo.jpg\", \"YZSakrdikFxqDvFpxAWnMVPHYDG9zie7OYDrmZMk.jpg\", \"hZ3vj3MvM9WAVu4xpl6ydSq8NzQdlLmKZ1JPT4F9.jpg\"]', 'KzPoedvLDYC3tSbnam8pZ9iJ3MSNMrZ2XKBrqUoy.jpg', 0, NULL, '2023-08-24 05:55:49', '2023-08-24 05:55:49'),
(3, 3, 'Cleo Beard', 'Cillum suscipit cupi', 'Consequatur In atqu', 3, 4, 972.00, 'Omnis et irure vitae', 'Numquam qui accusant', '[\"3YpmMsE0mrnOekos7Sd5e9MLgRBCP0hYxiV0iUNn.jpg\", \"R2ldeIhudcnMpFr2boFOFDyz5dUf42lgOmOaREbO.jpg\", \"op0xLEjZagb67sw37QxxIM0MiTxlfiXBd9lMw2Q4.jpg\", \"QrAKe1JsfxCvCPHsuYSuzktKBzTQVuU3n4JXHrKh.jpg\"]', 'dCoF2VwT21KNwovMbPNjTIwJEmtVwBBi34WPsJMF.jpg', 0, NULL, '2023-08-24 06:06:24', '2023-08-24 06:06:24'),
(4, 1, 'Alika Rios', 'Et ut asperiores min', 'Dolor sequi magni qu', 3, 4, 796.00, 'Non fuga Ullam unde', 'Modi ipsa officiis ', '[\"RCZ2UIRSgJPJtUiMtepToB7gANo74dRzaNaCnLIQ.jpg\", \"Y1QKF8IKYP6KsN4HYcE14rHAY6WjZu52EzDIHRLG.jpg\", \"MwpZdtY4vmiaLJAPw88mRBTb62XckwfPbNv6eWKw.jpg\", \"ilqbBQjJyzqQX4zleGxkbyXHqQODRYwwrMQgozSC.jpg\"]', 'V9lJs7czfwHvzBNejLNYlPx5v8KHZ23YPmlvz5sJ.jpg', 0, NULL, '2023-08-27 00:17:20', '2023-08-27 00:17:20'),
(5, 3, 'Bag 1', 'bag', 'bag', 1, 1, 200.00, 'This is a short description', 'This is a long description', '[\"1aO1TGKQ5PRLpGtFrMBZk8S2kKnm3JYyd0uvni2c.jpg\", \"x6ux1cLYUV7oigYgotTyR3ajpqUb490tX5IPHgpB.jpg\", \"c1EzRquT42jQfRk8hcJcpL7cFTAb8uFUlHYLxtdh.jpg\", \"J3H7fyCklkWpRBmC0Qo024aWgHJRkGL9jcyljODk.jpg\"]', 'K9lQwOv0qAN6dtKaW6C8coU3Kl35W58ZRtTk2m4K.jpg', 0, NULL, '2023-08-27 03:37:44', '2023-08-27 03:37:44'),
(6, 2, 'Vivian Joseph', 'Atque aut illum aut', 'Dolorem in dolores i', 2, 1, 91.00, 'Eius qui dolores ips', 'Dolorum aspernatur v', '[\"VfcDvnSm6HkHtoMheCr1r44NRkR9RKcwAcgMRXwH.jpg\", \"4WqkvAZCHD8pli18zRu7j6qKLfttv8pnhYkG0zSI.jpg\", \"BiRkSMM5GIsQUl75Xr6Tc5EKbMcqRBsWJ7kwNJbc.jpg\", \"OtQ6KMNwhTJgewn2n5jso95UY3rR04aJIYpcvq6u.jpg\"]', 'SV7EDShhsag2AbyTptm5dFHIkqkpn3HhfRnxacZU.jpg', 0, NULL, '2023-08-27 03:54:47', '2023-08-27 03:54:47'),
(7, 4, 'Victor Faulkner', 'Eligendi voluptatem ', 'Consectetur sed pla', 1, 1, 733.00, 'Sed itaque ut vero e', 'Repudiandae cupidata', '[\"H4TNLaNtiqc1pafrDfwjwgxK8AZeHoa5wujXECOE.jpg\", \"cnh3cMwu9aPJSlt78nGPuY2UgJO0METjhdZcuhCW.jpg\", \"xt4S0lNSydNJUgx9hggqkPqwoesJ5y8Wdyl9GTib.jpg\"]', 'N2v7OjCjFqfSR5FGnamo4hvAwNz9I1okp6d07ImL.jpg', 0, NULL, '2023-08-27 03:57:32', '2023-08-27 03:57:32'),
(8, 3, 'Lionel Meyer', 'Beatae quasi reprehe', 'Eos similique incid', 2, 1, 749.00, 'Non asperiores magni', 'Repellendus Error l', '[\"PkDBBMpNO8FmZ1tPNBeXBLIQXAM6KoTpoCl0XFtp.jpg\", \"Wb9GsqlHZ8bGETaKEGVNoXL06icffXHFfQNupLqb.jpg\"]', 'TlJqTfL2wRHkUvj2RvDO6dFbqEbqFaX8tL5xvigz.jpg', 0, NULL, '2023-08-27 03:58:32', '2023-08-27 03:58:32');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
