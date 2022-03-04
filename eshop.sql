-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 05:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_qty`, `created_at`, `updated_at`) VALUES
(166, '2', '9', '1', '2022-02-28 10:05:10', '2022-02-28 10:05:10'),
(169, '2', '3', '1', '2022-02-28 18:17:16', '2022-02-28 18:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descrip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_descrip`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 'Apple Inc', 0, 1, '1642841792.jpg', NULL, NULL, NULL, '2022-01-22 01:56:32', '2022-01-22 01:56:32'),
(2, 'Samsung', 'samsung', 'Samsung Electronic', 0, 1, '1642841825.jpg', NULL, NULL, NULL, '2022-01-22 01:57:05', '2022-01-22 01:57:05'),
(3, 'Oppo', 'oppo', 'Oppo Inc.', 0, 1, '1643186915.jpg', NULL, NULL, NULL, '2022-01-26 01:46:12', '2022-01-26 01:48:35'),
(4, 'Xiaomi', 'xiaomi', 'Xiaomi Inc.', 0, 0, '1644916118.jpg', NULL, NULL, NULL, '2022-01-26 01:56:53', '2022-02-15 02:08:38'),
(5, 'Nokia', 'nokia', 'Nokia inc.', 0, 1, '1644918901.png', NULL, NULL, NULL, '2022-02-15 02:55:01', '2022-02-15 02:55:01'),
(6, 'OnePlus', 'oneplus', 'OnePlus Inc.', 0, 0, '1644922196.jpg', NULL, NULL, NULL, '2022-02-15 03:02:50', '2022-02-15 03:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_18_090809_create_categories_table', 1),
(6, '2022_01_19_010058_create_products_table', 1),
(7, '2022_02_12_004854_create_carts_table', 2),
(8, '2022_02_21_015153_create_orders_table', 3),
(9, '2022_02_21_015836_create_order_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `phone`, `total_price`, `payment_method`, `payment_id`, `status`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(33, '2', 'sang', 'user1@gmail.com', 'Nha Trang', '0987654321', '37790000', 'COD', NULL, 0, NULL, 'sang7287', '2022-02-28 08:06:19', '2022-02-28 08:06:19'),
(38, '2', 'sang', 'user1@gmail.com', 'Nha Trang', '0987654321', '12500000', 'Thanh toán với Razorpay', 'pay_J1UHr3L5eXBhyx', 1, NULL, 'sang9382', '2022-02-28 09:00:52', '2022-02-28 09:00:52'),
(39, '2', 'sang', 'user1@gmail.com', 'Nha Trang', '0987654321', '13010000', 'Thanh toán với Razorpay', 'pay_J1UIvoJz53kgNn', 1, NULL, 'sang3913', '2022-02-28 09:01:53', '2022-02-28 09:01:53'),
(40, '2', 'sang', 'user1@gmail.com', 'Nha Trang', '0987654321', '16500000', 'Thanh toán với Paypal', '0YP2927182642794K', 1, NULL, 'sang3831', '2022-02-28 09:03:34', '2022-02-28 09:03:34'),
(41, '2', 'sang', 'user1@gmail.com', 'Nha Trang', '0987654321', '8790000', 'Thanh toán với Paypal', '0506391063847303S', 1, NULL, 'sang9537', '2022-02-28 09:06:19', '2022-02-28 09:06:19'),
(56, '8', 'sang tran', 'sangtranwp@gmail.com', 'Ho Chi Minh', '0935597203', '16200000', 'Thanh toán với Paypal', '80W94374387819036', 1, NULL, 'sang tran2628', '2022-02-28 21:15:46', '2022-02-28 21:15:46'),
(57, '8', 'sang tran', 'sangtranwp@gmail.com', 'Ho Chi Minh', '0935597203', '16200000', 'Thanh toán với Paypal', '31404658M0418101L', 1, NULL, 'sang tran1191', '2022-02-28 21:28:42', '2022-02-28 21:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `product_price`, `created_at`, `updated_at`) VALUES
(17, '8', '2', '4', '24000000', '2022-02-21 01:19:23', '2022-02-21 01:19:23'),
(18, '8', '11', '6', '31990000', '2022-02-21 01:19:23', '2022-02-21 01:19:23'),
(19, '9', '10', '1', '16200000', '2022-02-21 19:43:28', '2022-02-21 19:43:28'),
(20, '10', '12', '1', '7950000', '2022-02-21 19:44:58', '2022-02-21 19:44:58'),
(21, '10', '13', '1', '16500000', '2022-02-21 19:44:58', '2022-02-21 19:44:58'),
(22, '11', '6', '1', '7790000', '2022-02-21 19:51:24', '2022-02-21 19:51:24'),
(23, '12', '23', '1', '7990000', '2022-02-22 20:15:50', '2022-02-22 20:15:50'),
(24, '13', '3', '1', '20400000', '2022-02-22 23:54:25', '2022-02-22 23:54:25'),
(25, '14', '3', '1', '20400000', '2022-02-23 17:43:21', '2022-02-23 17:43:21'),
(26, '14', '14', '4', '12500000', '2022-02-23 17:43:21', '2022-02-23 17:43:21'),
(27, '14', '15', '4', '13010000', '2022-02-23 17:43:21', '2022-02-23 17:43:21'),
(28, '15', '14', '6', '12500000', '2022-02-23 17:44:09', '2022-02-23 17:44:09'),
(29, '15', '15', '1', '13010000', '2022-02-23 17:44:09', '2022-02-23 17:44:09'),
(30, '16', '16', '1', '30000000', '2022-02-23 18:24:05', '2022-02-23 18:24:05'),
(31, '17', '22', '1', '13990000', '2022-02-23 18:40:26', '2022-02-23 18:40:26'),
(32, '17', '14', '1', '12500000', '2022-02-23 18:40:26', '2022-02-23 18:40:26'),
(33, '22', '22', '1', '13990000', '2022-02-23 18:52:17', '2022-02-23 18:52:17'),
(34, '23', '20', '1', '9290000', '2022-02-23 18:53:41', '2022-02-23 18:53:41'),
(35, '24', '21', '1', '4990000', '2022-02-23 19:01:50', '2022-02-23 19:01:50'),
(36, '25', '20', '2', '9290000', '2022-02-24 01:20:29', '2022-02-24 01:20:29'),
(37, '26', '14', '1', '12500000', '2022-02-24 01:21:35', '2022-02-24 01:21:35'),
(38, '27', '17', '1', '8790000', '2022-02-28 04:05:00', '2022-02-28 04:05:00'),
(39, '28', '14', '1', '12500000', '2022-02-28 05:02:24', '2022-02-28 05:02:24'),
(40, '29', '16', '1', '30000000', '2022-02-28 05:10:45', '2022-02-28 05:10:45'),
(41, '30', '16', '1', '30000000', '2022-02-28 05:14:27', '2022-02-28 05:14:27'),
(42, '31', '16', '1', '30000000', '2022-02-28 05:15:59', '2022-02-28 05:15:59'),
(43, '32', '16', '1', '30000000', '2022-02-28 07:46:12', '2022-02-28 07:46:12'),
(44, '33', '16', '2', '30000000', '2022-02-28 08:06:19', '2022-02-28 08:06:19'),
(45, '33', '6', '2', '7790000', '2022-02-28 08:06:19', '2022-02-28 08:06:19'),
(46, '34', '10', '1', '16200000', '2022-02-28 08:07:06', '2022-02-28 08:07:06'),
(47, '35', '3', '2', '20400000', '2022-02-28 08:46:48', '2022-02-28 08:46:48'),
(48, '35', '15', '2', '13010000', '2022-02-28 08:46:48', '2022-02-28 08:46:48'),
(49, '36', '10', '1', '16200000', '2022-02-28 08:50:21', '2022-02-28 08:50:21'),
(50, '37', '13', '1', '16500000', '2022-02-28 08:59:46', '2022-02-28 08:59:46'),
(51, '38', '14', '1', '12500000', '2022-02-28 09:00:52', '2022-02-28 09:00:52'),
(52, '39', '15', '1', '13010000', '2022-02-28 09:01:53', '2022-02-28 09:01:53'),
(53, '40', '13', '1', '16500000', '2022-02-28 09:03:34', '2022-02-28 09:03:34'),
(54, '41', '17', '1', '8790000', '2022-02-28 09:06:19', '2022-02-28 09:06:19'),
(55, '42', '15', '1', '13010000', '2022-02-28 19:42:48', '2022-02-28 19:42:48'),
(56, '46', '16', '1', '30000000', '2022-02-28 19:56:00', '2022-02-28 19:56:00'),
(57, '47', '16', '1', '30000000', '2022-02-28 20:18:20', '2022-02-28 20:18:20'),
(58, '48', '3', '1', '20400000', '2022-02-28 20:20:38', '2022-02-28 20:20:38'),
(59, '49', '12', '1', '7950000', '2022-02-28 20:27:01', '2022-02-28 20:27:01'),
(60, '50', '16', '1', '30000000', '2022-02-28 20:30:48', '2022-02-28 20:30:48'),
(61, '51', '5', '1', '23990000', '2022-02-28 20:31:53', '2022-02-28 20:31:53'),
(62, '52', '6', '1', '7790000', '2022-02-28 20:34:07', '2022-02-28 20:34:07'),
(63, '53', '10', '1', '16200000', '2022-02-28 20:39:23', '2022-02-28 20:39:23'),
(64, '54', '10', '1', '16200000', '2022-02-28 21:08:39', '2022-02-28 21:08:39'),
(65, '55', '10', '1', '16200000', '2022-02-28 21:13:11', '2022-02-28 21:13:11'),
(66, '56', '10', '1', '16200000', '2022-02-28 21:15:51', '2022-02-28 21:15:51'),
(67, '57', '10', '1', '16200000', '2022-02-28 21:28:47', '2022-02-28 21:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$lkLZ7HTRpePGn/xWp3ODruX/K7ji0x/LyIXP8QAe3JfMTjoNC4..C', '2022-01-25 02:16:41'),
('sangtranwp@gmail.com', '$2y$10$Xr45WRKDWtEQM.exWzYygOo2inoILUp/QB7QWfOXg2ihlz7jnPigq', '2022-01-25 02:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `quantity`, `tax`, `status`, `trending`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 'Iphone 11 64GB | Chính hãng VN/A', 'iphone-11-64GB', NULL, 'Màn hình:   IPS LCD  6.1\"Liquid Retina \r\nHệ điều hành:  iOS 15\r\nCamera sau:  2 camera 12 MP\r\nCamera trước:  12 MP\r\nChip:  Apple A13 Bionic\r\nRAM:  4 GB\r\nBộ nhớ trong:  64 GB\r\nSIM:  1 Nano SIM & 1 eSIM  Hỗ trợ 4G\r\nPin, Sạc:  3110 mAh  18 W', '18000000', '14100000', '1642842044.jpg', '0', '1', 0, 1, NULL, NULL, NULL, '2022-01-22 02:00:44', '2022-02-15 02:04:58'),
(2, 1, 'Iphone 13 128GB | Chính hãng VN/A', 'iphone-13-128GB', NULL, 'Iphone 13 128GB Mau hong', '27990000', '24000000', '1642842145.jpg', '0', '1', 0, 1, NULL, NULL, NULL, '2022-01-22 02:02:25', '2022-02-21 01:19:23'),
(3, 2, 'Samsung S21 Plus 5G 128GB', 'samsung-s21-plus-5G', NULL, 'Samsung S21 Plus 5G 128GB', '25990000', '20400000', '1642842232.jpg', '7', '1', 0, 1, NULL, NULL, NULL, '2022-01-22 02:03:52', '2022-02-28 20:20:38'),
(4, 2, 'Samsung Galaxy Note 10', 'samsung-galaxy-note-10', NULL, 'Samsung Galaxy Note 10 Mau bac', '22000000', '13800000', '1642842341.jpg', '0', '1', 0, 1, NULL, NULL, NULL, '2022-01-22 02:05:41', '2022-02-21 01:05:43'),
(5, 2, 'Samsung Galaxy Z Flip 3 5G 256GB', 'samsung-galaxy-zflip3-5G', NULL, 'Samsung Z Flip 3 5G 128GB Mau tim', '24990000', '23990000', '1642842431.jpeg', '19', '1', 0, 1, NULL, NULL, NULL, '2022-01-22 02:07:11', '2022-02-28 20:31:53'),
(6, 3, 'Oppo Reno 5', 'oppo-reno5', NULL, 'Oppo Reno 5', '8690000', '7790000', '1643187077.jpg', '6', '1', 0, 1, NULL, NULL, NULL, '2022-01-26 01:51:17', '2022-02-28 20:34:07'),
(7, 3, 'Oppo Find X2', 'oppo-findx2', NULL, 'Oppo Find X2 Xanh', '23990000', '18990000', '1643187232.png', '10', '1', 0, 1, NULL, NULL, NULL, '2022-01-26 01:53:52', '2022-01-26 01:53:52'),
(8, 4, 'Xiaomi Mi 11 5G', 'xiaomi-mi-11-5g', NULL, 'Xiaomi Mi 11 5G', '21990000', '15200000', '1643187599.webp', '10', '1', 0, 1, NULL, NULL, NULL, '2022-01-26 01:59:59', '2022-01-26 01:59:59'),
(9, 4, 'Xiaomi Mi 10T Pro 5G', 'xiaomi-mi-10Tpro-5g', NULL, 'Xiaomi Mi 10T Pro 5G', '12990000', '11200000', '1643187785.webp', '10', '1', 0, 1, NULL, NULL, NULL, '2022-01-26 02:03:05', '2022-01-26 02:03:05'),
(10, 1, 'Iphone 12 Mini 128GB', 'iphone-12-mini-128g', NULL, 'Iphone 12 Mini 128GB Đen', '20990000', '16200000', '1643188324.jpg', '6', '1', 0, 1, NULL, NULL, NULL, '2022-01-26 02:06:31', '2022-02-28 21:28:47'),
(11, 2, 'Samsung Galaxy S22 Ultra 5G 128G', 'samsung-galaxy-s22-ultra-5g-128g', NULL, 'Samsung Galaxy S22 Ultra 5G 128G', '31990000', '31990000', '1644916416.jpg', '0', '1', 0, 1, NULL, NULL, NULL, '2022-02-15 02:13:36', '2022-02-21 01:19:23'),
(12, 2, 'Samsung Galaxy A52 128GB', 'samsung-galaxy-a52-128g', NULL, 'Samsung Galaxy A52 128GB', '9290000', '7950000', '1644917273.webp', '8', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:26:12', '2022-02-28 20:27:01'),
(13, 2, 'Samsung Galaxy S20+ BTS Edition', 'samsung-galaxy-s20-plus-bts-edition', NULL, 'Samsung Galaxy S20+ BTS Edition', '24990000', '16500000', '1644917666.webp', '2', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:34:26', '2022-02-28 09:03:34'),
(14, 1, 'Iphone XR 64GB | Chính hãng VN/A', 'iphone-xr-64gb', NULL, 'Iphone XR 64GB | Chính hãng VN/A', '14990000', '12500000', '1644917930.jpg', '1', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:37:33', '2022-02-28 09:00:52'),
(15, 1, 'Iphone SE 2020 256GB | Chính hãng VN/A', 'iphone-se-2020-256gb', NULL, 'Iphone SE 2020 256GB | Chính hãng VN/A', '17990000', '13010000', '1644918135.jpg', '6', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:42:15', '2022-02-28 19:42:48'),
(16, 1, 'Iphone 11 Pro Max 512GB | Chính hãng VN/A', 'iphone-11-pro-max-512gb', NULL, 'Iphone 11 Pro Max 512GB | Chính hãng VN/A', '35000000', '30000000', '1644918282.jpg', '10', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:44:42', '2022-02-28 20:30:48'),
(17, 3, 'Oppo Reno6 Z 5G', 'oppo-reno-6z', NULL, 'Oppo Reno6 Z 5G', '9490000', '8790000', '1644918436.jpg', '8', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:47:16', '2022-02-28 09:06:19'),
(18, 4, 'Xiaomi Redmi 9C', 'xiaomi-redmi-9c', NULL, 'Xiaomi Redmi 9C', '3490000', '3300000', '1644918591.jpg', '5', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:49:51', '2022-02-15 02:49:51'),
(19, 5, 'Nokia 5.3', 'nokia-53', NULL, 'Nokia 5.3', '3290000', '2790000', '1644919024.jpg', '5', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:57:04', '2022-02-15 02:57:04'),
(20, 5, 'Nokia 8.3 5G', 'nokia-83-5g', NULL, 'Nokia 8.3 5G', '12990000', '9290000', '1644919119.jpg', '2', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 02:58:39', '2022-02-24 01:20:29'),
(21, 5, 'Nokia G50 5G', 'nokia-g50-5g', NULL, 'Nokia G50 5G', '6490000', '4990000', '1644919277.jpg', '4', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 03:00:26', '2022-02-23 19:01:50'),
(22, 6, 'OnePlus 8T 5G', 'oneplus-8t-5g', NULL, 'OnePlus 8T 5G', '18990000', '13990000', '1644922569.jpg', '8', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 03:52:08', '2022-02-23 18:52:17'),
(23, 6, 'OnePlus Nord CE 5g', 'oneplus-nord-ce-5g', NULL, 'OnePlus Nord CE 5g', '8990000', '7990000', '1644922451.jpg', '4', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 03:54:11', '2022-02-22 20:15:50'),
(24, 6, 'OnePlus Nord N10 5G', 'oneplus-nord-n10-5g', NULL, 'OnePlus Nord N10 5G', '7990000', '5890000', '1644922711.jpg', '5', '1', 0, 0, NULL, NULL, NULL, '2022-02-15 03:58:31', '2022-02-15 03:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `email_verified_at`, `password`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'Ho Chi Minh', '0123456789', NULL, '$2y$10$yHcbdCQvZ9APqHEuUocN9urcuJSzrIIjLfbSoFznBBUioLyFAYqwG', 1, NULL, '2022-01-22 01:53:47', '2022-01-22 01:53:47'),
(2, 'sang', 'user1@gmail.com', 'Nha Trang', '0987654321', NULL, '$2y$10$8FtUl0mgTRKpkOYAVDQWoOGwzRSlCHvnws.XoE.9DsuyaTLhBxfVq', 0, NULL, '2022-01-22 01:54:13', '2022-01-22 01:54:13'),
(7, 'sang2', 'user2@gmail.com', 'Da Nang', '0123789456', NULL, '$2y$10$F3OU8xdpK.CEzVYCe1dqUOPfnmM8FSN0RMmBPiT3YVA98iSV4DGP.', 0, NULL, '2022-02-16 20:09:37', '2022-02-16 20:09:37'),
(8, 'sang tran', 'sangtranwp@gmail.com', 'Ho Chi Minh', '0935597203', NULL, '$2y$10$74v.xRdrTK/8XZonoMryNusnIwuZWIF4S01vIaq0KFW0hAY7KDTAG', 0, NULL, '2022-02-28 19:37:14', '2022-02-28 19:37:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
