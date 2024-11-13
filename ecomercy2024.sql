-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 05:52 PM
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
-- Database: `ecomercy2024`
--
CREATE DATABASE IF NOT EXISTS `ecomercy2024` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecomercy2024`;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_name`, `quantity`, `price`, `image`, `category`, `created_at`, `updated_at`) VALUES
(31, 4, 3, 'đồng hồ đeo tay', 1, 5000000.00, 'images/aBFzbQ8uoUzvb0bOXR9Smd2Q15GYmLdQp9GpwLHG.jpg', 'đồng hồ đeo tay', '2024-11-13 16:29:55', '2024-11-13 16:29:55'),
(32, 4, 4, 'đồng hồ cảm ứng', 1, 5000000.00, 'images/uCPiCPeSgFnuaFWdHwuRR9NFLp9aLDmdx4XaZfpn.jpg', 'apple watch', '2024-11-13 16:30:00', '2024-11-13 16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'đồng hồ đeo tay', '2024-10-01 12:00:01', '2024-10-01 12:00:06'),
(3, 'apple watch', '2024-10-01 12:01:55', '2024-10-01 12:02:00'),
(4, 'rolex', '2024-10-01 12:03:28', '2024-10-01 12:03:28');

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
(5, '2024_08_23_092851_create_category_table', 2),
(16, '2014_10_12_000000_create_users_table', 3),
(17, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(18, '2019_08_19_000000_create_failed_jobs_table', 3),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(20, '2024_08_30_062009_create_categories_table', 3),
(21, '2024_09_06_004003_create_products_table', 3),
(22, '2024_09_06_065007_add_image_to_products_table', 4),
(23, '2024_09_19_152045_add_role_to_users_table', 4),
(24, '2024_09_27_063833_create_carts_table', 5),
(25, '2024_09_28_053716_create_orders_table', 5),
(26, '2024_09_28_053736_create_order_items_table', 5),
(27, '2024_10_04_160338_create_payments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('processing','paid','cancelled') NOT NULL DEFAULT 'processing',
  `payment_method` enum('COD','online') NOT NULL DEFAULT 'COD',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `payment_method`, `created_at`, `updated_at`) VALUES
(3, 4, 20000000.00, 'processing', 'COD', '2024-10-01 12:11:16', '2024-10-25 06:51:04'),
(4, 4, 35000000.00, 'paid', 'COD', '2024-10-04 07:26:26', '2024-10-04 07:34:27'),
(5, 1, 20000000.00, 'paid', 'COD', '2024-10-04 07:27:37', '2024-10-04 07:34:29'),
(6, 1, 25000000.00, 'paid', 'COD', '2024-10-04 07:27:49', '2024-10-04 09:19:38'),
(7, 4, 60000000.00, 'paid', 'COD', '2024-10-04 09:18:53', '2024-10-04 09:19:36'),
(8, 4, 25000000.00, 'paid', 'COD', '2024-10-04 09:19:01', '2024-10-04 09:19:40'),
(9, 4, 15000000.00, 'paid', 'COD', '2024-10-04 09:19:22', '2024-10-04 09:19:42'),
(10, 1, 30000000.00, 'paid', 'COD', '2024-10-04 09:23:51', '2024-10-04 09:27:26'),
(11, 1, 15000000.00, 'paid', 'COD', '2024-10-04 09:24:58', '2024-10-04 09:27:29'),
(12, 4, 20000000.00, 'paid', 'online', '2024-10-04 09:27:57', '2024-10-04 09:28:18'),
(13, 4, 15000000.00, 'paid', 'online', '2024-10-04 09:30:19', '2024-10-04 09:30:36'),
(14, 4, 20000000.00, 'paid', 'online', '2024-10-04 09:31:31', '2024-10-04 09:31:49'),
(15, 4, 20000000.00, 'paid', 'online', '2024-10-04 09:33:30', '2024-10-04 09:33:49'),
(16, 4, 20000000.00, 'paid', 'COD', '2024-10-04 09:34:52', '2024-10-04 09:35:17'),
(17, 1, 15000000.00, 'paid', 'online', '2024-10-04 09:47:48', '2024-10-04 09:48:13'),
(18, 4, 15000000.00, 'paid', 'online', '2024-10-18 05:38:52', '2024-10-18 05:39:15'),
(19, 4, 15000000.00, 'paid', 'COD', '2024-10-18 05:39:00', '2024-10-18 05:39:19'),
(20, 1, 15000000.00, 'processing', 'COD', '2024-10-18 07:19:46', '2024-10-18 07:19:46'),
(21, 4, 25000000.00, 'processing', 'COD', '2024-10-21 03:06:00', '2024-10-21 03:06:00'),
(22, 4, 20000000.00, 'processing', 'COD', '2024-10-21 03:06:25', '2024-10-21 03:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(3, 3, 3, 1, 20000000.00, '2024-10-01 12:11:16', '2024-10-01 12:11:16'),
(4, 4, 10, 1, 15000000.00, '2024-10-04 07:26:26', '2024-10-04 07:26:26'),
(5, 4, 3, 1, 20000000.00, '2024-10-04 07:26:26', '2024-10-04 07:26:26'),
(6, 5, 3, 1, 20000000.00, '2024-10-04 07:27:37', '2024-10-04 07:27:37'),
(7, 6, 4, 1, 25000000.00, '2024-10-04 07:27:49', '2024-10-04 07:27:49'),
(8, 7, 4, 1, 25000000.00, '2024-10-04 09:18:53', '2024-10-04 09:18:53'),
(9, 7, 7, 1, 15000000.00, '2024-10-04 09:18:53', '2024-10-04 09:18:53'),
(10, 7, 3, 1, 20000000.00, '2024-10-04 09:18:53', '2024-10-04 09:18:53'),
(11, 8, 4, 1, 25000000.00, '2024-10-04 09:19:01', '2024-10-04 09:19:01'),
(12, 9, 12, 1, 15000000.00, '2024-10-04 09:19:22', '2024-10-04 09:19:22'),
(13, 10, 8, 1, 30000000.00, '2024-10-04 09:23:51', '2024-10-04 09:23:51'),
(14, 11, 7, 1, 15000000.00, '2024-10-04 09:24:58', '2024-10-04 09:24:58'),
(15, 12, 3, 1, 20000000.00, '2024-10-04 09:27:57', '2024-10-04 09:27:57'),
(16, 13, 6, 1, 15000000.00, '2024-10-04 09:30:19', '2024-10-04 09:30:19'),
(17, 14, 9, 1, 20000000.00, '2024-10-04 09:31:31', '2024-10-04 09:31:31'),
(18, 15, 9, 1, 20000000.00, '2024-10-04 09:33:30', '2024-10-04 09:33:30'),
(19, 16, 3, 1, 20000000.00, '2024-10-04 09:34:52', '2024-10-04 09:34:52'),
(20, 17, 6, 1, 15000000.00, '2024-10-04 09:47:48', '2024-10-04 09:47:48'),
(21, 18, 7, 1, 15000000.00, '2024-10-18 05:38:52', '2024-10-18 05:38:52'),
(22, 19, 6, 1, 15000000.00, '2024-10-18 05:39:00', '2024-10-18 05:39:00'),
(23, 20, 6, 1, 15000000.00, '2024-10-18 07:19:46', '2024-10-18 07:19:46'),
(24, 21, 4, 1, 25000000.00, '2024-10-21 03:06:00', '2024-10-21 03:06:00'),
(25, 22, 3, 1, 20000000.00, '2024-10-21 03:06:25', '2024-10-21 03:06:25');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` enum('COD','online') NOT NULL DEFAULT 'online',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `amount`, `payment_date`, `payment_method`, `created_at`, `updated_at`) VALUES
(1, 15, 20000000.00, '2024-10-04 09:33:30', 'online', '2024-10-04 09:33:30', '2024-10-04 09:33:30'),
(2, 16, 20000000.00, '2024-10-04 09:34:52', 'COD', '2024-10-04 09:34:52', '2024-10-04 09:34:52'),
(3, 17, 15000000.00, '2024-10-04 09:47:48', 'online', '2024-10-04 09:47:48', '2024-10-04 09:47:48'),
(4, 18, 15000000.00, '2024-10-18 05:38:52', 'online', '2024-10-18 05:38:52', '2024-10-18 05:38:52'),
(5, 19, 15000000.00, '2024-10-18 05:39:00', 'COD', '2024-10-18 05:39:00', '2024-10-18 05:39:00'),
(6, 20, 15000000.00, '2024-10-18 07:19:46', 'COD', '2024-10-18 07:19:46', '2024-10-18 07:19:46'),
(7, 21, 25000000.00, '2024-10-21 03:06:00', 'COD', '2024-10-21 03:06:00', '2024-10-21 03:06:00'),
(8, 22, 20000000.00, '2024-10-21 03:06:25', 'COD', '2024-10-21 03:06:25', '2024-10-21 03:06:25');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `price`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'đồng hồ đeo tay', 'Đẹp , chất lượng cao', 5, 5000000.00, 'images/aBFzbQ8uoUzvb0bOXR9Smd2Q15GYmLdQp9GpwLHG.jpg', 2, '2024-10-01 12:03:17', '2024-11-13 16:23:53'),
(4, 'đồng hồ cảm ứng', 'gọn , dễ sử dụng , có tính năng như điện thoại thông minh', 10, 5000000.00, 'images/uCPiCPeSgFnuaFWdHwuRR9NFLp9aLDmdx4XaZfpn.jpg', 3, '2024-10-01 12:05:00', '2024-11-13 16:23:58'),
(6, 'đồng hồ đeo tay', 'đẹp , sang trọng', 10, 7000000.00, 'images/8Hp8GTBVF00DpomRtEUAIz93eEP24CCHfzeVFNoD.jpg', 2, '2024-10-01 12:05:56', '2024-11-13 16:24:07'),
(7, 'đồng hồ đeo tay', 'sang trọng , quý phái', 10, 6000000.00, 'images/YD2WXHl5EuhGfTXctAIDExEWl0omdnc3jSxgBH6p.jpg', 2, '2024-10-01 12:06:26', '2024-11-13 16:24:14'),
(8, 'đồng hồ cảm ứng thông minh', 'Hãng mới, tiện ích , tính năng cao , dễ sử dụng , sang trọng', 2, 10000000.00, 'images/658qfQmOb951alUGwIpm2ivX6yecAkgBhLZ54xp6.jpg', 3, '2024-10-01 12:08:43', '2024-11-13 16:24:25'),
(9, 'đồng hồ đeo tay', 'sang trọng', 2, 10000000.00, 'images/JFjulontUy5IBnfqd6cvFCfvIFwR9cW5vMlgh12B.jpg', 2, '2024-10-01 12:09:25', '2024-11-13 16:24:34'),
(10, 'đồng hồ đeo tay', 'đẹp', 3, 15000000.00, 'images/J9SosplaVF8pdEBuGDyUp1B0ca1S3WH3RpKkxL1b.jpg', 2, '2024-10-01 12:09:47', '2024-10-01 12:09:47'),
(11, 'đồng hồ đeo tay', 'sang trọng', 3, 8000000.00, 'images/K8L4hCcjy2A0rmEfYkSknIZVD21gS8CGnHryebzG.jpg', 4, '2024-10-01 12:10:17', '2024-11-13 16:24:52'),
(12, 'đồng hồ đeo tay', 'sang trọng , quý phái', 3, 10000000.00, 'images/AxO1G3rWdPdt5U01FthhoMjOFRbadMYpDspbea9W.jpg', 4, '2024-10-01 12:10:47', '2024-11-13 16:24:43');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$cXea5JJxaeasvXghyToihuvOwYkfE/K4pf7aV51XAyu/ZCFjHQ0kq', NULL, '2024-09-19 08:33:46', '2024-09-19 08:33:46', 'admin'),
(4, 'dang', 'haidang200302@gmail.com', NULL, '$2y$12$s2g/mgZN5/3w1KUFQpxJh.aQ1SJq3KV/wzWEMXgKhEDk434TdzoEu', NULL, '2024-10-01 07:24:33', '2024-10-01 07:24:33', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
