-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 07:53 AM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rkhqilqj_fitforalegend`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p>Welcome to Fitforalegend. This page details a limited period Offer provided by our participating sellers redeemable through our Fitforalegend Marketplace Platform. Please read these terms and conditions carefully before participating. You should understand that by participating in the Offer and using our Platform, you agree to be bound by these terms and conditions including Terms of Use and Privacy Policy of the Platform. Please understand that if you refuse to accept these terms and conditions, you will not be able to access the offers provided under our Platform.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-11-29 16:50:24', '2023-11-29 15:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(550) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$t4tsLD9uWx8gupYGBjwPaewr5SuxhpuwGeTSM4GAL2YnuIRGe7x/u', '4571999285', 'https://cdn-icons-png.flaticon.com/512/149/149071.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apikeys`
--

CREATE TABLE `apikeys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stripe_public_key` varchar(255) NOT NULL,
  `stripe_secret_key` varchar(255) NOT NULL,
  `stripe_status` enum('active','deactive') NOT NULL DEFAULT 'active' COMMENT 'Active/Deactive',
  `google_map_key` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) NOT NULL,
  `attribute_value` varchar(255) DEFAULT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_name`, `attribute_value`, `status`, `created_at`, `updated_at`) VALUES
(4, 'xs', NULL, 'Active', '2023-10-03 10:10:08', '2023-10-03 10:10:08'),
(5, 's', NULL, 'Active', '2023-10-03 10:10:11', '2023-10-03 10:10:11'),
(6, 'M', NULL, 'Active', '2023-10-03 10:10:15', '2023-10-03 10:10:15'),
(7, 'L', NULL, 'Active', '2023-10-03 10:10:19', '2023-10-03 10:10:19'),
(8, 'XXL', NULL, 'Active', '2023-10-03 10:10:24', '2023-10-03 10:10:24'),
(9, 'XXXL', NULL, 'Active', '2023-10-03 10:10:45', '2023-10-03 10:10:45'),
(10, '0-1 year', NULL, 'Active', '2023-10-18 05:32:06', '2023-10-18 05:32:06'),
(11, '1-3 year', NULL, 'Active', '2023-10-18 05:32:24', '2023-10-18 05:32:24'),
(12, '3-6 year', NULL, 'Active', '2023-10-18 05:32:55', '2023-10-18 05:32:55'),
(13, '30 cm', NULL, 'Active', '2023-10-18 05:35:48', '2023-10-18 05:35:48'),
(14, '50 cm', NULL, 'Active', '2023-10-18 05:35:56', '2023-10-19 07:48:15'),
(15, '100 cm', NULL, 'Active', '2023-10-18 05:36:05', '2023-10-18 05:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(550) DEFAULT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Zara', 'zara', NULL, 'Active', '2023-10-03 10:09:30', '2023-10-03 10:09:30'),
(5, 'Mufti', 'mufti', NULL, 'Active', '2023-10-03 10:09:46', '2023-10-03 10:09:46'),
(6, 'Levis', 'levis', NULL, 'Active', '2023-10-03 10:09:57', '2023-10-03 10:09:57'),
(7, 'Gucci', 'Gucci', '1696510798_1960s_Gucci_Logo.svg.png', 'Active', '2023-10-05 16:59:58', '2023-10-05 16:59:58'),
(8, 'H&M', 'H&M', '1696510841_hm-logo.png', 'Active', '2023-10-05 17:00:41', '2023-10-05 17:00:41'),
(9, 'Adidas', 'Adidas', '1696510919_Adidas-logo.webp', 'Active', '2023-10-05 17:01:59', '2023-10-05 17:01:59'),
(10, 'Hermès', 'Hermès', '1696510993_hermes-logo.webp', 'Active', '2023-10-05 17:03:13', '2023-10-05 17:03:13'),
(11, 'Dolce & Gabbana', 'Dolce & Gabbana', '1696511118_DG-LOGO_400x112.webp', 'Active', '2023-10-05 17:05:18', '2023-10-05 17:05:18'),
(12, 'Calvin Klein', 'Calvin Klein', '1696511168_1200px-CK_Calvin_Klein_logo.svg.png', 'Active', '2023-10-05 17:06:08', '2023-10-05 17:06:08'),
(13, 'PETER ENGLAND', 'PETER ENGLAND', '1696511338_unnamed.webp', 'Active', '2023-10-05 17:08:58', '2023-10-05 17:08:58'),
(14, 'U.S. POLO ASSN.', 'U.S. POLO ASSN.', '1696511392_us-polo-assn-brand-symbol-with-name-white-logo-clothes-design-icon-abstract-illustration-with-blue-background-free-vector.jpg', 'Active', '2023-10-05 17:09:52', '2023-10-05 17:09:52'),
(15, 'Titan', 'Titan', NULL, 'Active', '2023-10-16 04:07:04', '2023-10-16 04:07:04'),
(16, 'Fire Boltt', 'Fire Boltt', NULL, 'Active', '2023-10-16 04:46:19', '2023-10-16 04:46:19'),
(17, 'Wildhorn', 'wallet', NULL, 'Active', '2023-10-16 06:10:44', '2023-10-16 06:10:44'),
(18, 'Giva', 'Giva', NULL, 'Active', '2023-10-17 05:47:37', '2023-10-17 05:47:37'),
(19, 'Libas', 'Libas', '1698299945_th.jpg', 'Active', '2023-10-26 09:59:05', '2023-10-26 09:59:05'),
(20, 'W', 'W', '1698300151_OIP.jpg', 'Active', '2023-10-26 10:02:31', '2023-10-26 10:02:31'),
(21, 'denim', 'denim', NULL, 'Active', '2023-11-06 10:32:30', '2023-11-06 10:32:30'),
(22, 'Roadster', 'Roadster', NULL, 'Active', '2023-11-06 11:33:54', '2023-11-06 11:33:54'),
(23, 'Sneakers', 'Sneakers', NULL, 'Active', '2023-11-08 15:09:31', '2023-11-08 15:09:31'),
(24, 'Bata', 'Bata', NULL, 'Active', '2023-11-08 15:28:18', '2023-11-08 15:28:18'),
(25, 'Fastrack', 'Analog watch', NULL, 'Active', '2023-11-29 12:19:19', '2023-11-29 12:19:19'),
(26, 'Inddus', 'Inddus', NULL, 'Active', '2023-11-29 14:49:55', '2023-11-29 14:49:55'),
(27, 'Lavanya The Label', 'saree', NULL, 'Active', '2023-11-29 16:22:53', '2023-11-29 16:22:53'),
(28, 'KOTTY', 'jeans', NULL, 'Active', '2023-11-29 16:28:33', '2023-11-29 16:28:33'),
(29, 'Chiraiyaa', 'jeans', NULL, 'Active', '2023-11-29 16:49:37', '2023-11-29 16:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `variation_price` decimal(9,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `variation_id`, `quantity`, `variation_price`, `created_at`, `updated_at`) VALUES
(131, 25, 72, 55, 1, 800.00, '2023-11-16 12:22:47', '2023-11-16 12:22:47'),
(140, 23, 78, 66, 1, 400.00, '2023-11-16 15:44:42', '2023-11-16 15:44:42'),
(160, 24, 61, 31, 1, 3000.00, '2023-11-21 10:28:49', '2023-11-29 12:39:27'),
(193, 24, 77, 0, 1, 3000.00, '2023-11-29 12:34:19', '2023-11-29 12:34:19'),
(194, 24, 60, 30, 1, 1200.00, '2023-11-29 12:37:50', '2023-11-29 12:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_category_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(550) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `master_category_id`, `category_name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 8, 'Newest Arrivals', NULL, NULL, '2023-10-02 18:12:29', '2023-10-02 18:12:29'),
(4, 8, 'Spring/Summer Outerwear', NULL, NULL, '2023-10-02 18:12:47', '2023-10-02 18:12:47'),
(5, 8, 'Fall/Winter Outerwear', NULL, NULL, '2023-10-02 18:12:54', '2023-10-02 18:12:54'),
(6, 8, 'Bags', NULL, NULL, '2023-10-02 18:13:00', '2023-10-02 18:13:00'),
(7, 9, 'Newest Arrival', NULL, NULL, '2023-10-02 18:13:31', '2023-10-02 18:13:31'),
(8, 9, 'Ready-To-Wear', NULL, NULL, '2023-10-02 18:13:41', '2023-10-02 18:13:41'),
(9, 9, 'Work Out Wear', NULL, NULL, '2023-10-02 18:13:52', '2023-10-02 18:13:52'),
(10, 9, 'Handbags', NULL, NULL, '2023-10-02 18:14:00', '2023-10-02 18:14:00'),
(11, 10, 'Top wear', NULL, NULL, '2023-10-02 18:14:31', '2023-10-02 18:14:31'),
(12, 10, 'Bottom Wear', NULL, NULL, '2023-10-02 18:14:43', '2023-10-02 18:15:51'),
(13, 10, 'Infants', NULL, NULL, '2023-10-02 18:15:21', '2023-10-02 18:15:21'),
(14, 10, 'Baby products', NULL, NULL, '2023-10-02 18:15:33', '2023-10-02 18:15:33'),
(15, 11, 'Watch', NULL, NULL, '2023-10-16 03:57:21', '2023-10-16 04:43:31'),
(16, 11, 'Jewellery', NULL, NULL, '2023-10-16 06:00:25', '2023-10-16 06:00:25'),
(17, 11, 'Wallets', NULL, NULL, '2023-10-16 06:11:11', '2023-10-16 06:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Miami', NULL, '2023-10-11 01:38:13', '2023-10-11 01:38:13'),
(2, 1, 'Tampa', NULL, '2023-10-11 01:38:13', '2023-10-11 01:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Silver', '#cdd0d0', 'Active', '2023-10-05 17:10:57', '2023-10-05 17:10:57'),
(4, 'Navy Blue', '#0034d1', 'Active', '2023-10-05 17:11:44', '2023-10-10 09:59:33'),
(5, 'Cream', '#eccbac', 'Active', '2023-10-05 17:13:14', '2023-11-06 11:24:39'),
(6, 'Light Green', '#00ffbf', 'Active', '2023-10-05 17:13:55', '2023-10-05 17:13:55'),
(7, 'Dark Green', '#1d4f03', 'Active', '2023-10-05 17:14:27', '2023-11-29 15:36:24'),
(8, 'Pink', '#f2d4ea', 'Active', '2023-10-05 17:14:56', '2023-10-30 16:18:15'),
(9, 'Orange', '#ff7300', 'Active', '2023-10-05 17:15:17', '2023-10-05 17:15:17'),
(10, 'Red', '#ff0000', 'Active', '2023-10-05 17:15:43', '2023-10-05 17:15:43'),
(11, 'Yellow', '#eeff00', 'Active', '2023-10-05 17:16:03', '2023-10-05 17:16:03'),
(12, 'Black', '#000000', 'Active', '2023-10-10 14:53:30', '2023-10-10 14:53:30'),
(13, 'gray', '#929090', 'Active', '2023-10-10 14:55:12', '2023-10-10 14:55:12'),
(14, 'gold', '#ffbb00', 'Active', '2023-10-17 05:48:06', '2023-10-17 05:48:06'),
(15, 'rose gold', '#e6c465', 'Active', '2023-10-27 09:46:53', '2023-10-27 09:46:53'),
(16, 'sky blue', '#a8e7f0', 'Active', '2023-11-06 10:35:21', '2023-11-06 10:35:21'),
(17, 'White', '#ffffff', 'Active', '2023-11-06 10:52:06', '2023-11-06 10:52:06'),
(18, 'Dark Blue', '#174c7d', 'Active', '2023-11-06 11:20:49', '2023-11-06 11:20:49'),
(19, 'Brown', '#820303', 'Active', '2023-11-06 12:44:59', '2023-11-06 12:44:59'),
(20, 'Peach', '#ffbab3', 'Active', '2023-11-08 15:16:39', '2023-11-08 15:16:39'),
(21, 'blue', '#c3cfdd', 'Active', '2023-11-29 14:59:35', '2023-11-29 14:59:35'),
(22, 'bottle green', '#20423c', 'Active', '2023-11-29 15:38:33', '2023-11-29 15:38:33'),
(23, 'dark pink', '#4c0418', 'Active', '2023-11-29 16:11:15', '2023-11-29 16:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(9, 'Sunil', 'sunil.cloudwapp@gmail.com', '9669208080', 'test', 'testing', '2023-11-29 17:31:21', '2023-11-29 17:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `name`, `created_at`, `updated_at`) VALUES
(1, '+1', 'United State', '2023-10-11 01:38:13', '2023-10-11 01:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `code`, `discount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(10, NULL, 'Big20', '20', '2023-11-21', 'Active', '2023-11-21 11:15:54', '2023-11-21 11:16:13'),
(11, NULL, 'dec10', '25', '2023-12-10', 'Active', '2023-11-24 10:35:56', '2023-11-24 10:35:56');

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
-- Table structure for table `master_categories`
--

CREATE TABLE `master_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_category_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(550) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_categories`
--

INSERT INTO `master_categories` (`id`, `master_category_name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(8, 'Men', NULL, NULL, '2023-10-02 18:09:12', '2023-10-02 18:09:12'),
(9, 'Women', NULL, NULL, '2023-10-02 18:09:19', '2023-10-02 18:10:02'),
(10, 'Children\'s', NULL, NULL, '2023-10-02 18:09:28', '2023-10-02 18:09:28'),
(11, 'Accessories', NULL, NULL, '2023-10-02 18:09:43', '2023-10-02 18:09:43');

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
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2023_09_13_105723_create_contacts', 1),
(36, '2023_09_13_134428_create_apikeys', 1),
(37, '2023_09_14_063023_create_admin_table', 1),
(38, '2023_09_26_085440_create_master_categories_table', 1),
(39, '2023_09_26_090843_create_categories_table', 1),
(40, '2023_09_26_091142_create_subcategories_table', 1),
(41, '2023_09_27_094344_create_brands_table', 2),
(42, '2023_09_27_095620_create_brands_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(9,2) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `address1` text DEFAULT NULL,
  `address2` text DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `cart_no` varchar(255) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `cvv` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `refund_id` varchar(255) DEFAULT NULL,
  `status` enum('ORDERED','DELIVERED','CANCELLED','ASSIGNED','PROCESSING','SEARCHING','REACHED','PICKEDUP','ARRIVED','COMPLETED') NOT NULL DEFAULT 'ORDERED' COMMENT 'ORDERED,RECEIVED,CANCELLED,ASSIGNED,PROCESSING,SEARCHING,REACHED,PICKEDUP,ARRIVED,COMPLETED',
  `read_status` enum('Read','Unread') NOT NULL DEFAULT 'Unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `shipping_address`, `country`, `state`, `zipcode`, `address1`, `address2`, `payment_type`, `cart_no`, `month`, `year`, `cvv`, `transaction_id`, `refund_id`, `status`, `read_status`, `created_at`, `updated_at`) VALUES
(1, 3, 1600.00, 'In Store Pick Up', '1', '6', '9898989', 'test', NULL, 'Credit Card', '98797898798', '2', '2024', NULL, '', NULL, 'ORDERED', 'Read', '2023-11-07 18:20:44', '2023-11-07 18:20:44'),
(2, 11, 1500.00, 'In Store Pick Up', '2', '2', '452001', 'sdfhgaf', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, '', NULL, 'ORDERED', 'Read', '2023-11-07 18:21:49', '2023-11-07 18:21:49'),
(3, 11, 8000.00, 'In Store Pick Up', '2', '2', '452001', 'bfbgfhrt', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, '', NULL, 'ORDERED', 'Read', '2023-11-07 18:25:52', '2023-11-07 18:25:52'),
(4, 11, 18000.00, 'In Store Pick Up', '2', '2', '452001', 'dsfdsfdsg', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, '', NULL, 'ORDERED', 'Read', '2023-11-07 18:50:27', '2023-11-20 10:14:28'),
(5, 11, 10000.00, 'In Store Pick Up', '2', '2', '452100', 'dfewfreg', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OA4dKL9dJ15axYR0rXz1nwM', NULL, 'ORDERED', 'Read', '2023-11-08 10:48:59', '2023-11-20 10:14:42'),
(6, 11, 1300.00, 'In Store Pick Up', '2', '2', '452100', 'gfgfh', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OA4kyL9dJ15axYR1Rr5DQyu', NULL, 'ORDERED', 'Read', '2023-11-08 10:56:53', '2023-11-20 10:15:03'),
(7, 3, 2500.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '2', '2024', NULL, 'ch_3OA4p6L9dJ15axYR1O4JclUB', NULL, 'ORDERED', 'Read', '2023-11-08 11:01:09', '2023-11-20 10:15:14'),
(8, 11, 7500.00, 'In Store Pick Up', '2', '2', '451221', 'ghfhff', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OA5KiL9dJ15axYR0385jJrn', NULL, 'ORDERED', 'Read', '2023-11-08 11:33:49', '2023-11-20 10:49:54'),
(9, 11, 19000.00, 'In Store Pick Up', '2', '2', '452100', 'nhr', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OA5p3L9dJ15axYR0fTjVJpw', NULL, 'ORDERED', 'Read', '2023-11-08 12:05:09', '2023-11-20 10:52:35'),
(10, 11, 40000.00, 'In Store Pick Up', '2', '2', '452100', 'gj', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OAC5xL9dJ15axYR1r3gTXpD', NULL, 'ORDERED', 'Read', '2023-11-08 18:47:02', '2023-11-20 19:04:07'),
(11, 11, 10000.00, 'In Store Pick Up', '2', '2', '452001', 'yui', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OAC7DL9dJ15axYR1GmBMRpO', NULL, 'ORDERED', 'Unread', '2023-11-08 18:48:19', '2023-11-08 18:48:19'),
(12, 3, 5400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '2', '2024', NULL, 'ch_3OACXbL9dJ15axYR1ajKJPwR', NULL, 'DELIVERED', 'Unread', '2023-11-08 19:15:36', '2023-11-09 10:19:10'),
(13, 11, 1200.00, 'In Store Pick Up', '2', '2', '452001', 'dfdfrgfg', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OAQeSL9dJ15axYR1A5DKpk5', NULL, 'DELIVERED', 'Unread', '2023-11-09 10:19:36', '2023-11-09 10:21:51'),
(14, 11, 1400.00, 'In Store Pick Up', '2', '2', '452001', 'vlfvgjfkhk n', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OARdrL9dJ15axYR1CTXf8IE', NULL, 'ORDERED', 'Unread', '2023-11-09 11:23:04', '2023-11-09 11:23:04'),
(15, 11, 51908.00, 'In Store Pick Up', '2', '2', '00101', 'bjkhkj', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OAVigL9dJ15axYR1eaGhfz9', NULL, 'ORDERED', 'Unread', '2023-11-09 15:44:19', '2023-11-09 15:44:19'),
(20, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OB8nkL9dJ15axYR1Pou6AMS', NULL, 'DELIVERED', 'Unread', '2023-11-11 09:28:09', '2023-11-14 09:53:01'),
(21, 3, 150.00, 'In Store Pick Up', '1', '1', '9898989', 'rajpura khargone', NULL, 'Credit Card', '98797898798', '3', '2024', NULL, 'ch_3OB8vBL9dJ15axYR1UwYOLkM', NULL, 'ORDERED', 'Read', '2023-11-11 09:35:49', '2023-11-20 19:12:19'),
(22, 3, 3410.00, 'In Store Pick Up', '1', '1', '9898989', 'rajpura khargone mp', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OB9HOL9dJ15axYR0Om2JrZg', NULL, 'ORDERED', 'Unread', '2023-11-11 09:58:47', '2023-11-11 09:58:47'),
(23, 3, 3000.00, 'In Store Pick Up', '1', '1', '9898989', 'indore', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OBBMcL9dJ15axYR1iv9Qcyd', NULL, 'ORDERED', 'Unread', '2023-11-11 12:12:19', '2023-11-11 12:12:19'),
(24, 3, 1200.00, 'In Store Pick Up', '1', '1', '9898989', 'Rajpura Dist khargone', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OBBRcL9dJ15axYR1QYw3gns', NULL, 'ORDERED', 'Unread', '2023-11-11 12:17:29', '2023-11-11 12:17:29'),
(25, 3, 1000.00, 'In Store Pick Up', '1', '1', '9898989', 'indore', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OBBXxL9dJ15axYR1vhuPD8Z', NULL, 'ORDERED', 'Unread', '2023-11-11 12:24:01', '2023-11-11 12:24:01'),
(26, 3, 900.00, 'In Store Pick Up', '1', '1', '9898989', 'Rajpura Khargone', NULL, 'Credit Card', '98797898798', '7', '2024', NULL, 'ch_3OBBZtL9dJ15axYR0HWaaoRY', NULL, 'ORDERED', 'Unread', '2023-11-11 12:26:02', '2023-11-11 12:26:02'),
(27, 3, 800.00, 'In Store Pick Up', '1', '1', '9898989', 'Rajpura Khargone', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OBBbAL9dJ15axYR16fq8qsz', NULL, 'ORDERED', 'Unread', '2023-11-11 12:27:20', '2023-11-11 12:27:20'),
(28, 3, 850.00, 'In Store Pick Up', '1', '1', '9898989', 'Rajpura Khargone', NULL, 'Credit Card', '98797898798', '2', '2024', NULL, 'ch_3OBBepL9dJ15axYR118YvJRV', NULL, 'ORDERED', 'Read', '2023-11-11 12:31:08', '2023-11-28 16:37:57'),
(29, 3, 500.00, 'In Store Pick Up', '2', '2', '9898989', 'Rajpura Khargone', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OBBk5L9dJ15axYR0kzc0aUw', NULL, 'DELIVERED', 'Unread', '2023-10-20 11:36:34', '2023-10-21 11:36:34'),
(30, 3, 3000.00, 'In Store Pick Up', '1', '1', '123456', 'Rajpura', NULL, 'Credit Card', '4242424242424242', '2', '2024', NULL, 'ch_3OBJ3UL9dJ15axYR1BBZSux5', NULL, 'ORDERED', 'Unread', '2023-11-11 20:25:05', '2023-11-11 20:25:05'),
(31, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCEaZL9dJ15axYR1W6N04XY', NULL, 'ORDERED', 'Unread', '2023-11-14 09:51:03', '2023-11-14 09:51:03'),
(32, 3, 450.00, 'In Store Pick Up', '1', '5', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCEcLL9dJ15axYR0RA099PW', NULL, 'ORDERED', 'Unread', '2023-11-14 09:52:54', '2023-11-14 09:52:54'),
(33, 3, 1000.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCIyYL9dJ15axYR0SL99C1s', NULL, 'ORDERED', 'Unread', '2023-11-14 14:32:06', '2023-11-14 14:32:06'),
(34, 3, 150.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCMPdL9dJ15axYR1huLLE28', NULL, 'ORDERED', 'Unread', '2023-11-14 18:12:17', '2023-11-14 18:12:17'),
(40, 3, 1000.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCb3rL9dJ15axYR1W6YSdCA', NULL, 'ORDERED', 'Unread', '2023-11-15 09:50:48', '2023-11-15 09:50:48'),
(42, 3, 600.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCbIdL9dJ15axYR1P1kdFBC', NULL, 'ORDERED', 'Unread', '2023-11-15 10:06:03', '2023-11-15 10:06:03'),
(44, 3, 50.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-15 10:10:14', '2023-11-15 10:30:45'),
(46, 3, 50.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-15 10:34:48', '2023-11-15 10:36:16'),
(47, 3, 500.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCbnHL9dJ15axYR1kudSoZm', NULL, 'ORDERED', 'Unread', '2023-11-15 10:37:44', '2023-11-15 10:37:44'),
(48, 3, 50.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '2', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-15 10:40:44', '2023-11-15 10:49:06'),
(49, 3, 500.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCc0XL9dJ15axYR08EbJLkg', NULL, 'ORDERED', 'Unread', '2023-11-15 10:51:26', '2023-11-15 10:51:26'),
(50, 3, 50.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-15 10:52:14', '2023-11-15 10:53:45'),
(51, 3, 100.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-15 14:50:04', '2023-11-15 14:50:04'),
(52, 3, 100.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCflXL9dJ15axYR0UiSjRum', NULL, 'ORDERED', 'Unread', '2023-11-15 14:52:12', '2023-11-15 14:52:12'),
(53, 3, 100.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-15 14:53:56', '2023-11-15 15:05:30'),
(54, 3, 100.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '2', '2024', NULL, 'MFCMELGK7RY88', NULL, 'DELIVERED', 'Unread', '2023-11-15 15:07:54', '2023-11-15 15:38:20'),
(55, 11, 1000.00, 'In Store Pick Up', '2', '2', '4521111', 'm.kjbnkj', NULL, 'PayPal', '424242424242424244', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Read', '2023-11-15 15:32:49', '2023-11-20 11:37:25'),
(56, 11, 2635.00, 'In Store Pick Up', '1', '16', '00101', 'bvbb', NULL, 'Credit Card', '424242424242424244', '1', '2024', NULL, 'ch_3OCgkFL9dJ15axYR0lXngheb', NULL, 'DELIVERED', 'Unread', '2023-11-15 15:54:56', '2023-11-15 15:56:19'),
(57, 11, 500.00, 'In Store Pick Up', '2', '2', '00101', 'gyuoiguhukg', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OCigPL9dJ15axYR1rPkPnEX', NULL, 'ORDERED', 'Read', '2023-11-15 17:59:06', '2023-11-20 11:43:10'),
(58, 11, 500.00, 'In Store Pick Up', '2', '2', '00101', 'gyuoiguhukg', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OCigrL9dJ15axYR1tVUcqGh', NULL, 'ORDERED', 'Read', '2023-11-15 17:59:33', '2023-11-20 10:48:36'),
(59, 3, 3994.15, 'In Store Pick Up', '1', '5', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OCxVbL9dJ15axYR02Es3wMx', NULL, 'ORDERED', 'Read', '2023-11-16 09:48:56', '2023-11-20 10:48:02'),
(60, 11, 9000.00, 'In Store Pick Up', '2', '2', '452100', 'tyrtyu', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OCzheL9dJ15axYR05SlaOYH', NULL, 'DELIVERED', 'Unread', '2023-11-16 12:09:30', '2023-11-16 12:11:54'),
(61, 3, 1500.00, 'In Store Pick Up', '1', '5', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OD22rL9dJ15axYR0p2opvph', NULL, 'ORDERED', 'Read', '2023-11-16 14:39:34', '2023-11-20 10:14:16'),
(62, 3, 810.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OD244L9dJ15axYR08G2Y547', NULL, 'ORDERED', 'Read', '2023-11-16 14:40:49', '2023-11-20 10:14:06'),
(63, 3, 1800.00, 'In Store Pick Up', '1', '1', '9898989', 'tet', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OD2CAL9dJ15axYR04gfQM1N', NULL, 'ORDERED', 'Read', '2023-11-16 14:49:11', '2023-11-20 10:10:19'),
(64, 3, 2700.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OD2FvL9dJ15axYR1QyqcmQN', NULL, 'ORDERED', 'Read', '2023-11-16 14:53:04', '2023-11-16 18:09:31'),
(65, 3, 2250.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OD2b6L9dJ15axYR1gppFLVy', NULL, 'ORDERED', 'Read', '2023-11-16 15:14:57', '2023-11-16 18:04:16'),
(66, 11, 3750.00, 'In Store Pick Up', '2', '2', '451221', 'qwewreew', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OD3OSL9dJ15axYR1xEV0fef', NULL, 'ORDERED', 'Read', '2023-11-16 16:05:56', '2023-11-16 18:03:30'),
(67, 11, 1200.00, 'In Store Pick Up', '1', '1', '452001', 'hjghjgyj', NULL, 'PayPal', '424242424242424244', '2', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-20 12:47:21', '2023-11-20 12:47:21'),
(68, 11, 0.00, 'In Store Pick Up', '1', '1', '452001', 'hjghjgyj', NULL, 'PayPal', '424242424242424244', '2', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-20 12:48:24', '2023-11-20 12:48:24'),
(69, 11, 0.00, 'In Store Pick Up', '1', '1', '452001', 'iuyiyu', NULL, 'PayPal', '424242424242424244', '2', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-20 12:48:57', '2023-11-20 12:48:57'),
(70, 11, 300.00, 'In Store Pick Up', '1', '1', '452001', 'dfjgnbhb', NULL, 'PayPal', '424242424242424244', '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Read', '2023-11-20 12:50:45', '2023-11-20 14:48:16'),
(71, 3, 450.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', 'test', '1', '2024', NULL, 'ch_3OEV0UL9dJ15axYR1wL7M2j7', NULL, 'ORDERED', 'Unread', '2023-11-20 15:47:11', '2023-11-20 15:47:11'),
(72, 11, 2250.00, 'In Store Pick Up', '1', '22', '452013', 'lkkl;l,,k', NULL, 'Credit Card', '4562310789620125', '1', '2024', NULL, 'ch_3OEV1NL9dJ15axYR16xararo', NULL, 'DELIVERED', 'Read', '2023-11-20 15:48:06', '2023-11-20 16:05:01'),
(73, 11, 974.25, 'In Store Pick Up', '1', '21', '451221', 'fghghf', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-20 16:40:15', '2023-11-20 16:43:24'),
(75, 11, 750.00, 'In Store Pick Up', '1', '21', '785201', 'dssaawsws', NULL, 'Credit Card', '4562310789620125', '1', '2024', NULL, 'ch_3OEVvRL9dJ15axYR0aCMJZGZ', NULL, 'ORDERED', 'Unread', '2023-11-20 16:46:02', '2023-11-20 16:46:02'),
(76, 11, 2100.00, 'In Store Pick Up', '1', '19', '5546', 'fhfhhhh', NULL, 'Credit Card', '4562310789620125', '1', '2024', NULL, 'ch_3OEW3xL9dJ15axYR1lPhkAd8', NULL, 'ORDERED', 'Read', '2023-11-20 16:54:50', '2023-11-21 10:24:18'),
(77, 3, 900.00, 'In Store Pick Up', '1', '5', NULL, 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OEWEJL9dJ15axYR1xHJOgZw', NULL, 'ORDERED', 'Read', '2023-11-20 17:05:32', '2023-11-20 19:03:53'),
(78, 11, 712.50, 'In Store Pick Up', '1', '22', NULL, 'adadda', NULL, 'Credit Card', '4562310789620125', '1', '2024', NULL, 'ch_3OEWF3L9dJ15axYR00lcj6pl', NULL, 'DELIVERED', 'Read', '2023-11-20 17:06:17', '2023-11-20 17:59:35'),
(79, 11, 3749.25, 'In Store Pick Up', '1', '9', '125030', 'gfhgfhgftyhjghjhj', NULL, 'Credit Card', '4562310789620125', '1', '2024', NULL, 'ch_3OEmFIL9dJ15axYR0n1mMJcc', NULL, 'ORDERED', 'Read', '2023-11-21 10:11:36', '2023-11-21 10:23:30'),
(80, 3, 1800.00, 'In Store Pick Up', '1', '5', '9898989', 'test', NULL, 'Credit Card', '98797898798', '2', '2024', NULL, 'ch_3OEmUFL9dJ15axYR1lmz46XW', NULL, 'ORDERED', 'Unread', '2023-11-21 10:27:04', '2023-11-21 10:27:04'),
(81, 3, 1440.00, 'In Store Pick Up', '1', '1', NULL, 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 10:29:07', '2023-11-21 10:29:07'),
(82, 3, 360.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 10:35:51', '2023-11-21 10:35:51'),
(83, 3, 360.00, 'In Store Pick Up', '1', '5', '9898989', 'tets', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-21 10:41:11', '2023-11-21 11:38:59'),
(84, 3, 720.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OEmiSL9dJ15axYR1V8W2Q25', NULL, 'ORDERED', 'Unread', '2023-11-21 10:41:45', '2023-11-21 10:41:45'),
(85, 3, 720.00, 'In Store Pick Up', '1', '1', NULL, 'test', NULL, 'PayPal', '98797898798', '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 10:43:13', '2023-11-21 10:43:13'),
(86, 3, 1440.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:01:29', '2023-11-21 11:01:29'),
(87, 3, 320.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:18:10', '2023-11-21 11:18:10'),
(88, 11, 7800.00, 'In Store Pick Up', '1', '16', '451221', 'fvfg', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:19:40', '2023-11-21 11:19:40'),
(89, 11, 2240.00, 'In Store Pick Up', '1', '1', '452001', 'gfhtfh', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:24:33', '2023-11-21 11:24:33'),
(90, 3, 320.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:27:47', '2023-11-21 11:27:47'),
(91, 3, 320.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:30:27', '2023-11-21 11:30:27'),
(92, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:38:37', '2023-11-21 11:38:37'),
(93, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OEnoRL9dJ15axYR13MxcdtJ', NULL, 'ORDERED', 'Unread', '2023-11-21 11:51:59', '2023-11-21 11:51:59'),
(95, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'fsaf', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 11:59:06', '2023-11-21 11:59:06'),
(96, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'fdsdf', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 12:03:09', '2023-11-21 12:03:09'),
(97, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'fdsdf', NULL, 'PayPal', '98797898798', '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 12:03:54', '2023-11-21 12:03:54'),
(98, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'gfdsfd', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 12:04:20', '2023-11-21 12:04:20'),
(99, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, NULL, NULL, 'ORDERED', 'Unread', '2023-11-21 12:04:40', '2023-11-21 12:04:40'),
(100, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'fdsafd', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-21 12:10:45', '2023-11-21 12:13:18'),
(101, 11, 2800.00, 'In Store Pick Up', '1', '19', '00101', 'jh', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-21 12:14:06', '2023-11-21 12:14:46'),
(102, 11, 320.00, 'In Store Pick Up', '1', '15', '00101', 'hgjg', NULL, 'Debit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OEoBUL9dJ15axYR056SVEKO', NULL, 'ORDERED', 'Unread', '2023-11-21 12:15:48', '2023-11-21 12:15:48'),
(103, 11, 400.00, 'In Store Pick Up', '1', '19', '00101', 'ghjhj', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OEoCcL9dJ15axYR0Emzu8OJ', NULL, 'ORDERED', 'Unread', '2023-11-21 12:16:59', '2023-11-21 12:16:59'),
(104, 11, 3000.00, 'In Store Pick Up', '1', '21', '00101', 'hjkhj', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-21 12:17:54', '2023-11-21 12:18:11'),
(105, 3, 320.00, 'In Store Pick Up', '1', '1', NULL, 'fdsafd', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OEoQ6L9dJ15axYR0zEcdkD5', NULL, 'ORDERED', 'Unread', '2023-11-21 12:30:55', '2023-11-21 12:30:55'),
(106, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'fdsa', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-21 12:31:59', '2023-11-21 12:32:22'),
(108, 3, 400.00, 'In Store Pick Up', '1', '1', NULL, 'tet', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Read', '2023-11-21 12:37:31', '2023-11-23 16:26:23'),
(109, 3, 400.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OEoY3L9dJ15axYR1nehAghp', NULL, 'ORDERED', 'Read', '2023-11-21 12:39:07', '2023-11-21 12:39:57'),
(110, 3, 500.00, 'In Store Pick Up', '1', '1', '9898989', 'gfds', NULL, 'Credit Card', NULL, '1', '2024', NULL, 'ch_3OEonpL9dJ15axYR0OkUD36f', 're_3OEonpL9dJ15axYR0HUlC9va', 'CANCELLED', 'Read', '2023-11-21 12:55:26', '2023-11-28 16:18:59'),
(111, 3, 450.00, 'In Store Pick Up', '1', '1', '9898989', 'fds', NULL, 'Credit Card', NULL, '1', '2024', NULL, 'ch_3OEp9WL9dJ15axYR0VBqQj8s', 're_3OEp9WL9dJ15axYR0NJyKNH4', 'CANCELLED', 'Read', '2023-11-21 13:17:51', '2023-11-28 16:05:53'),
(112, 3, 450.00, 'In Store Pick Up', '1', '1', '9898989', 'test', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Unread', '2023-11-21 14:03:16', '2023-11-21 14:05:19'),
(113, 3, 2000.00, 'In Store Pick Up', '1', '1', '9898989', '423342', NULL, 'Credit Card', '98797898798', '1', '2024', NULL, 'ch_3OErPhL9dJ15axYR1sBxLedj', NULL, 'CANCELLED', 'Read', '2023-11-21 15:42:42', '2023-11-28 16:05:12'),
(116, 26, 3000.00, 'In Store Pick Up', '1', '22', '451221', 'maine street', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'ORDERED', 'Read', '2023-11-23 12:42:58', '2023-11-23 14:54:09'),
(117, 26, 1299.00, 'In Store Pick Up', '1', '19', '4521111', 'gregregrg', NULL, 'Credit Card', '42424242424242424', '1', '2026', NULL, 'ch_3OFZGAL9dJ15axYR0Lx7f1R9', NULL, 'ORDERED', 'Unread', '2023-11-23 14:31:47', '2023-11-23 14:31:47'),
(119, 11, 1399.00, 'In Store Pick Up', '1', '21', '452100', 'hgfht', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OFrrQL9dJ15axYR13xBKgTG', NULL, 'ORDERED', 'Read', '2023-11-24 10:23:29', '2023-11-28 18:46:03'),
(120, 11, 9862.00, 'In Store Pick Up', '1', '21', '452013', 'cgbf', NULL, 'Credit Card', '4562310789620125', '1', '2024', NULL, 'ch_3OFxy7L9dJ15axYR1vXlWisp', 're_3OFxy7L9dJ15axYR1BC0jg6K', 'CANCELLED', 'Read', '2023-11-24 16:54:47', '2023-11-28 16:52:21'),
(121, 11, 400.00, 'In Store Pick Up', '1', '19', '452001', 'fgtrtrh', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OGxggL9dJ15axYR1PZMzxZs', NULL, 'ORDERED', 'Read', '2023-11-27 10:48:55', '2023-11-28 16:16:41'),
(122, 11, 1200.00, 'In Store Pick Up', '1', '22', '452100', 'fghffyhn', NULL, 'PayPal', NULL, '1', '2024', NULL, 'MFCMELGK7RY88', NULL, 'CANCELLED', 'Read', '2023-11-27 12:01:12', '2023-11-28 12:35:06'),
(123, 10, 3500.00, 'In Store Pick Up', '1', '20', '452100', 'hjgg', NULL, 'Credit Card', '42424242424242424', '1', '2024', NULL, 'ch_3OHPa3L9dJ15axYR1GosaNTG', 're_3OHPa3L9dJ15axYR16hAu0Ee', 'CANCELLED', 'Read', '2023-11-28 16:35:56', '2023-11-28 16:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `variation_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `variation_price` decimal(9,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `variation_id`, `quantity`, `variation_price`, `created_at`, `updated_at`) VALUES
(11, 1, 50, 4, 1, 1500.00, '2023-11-07 18:20:44', '2023-11-07 18:20:44'),
(12, 1, 50, 44, 1, 100.00, '2023-11-07 18:20:44', '2023-11-07 18:20:44'),
(13, 2, 71, 54, 1, 600.00, '2023-11-07 18:21:49', '2023-11-07 18:21:49'),
(14, 2, 51, 6, 1, 900.00, '2023-11-07 18:21:49', '2023-11-07 18:21:49'),
(15, 3, 73, 58, 20, 400.00, '2023-11-07 18:25:52', '2023-11-07 18:25:52'),
(16, 4, 61, 31, 6, 3000.00, '2023-11-07 18:50:27', '2023-11-07 18:50:27'),
(17, 5, 61, 31, 1, 3000.00, '2023-11-08 10:48:59', '2023-11-08 10:48:59'),
(18, 5, 62, 32, 2, 3500.00, '2023-11-08 10:48:59', '2023-11-08 10:48:59'),
(19, 6, 73, 58, 2, 400.00, '2023-11-08 10:56:53', '2023-11-08 10:56:53'),
(20, 6, 74, 60, 1, 500.00, '2023-11-08 10:56:53', '2023-11-08 10:56:53'),
(21, 7, 49, 2, 2, 1000.00, '2023-11-08 11:01:09', '2023-11-08 11:01:09'),
(22, 7, 49, 42, 1, 500.00, '2023-11-08 11:01:09', '2023-11-08 11:01:09'),
(23, 8, 68, 45, 3, 2500.00, '2023-11-08 11:33:49', '2023-11-08 11:33:49'),
(24, 9, 57, 21, 2, 2500.00, '2023-11-08 12:05:09', '2023-11-08 12:05:09'),
(25, 9, 58, 24, 5, 2800.00, '2023-11-08 12:05:09', '2023-11-08 12:05:09'),
(26, 10, 65, 0, 5, 5000.00, '2023-11-08 18:47:02', '2023-11-08 18:47:02'),
(27, 10, 77, 0, 5, 3000.00, '2023-11-08 18:47:02', '2023-11-08 18:47:02'),
(28, 11, 77, 0, 3, 3000.00, '2023-11-08 18:48:19', '2023-11-08 18:48:19'),
(29, 11, 79, 71, 2, 500.00, '2023-11-08 18:48:19', '2023-11-08 18:48:19'),
(30, 12, 65, 0, 1, 5000.00, '2023-11-08 19:15:36', '2023-11-08 19:15:36'),
(31, 12, 78, 66, 1, 400.00, '2023-11-08 19:15:36', '2023-11-08 19:15:36'),
(32, 13, 78, 66, 3, 400.00, '2023-11-09 10:19:36', '2023-11-09 10:19:36'),
(33, 14, 78, 66, 1, 400.00, '2023-11-09 11:23:04', '2023-11-09 11:23:04'),
(36, 15, 83, 0, 2, 1299.00, '2023-11-09 15:44:19', '2023-11-09 15:44:19'),
(44, 20, 78, 66, 1, 400.00, '2023-11-11 09:28:09', '2023-11-11 09:28:09'),
(45, 21, 76, 63, 1, 150.00, '2023-11-11 09:35:49', '2023-11-11 09:35:49'),
(46, 22, 78, 66, 1, 400.00, '2023-11-11 09:58:47', '2023-11-11 09:58:47'),
(47, 22, 78, 78, 1, 10.00, '2023-11-11 09:58:47', '2023-11-11 09:58:47'),
(48, 22, 61, 31, 1, 3000.00, '2023-11-11 09:58:47', '2023-11-11 09:58:47'),
(49, 23, 61, 31, 1, 3000.00, '2023-11-11 12:12:19', '2023-11-11 12:12:19'),
(50, 24, 52, 9, 1, 1200.00, '2023-11-11 12:17:29', '2023-11-11 12:17:29'),
(51, 25, 49, 2, 1, 1000.00, '2023-11-11 12:24:01', '2023-11-11 12:24:01'),
(52, 26, 75, 61, 2, 450.00, '2023-11-11 12:26:02', '2023-11-11 12:26:02'),
(53, 27, 53, 12, 1, 800.00, '2023-11-11 12:27:20', '2023-11-11 12:27:20'),
(54, 28, 72, 80, 1, 850.00, '2023-11-11 12:31:08', '2023-11-11 12:31:08'),
(55, 29, 80, 77, 1, 500.00, '2023-11-11 12:36:34', '2023-11-11 12:36:34'),
(56, 30, 53, 13, 1, 800.00, '2023-11-11 20:25:05', '2023-11-11 20:25:05'),
(57, 30, 59, 25, 1, 1000.00, '2023-11-11 20:25:05', '2023-11-11 20:25:05'),
(58, 30, 60, 30, 1, 1200.00, '2023-11-11 20:25:05', '2023-11-11 20:25:05'),
(59, 31, 78, 66, 1, 400.00, '2023-11-14 09:51:03', '2023-11-14 09:51:03'),
(60, 32, 50, 4, 1, 1500.00, '2023-11-14 09:52:54', '2023-11-14 09:52:54'),
(61, 33, 49, 2, 1, 1000.00, '2023-11-14 14:32:06', '2023-11-14 14:32:06'),
(62, 34, 54, 15, 1, 500.00, '2023-11-14 18:12:17', '2023-11-14 18:12:17'),
(68, 40, 49, 2, 1, 1000.00, '2023-11-15 09:50:48', '2023-11-15 09:50:48'),
(70, 42, 71, 54, 1, 600.00, '2023-11-15 10:06:03', '2023-11-15 10:06:03'),
(72, 44, 79, 71, 1, 500.00, '2023-11-15 10:10:14', '2023-11-15 10:10:14'),
(74, 46, 70, 49, 1, 500.00, '2023-11-15 10:34:48', '2023-11-15 10:34:48'),
(75, 47, 70, 49, 1, 500.00, '2023-11-15 10:37:44', '2023-11-15 10:37:44'),
(76, 48, 70, 49, 1, 500.00, '2023-11-15 10:40:44', '2023-11-15 10:40:44'),
(77, 49, 70, 49, 1, 500.00, '2023-11-15 10:51:26', '2023-11-15 10:51:26'),
(78, 50, 70, 49, 1, 500.00, '2023-11-15 10:52:14', '2023-11-15 10:52:14'),
(79, 51, 49, 2, 1, 1000.00, '2023-11-15 14:50:04', '2023-11-15 14:50:04'),
(80, 52, 49, 2, 1, 1000.00, '2023-11-15 14:52:12', '2023-11-15 14:52:12'),
(81, 53, 49, 2, 1, 1000.00, '2023-11-15 14:53:56', '2023-11-15 14:53:56'),
(82, 54, 49, 2, 1, 1000.00, '2023-11-15 15:07:54', '2023-11-15 15:07:54'),
(83, 55, 49, 2, 1, 1000.00, '2023-11-15 15:32:49', '2023-11-15 15:32:49'),
(84, 56, 51, 7, 2, 950.00, '2023-11-15 15:54:56', '2023-11-15 15:54:56'),
(85, 56, 52, 9, 1, 1200.00, '2023-11-15 15:54:56', '2023-11-15 15:54:56'),
(86, 57, 70, 53, 1, 500.00, '2023-11-15 17:59:06', '2023-11-15 17:59:06'),
(87, 58, 70, 53, 1, 500.00, '2023-11-15 17:59:33', '2023-11-15 17:59:33'),
(88, 59, 49, 2, 1, 1000.00, '2023-11-16 09:48:56', '2023-11-16 09:48:56'),
(89, 59, 50, 5, 1, 1600.00, '2023-11-16 09:48:56', '2023-11-16 09:48:56'),
(90, 59, 82, 0, 1, 2099.00, '2023-11-16 09:48:56', '2023-11-16 09:48:56'),
(91, 60, 65, 0, 2, 5000.00, '2023-11-16 12:09:30', '2023-11-16 12:09:30'),
(92, 61, 54, 15, 1, 500.00, '2023-11-16 14:39:34', '2023-11-16 14:39:34'),
(93, 61, 59, 25, 1, 1000.00, '2023-11-16 14:39:34', '2023-11-16 14:39:34'),
(94, 62, 51, 6, 1, 900.00, '2023-11-16 14:40:49', '2023-11-16 14:40:49'),
(95, 63, 55, 17, 1, 1800.00, '2023-11-16 14:49:11', '2023-11-16 14:49:11'),
(96, 64, 77, 0, 1, 3000.00, '2023-11-16 14:53:04', '2023-11-16 14:53:04'),
(97, 65, 57, 21, 1, 2500.00, '2023-11-16 15:14:57', '2023-11-16 15:14:57'),
(98, 66, 65, 0, 1, 5000.00, '2023-11-16 16:05:56', '2023-11-16 16:05:56'),
(99, 67, 53, 14, 1, 800.00, '2023-11-20 12:47:21', '2023-11-20 12:47:21'),
(100, 67, 72, 55, 1, 800.00, '2023-11-20 12:47:21', '2023-11-20 12:47:21'),
(101, 70, 78, 66, 1, 400.00, '2023-11-20 12:50:45', '2023-11-20 12:50:45'),
(102, 71, 54, 15, 1, 500.00, '2023-11-20 15:47:11', '2023-11-20 15:47:11'),
(103, 72, 77, 0, 1, 3000.00, '2023-11-20 15:48:06', '2023-11-20 15:48:06'),
(104, 73, 83, 0, 1, 1299.00, '2023-11-20 16:40:15', '2023-11-20 16:40:15'),
(106, 75, 59, 25, 1, 1000.00, '2023-11-20 16:46:02', '2023-11-20 16:46:02'),
(107, 76, 58, 24, 1, 2800.00, '2023-11-20 16:54:50', '2023-11-20 16:54:50'),
(108, 77, 49, 2, 1, 1000.00, '2023-11-20 17:05:32', '2023-11-20 17:05:32'),
(109, 78, 51, 7, 1, 950.00, '2023-11-20 17:06:17', '2023-11-20 17:06:17'),
(110, 79, 55, 17, 2, 1800.00, '2023-11-21 10:11:36', '2023-11-21 10:11:36'),
(111, 79, 81, 0, 1, 1399.00, '2023-11-21 10:11:36', '2023-11-21 10:11:36'),
(112, 80, 56, 20, 1, 2000.00, '2023-11-21 10:27:04', '2023-11-21 10:27:04'),
(113, 81, 50, 5, 1, 1600.00, '2023-11-21 10:29:07', '2023-11-21 10:29:07'),
(114, 82, 78, 68, 1, 400.00, '2023-11-21 10:35:51', '2023-11-21 10:35:51'),
(115, 83, 78, 67, 1, 400.00, '2023-11-21 10:41:11', '2023-11-21 10:41:11'),
(116, 84, 53, 12, 1, 800.00, '2023-11-21 10:41:45', '2023-11-21 10:41:45'),
(117, 85, 53, 12, 1, 800.00, '2023-11-21 10:43:13', '2023-11-21 10:43:13'),
(118, 86, 50, 5, 1, 1600.00, '2023-11-21 11:01:29', '2023-11-21 11:01:29'),
(119, 87, 78, 68, 1, 400.00, '2023-11-21 11:18:10', '2023-11-21 11:18:10'),
(120, 88, 58, 24, 1, 2800.00, '2023-11-21 11:19:40', '2023-11-21 11:19:40'),
(121, 88, 65, 0, 1, 5000.00, '2023-11-21 11:19:40', '2023-11-21 11:19:40'),
(122, 89, 58, 24, 1, 2800.00, '2023-11-21 11:24:33', '2023-11-21 11:24:33'),
(123, 90, 78, 68, 1, 400.00, '2023-11-21 11:27:47', '2023-11-21 11:27:47'),
(124, 91, 78, 68, 1, 400.00, '2023-11-21 11:30:27', '2023-11-21 11:30:27'),
(125, 92, 78, 68, 1, 400.00, '2023-11-21 11:38:37', '2023-11-21 11:38:37'),
(126, 93, 78, 69, 1, 400.00, '2023-11-21 11:51:59', '2023-11-21 11:51:59'),
(128, 95, 78, 69, 1, 400.00, '2023-11-21 11:59:06', '2023-11-21 11:59:06'),
(129, 99, 78, 69, 1, 400.00, '2023-11-21 12:04:40', '2023-11-21 12:04:40'),
(130, 100, 78, 69, 1, 400.00, '2023-11-21 12:10:45', '2023-11-21 12:10:45'),
(131, 101, 58, 24, 1, 2800.00, '2023-11-21 12:14:06', '2023-11-21 12:14:06'),
(132, 102, 73, 58, 1, 400.00, '2023-11-21 12:15:48', '2023-11-21 12:15:48'),
(133, 103, 74, 60, 1, 500.00, '2023-11-21 12:16:59', '2023-11-21 12:16:59'),
(134, 104, 77, 0, 1, 3000.00, '2023-11-21 12:17:54', '2023-11-21 12:17:54'),
(135, 105, 78, 69, 1, 400.00, '2023-11-21 12:30:55', '2023-11-21 12:30:55'),
(136, 106, 78, 69, 1, 400.00, '2023-11-21 12:31:59', '2023-11-21 12:31:59'),
(138, 108, 78, 69, 1, 400.00, '2023-11-21 12:37:31', '2023-11-21 12:37:31'),
(139, 109, 78, 69, 1, 400.00, '2023-11-21 12:39:07', '2023-11-21 12:39:07'),
(140, 110, 79, 71, 1, 400.00, '2023-11-21 12:55:26', '2023-11-21 12:55:26'),
(141, 111, 79, 72, 1, 450.00, '2023-11-21 13:17:51', '2023-11-21 13:17:51'),
(142, 112, 80, 74, 1, 450.00, '2023-11-21 14:03:16', '2023-11-21 14:03:16'),
(143, 113, 56, 20, 1, 2000.00, '2023-11-21 15:42:42', '2023-11-21 15:42:42'),
(146, 116, 89, 0, 1, 3000.00, '2023-11-23 12:42:58', '2023-11-23 12:42:58'),
(147, 117, 83, 0, 1, 1299.00, '2023-11-23 14:31:47', '2023-11-23 14:31:47'),
(149, 119, 81, 0, 1, 1399.00, '2023-11-24 10:23:29', '2023-11-24 10:23:29'),
(150, 120, 84, 0, 1, 9862.00, '2023-11-24 16:54:47', '2023-11-24 16:54:47'),
(151, 121, 78, 68, 1, 400.00, '2023-11-27 10:48:55', '2023-11-27 10:48:55'),
(152, 122, 60, 30, 1, 1200.00, '2023-11-27 12:01:12', '2023-11-27 12:01:12'),
(153, 123, 62, 32, 1, 3500.00, '2023-11-28 16:35:56', '2023-11-28 16:35:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_ratings`
--

CREATE TABLE `order_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `variation_id` int(11) DEFAULT 0,
  `user_rating` varchar(255) DEFAULT NULL,
  `user_comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_ratings`
--

INSERT INTO `order_ratings` (`id`, `user_id`, `order_id`, `product_id`, `variation_id`, `user_rating`, `user_comment`, `created_at`, `updated_at`) VALUES
(19, 3, 115, 80, 74, '3.5', 'best', '2023-11-23 11:55:56', '2023-11-23 11:55:56'),
(20, 3, 113, 56, 20, '3.5', 'Good product', '2023-11-23 12:17:00', '2023-11-23 12:17:00'),
(21, 3, 110, 79, 71, '4.5', 'Best Quality', '2023-11-23 12:17:55', '2023-11-23 12:17:55'),
(22, 3, 94, 78, 69, '4.5', 'Best', '2023-11-23 12:18:33', '2023-11-23 12:18:33'),
(23, 3, 52, 49, 2, '3', 'Average Product', '2023-11-23 12:19:28', '2023-11-23 12:19:28'),
(24, 3, 47, 70, 49, '1.5', 'Average', '2023-11-23 12:20:15', '2023-11-23 12:20:15'),
(25, 11, 122, 60, 30, '4', 'good quality', '2023-11-27 12:02:14', '2023-11-27 12:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `email`, `phone`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'karan@gmail.com', '9669203080', '2243', 'Active', '2023-11-09 11:53:40', '2023-11-09 13:57:14'),
(2, 'karan@gmail.com', '9669203080', '6687', 'Active', '2023-11-09 13:42:27', '2023-11-09 13:42:27'),
(3, 'karan@gmail.com', '9669203080', '6508', 'Active', '2023-11-09 13:45:47', '2023-11-09 13:45:47'),
(4, 'sunil.cloudwapp@gmail.com', '9669203050', '1194', 'Active', '2023-11-09 14:03:29', '2023-11-09 15:57:28'),
(5, 'sunil@mailinator.com', '9669203050', '6695', 'Active', '2023-11-09 15:46:56', '2023-11-09 15:50:49');

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
  `master_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `current_price` decimal(9,2) DEFAULT NULL,
  `previous_price` decimal(9,2) DEFAULT NULL,
  `in_stock` int(11) DEFAULT 0,
  `tax` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specification_name` text DEFAULT NULL,
  `specification_description` text DEFAULT NULL,
  `attribute_id` text DEFAULT NULL,
  `attribute_price` text DEFAULT NULL,
  `color_id` text DEFAULT NULL,
  `color_images` text DEFAULT NULL,
  `image` varchar(550) DEFAULT NULL,
  `images` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `user_avg_rating` varchar(255) NOT NULL DEFAULT '0',
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `master_category_id`, `category_id`, `sub_category_id`, `brand_id`, `product_name`, `slug`, `current_price`, `previous_price`, `in_stock`, `tax`, `sku`, `video_link`, `short_description`, `description`, `specification_name`, `specification_description`, `attribute_id`, `attribute_price`, `color_id`, `color_images`, `image`, `images`, `meta_title`, `meta_keyword`, `meta_description`, `user_avg_rating`, `status`, `created_at`, `updated_at`) VALUES
(49, 8, 3, 20, 8, 'Men Solid Quilted Jacket', 'jackets', 1000.00, 1400.00, 0, '2', '30', NULL, 'Men Solid Quilted Jacket', 'Men Solid Quilted Jacket', NULL, NULL, NULL, NULL, NULL, NULL, '1699429734_xxl-1285-fk-breil-by-fort-collins-original-imafwyyegzzyx6s5 (1).jpg', NULL, NULL, NULL, NULL, '3', 'Active', '2023-11-06 10:18:59', '2023-11-23 12:19:28'),
(50, 8, 3, 20, 21, 'Men Solid Denim Jacket', 'denim', 1500.00, 2150.00, 0, '2', '40', NULL, 'Men Solid Denim Jacket', 'Men Solid Denim Jacket', NULL, NULL, NULL, NULL, NULL, NULL, '1699248889_mens-denim-jacket.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 10:34:49', '2023-11-06 16:43:58'),
(51, 8, 3, 14, 9, 'Solid Men Track Suit', 'Adidas', 900.00, 1250.00, 0, '2', '50', NULL, 'Solid Men Track Suit', 'Solid Men Track Suit', NULL, NULL, NULL, NULL, NULL, NULL, '1699249566_l-krs-13-tracksuit-grey-rabby-original-imagg52cuwptspd7.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 10:46:06', '2023-11-06 10:46:06'),
(52, 8, 3, 14, 7, 'Men\'s Track pants with T-shirt', 'gucci', 1200.00, 2000.00, 0, '2', NULL, NULL, 'Men\'s Track pants with T-shirt', 'Men\'s Track pants with T-shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699249897_xl-king-tracksuit-vitaan-original-imagrg9hgmzstvgv.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 10:51:37', '2023-11-06 10:52:24'),
(53, 8, 3, 13, 10, 'Men Printed Round Neck Cotton Blend Yellow T-Shirt', 'Hermès', 800.00, 1200.00, 0, NULL, '35', NULL, 'Men Printed Round Neck Cotton Blend Yellow T-Shirt', 'Men Printed Round Neck Cotton Blend Yellow T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699250430_l-all-rbcpon-sky-one-nb-nicky-boy-original-imagrdhcgyk7papf.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 11:00:30', '2023-11-11 12:19:16'),
(54, 8, 3, 13, 8, 'Men Colorblock Polo Neck Cotton Blend Black, Blue T-Shirt', 'H&M', 500.00, 650.00, 0, '2', '40', NULL, 'Men Colorblock Polo Neck Cotton Blend Black, Grey T-Shirt', 'Men Colorblock Polo Neck Cotton Blend Black, Grey T-Shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699250829_l-t45-blkgy-teemex-original-imagqfpbnazknghu.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 11:07:09', '2023-11-14 17:00:08'),
(55, 8, 3, 7, 5, 'Men Slim Fit Solid Spread Collar Casual Shirt', 'Mufti', 1800.00, 2200.00, 0, '2', '25', NULL, 'Men Slim Fit Solid Spread Collar Casual Shirt', 'Men Slim Fit Solid Spread Collar Casual Shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699251302_l-c301-p-blue-dennis-lingo-original-imag2y78hehupm6r-bb.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 11:15:02', '2023-11-06 11:15:02'),
(56, 8, 3, 7, 10, 'Men Regular Fit Checkered Spread Collar Casual Shirt', 'Hermès', 2000.00, 2500.00, 0, NULL, '15', NULL, 'Men Regular Fit Checkered Spread Collar Casual Shirt', 'Men Regular Fit Checkered Spread Collar Casual Shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699251587_46-10863030-roadster-original-imafnwhjjqpypvf5.jpg', NULL, NULL, NULL, NULL, '3.5', 'Active', '2023-11-06 11:19:47', '2023-11-23 12:17:00'),
(57, 9, 7, 22, 22, 'Women Solid Quilted Jacket', 'Roadster', 2500.00, 4000.00, 0, NULL, '15', NULL, 'Women Solid Quilted Jacket', 'Women Solid Quilted Jacket', NULL, NULL, NULL, NULL, NULL, NULL, '1699252849_l-no-wmn-jkt-129-olivegreen-christy-world-original-imag62vsxzfwk4p4 (1).jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 11:40:49', '2023-11-06 11:41:45'),
(58, 9, 7, 22, 22, 'Women Colorblock Bomber Jacket', 'Roadster', 2800.00, 4000.00, 0, NULL, '20', NULL, 'Women Colorblock Bomber Jacket', 'Women Colorblock Bomber Jacket', NULL, NULL, NULL, NULL, NULL, NULL, '1699253117_l-11951210-dressberry-original-imafwwz4qbdvhzqg.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 11:45:17', '2023-11-06 11:45:17'),
(59, 9, 8, 28, 6, 'Women Regular Fit Solid Spread Collar Casual Shirt', 'Levis', 1000.00, 1200.00, 0, '3', '50', NULL, 'Women Regular Fit Solid Spread Collar Casual Shirt', 'Women Regular Fit Solid Spread Collar Casual Shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699254121_s-329tk252-selvia-original-imagupvb6gzvm5vu.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(60, 9, 8, 28, 10, 'Women Boxy, Regular Fit Printed Lapel Collar Casual Shirt', 'Hermès', 1200.00, 1500.00, 0, '2', '25', 'https://youtu.be/zKLZyu5Dco0', 'Women Boxy, Regular Fit Printed Lapel Collar Casual Shirt', 'Women Boxy, Regular Fit Printed Lapel Collar Casual Shirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699254472_l-201-j-turritopsis-original-imagktf2pfnhd9na.webp', NULL, NULL, NULL, NULL, '4', 'Active', '2023-11-06 12:07:52', '2023-11-27 12:02:14'),
(61, 9, 7, 23, 4, 'Red color beautiful gown', 'zara', 3000.00, 4150.00, 0, '1', '12', NULL, 'Red color beautiful gown', 'Red color beautiful gown', NULL, NULL, NULL, NULL, NULL, NULL, '1699255648_product-jpeg.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 12:26:00', '2023-11-11 12:10:33'),
(62, 9, 7, 23, 4, 'women\'s blue evening gown', 'zara', 3500.00, 4500.00, 0, '1', '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699256191_Hd549e04c774d48e89384ffe4e858a3e4S.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 12:36:31', '2023-11-06 12:36:31'),
(63, 9, 9, 25, 9, 'Women Track Suit', 'Adidas', 1000.00, 1225.00, 0, '2', '50', NULL, 'Women Track Suit', 'Women Track Suit', NULL, NULL, NULL, NULL, NULL, NULL, '1699256829_xxl-jk9006grey-xxl-bombshell-original-imagdff4azewy2zy-bb.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(64, 9, 9, 25, 9, 'Printed, Embroidered Women Track Suit', 'Adidas', 1000.00, 1500.00, 0, '2', '25', NULL, 'Printed, Embroidered Women Track Suit', 'Printed, Embroidered Women Track Suit', NULL, NULL, NULL, NULL, NULL, NULL, '1699268978_xl-h-track-pant-sets-1012-styleaone-original-imag79yhetrrey9z-bb.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 16:09:38', '2023-11-06 16:11:00'),
(65, 11, 16, 36, 18, 'Rose Gold Baguette Bracelet', 'Giva', 5000.00, 7500.00, 0, '1', NULL, 'https://cdn.shopify.com/videos/c/vp/6463381e0051459881ca49c0d3337986/6463381e0051459881ca49c0d3337986.SD-480p-1.5Mbps-9807991.mp4', 'Rose Gold Baguette Bracelet', 'Rose Gold Baguette Bracelet', NULL, NULL, NULL, NULL, NULL, NULL, '1699269930_BR0563_5_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 16:25:30', '2023-11-21 11:19:40'),
(66, 9, 10, 29, 6, 'Black Women Sling Bag', 'Black Women Sling Bag', 4000.00, 4500.00, 0, '2', '40', NULL, 'Black Women Sling Bag', 'Black Women Sling Bag', NULL, NULL, NULL, NULL, NULL, NULL, '1699270367_attractive-printed-formal-sling-bag-ls-223-slnbg-mkri-prnt-blck-original-imagjpdxhqrktvtx.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 16:32:47', '2023-11-06 16:36:43'),
(67, 9, 10, 29, 6, 'Women Multicolor Handbag - Extra Spacious', 'Levis', 2000.00, 2350.00, 0, '3', '30', NULL, 'Women Multicolor Handbag - Extra Spacious', 'Women Multicolor Handbag - Extra Spacious', NULL, NULL, NULL, NULL, NULL, NULL, '1699271023_-original-imagkycgvsa8g5my (1).webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 16:41:43', '2023-11-06 16:43:43'),
(68, 9, 10, 30, 6, 'Women Sling Bag', 'Levis', 2500.00, 3000.00, 0, '2', '20', NULL, 'Women Sling Bag', 'Women Sling Bag', NULL, NULL, NULL, NULL, NULL, NULL, '1699272144_sling-bag-for-women-s-college-girl-s-1-17-78-msf-065gdn-sling-original-imaghz6n9ahh4zkm.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 17:02:24', '2023-11-06 17:03:00'),
(69, 9, 10, 30, 6, 'Women Beige Pouch Potli', 'Levis', 3000.00, 3510.00, 0, '1', '10', NULL, 'Women Beige Pouch Potli', 'Women Beige Pouch Potli', NULL, NULL, NULL, NULL, NULL, NULL, '1699274044_-original-imagggj999xhzwqa.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-06 17:34:04', '2023-11-06 17:34:04'),
(70, 10, 11, 18, 12, 'Boys Cartoon/Superhero Cotton Blend T Shirt  (Multicolor, Pack of 3)', 'Calvin Klein', 500.00, 570.00, 0, '3', '50', NULL, 'Boys Cartoon/Superhero Cotton Blend T Shirt  (Multicolor, Pack of 3)', 'Boys Cartoon/Superhero Cotton Blend T Shirt  (Multicolor, Pack of 3)', NULL, NULL, NULL, NULL, NULL, NULL, '1699334406_2-3-years-mrv-fls-102-3-marvel-by-miss-chief-original-imagpegmtfxyd8pz.webp', NULL, NULL, NULL, NULL, '1.5', 'Active', '2023-11-07 10:20:06', '2023-11-23 12:20:15'),
(71, 10, 11, 18, 12, 'Boys Colorblock Pure Cotton T Shirt  (Multicolor, Pack of 1)', 'Calvin Klein', 600.00, 700.00, 0, '3', '25', NULL, 'Boys Colorblock Pure Cotton T Shirt  (Multicolor, Pack of 1)', 'Boys Colorblock Pure Cotton T Shirt  (Multicolor, Pack of 1)', NULL, NULL, NULL, NULL, NULL, NULL, '1699334633_9-10-years-na-41741-smartraho-original-imagzgckzyktj7dm.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-07 10:23:53', '2023-11-16 10:51:57'),
(72, 10, 11, 19, 8, 'Boys & Girls Full Sleeve Printed Sweatshirt', 'H&M', 800.00, 950.00, 0, '3', '36', NULL, 'Boys & Girls Full Sleeve Printed Sweatshirt', 'Boys & Girls Full Sleeve Printed Sweatshirt', NULL, NULL, NULL, NULL, NULL, NULL, '1699335056_9-10-years-swt-fs-a0-p1-x2o-original-imagb8hej3esthpp.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-07 10:30:56', '2023-11-15 13:56:22'),
(73, 10, 14, 24, 11, 'Xivir Reversible Plushie Cute Octopus Double Sided Flip Reversed Stuffed Animal - 12 cm  (Pink-Sky Blue)', 'Xivir Reversible Plushie Cute Octopus Double Sided Flip Reversed Stuffed Animal - 12 cm  (Pink-Sky Blue)', 400.00, 480.00, 0, '3', '50', NULL, 'Xivir Reversible Plushie Cute Octopus Double Sided Flip Reversed Stuffed Animal - 12 cm  (Pink-Sky Blue) soft toys for your kids', 'Xivir Reversible Plushie Cute Octopus Double Sided Flip Reversed Stuffed Animal - 12 cm  (Pink-Sky Blue) soft toys for your kids', NULL, NULL, NULL, NULL, NULL, NULL, '1699336533_reversible-cute-black-grey-and-black-6-inches-octopus-mood-original-imaga4pggz4ujgbz.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-07 10:55:33', '2023-11-07 10:59:00'),
(74, 10, 14, 24, 11, 'JP GLOBAL Plush Toy Pillow Reversible Bunny Soft Toy For Kids - 30 cm  (Strawberry)', 'soft toys', 500.00, 780.00, 0, '3', '25', NULL, 'JP GLOBAL Plush Toy Pillow Reversible Bunny Soft Toy For Kids - 30 cm  (Strawberry) soft toys for your kids', 'JP GLOBAL Plush Toy Pillow Reversible Bunny Soft Toy For Kids - 30 cm  (Strawberry)soft toys for your kids', NULL, NULL, NULL, NULL, NULL, NULL, '1699337138_plush-toy-pillow-reversible-bunny-soft-toy-for-kids-35-jp-global-original-imagtnncnvjkg7mc.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-07 11:05:38', '2023-11-07 11:05:38'),
(75, 10, 14, 24, 11, 'Hug \'n\' Feel Long Soft Lovable hugable Cute Giant Life Size Teddy Bear(New Soft Toys, Family) - 30 cm  (Multicolor)', 'soft toys', 450.00, 700.00, 0, '2', '40', NULL, 'Hug \'n\' Feel Long Soft Lovable hugable Cute Giant Life Size Teddy Bear(New Soft Toys, Family) - 30 cm  (Multicolor) soft toys', 'Hug \'n\' Feel Long Soft Lovable hugable Cute Giant Life Size Teddy Bear(New Soft Toys, Family) - 30 cm  (Multicolor) soft toys', NULL, NULL, NULL, NULL, NULL, NULL, '1699338818_soft-toys-lovable-huggable-cute-pig-happy-pink-pig-family-set-04-original-imag3b7hme9d6ynf.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-07 11:33:38', '2023-11-07 11:33:38'),
(76, 10, 14, 24, 14, 'Liquortees Panda Teddy bear soft toys for girls Small Cute squishy panda teddy - 30 cm  (Black & White)', 'soft toys', 150.00, 280.00, 0, '3', '40', NULL, 'Liquortees Panda Teddy bear soft toys for girls Small Cute squishy panda teddy - 30 cm  (Black & White)', 'Liquortees Panda Teddy bear soft toys for girls Small Cute squishy panda teddy - 30cm  (Black & White)', NULL, NULL, NULL, NULL, NULL, NULL, '1699339999_panda-teddy-bear-soft-toys-for-girls-small-cute-squishy-panda-original-imagr4zcjtcrdyvn.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-07 11:53:19', '2023-11-07 11:53:19'),
(77, 11, 16, 36, 18, 'Rose Gold Dressed Like A Flower Bracelet', 'rose gold', 3000.00, 4200.00, 14, '1', '25', NULL, 'Rose Gold Dressed Like A Flower Bracelet', 'Rose Gold Dressed Like A Flower Bracelet', NULL, NULL, NULL, NULL, NULL, NULL, '1699436467_BR0326_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-08 14:41:07', '2023-11-21 12:17:54'),
(78, 9, 7, 37, 23, 'Party Wear Stylish College Casual Sneakers Shoes Sneakers For Women  (Grey, White)', 'Sneakers', 400.00, 450.00, 0, '2', '50', NULL, 'Party Wear Stylish College Casual Sneakers Shoes Sneakers For Women  (Grey, White)', 'Party Wear Stylish College Casual Sneakers Shoes Sneakers For Women  (Grey, White)', NULL, NULL, NULL, NULL, NULL, NULL, '1699437360_3-01321-bot-3-shozie-grey-white-original-imagfcczhkhgg9ww.webp', NULL, NULL, NULL, NULL, '4.5', 'Active', '2023-11-08 14:56:00', '2023-11-23 12:18:33'),
(79, 9, 7, 37, 8, 'Women Pink Heels Sandal', 'H&M', 500.00, 550.00, 0, '2', '40', NULL, 'Women Pink Heels Sandal', 'Women Pink Heels Sandal', NULL, NULL, NULL, NULL, NULL, NULL, '1699438409_-original-imagg6y5cegch2zs-bb.webp', NULL, NULL, NULL, NULL, '4.5', 'Active', '2023-11-08 15:13:29', '2023-11-23 12:17:55'),
(80, 9, 7, 37, 24, 'Women Tan Flats Sandal', 'Bata', 450.00, 700.00, 0, NULL, '30', NULL, 'Women Tan Flats Sandal', 'Women Tan Flats Sandal', NULL, NULL, NULL, NULL, NULL, NULL, '1699439277_4-5613823-4-bata-tan-original-imag6fzbzuyfqbqy.webp', NULL, NULL, NULL, NULL, '3.5', 'Active', '2023-11-08 15:27:57', '2023-11-23 11:55:56'),
(81, 11, 16, 36, 18, 'Rose Gold Floral Chic Ring', 'rose gold', 1399.00, 2799.00, 23, '1', '25', 'https://cdn.shopify.com/videos/c/vp/d47552806d7c477b9ea0022f6491c60d/d47552806d7c477b9ea0022f6491c60d.SD-480p-0.9Mbps.mp4', 'The Rose Gold Floral Glory Ring is inspired by the demure style of a girl that only gets accentuated with exquisite finery.', 'The Rose Gold Floral Glory Ring has a lovely floral design with studded zircons.\r\n925 Sterling Silver with Rose Gold plating\r\nAdjustable size to ensure no fitting issues\r\nAAA+ Quality Zircons\r\nDiameter: 18mm + top Adjustable \r\nMotif: 12 x 7.5 mm \r\nComes with the GIVA Jewellery kit and authenticity certificate', NULL, NULL, NULL, NULL, NULL, NULL, '1699521944_R0279_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-09 14:25:44', '2023-11-24 10:23:29'),
(82, 11, 16, 36, 18, 'Rose Gold Ruby Red Spin Ring', 'rose gold', 2099.00, 4199.00, 38, '1', '40', NULL, 'The Rose Gold Ruby Red Spin Ring is inspired by the beautiful festive decorations.', 'The Design:\r\nThe rose gold ring features a spin ring with a round frame studded with zircons and a red stone placed at the centre.\r\n925 Silver with Gold plating\r\nAAA+ Quality Zircons\r\nAdjustable size to ensure no fitting issues\r\nDiameter: 1.7 cm \r\nComes with the GIVA Jewellery kit and authenticity certificate\r\nNet Qty- 1\r\nStyling Tip:\r\nStyle this with a blue full-sleeve dress', NULL, NULL, NULL, NULL, NULL, NULL, '1699522253_R0706_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-09 14:30:54', '2023-11-16 09:48:56'),
(83, 11, 16, 35, 18, 'Golden Butterfly In Love Ring', 'gold', 1299.00, 2599.00, 6, '1', '12', 'https://cdn.shopify.com/videos/c/vp/5b181b93e48c4f1c96f7b20125bf0cd9/5b181b93e48c4f1c96f7b20125bf0cd9.SD-480p-0.9Mbps.mp4', 'The Inspiration:\r\nThe Golden Butterfly In Love Ring is inspired by the fluttering wings of a butterfly when love\'s all around!', 'The Design:\r\nThe Golden Butterfly In Love Ring has a gorgeous butterfly charm for its design studded with zircons.\r\n925 Silver with Gold plating \r\nAdjustable size to ensure no fitting issues\r\nAAA+ Quality Zircons\r\nDiameter of the ring:\r\nComes with the GIVA Jewellery kit and authenticity certificate\r\nStyling Tips:\r\nGo for a mint green frilly dress and add a golden touch to it with this ring.', NULL, NULL, NULL, NULL, NULL, NULL, '1699522873_R0282_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-09 14:41:13', '2023-11-23 14:31:47'),
(84, 11, 16, 35, 18, 'Gold Radiant Petals Diamond Pendant', 'gold', 9862.00, 10430.00, 19, '1', '25', NULL, 'This gold pendant has a classic flower motif set with lab-grown diamonds.', 'This gold pendant has a classic flower motif set with lab-grown diamonds.\r\nBIS-Hallmarked Gold Jewellery\r\nLab-grown diamonds\r\nOur 14K solid gold pieces are made to last forever. 14K gold will not oxidise or discolour so you can wear your jewellery daily.\r\nPendant Size: Height - 1.9 cm, Pendant Width - 1.2 cm \r\nComes with the GIVA Jewellery kit and authenticity certificate\r\nContent: Pendant\r\nNet Qty- 1 unit\r\nStyling Tip:\r\nStyle this gold & diamond pendant with your office wear.\r\n\r\n*Neck chain is not a part of the product and can be bought separately.', NULL, NULL, NULL, NULL, NULL, NULL, '1699523760_GDLPD0180_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-09 14:56:00', '2023-11-24 16:54:47'),
(85, 11, 16, 33, 18, 'Shirin E Bracelet in 925 Silver', 'silver', 2975.00, 3500.00, 14, '1', '15', NULL, 'Silver Floral Cuff Bracelet. Crafted in 925 Oxidised Silver with Fresh Water Pearls. Uniquely handcrafted, no two pieces are exactly alike!', 'Care Tips: The first step is to store your jewellery in a zip lock bag when you\'re not wearing it. Also, avoid direct contact with chemicals such as perfumes, sanitisers and the likes.\r\n\r\nGross Weight : 10.000 g\r\n\r\nSize: 57.8 mm (Current Size 2.4 Anna Fits well from 2.2 to 2.6 Anna) | Big Flower Diameter: 2.1 cm | Small Flower Diameter: 1.6 cm', NULL, NULL, NULL, NULL, NULL, NULL, '1700033977_AT00154-SS0000-shirin-e-bracelet-in--silver-prd-1-base.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-15 12:39:37', '2023-11-20 16:41:18'),
(86, 11, 16, 33, 18, 'Add Wishlist A Pearl of Love (8mm) Bracelet in 925 Silver', 'silver', 1440.00, 1600.00, 23, '1', '25', NULL, 'Minimalistic Freshwater Pearl Chain Bracelet. Crafted in 925 Silver with a High Polish Silver Finish. Uniquely handcrafted, no two pieces are exactly alike!', 'Minimalistic Freshwater Pearl Chain Bracelet. Crafted in 925 Silver with a High Polish Silver Finish. Uniquely handcrafted, no two pieces are exactly alike!\r\n\r\nGross Weight : 1.600 g\r\n\r\nBracelet Length: 15.2 cm + 5.1 cm (6 Inches + 2 Inches Adjustable) | Pearl Size: 8 mm', NULL, NULL, NULL, NULL, NULL, NULL, '1700054048_AT00296-SS0000-a-pearl-of-love-mm-bracelet-in--silver-prd-1-base.jpg', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-15 18:14:08', '2023-11-15 18:14:08'),
(87, 11, 16, 36, 18, 'Rose Gold Drop Wreath Studs', 'rose gold', 1499.00, 2999.00, 40, '1', '40', 'https://cdn.shopify.com/videos/c/vp/42571efc528447ea9514c5d74e7fda27/42571efc528447ea9514c5d74e7fda27.HD-1080p-7.2Mbps.mp4', 'These Rose Gold Drop Wreath Studs are inspired by the most special moments of life that make it all worth it.', 'Design:\r\n\r\nThese Rose Gold Drop Wreath Studs are handcrafted with love, just for YOU. These intricately made studs possess all the thoughtfulness you need around you. With the perfect balance of leaves, flowers, and drop design, these studs are nothing less than a true masterpiece.\r\n\r\n\r\nStyle:\r\n\r\nTake these along for those special, close-to-heart moments.\r\n\r\nDimensions - 12mm X 13mm\r\nAAA+ Quality Zircons\r\nHypoallergenic - Perfect for sensitive skin\r\nComes with the GIVA Jewellery kit and authenticity certificate', NULL, NULL, NULL, NULL, NULL, NULL, '1700481611_ER0583R_5_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-20 17:00:11', '2023-11-20 17:00:11'),
(88, 11, 16, 35, 18, 'Golden Glowing in Love Couple Rings', 'gold', 2190.00, 4399.00, 20, NULL, NULL, 'https://cdn.shopify.com/videos/c/vp/8730c4cde6ad4e99bfc182bd8e921bda/8730c4cde6ad4e99bfc182bd8e921bda.HD-1080p-2.5Mbps.mp4', 'The Golden Glowing in Love Couple Rings are inspired by glow of true love that consumes you completely!!', 'The Inspiration:\r\nThe Golden Glowing in Love Couple Rings are inspired by glow of true love that consumes you completely!!\r\n\r\n\r\nThe Design:\r\nThe Golden Glowing in Love Couple Rings have the most elegant design with a gold finish and a beautifully studded zircon for both rings.\r\n\r\n925 Sterling Silver with Gold plating\r\nAdjustable size to ensure no fitting issues\r\nAAA+ Quality Zircons\r\nMale Ring: 18 mm+ Adjustable\r\nFemale Ring: 16 mm+ Adjustable \r\nComes with the GIVA Jewellery kit and authenticity certificate\r\nStyling Tips:\r\nGo OTT with a bright sequinned golden number and pair it up with this ring, as for men - a sharp tuxedo in brown would do the trick.', NULL, NULL, NULL, NULL, NULL, NULL, '1700484913_R0251_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-20 17:55:13', '2023-11-20 17:55:13'),
(89, 11, 16, 33, 18, 'Royal Pink Set', 'silver', 3000.00, 4900.00, 39, '1', '40', 'https://cdn.shopify.com/videos/c/vp/bf54212d84bb484ea98df9037aa9fa12/bf54212d84bb484ea98df9037aa9fa12.HD-720p-1.6Mbps-17470458.mp4', 'Royal Pink Set is the DIVA touch to your look. If it is approved by Anushka herself, it is nothing less than regal.', 'The Royal Pink Set embodies the grace of 925 Sterling Silver with the royalty of Rose Gold. The stones are no less regal for they are Red Tourmaline. \r\n\r\n925 Silver with Rose Gold Plating\r\nAAA+ Quality Zircons\r\nEarrings dimensions are 3 cm X 3 cm\r\nNecklace size is 43 cm and adjustable chain is 5 cm\r\nRhodium e-coat to prevent tarnish \r\nComes with the GIVA Jewellery kit and authenticity certificate\r\nNet qty - 1 set\r\nIncludes Anushka Sharma Royal Pink Necklace, and a pair of Anushka Sharma Royal Pink Earrings\r\nStyling Tip:\r\n\r\nSo sway in that party, glam up the get-together and shine through the family dinners - dressed in a gorgeous pastel gown and accessorised with this statement piece!', NULL, NULL, NULL, NULL, NULL, NULL, '1700629961_PD0468_ER0617_1_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-22 10:12:41', '2023-11-23 12:42:58'),
(90, 11, 16, 36, 18, 'Rose Gold Baguette Flower Set with Link Chain', 'rose gold', 4199.00, 7490.00, 40, NULL, NULL, 'https://cdn.shopify.com/videos/c/vp/d36f7c2ed6e64526af0afd30f040ec48/d36f7c2ed6e64526af0afd30f040ec48.HD-720p-3.0Mbps.mp4', 'Dear DIVA, we know you love flowers, so here\'s another one for the collection. Inspired by flowers swaying freely in the meadows, this Rose Gold Baguette Flower Set is here to fill YOU with cheer and energy!', 'The Design:\r\nThis Rose Gold Baguette Flower Set is handcrafted with love, just for YOU! Featuring a sparkling zircon centrepiece nestled within baguette petals, the pendant and earrings are pure joy. The rose gold finish simply adds to its charm.\r\n\r\nThe Styling:\r\nThis set is here to power YOU through the grind! Don\'t remove it, okay?\r\n\r\nConsists of the Rose Gold Baguette Flower Pendant, 16\" + 2\" Rose Gold Chain and a pair of Rose Gold Baguette Flower Earrings\r\n925 Sterling Silver with Rose Gold plating\r\nAAA+ Quality Zircon stones\r\nComes with the GIVA Jewellery kit and authenticity certificate\r\nShipping & Returns :\r\n\r\nFree express shipping\r\n30 day returns', NULL, NULL, NULL, NULL, NULL, NULL, '1700633614_ER0247_PD0176_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-22 11:13:34', '2023-11-22 11:13:34'),
(91, 11, 16, 36, 18, 'Rose Gold Bow Dangler Earrings', 'rose gold', 1699.00, 3399.00, 25, '1', '25', 'https://cdn.shopify.com/videos/c/vp/82aedd8e6c8241adb034e744bf2937e1/82aedd8e6c8241adb034e744bf2937e1.SD-480p-0.9Mbps.mp4', 'The Rose Gold Bow Dangler Earrings are inspired by the innermost pages of your soul as beautiful as the frame that holds it.', 'The Inspiration:\r\nThe Rose Gold Bow Dangler Earrings are inspired by the innermost pages of your soul as beautiful as the frame that holds it.\r\n\r\nThe Design:\r\nThe Rose Gold Bow Dangler Earrings have a bow-shaped stud holding a pair of zircon pieces dangling there.\r\n925 Silver with Rose Gold Plating\r\nAAA+ Quality Zircons\r\nDimensions: 40 mm x 10 mm\r\nComes with the GIVA Jewellery kit and authenticity certificate', NULL, NULL, NULL, NULL, NULL, NULL, '1700634288_ER0752_5_1024x1024.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-22 11:24:48', '2023-11-22 11:24:48'),
(92, 9, 7, 22, 22, 'Women Solid Casual Jacket', 'jackets', 700.00, 1600.00, 0, '2', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1701156052_m-11990408-roadster-original-imafzfnjxc2a3xp9.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-28 12:20:52', '2023-11-28 12:21:38'),
(93, 9, 7, 22, 21, 'Women Solid Casual Jacket', 'jackets', 590.00, 1800.00, 0, '2', '15', NULL, 'Denim jacket', 'Denim jacket', NULL, NULL, NULL, NULL, NULL, NULL, '1701156387_l-ttjk001011-tokyo-talkies-original-imagfbwwefhfy2zr.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-28 12:26:27', '2023-11-28 12:29:17'),
(94, 9, 7, 22, 22, 'Women Solid Padded Jacket', 'jackets', 800.00, 2000.00, NULL, '2', '20', NULL, 'w', 'winter wear', NULL, NULL, NULL, NULL, NULL, NULL, '1701157824_s-9478895-roadster-original-imafmqf7ckp6hudy-bb.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(96, 11, 15, 32, 16, 'Fire-Boltt Hurricane 1.3\" Curved Glass Display with 360 Health Training, 100+ Sports Modes Smartwatch', 'watch', 2500.00, 3000.00, 25, '2', '20', NULL, 'Connectivity Features\r\nCall Function\r\nNo\r\nBluetooth\r\nYes\r\nWi-Fi\r\nNo\r\nGPS\r\nNo\r\nMessaging Support\r\nNo\r\nBluetooth Version\r\nv5.0\r\nEmail Support\r\nNo\r\nOperating Range\r\n10 m\r\nCall Features\r\nReject Calls, Silent Calls\r\nThird Party App Support\r\nLimited Support\r\nOt', 'Product Details\r\nClosure\r\nBuckle\r\nSensor\r\nSpO2, Heart Rate Sensor, Accelerometer, Barometer\r\nCompatible Device\r\nMobile Phones\r\nNotification\r\nCall, SMS, Whatsapp, Facebook, Twiter, Other Social Apps, Sedentary Reminder, Goal Completion\r\nNotification Type\r\nCall, SMS, Whatsapp, Facebook, Twiter, Other Social Apps, Sedentary Reminder, Goal Completion\r\nBattery Type\r\nLithium Ion\r\nCharge Time\r\n120 Min\r\nBattery Life\r\n7 days normal, 15 days standby\r\nRechargeable Battery\r\nYes\r\nCharger Type\r\nUSB Cable With Metalic Charging Points\r\nStand By Time\r\n360 hr', NULL, NULL, NULL, NULL, NULL, NULL, '1701240929_-original-imagkfm8fgvwjy8y.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 11:55:29', '2023-11-29 11:55:29'),
(97, 11, 15, 32, 16, 'Noise Evolve 3 1.43\" AMOLED Always-On Display with Bluetooth Calling, Metallic Design Smartwatch  (Black Strap, Regular)', 'watch', 3000.00, 4000.00, 30, '2', '50', NULL, 'Closure\r\nBuckle\r\nSensor\r\nAccelerometer, Hear Rate\r\nCompatible Device\r\niphone, Android\r\nNotification\r\nSmart Notification\r\nNotification Type\r\nVibration\r\nBattery Life\r\n7 Days\r\nRechargeable Battery\r\nYes\r\nCharger Type\r\nMagnetic Charger', 'General\r\nSales Package\r\nSmartwatch, Magnetic Charger, User Manual, Warranty Card\r\nModel Number\r\nwrb-sw-evolve3-std-blk_blk\r\nModel Name\r\nEvolve 3 1.43\" AMOLED Always-On Display with Bluetooth Calling, Metallic Design\r\nDial Color\r\nBlack\r\nDial Shape\r\nRound\r\nStrap Color\r\nBlack\r\nStrap Material\r\nSilicone\r\nSize\r\nRegular\r\nTouchscreen\r\nYes\r\nWater Resistant\r\nYes\r\nUsage\r\nFitness & Outdoor\r\nDial Material\r\nPolycarbonate\r\nIdeal For\r\nMen & Women\r\nCompatible OS\r\nAndroid & iOS\r\nBrand Strap Color\r\nBlack', NULL, NULL, NULL, NULL, NULL, NULL, '1701241163_-original-imaggstrsxtwxzar.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 11:59:23', '2023-11-29 11:59:23'),
(98, 11, 15, 31, 25, 'Minimalists Analog Watch - For Men 38024PP25', 'analog watch', 1500.00, 2000.00, 15, '2', '30', NULL, 'Minimalists Analog Watch', 'Minimalists Analog Watch', NULL, NULL, NULL, NULL, NULL, NULL, '1701241927_38024pp25-fastrack-men-original-imag6cu9xkhbgz4y.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 12:12:07', '2023-11-29 12:19:55'),
(99, 9, 7, 23, 26, 'Blue Embroidered Gown with Heavy Embroidered Jacket', 'gown', 2819.00, 9399.00, 0, '2', '20', NULL, 'Blue and Pink solid woven gown dress, has a round neck, sleeveless, concealed zip closure, an attached lining, and flared hem with embroidered details\r\nBlue and pink embroidered jacket, has a round neck, three-quarter sleeves', 'Blue and Pink solid woven gown dress, has a round neck, sleeveless, concealed zip closure, an attached lining, and flared hem with embroidered details\r\nBlue and pink embroidered jacket, has a round neck, three-quarter sleeves', NULL, NULL, NULL, NULL, NULL, NULL, '1701251823_1f9c5b31-9775-402a-a6d7-72317205890a1618306562045-Inddus-Women-Blue-Solid-Silk-Gown-with-Embroidered-Jacket-81-3.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 14:57:03', '2023-11-29 15:00:23'),
(100, 9, 7, 10, 20, 'Casual Regular Sleeves Self Design Women Maroon Top', 'top', 1000.00, 1200.00, NULL, '2', '15', NULL, 'Product Details\r\n\r\nNeck\r\nRound Neck\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\n3/4 Sleeve\r\nFit\r\nSlim\r\nFabric\r\nLycra Blend\r\nType\r\nRegular Top\r\nPattern\r\nSelf Design\r\nColor\r\nMaroon\r\nPack of\r\n1\r\nFabric Care\r\nMachine Wash\r\nLength\r\nHip Length\r\nStyle Code\r\nL', 'Product Details\r\n\r\nNeck\r\nRound Neck\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\n3/4 Sleeve\r\nFit\r\nSlim\r\nFabric\r\nLycra Blend\r\nType\r\nRegular Top\r\nPattern\r\nSelf Design\r\nColor\r\nMaroon\r\nPack of\r\n1\r\nFabric Care\r\nMachine Wash\r\nLength\r\nHip Length\r\nStyle Code\r\nLUK101\r\nNet Quantity\r\n1\r\nThe quintessential wardrobe favourite meets the latest trends in Stylander collection of women’s tops. Browse through the fashionable, the fabulous, the racy, the ravishing, the utilitarian and the ultra-feminine in tops.', NULL, NULL, NULL, NULL, NULL, NULL, '1701252940_m-luk101-lukonn-original-imagt3q2zhj2h4x8.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(101, 9, 7, 10, 8, 'Casual Regular Sleeves Solid Women Pink Top', 'top', 1200.00, 1500.00, NULL, '2', '10', NULL, 'Product Details\r\n\r\nNeck\r\nMandarin Collar\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\n3/4 Sleeve\r\nFit\r\nRegular\r\nFabric\r\nViscose Rayon\r\nType\r\nRegular Top\r\nPattern\r\nSolid\r\nColor\r\nPink\r\nPack of\r\n1\r\nLength\r\nHip Length\r\nStyle Code\r\nRegular top\r\nNet Quantity\r', 'Product Details\r\n\r\nNeck\r\nMandarin Collar\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\n3/4 Sleeve\r\nFit\r\nRegular\r\nFabric\r\nViscose Rayon\r\nType\r\nRegular Top\r\nPattern\r\nSolid\r\nColor\r\nPink\r\nPack of\r\n1\r\nLength\r\nHip Length\r\nStyle Code\r\nRegular top\r\nNet Quantity\r\n1\r\ntop for women', NULL, NULL, NULL, NULL, NULL, NULL, '1701253236_xl-regular-top-fab-star-original-imagyry2geb5ztzq.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(102, 9, 7, 23, 26, 'Women Blue Sequin Embroidered Yoke with Accordion Pleated Tiered Dress', 'gown', 2175.00, 6799.00, NULL, '2', '68', NULL, 'Blue embellished woven fit and flare dress, has a round neck, sleeveless, an attached lining, and flared hem', 'Blue embellished woven fit and flare dress, has a round neck, sleeveless, an attached lining, and flared hem', NULL, NULL, NULL, NULL, NULL, NULL, '1701253394_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:23:14', '2023-11-29 15:23:14'),
(103, 9, 7, 10, 4, 'Casual Regular Sleeves Striped Women Multicolor Top', 'top', 1500.00, 2000.00, NULL, NULL, '12', NULL, 'Product Details\r\n\r\nNeck\r\nRound Neck\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\nHalf Sleeve\r\nFit\r\nSlim\r\nFabric\r\nHosiery\r\nType\r\nCrop Top\r\nBelt Included\r\nNo\r\nPattern\r\nStriped\r\nColor\r\nMulticolor\r\nPack of\r\n1\r\nFabric Care\r\nDry Clean or Machine Wash\r\nAdditio', 'Product Details\r\n\r\nNeck\r\nRound Neck\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\nHalf Sleeve\r\nFit\r\nSlim\r\nFabric\r\nHosiery\r\nType\r\nCrop Top\r\nBelt Included\r\nNo\r\nPattern\r\nStriped\r\nColor\r\nMulticolor\r\nPack of\r\n1\r\nFabric Care\r\nDry Clean or Machine Wash\r\nAdditional Details\r\nTop length 38 cm\r\nModel Name\r\nRainbow\r\nStyle Code\r\nSC_1001\r\nNet Quantity\r\n1', NULL, NULL, NULL, NULL, NULL, NULL, '1701253455_-original-imagu95ffn89mexg.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:24:15', '2023-11-29 15:24:15'),
(104, 9, 7, 10, 8, 'Casual Regular Sleeves Solid Women White Top', 'top', 2000.00, 2200.00, NULL, '2', '10', NULL, 'Neck\r\nV-Neck\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\nShort Sleeve\r\nFit\r\nRegular\r\nFabric\r\nCotton Blend\r\nType\r\nRegular Top\r\nPattern\r\nSolid\r\nColor\r\nWhite', 'Neck\r\nV-Neck\r\nSleeve Style\r\nRegular Sleeves\r\nSleeve Length\r\nShort Sleeve\r\nFit\r\nRegular\r\nFabric\r\nCotton Blend\r\nType\r\nRegular Top\r\nPattern\r\nSolid\r\nColor\r\nWhite', NULL, NULL, NULL, NULL, NULL, NULL, '1701253746_xl-tttp003846-tokyo-talkies-original-imafutjsuhhacuev.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(105, 9, 8, 38, 19, 'Embellished Geometric Pure Georgette Dhoti Saree With Blouse', 'saree', 1549.00, 4999.00, 0, '2', '69', NULL, 'Green saree\r\nGeometric motif embellished saree with solid border, and with green georgette frill detachable pallu\r\nHas sequinned detail\r\nThe saree comes with a stitched blouse', 'Green saree\r\nGeometric motif embellished saree with solid border, and with green georgette frill detachable pallu\r\nHas sequinned detail\r\nThe saree comes with a stitched blouse', NULL, NULL, NULL, NULL, NULL, NULL, '1701253984_4.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:33:04', '2023-11-29 15:38:54'),
(106, 9, 8, 38, 19, 'X Shraddha Kapoor Pink & Gold-Toned Beads & Stones Ready to Wear Embroidered Cape Saree Tunic', 'saree', 2025.00, 4500.00, NULL, '2', '55', NULL, 'Pink and gold-toned saree\r\nEmbellished saree with embellished border\r\nHas beads and stones detail', 'Pink and gold-toned saree\r\nEmbellished saree with embellished border\r\nHas beads and stones detail', NULL, NULL, NULL, NULL, NULL, NULL, '1701254736_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:45:36', '2023-11-29 15:45:36'),
(107, 9, 8, 38, 19, 'Red & Maroon Ready-to-Wear Saree With Tasseld Necklace', 'saree', 3595.00, 7999.00, 0, '2', '55', NULL, 'Discover effortless style with this stylishly designed saree. Designed with a embellished pattern, it lends a traditional look.\r\nDeep red and maroon saree\r\nSolid pattern\r\nPoly crepe stitched blouse\r\nViscose rayon, dry clean', 'Discover effortless style with this stylishly designed saree. Designed with a embellished pattern, it lends a traditional look.\r\nDeep red and maroon saree\r\nSolid pattern\r\nPoly crepe stitched blouse\r\nViscose rayon, dry clean', NULL, NULL, NULL, NULL, NULL, NULL, '1701255318_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 15:55:18', '2023-11-29 15:55:58'),
(108, 9, 8, 38, 19, 'Black Ready To Wear Ruffle Saree With Stitched Blouse', 'saree', 5599.00, 8000.00, NULL, '2', '20', NULL, 'Black saree\r\nSolid saree with solid border\r\n\r\nThe model is wearing the stitched blouse that comes with the saree', 'Black saree\r\nSolid saree with solid border\r\n\r\nThe model is wearing the stitched blouse that comes with the saree', NULL, NULL, NULL, NULL, NULL, NULL, '1701255775_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(109, 9, 8, 38, 19, 'Embellished Poly-Georgette Saree with Solid border', 'saree', 1503.00, 3198.00, 0, '2', '55', NULL, 'Perk up your look at the next special function by wearing this alluring saree. It includes a captivating poly-georgette blouse and a gorgeous embellished pattern to add a touch of charm to your appearance. \r\nPink shade embellished saree with solid border', 'Perk up your look at the next special function by wearing this alluring saree. It includes a captivating poly-georgette blouse and a gorgeous embellished pattern to add a touch of charm to your appearance. \r\nPink shade embellished saree with solid border\r\nSolid border\r\nPoly-georgette blouse\r\nThe saree comes with an unstitched blouse piece\r\nThe blouse worn by the model might be for modelling purpose only. Check the image of the blouse piece to understand how the actual blouse piece looks like.', NULL, NULL, NULL, NULL, NULL, NULL, '1701256102_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:08:22', '2023-11-29 16:11:27'),
(110, 9, 8, 38, 27, 'Red Silk Blend Ready to Wear Saree', 'saree', 8999.00, 9999.00, NULL, '2', '10', NULL, 'Red saree\r\nSolid solid saree with no border border\r\n\r\nThe model is wearing the stitched blouse that comes with the saree', 'Red saree\r\nSolid solid saree with no border border\r\n\r\nThe model is wearing the stitched blouse that comes with the saree', NULL, NULL, NULL, NULL, NULL, NULL, '1701257069_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:24:29', '2023-11-29 16:24:29'),
(111, 9, 8, 27, 28, 'Women Regular High Rise Blue Jeans', 'jeans', 899.00, 2499.00, 0, '2', '64', NULL, 'Medium shade, light fade blue jeans\r\nStraight fit, mid-rise\r\nClean look\r\nLength: regular', 'Medium shade, light fade blue jeans\r\nStraight fit, mid-rise\r\nClean look\r\nLength: regular', NULL, NULL, NULL, NULL, NULL, NULL, '1701257470_3.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:31:10', '2023-11-29 16:32:20'),
(112, 9, 8, 27, 28, 'Women Regular Mid Rise Green Jeans', 'jeans', 649.00, 2599.00, NULL, '2', '75', NULL, 'Medium shade, light fade blue jeans\r\nStraight fit, mid-rise\r\nClean look\r\nNon stretchable\r\nLength: regular', 'Medium shade, light fade blue jeans\r\nStraight fit, mid-rise\r\nClean look\r\nNon stretchable\r\nLength: regular', NULL, NULL, NULL, NULL, NULL, NULL, '1701258019_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(113, 9, 8, 27, 28, 'Women Boyfriend High Rise Black Jeans', 'jeans', 649.00, 1499.00, 0, '2', '56', NULL, 'Women Boyfriend High Rise Black Jeans', 'Women Boyfriend High Rise Black Jeans', NULL, NULL, NULL, NULL, NULL, NULL, '1701258456_2.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:47:36', '2023-11-29 16:52:38'),
(114, 9, 8, 26, 29, 'Women Regular Fit White Pure Cotton Trousers', 'formal pants', 399.00, 999.00, 0, '2', '60', NULL, 'Women Regular Fit White Pure Cotton Trousers', 'Women Regular Fit White Pure Cotton Trousers', NULL, NULL, NULL, NULL, NULL, NULL, '1701258711_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:51:51', '2023-11-29 16:52:26'),
(115, 9, 8, 26, 29, 'Women Regular Fit Black Cotton Blend Trousers', 'formal pants', 599.00, 1499.00, NULL, '2', '60', NULL, 'Women Regular Fit Black Cotton Blend Trousers', 'Women Regular Fit Black Cotton Blend Trousers', NULL, NULL, NULL, NULL, NULL, NULL, '1701258942_2.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(116, 9, 8, 26, 29, 'Women Regular Fit Pink Cotton Blend Trousers', 'formal pants', 499.00, 1699.00, 0, '2', '70', NULL, 'Women Regular Fit Pink Cotton Blend Trousers', 'Women Regular Fit Pink Cotton Blend Trousers', NULL, NULL, NULL, NULL, NULL, NULL, '1701259376_1.webp', NULL, NULL, NULL, NULL, '0', 'Active', '2023-11-29 17:02:19', '2023-11-29 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `images` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `images`, `created_at`, `updated_at`) VALUES
(8, 49, '17870267061699247939__original_imagpzzgvtzhrnhg.jpg', '2023-11-06 10:18:59', '2023-11-06 10:18:59'),
(10, 50, '8335916071699248889_6538937984374c56f60a8e2f-junge-denim-jacket-men-fleece-jacket.jpg', '2023-11-06 10:34:49', '2023-11-06 10:34:49'),
(12, 51, '1383508981699249566_m-rabby-13-men-pair-steel-rabby-original-imagqd2wb4zvfvj7.jpg', '2023-11-06 10:46:06', '2023-11-06 10:46:06'),
(13, 51, '1057952891699249566_m-th13-13-tracksuit-sky-the-himalayan-original-imaghyfgkqznrsxz.jpg', '2023-11-06 10:46:06', '2023-11-06 10:46:06'),
(14, 52, '12186057171699249897_xxl-king-tracksuit-vitaan-original-imagtfr7sj4f3heh.jpg', '2023-11-06 10:51:37', '2023-11-06 10:51:37'),
(15, 52, '12113456481699249897_s-king-tracksuit-vitaan-original-imagrg9hrznssmxx.jpg', '2023-11-06 10:51:37', '2023-11-06 10:51:37'),
(16, 53, '2490105151699250430_l-all-rbcpon-sky-one-nb-nicky-boy-original-imagrdgzzjm3pdnh.jpg', '2023-11-06 11:00:30', '2023-11-06 11:00:30'),
(17, 53, '11713754941699250430_s-all-rbcpon-sky-one-nb-nicky-boy-original-imagrdh5zs5srhna - Copy.jpg', '2023-11-06 11:00:30', '2023-11-06 11:00:30'),
(18, 54, '3254205131699250829_l-t45-nvygy-teemex-original-imagqfpww7pt5zbr.jpg', '2023-11-06 11:07:09', '2023-11-06 11:07:09'),
(19, 54, '19931007221699250829_l-t45-blkgy-teemex-original-imagqfpbnazknghu.jpg', '2023-11-06 11:07:09', '2023-11-06 11:07:09'),
(20, 56, '8205964931699251587_46-10863030-roadster-original-imafnwhjkshyjzfe.jpg', '2023-11-06 11:19:47', '2023-11-06 11:19:47'),
(21, 56, '7374259791699251587_46-10863030-roadster-original-imafnwhjjqpypvf5.jpg', '2023-11-06 11:19:47', '2023-11-06 11:19:47'),
(22, 56, '18357809161699251587_46-10863030-roadster-original-imafnwhj7x6fz6dt.jpg', '2023-11-06 11:19:47', '2023-11-06 11:19:47'),
(23, 56, '2867200241699251741_46-10863030-roadster-original-imafnwhjavbhepmq.jpg', '2023-11-06 11:22:21', '2023-11-06 11:22:21'),
(24, 57, '19892407811699252849_m-no-wmn-jkt-129-red-christy-world-original-imag62vtdsxkv4zy.jpg', '2023-11-06 11:40:49', '2023-11-06 11:40:49'),
(25, 57, '10038682871699252905_xxl-no-wmn-jkt-129-lightpink-christy-world-original-imag62vtgpapzatj.jpg', '2023-11-06 11:41:45', '2023-11-06 11:41:45'),
(26, 58, '19333539361699253117_m-11951210-dressberry-original-imafwwz3rtxsxhtg.jpg', '2023-11-06 11:45:17', '2023-11-06 11:45:17'),
(27, 58, '1579599571699253117_l-11951210-dressberry-original-imafwwz3yfqcpnmp.jpg', '2023-11-06 11:45:17', '2023-11-06 11:45:17'),
(28, 58, '18130252701699253117_s-11951210-dressberry-original-imafwwz4d8d8bmxb.jpg', '2023-11-06 11:45:17', '2023-11-06 11:45:17'),
(29, 58, '16737624541699253117_s-11951210-dressberry-original-imafwwz4yxdwevts.jpg', '2023-11-06 11:45:17', '2023-11-06 11:45:17'),
(30, 59, '15147538661699254121_l-329tk256-selvia-original-imaghughgf3j2bya.webp', '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(31, 59, '7424193471699254121_m-329tk251-selvia-original-imagkxesgfvcbhz9.webp', '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(32, 59, '11316947501699254121_s-329tk253-selvia-original-imagkxetgtpzxpn2.webp', '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(33, 60, '12016428371699254539_l-201-j-turritopsis-original-imagktf2pneupgau.webp', '2023-11-06 12:07:52', '2023-11-06 12:08:59'),
(34, 60, '14160887031699254472_xl-201-j-turritopsis-original-imagkzknyejz2gdr (1).webp', '2023-11-06 12:07:52', '2023-11-06 12:07:52'),
(35, 60, '14425475521699254472_xl-201-j-turritopsis-original-imagkzknyejz2gdr.webp', '2023-11-06 12:07:52', '2023-11-06 12:07:52'),
(36, 60, '15468526301699254472_l-201-j-turritopsis-original-imagktf2cxrzgdq4.webp', '2023-11-06 12:07:52', '2023-11-06 12:07:52'),
(37, 60, '5753018211699254472_l-201-j-turritopsis-original-imagktf2pneupgau.webp', '2023-11-06 12:07:52', '2023-11-06 12:07:52'),
(38, 61, '5199335211699255648_kegtv_512.webp', '2023-11-06 12:26:00', '2023-11-06 12:27:28'),
(39, 61, '7411197051699255560_product-jpeg.jpg', '2023-11-06 12:26:00', '2023-11-06 12:26:00'),
(40, 61, '7702359721699255648_vpqgc_512.webp', '2023-11-06 12:26:00', '2023-11-06 12:27:28'),
(41, 62, '20620711021699256191_S750b8b11bb334aa0808c6f543b9c052aj.jpg_640x640Q90.jpg_.webp', '2023-11-06 12:36:31', '2023-11-06 12:36:31'),
(42, 62, '5331864671699256191_ball_gown_blue_wedding_dress_evening_party_1575031242_91598a8a_progressive.jpg', '2023-11-06 12:36:31', '2023-11-06 12:36:31'),
(43, 62, '18393723421699256191_Hd549e04c774d48e89384ffe4e858a3e4S.webp', '2023-11-06 12:36:31', '2023-11-06 12:36:31'),
(44, 63, '1814402031699256829_36-jk9006-ovida-original-imagdff4z9x8srxq.webp', '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(45, 63, '14018328571699256829_xxl-jk9006grey-xxl-bombshell-original-imagdff4mj59gezz.webp', '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(46, 63, '20731003301699256829_36-jk9006-ovida-original-imagdff4jbj4czza.webp', '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(47, 64, '17546001961699268978_l-h-track-pant-sets-1012-styleaone-original-imag79yhjwwfg3wd.webp', '2023-11-06 16:09:38', '2023-11-06 16:09:38'),
(48, 64, '354211891699268978_xl-h-track-pant-sets-1012-styleaone-original-imag79yhetrrey9z-bb.webp', '2023-11-06 16:09:38', '2023-11-06 16:09:38'),
(49, 64, '5578473221699268978_l-h-track-pant-sets-1012-styleaone-original-imag79yhaz9zx9nb-bb.webp', '2023-11-06 16:09:38', '2023-11-06 16:09:38'),
(50, 66, '15811425931699270367_attractive-printed-formal-sling-bag-ls-223-slnbg-mkri-prnt-whte-original-imagjz9yg5mskxz2.webp', '2023-11-06 16:32:47', '2023-11-06 16:32:47'),
(51, 66, '4532041871699270367_attractive-printed-formal-sling-bag-1-21-0-ls-223-slnbg-mkri-original-imagtmxh498dxz7c.webp', '2023-11-06 16:32:47', '2023-11-06 16:32:47'),
(52, 66, '15962774921699270367_-original-imagkycgt5a9gqbk.webp', '2023-11-06 16:32:47', '2023-11-06 16:32:47'),
(53, 66, '6792611501699270367_attractive-printed-formal-sling-bag-1-21-0-ls-223-slnbg-mkri-original-imagtn5yngznx646.webp', '2023-11-06 16:32:47', '2023-11-06 16:32:47'),
(54, 67, '15559817601699270903_34-2-taj-nakashi-women-s-office-bag-41-9-zouk-5-4-original-imagjkeahcgkwdzs.webp', '2023-11-06 16:41:43', '2023-11-06 16:41:43'),
(55, 67, '16429643891699270903_jute-and-vegan-leather-office-bag-for-women-for-15-6-inch-laptop-original-imagjhpdhsveztnb.webp', '2023-11-06 16:41:43', '2023-11-06 16:41:43'),
(56, 67, '6123281271699270903_jute-and-vegan-leather-office-bag-for-women-for-15-6-inch-laptop-original-imag95eumttfzxvy.webp', '2023-11-06 16:41:43', '2023-11-06 16:41:43'),
(57, 67, '6645145001699270903_-original-imagkycgvsa8g5my.webp', '2023-11-06 16:41:43', '2023-11-06 16:41:43'),
(58, 68, '12104617041699272144_women-s-sling-bag-1-10-msf-065-lpk-sling-bag-fommil-5-original-imaghzfyapc7xzge.webp', '2023-11-06 17:02:24', '2023-11-06 17:02:24'),
(59, 68, '10929688621699272144_women-s-sling-bag-1-10-msf-065-ab-sling-bag-fommil-5-original-imaghzf8n9fhgmj3.webp', '2023-11-06 17:02:24', '2023-11-06 17:02:24'),
(60, 69, '12629743361699274044_lwhb02398black-lwhb02398black-shoulder-bag-lino-perros-original-imag7f42ez7zvbap.webp', '2023-11-06 17:34:04', '2023-11-06 17:34:04'),
(61, 69, '3870066741699274044_lwhb02398black-lwhb02398black-shoulder-bag-lino-perros-original-imag7f42rfq2t9af.webp', '2023-11-06 17:34:04', '2023-11-06 17:34:04'),
(62, 70, '15899332071699334406_2-3-years-mrv-fls-102-3-marvel-by-miss-chief-original-imagpegmzwmyhd3e.webp', '2023-11-07 10:20:06', '2023-11-07 10:20:06'),
(63, 70, '9819499401699334406_2-3-years-mrv-fls-102-3-marvel-by-miss-chief-original-imagpegmc4cdjm3p.webp', '2023-11-07 10:20:06', '2023-11-07 10:20:06'),
(64, 71, '20367768391699334633_9-10-years-na-41741-smartraho-original-imagzgckeru4z5dh.webp', '2023-11-07 10:23:53', '2023-11-07 10:23:53'),
(65, 71, '6806593261699334633_9-10-years-na-41741-smartraho-original-imagzgcksyzrtptz.webp', '2023-11-07 10:23:53', '2023-11-07 10:23:53'),
(66, 72, '12511144291699335056_5-6-years-swt-fs-a0-p1-x2o-original-imagb8hehzdmghky.webp', '2023-11-07 10:30:56', '2023-11-07 10:30:56'),
(67, 72, '3722896861699335056_11-12-years-swt-fs-a0-p1-x2o-original-imagb8he5fgwzrgy.webp', '2023-11-07 10:30:56', '2023-11-07 10:30:56'),
(68, 73, '2199831971699336533_octopus-huggable-reversible-teddy-toy-tiny-miny-original-imaggp5j2dzby9hq.webp', '2023-11-07 10:55:33', '2023-11-07 10:55:33'),
(69, 73, '13253116441699336533_octopus-soft-teddy-toy-18-tiny-miny-original-imaggthurxwf79zq.webp', '2023-11-07 10:55:33', '2023-11-07 10:55:33'),
(70, 74, '12881055381699337138_plush-toy-pillow-reversible-bunny-soft-toy-for-kids-35-jp-global-original-imagtnnc2kpjxaed.webp', '2023-11-07 11:05:38', '2023-11-07 11:05:38'),
(71, 74, '320426441699337138_plush-toy-pillow-reversible-bunny-soft-toy-for-kids-35-jp-global-original-imagtnnch6c4qbcq.webp', '2023-11-07 11:05:38', '2023-11-07 11:05:38'),
(72, 75, '14664955041699338818_peppa-pig-george-pig-stuffed-soft-toy-pig-family-gift-for-kids-original-imag3b7hnsfyqaev.webp', '2023-11-07 11:33:38', '2023-11-07 11:33:38'),
(73, 75, '6782842661699338818_george-peppa-famliy-soft-toys-for-kid-s-long-soft-lovable-original-imag3zggzh7hzrb5.webp', '2023-11-07 11:33:38', '2023-11-07 11:33:38'),
(74, 75, '13084597911699338818_peppa-pig-family-plush-gift-box-combo-multi-color-32-luasa-original-imag5hf3e7gwyuz6.webp', '2023-11-07 11:33:38', '2023-11-07 11:33:38'),
(75, 76, '9549268911699339999_panda-teddy-bear-soft-toys-for-girls-small-cute-squishy-panda-original-imagr4zc6hqaqssx.webp', '2023-11-07 11:53:19', '2023-11-07 11:53:19'),
(77, 65, '187826331699429806_BR0563_2_1024x1024.webp', '2023-11-08 12:50:06', '2023-11-08 12:50:06'),
(78, 78, '21253010871699437360_6-01321-bot-shozie-grey-white-original-imaghyahf2tnn4pm.webp', '2023-11-08 14:56:00', '2023-11-08 14:56:00'),
(79, 78, '1408059801699437360_6-01321-bot-shozie-grey-white-original-imaghyahhg6wqc6f.webp', '2023-11-08 14:56:00', '2023-11-08 14:56:00'),
(80, 78, '8561825141699437360_6-01321-bot-shozie-grey-white-original-imaghyah89ug4bqy.webp', '2023-11-08 14:56:00', '2023-11-08 14:56:00'),
(81, 79, '5433563141699438409_3-r-374-36-picktoes-pink-original-imag55jzk3nckmfm.webp', '2023-11-08 15:13:29', '2023-11-08 15:13:29'),
(82, 79, '6252312351699438409_3-r-374-36-picktoes-pink-original-imag55jztezarfth.webp', '2023-11-08 15:13:29', '2023-11-08 15:13:29'),
(83, 79, '2704092921699438409_3-r-374-36-picktoes-pink-original-imag55jzsyhrzyaf.webp', '2023-11-08 15:13:29', '2023-11-08 15:13:29'),
(84, 79, '1484301571699438409_3-r-374-36-picktoes-pink-original-imag55jzpsrgmz4j.webp', '2023-11-08 15:13:29', '2023-11-08 15:13:29'),
(85, 79, '6317357321699438409_3-r-374-36-picktoes-pink-original-imag55jzshbbc5jg.webp', '2023-11-08 15:13:29', '2023-11-08 15:13:29'),
(86, 80, '18806160171699439277_4-5613823-4-bata-tan-original-imag6fzbxb4a5gez.webp', '2023-11-08 15:27:57', '2023-11-08 15:27:57'),
(87, 80, '2265562591699439277_4-5613823-4-bata-tan-original-imag6fzb8bk58gks.webp', '2023-11-08 15:27:57', '2023-11-08 15:27:57'),
(88, 80, '5194695251699439277_7-5613823-7-bata-tan-original-imag6ht9gpvj4gad.webp', '2023-11-08 15:27:57', '2023-11-08 15:27:57'),
(89, 77, '7858546461699450681_BR0326_3_1024x1024.webp', '2023-11-08 18:38:01', '2023-11-08 18:38:01'),
(90, 77, '3921734801699450681_BR0326_2_1024x1024.webp', '2023-11-08 18:38:01', '2023-11-08 18:38:01'),
(91, 81, '2446850921699521944_R0279_2_1024x1024.webp', '2023-11-09 14:25:44', '2023-11-09 14:25:44'),
(92, 82, '17121865681699522254_R0706_5_1024x1024.webp', '2023-11-09 14:30:54', '2023-11-09 14:30:54'),
(93, 82, '5405682841699522254_R0706_4_1024x1024.webp', '2023-11-09 14:30:54', '2023-11-09 14:30:54'),
(94, 82, '3924135761699522254_R0706_3_1024x1024.webp', '2023-11-09 14:30:54', '2023-11-09 14:30:54'),
(95, 83, '9118017991699522873_R0282_4_1024x1024.webp', '2023-11-09 14:41:13', '2023-11-09 14:41:13'),
(96, 83, '2501633761699522873_R0282_3_1024x1024.webp', '2023-11-09 14:41:13', '2023-11-09 14:41:13'),
(97, 83, '12889979901699522873_R0282_2_1024x1024.webp', '2023-11-09 14:41:13', '2023-11-09 14:41:13'),
(98, 84, '5641192791699523760_GDLPD0180_2_1024x1024.jpg', '2023-11-09 14:56:00', '2023-11-09 14:56:00'),
(99, 84, '10153417241699523760_GDLPD0180_5_1024x1024.webp', '2023-11-09 14:56:00', '2023-11-09 14:56:00'),
(100, 85, '12960724031700033977_AT00154-SS0000-shirin-e-bracelet-in--silver-prd-1-model.jpg', '2023-11-15 12:39:37', '2023-11-15 12:39:37'),
(101, 85, '13400658441700033977_AT00154-SS0000-shirin-e-bracelet-in--silver-prd-5-pd.jpg', '2023-11-15 12:39:37', '2023-11-15 12:39:37'),
(102, 85, '3094660931700033977_AT00154-SS0000-shirin-e-bracelet-in--silver-prd-6-pd.jpg', '2023-11-15 12:39:37', '2023-11-15 12:39:37'),
(103, 85, '6425905991700033977_AT00154-SS0000-shirin-e-bracelet-in--silver-prd-4-pd.jpg', '2023-11-15 12:39:37', '2023-11-15 12:39:37'),
(104, 86, '5926035851700054048_AT00296-SS0000-a-pearl-of-love-mm-bracelet-in--silver-prd-1-model.jpg', '2023-11-15 18:14:08', '2023-11-15 18:14:08'),
(105, 86, '19024842181700054048_AT00296-SS0000-a-pearl-of-love-mm-bracelet-in--silver-prd-6-pd.jpg', '2023-11-15 18:14:08', '2023-11-15 18:14:08'),
(106, 86, '18887135871700054048_AT00296-SS0000-a-pearl-of-love-mm-bracelet-in--silver-prd-5-pd.jpg', '2023-11-15 18:14:08', '2023-11-15 18:14:08'),
(107, 86, '13753369781700054048_AT00296-SS0000-a-pearl-of-love-mm-bracelet-in--silver-prd-3-pd.jpg', '2023-11-15 18:14:08', '2023-11-15 18:14:08'),
(108, 87, '18233250221700481611_ER0583R_3_1024x1024.webp', '2023-11-20 17:00:11', '2023-11-20 17:00:11'),
(109, 87, '2258665461700481611_ER0583_2_1024x1024.webp', '2023-11-20 17:00:11', '2023-11-20 17:00:11'),
(110, 88, '14986455381700484913_R0251_3_1024x1024.webp', '2023-11-20 17:55:13', '2023-11-20 17:55:13'),
(111, 88, '6553272661700484913_R0251_4_1024x1024.webp', '2023-11-20 17:55:13', '2023-11-20 17:55:13'),
(112, 88, '6245006631700484913_R0251_2_1024x1024.webp', '2023-11-20 17:55:13', '2023-11-20 17:55:13'),
(113, 89, '3163488811700629961_PD0468_ER0617_4_e72530a9-992d-4f64-94d0-46ffcc1d76c0_1024x1024.webp', '2023-11-22 10:12:41', '2023-11-22 10:12:41'),
(114, 89, '14269911721700629961_PD0468_ER0617_3_1024x1024.webp', '2023-11-22 10:12:41', '2023-11-22 10:12:41'),
(115, 89, '15393521391700629961_PD0468_ER0617_2_1024x1024.webp', '2023-11-22 10:12:41', '2023-11-22 10:12:41'),
(116, 90, '739292591700633614_SET092_2_1024x1024.webp', '2023-11-22 11:13:34', '2023-11-22 11:13:34'),
(117, 90, '17014654561700633614_SET092_3_1024x1024.webp', '2023-11-22 11:13:34', '2023-11-22 11:13:34'),
(118, 91, '1872920251700634288_ER0752_3_1024x1024.webp', '2023-11-22 11:24:48', '2023-11-22 11:24:48'),
(119, 91, '4353229091700634288_ER0752_4_1024x1024.webp', '2023-11-22 11:24:48', '2023-11-22 11:24:48'),
(120, 91, '18566612161700634288_ER0752_2_1024x1024.webp', '2023-11-22 11:24:48', '2023-11-22 11:24:48'),
(121, 91, '19476606021700634288_ER0752_1_1024x1024.webp', '2023-11-22 11:24:48', '2023-11-22 11:24:48'),
(122, 92, '1710908721701156098_m-11990408-roadster-original-imafzfnjhuyuhdx3.webp', '2023-11-28 12:21:38', '2023-11-28 12:21:38'),
(123, 92, '17849667201701156098_m-11990408-roadster-original-imafzfnjhxjsphwg.webp', '2023-11-28 12:21:38', '2023-11-28 12:21:38'),
(125, 93, '15377293431701156557_-original-imaguzaaxvf3wfgd.webp', '2023-11-28 12:27:04', '2023-11-28 12:29:17'),
(126, 93, '17277194091701156424_l-ttjk001011-tokyo-talkies-original-imagfbwwmjmttgc6.webp', '2023-11-28 12:27:04', '2023-11-28 12:27:04'),
(127, 93, '19443557241701156424_l-ttjk001011-tokyo-talkies-original-imagfbww5yjjxqjh.webp', '2023-11-28 12:27:04', '2023-11-28 12:27:04'),
(128, 93, '3038838931701156424_l-ttjk001011-tokyo-talkies-original-imagfbwwhaarwgjq.webp', '2023-11-28 12:27:04', '2023-11-28 12:27:04'),
(129, 93, '9928721801701156424_l-ttjk001011-tokyo-talkies-original-imagfbwwesd7kg5d.webp', '2023-11-28 12:27:04', '2023-11-28 12:27:04'),
(130, 94, '2549565901701157824_m-9478895-roadster-original-imafmqf7je3fhhbf.webp', '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(131, 94, '8687931051701157824_l-9478895-roadster-original-imafmqf7r6vu4rmj.webp', '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(132, 94, '8368909001701157824_xl-9478895-roadster-original-imafmqf7zsqrs4rm.webp', '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(133, 94, '3755623671701157824_s-9478895-roadster-original-imafmqf7ddcdfztr.webp', '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(134, 96, '608306141701240929_1-3-android-ios-bsw034-fire-boltt-no-original-imagd6hfwmybyjj5.webp', '2023-11-29 11:55:29', '2023-11-29 11:55:29'),
(135, 96, '11394521041701240929_-original-imagsqcrrvmnqggu.webp', '2023-11-29 11:55:29', '2023-11-29 11:55:29'),
(136, 96, '4444528441701240929_-original-imagkfm8xgcu53v2.webp', '2023-11-29 11:55:29', '2023-11-29 11:55:29'),
(137, 96, '8654181941701240929_-original-imagrden687red7c.webp', '2023-11-29 11:55:29', '2023-11-29 11:55:29'),
(138, 97, '6582664441701241163_-original-imaggaqtw3rgv4sa.webp', '2023-11-29 11:59:23', '2023-11-29 11:59:23'),
(139, 97, '16234387791701241163_-original-imaggaqttyxuepev.webp', '2023-11-29 11:59:23', '2023-11-29 11:59:23'),
(140, 97, '4647609511701241163_-original-imaggaqt9x6h6kh3.webp', '2023-11-29 11:59:23', '2023-11-29 11:59:23'),
(141, 97, '11927708271701241163_-original-imaggaqtcxywjevg.webp', '2023-11-29 11:59:23', '2023-11-29 11:59:23'),
(142, 98, '1154091091701241927_38024pp25-fastrack-men-original-imag6cu92rjkevfg.webp', '2023-11-29 12:12:07', '2023-11-29 12:12:07'),
(143, 98, '2782285511701241927_38024pp25-fastrack-men-original-imag6cu9aw8ja7ep.webp', '2023-11-29 12:12:07', '2023-11-29 12:12:07'),
(144, 98, '7180461791701241927_-original-imags7pugr9zryg7.webp', '2023-11-29 12:12:07', '2023-11-29 12:12:07'),
(145, 98, '14473407721701241927_38024pp25-fastrack-men-original-imag6cu9vbf5jhfs.webp', '2023-11-29 12:12:07', '2023-11-29 12:12:07'),
(148, 99, '9734910321701251823_9f1d5895-2213-4cf7-9626-0c89eaab96231618306562001-Inddus-Women-Blue-Solid-Silk-Gown-with-Embroidered-Jacket-81-5.webp', '2023-11-29 14:57:03', '2023-11-29 14:57:03'),
(149, 99, '3887613781701251823_f5fa75e5-8a8f-48d6-aa71-37429ec069ba1618306562023-Inddus-Women-Blue-Solid-Silk-Gown-with-Embroidered-Jacket-81-4.webp', '2023-11-29 14:57:03', '2023-11-29 14:57:03'),
(150, 99, '15022731021701251823_gown.webp', '2023-11-29 14:57:03', '2023-11-29 14:57:03'),
(151, 100, '11034296581701252940_m-luk101-lukonn-original-imagt3q2usewkxzm.webp', '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(152, 100, '12469406451701252940_l-luk101-lukonn-original-imagt3q2z8jttxhv.webp', '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(153, 101, '2488916031701253236_xl-regular-top-fab-star-original-imagyry2vuckngxj.webp', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(154, 101, '18069929141701253236_xl-regular-top-fab-star-original-imagyry2zzjgdxfy.webp', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(155, 101, '4511590011701253236_xl-regular-top-fab-star-original-imagyry24agtgy7s.webp', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(156, 101, '6756804281701253236_xl-regular-top-fab-star-original-imagyry2a7esubfg.webp', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(157, 101, '10584056281701253236_xl-regular-top-fab-star-original-imagyry2fm84svc2.webp', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(158, 102, '17329971031701253394_2.webp', '2023-11-29 15:23:14', '2023-11-29 15:23:14'),
(159, 102, '10085006151701253394_3.jpg', '2023-11-29 15:23:14', '2023-11-29 15:23:14'),
(160, 103, '11725998861701253455_m-sc-1001-sancia-collection-original-imafzwjcgrhz4p9z.webp', '2023-11-29 15:24:15', '2023-11-29 15:24:15'),
(161, 103, '8336487101701253455_m-sc-1001-sancia-collection-original-imafzwjch6snrghz.webp', '2023-11-29 15:24:15', '2023-11-29 15:24:15'),
(162, 103, '19075919011701253455_m-sc-1001-sancia-collection-original-imafzwjcwzygds3x.webp', '2023-11-29 15:24:15', '2023-11-29 15:24:15'),
(163, 104, '7039908471701253746_xl-tttp003846-tokyo-talkies-original-imafutjsarbwskh6.webp', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(164, 104, '13713296691701253746_xl-tttp003846-tokyo-talkies-original-imafutjsanuwhhfm.webp', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(165, 104, '9983131701253746_xl-tttp003846-tokyo-talkies-original-imafutjs2ezbevyw.webp', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(166, 104, '2579529111701253746_m-tttp003846-tokyo-talkies-original-imafutjsbuac7vbw.webp', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(167, 104, '12203202341701253746_xl-tttp003846-tokyo-talkies-original-imafutjsva9hkzhp.webp', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(168, 105, '14084282711701253984_2.jpg', '2023-11-29 15:33:04', '2023-11-29 15:33:04'),
(169, 105, '17031281871701253984_5.webp', '2023-11-29 15:33:04', '2023-11-29 15:33:04'),
(170, 105, '3804583391701253984_6.webp', '2023-11-29 15:33:04', '2023-11-29 15:33:04'),
(171, 105, '6142474771701253984_7.webp', '2023-11-29 15:33:04', '2023-11-29 15:33:04'),
(172, 106, '20959317311701254736_1.webp', '2023-11-29 15:45:36', '2023-11-29 15:45:36'),
(173, 106, '5628304411701254736_2.webp', '2023-11-29 15:45:36', '2023-11-29 15:45:36'),
(175, 107, '10496501161701255318_2.webp', '2023-11-29 15:55:18', '2023-11-29 15:55:18'),
(176, 108, '9580416541701255775_2.webp', '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(177, 108, '6729871291701255775_3.webp', '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(178, 108, '9156785131701255775_4.webp', '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(179, 108, '20364960211701255775_5.webp', '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(180, 109, '18215232611701256102_2.webp', '2023-11-29 16:08:22', '2023-11-29 16:08:22'),
(181, 110, '13170777271701257069_2.webp', '2023-11-29 16:24:29', '2023-11-29 16:24:29'),
(182, 111, '20202584741701257522_1.webp', '2023-11-29 16:32:02', '2023-11-29 16:32:02'),
(183, 111, '16890751661701257523_4.webp', '2023-11-29 16:32:03', '2023-11-29 16:32:03'),
(184, 111, '4342812451701257523_5.webp', '2023-11-29 16:32:03', '2023-11-29 16:32:03'),
(185, 111, '1921617171701257523_6.webp', '2023-11-29 16:32:03', '2023-11-29 16:32:03'),
(187, 112, '11658983511701258019_2.webp', '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(188, 112, '20240816251701258019_3.webp', '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(189, 112, '191210541701258019_4.webp', '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(190, 112, '18256146091701258019_5.webp', '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(191, 113, '4061891901701258456_1.webp', '2023-11-29 16:47:36', '2023-11-29 16:47:36'),
(193, 113, '10450409721701258456_4.webp', '2023-11-29 16:47:36', '2023-11-29 16:47:36'),
(194, 113, '210051821701258456_5.webp', '2023-11-29 16:47:36', '2023-11-29 16:47:36'),
(196, 114, '14481794261701258712_2.webp', '2023-11-29 16:51:52', '2023-11-29 16:51:52'),
(197, 114, '11484152721701258712_3.webp', '2023-11-29 16:51:52', '2023-11-29 16:51:52'),
(198, 114, '16776849521701258712_4.webp', '2023-11-29 16:51:52', '2023-11-29 16:51:52'),
(199, 114, '19776960101701258712_5.webp', '2023-11-29 16:51:52', '2023-11-29 16:51:52'),
(200, 115, '2418135921701258942_1.webp', '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(201, 115, '12490158921701258942_3.webp', '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(202, 115, '1459506171701258942_4.webp', '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(203, 116, '6329537241701259339_2.webp', '2023-11-29 17:02:19', '2023-11-29 17:02:19'),
(204, 116, '13959425251701259339_3.webp', '2023-11-29 17:02:19', '2023-11-29 17:02:19'),
(205, 116, '13038808031701259339_4.webp', '2023-11-29 17:02:19', '2023-11-29 17:02:19'),
(206, 116, '4397580331701259339_5.webp', '2023-11-29 17:02:19', '2023-11-29 17:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_specification`
--

CREATE TABLE `product_specification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `specification_name` varchar(255) DEFAULT NULL,
  `specification_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_specification`
--

INSERT INTO `product_specification` (`id`, `product_id`, `specification_name`, `specification_description`, `created_at`, `updated_at`) VALUES
(2, 49, 'Men Solid Quilted Jacket', 'Men Solid Quilted Jacket', '2023-11-06 10:18:59', '2023-11-21 12:43:49'),
(3, 50, 'Men Solid Denim Jacket', 'Men Solid Denim Jacket', '2023-11-06 10:34:49', '2023-11-06 16:43:58'),
(4, 51, 'Solid Men Track Suit', 'Solid Men Track Suit', '2023-11-06 10:46:06', '2023-11-06 10:46:06'),
(5, 52, 'Men\'s Track pants with T-shirt', 'Men\'s Track pants with T-shirt', '2023-11-06 10:51:37', '2023-11-06 10:52:24'),
(6, 53, 'Men Printed Round Neck Cotton Blend Yellow T-Shirt', 'Men Printed Round Neck Cotton Blend Yellow T-Shirt', '2023-11-06 11:00:30', '2023-11-11 12:19:16'),
(7, 54, 'Men Colorblock Polo Neck Cotton Blend Black, Blue T-Shirt', 'Men Colorblock Polo Neck Cotton Blend Black,  Blue T-Shirt', '2023-11-06 11:07:09', '2023-11-14 17:00:08'),
(8, 55, 'Men Slim Fit Solid Spread Collar Casual Shirt', 'Men Slim Fit Solid Spread Collar Casual Shirt', '2023-11-06 11:15:02', '2023-11-06 11:15:02'),
(9, 56, 'Men Regular Fit Checkered Spread Collar Casual Shirt', 'Men Regular Fit Checkered Spread Collar Casual Shirt', '2023-11-06 11:19:47', '2023-11-06 11:22:21'),
(10, 57, 'Women Solid Quilted Jacket', 'Women Solid Quilted Jacket', '2023-11-06 11:40:49', '2023-11-06 11:41:45'),
(11, 58, 'Women Colorblock Bomber Jacket', 'Women Colorblock Bomber Jacket', '2023-11-06 11:45:17', '2023-11-06 11:45:17'),
(12, 59, 'Women Regular Fit Solid Spread Collar Casual Shirt', 'Women Regular Fit Solid Spread Collar Casual Shirt', '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(13, 60, 'Women Boxy, Regular Fit Printed Lapel Collar Casual Shirt', 'Women Boxy, Regular Fit Printed Lapel Collar Casual Shirt', '2023-11-06 12:07:52', '2023-11-06 12:09:29'),
(14, 61, 'Red color beautiful gown', 'Red color beautiful gown', '2023-11-06 12:26:00', '2023-11-11 12:10:33'),
(15, 62, 'women\'s blue evening gown', 'women\'s blue evening gown', '2023-11-06 12:36:31', '2023-11-06 12:36:31'),
(16, 63, 'Women Track Suit', 'Women Track Suit', '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(17, 64, 'Printed, Embroidered Women Track Suit', 'Printed, Embroidered Women Track Suit', '2023-11-06 16:09:38', '2023-11-06 16:11:00'),
(18, 66, 'Black Women Sling Bag', 'Black Women Sling Bag', '2023-11-06 16:32:47', '2023-11-06 16:36:43'),
(19, 67, 'Women Multicolor Handbag - Extra Spacious', 'Women Multicolor Handbag - Extra Spacious', '2023-11-06 16:41:43', '2023-11-06 16:43:43'),
(20, 68, 'Women Sling Bag', 'Women Sling Bag', '2023-11-06 17:02:24', '2023-11-06 17:03:00'),
(21, 69, 'Women Beige Pouch Potli', 'Women Beige Pouch Potli', '2023-11-06 17:34:04', '2023-11-06 17:34:04'),
(22, 70, 'Boys Cartoon/Superhero Cotton Blend T Shirt  (Multicolor, Pack of 3)', 'Boys Cartoon/Superhero Cotton Blend T Shirt  (Multicolor, Pack of 3)', '2023-11-07 10:20:06', '2023-11-07 10:20:06'),
(23, 71, 'Boys Colorblock Pure Cotton T Shirt  (Multicolor, Pack of 1)', 'Boys Colorblock Pure Cotton T Shirt  (Multicolor, Pack of 1)', '2023-11-07 10:23:53', '2023-11-16 10:51:57'),
(24, 72, 'Boys & Girls Full Sleeve Printed Sweatshirt', 'Boys & Girls Full Sleeve Printed Sweatshirt', '2023-11-07 10:30:56', '2023-11-15 13:56:22'),
(25, 73, 'soft toys', 'Xivir Reversible Plushie Cute Octopus Double Sided Flip Reversed Stuffed Animal - 12 cm  (Pink-Sky Blue)', '2023-11-07 10:55:33', '2023-11-07 10:59:00'),
(26, 74, 'soft toys for your kids', 'JP GLOBAL Plush Toy Pillow Reversible Bunny Soft Toy For Kids - 25 cm  (Strawberry) soft toys for your kids', '2023-11-07 11:05:38', '2023-11-07 11:05:38'),
(27, 75, 'soft toys for your kids', 'Hug \'n\' Feel Long Soft Lovable hugable Cute Giant Life Size Teddy Bear(New Soft Toys, Family) - 30 cm  (Multicolor) soft toys', '2023-11-07 11:33:38', '2023-11-07 11:33:38'),
(28, 76, 'soft toys for your kids', 'Liquortees Panda Teddy bear soft toys for girls Small Cute squishy panda teddy - 30 cm  (Black & White)', '2023-11-07 11:53:19', '2023-11-07 11:53:19'),
(29, 65, 'test1', 'test', '2023-11-07 18:28:18', '2023-11-20 17:23:21'),
(31, 78, 'Party Wear Stylish College Casual Sneakers Shoes Sneakers For Women  (Grey, White)', 'Party Wear Stylish College Casual Sneakers Shoes Sneakers For Women  (Grey, White)', '2023-11-08 14:56:00', '2023-11-11 09:38:20'),
(32, 79, 'Women Pink Heels Sandal', 'Women Pink Heels Sandal', '2023-11-08 15:13:29', '2023-11-15 16:17:26'),
(33, 80, 'Women Tan Flats Sandal', 'Women Tan Flats Sandal', '2023-11-08 15:27:57', '2023-11-11 09:16:31'),
(34, 81, 'Rose Gold Floral Chic Ring', 'Rose Gold Floral Chic Ring', '2023-11-09 14:25:44', '2023-11-20 17:26:45'),
(35, 82, 'The Rose Gold Ruby Red Spin Ring', 'The Rose Gold Ruby Red Spin Ring is inspired by the beautiful festive decorations.', '2023-11-09 14:30:54', '2023-11-09 14:30:54'),
(36, 83, 'gold ring', 'The Golden Butterfly In Love Ring is inspired by the fluttering wings of a butterfly when love\'s all around!', '2023-11-09 14:41:13', '2023-11-09 14:48:57'),
(37, 84, 'This gold pendant has a classic flower motif set with lab-grown diamonds.', 'This gold pendant has a classic flower motif set with lab-grown diamonds. BIS-Hallmarked Gold Jewellery Lab-grown diamonds Our 14K solid gold pieces are made to last forever. 14K gold will not oxidise or discolour so you can wear your jewellery daily. Pendant Size: Height - 1.9 cm, Pendant Width - 1.2 cm  Comes with the GIVA Jewellery kit and authenticity certificate Content: Pendant Net Qty- 1 unit Styling Tip: Style this gold & diamond pendant with your office wear.  *Neck chain is not a part of the product and can be bought separately.', '2023-11-09 14:56:00', '2023-11-09 14:56:00'),
(38, 85, 'Silver Floral Cuff Bracelet.', 'Crafted in 925 Oxidised Silver with Fresh Water Pearls. Uniquely handcrafted, no two pieces are exactly alike!', '2023-11-15 12:39:37', '2023-11-15 12:39:37'),
(39, 86, 'Minimalistic Freshwater Pearl Chain Bracelet.', 'Minimalistic Freshwater Pearl Chain Bracelet. Crafted in 925 Silver with a High Polish Silver Finish. Uniquely handcrafted, no two pieces are exactly alike!', '2023-11-15 18:14:08', '2023-11-15 18:14:08'),
(40, 87, 'These Rose Gold Drop Wreath Studs are inspired by the most special moments of life that make it all worth it.', 'Style:  Take these along for those special, close-to-heart', '2023-11-20 17:00:11', '2023-11-20 17:00:11'),
(41, 88, 'The Golden Glowing in Love Couple Rings have the most elegant design with a gold finish and a beautifully studded zircon for both rings', 'The Golden Glowing in Love Couple Rings have the most elegant design with a gold finish and a beautifully studded zircon for both rings.  925 Sterling Silver with Gold plating Adjustable size to ensure no fitting issues AAA+ Quality Zircons Male Ring: 18 mm+ Adjustable Female Ring: 16 mm+ Adjustable  Comes with the GIVA Jewellery kit and authenticity certificate', '2023-11-20 17:55:13', '2023-11-20 17:55:13'),
(42, 89, '925 Silver with Rose Gold Plating', 'The Royal Pink Set embodies the grace of 925 Sterling Silver with the royalty of Rose Gold. The stones are no less regal for they are Red Tourmaline.', '2023-11-22 10:12:41', '2023-11-22 10:12:41'),
(43, 90, 'This Rose Gold Baguette Flower Set is handcrafted with love, just for YOU!', 'This Rose Gold Baguette Flower Set is handcrafted with love, just for YOU! Featuring a sparkling zircon centrepiece nestled within baguette petals, the pendant and earrings are pure joy. The rose gold finish simply adds to its charm.', '2023-11-22 11:13:34', '2023-11-22 11:13:34'),
(44, 91, 'The Rose Gold Bow Dangler Earrings', 'he Rose Gold Bow Dangler Earrings have a bow-shaped stud holding a pair of zircon pieces dangling there', '2023-11-22 11:24:48', '2023-11-22 11:24:48'),
(45, 92, 'roadster jacket', 'roadster jacket', '2023-11-28 12:20:52', '2023-11-28 12:21:38'),
(46, 93, 'Denim jackets for women', 'Denim jackets for women', '2023-11-28 12:26:27', '2023-11-28 12:29:17'),
(47, 94, 'winter jackets', 'winter jackets', '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(48, 96, 'Fire-Boltt Hurricane 1.3\" Curved Glass Display with 360 Health Training, 100+ Sports Modes Smartwatch  (Grey Strap, Free Size)', 'Fire-Boltt Hurricane 1.3\" Curved Glass Display with 360 Health Training, 100+ Sports Modes Smartwatch  (Grey Strap, Free Size)', '2023-11-29 11:55:29', '2023-11-29 11:55:29'),
(49, 97, 'smart watch', 'smart watch', '2023-11-29 11:59:23', '2023-11-29 11:59:23'),
(50, 98, 'Minimalists Analog Watch', 'Minimalists Analog Watch', '2023-11-29 12:12:07', '2023-11-29 12:19:55'),
(51, 99, 'Blue Embroidered Gown with Heavy Embroidered Jacket', 'Blue Embroidered Gown with Heavy Embroidered Jacket', '2023-11-29 14:57:03', '2023-11-29 15:00:23'),
(52, 100, 'top', 'top', '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(53, 101, 'Casual Regular Sleeves Solid Women Pink Top', 'Casual Regular Sleeves Solid Women Pink Top', '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(54, 102, 'Women Blue Sequin Embroidered Yoke with Accordion Pleated Tiered Dress', 'Women Blue Sequin Embroidered Yoke with Accordion Pleated Tiered Dress', '2023-11-29 15:23:14', '2023-11-29 15:23:14'),
(55, 103, 'Casual Regular Sleeves Striped Women Multicolor Top', 'Casual Regular Sleeves Striped Women Multicolor Top', '2023-11-29 15:24:15', '2023-11-29 15:24:15'),
(56, 104, 'Casual Regular Sleeves Solid Women White Top', 'Casual Regular Sleeves Solid Women White Top', '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(57, 105, 'Embellished Geometric Pure Georgette Dhoti Saree With Blouse', 'Embellished Geometric Pure Georgette Dhoti Saree With Blouse', '2023-11-29 15:33:04', '2023-11-29 15:38:54'),
(58, 106, 'X Shraddha Kapoor Pink & Gold-Toned Beads & Stones Ready to Wear Embroidered Cape Saree Tunic', 'X Shraddha Kapoor Pink & Gold-Toned Beads & Stones Ready to Wear Embroidered Cape Saree Tunic', '2023-11-29 15:45:36', '2023-11-29 15:45:36'),
(59, 107, 'Red & Maroon Ready-to-Wear Saree With Tasseld Necklace', 'Red & Maroon Ready-to-Wear Saree With Tasseld Necklace', '2023-11-29 15:55:18', '2023-11-29 15:55:58'),
(60, 108, 'Black Ready To Wear Ruffle Saree With Stitched Blouse', 'Black Ready To Wear Ruffle Saree With Stitched Blouse', '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(61, 109, 'Embellished Poly-Georgette Saree with Solid border', 'Embellished Poly-Georgette Saree with Solid border', '2023-11-29 16:08:22', '2023-11-29 16:11:27'),
(62, 110, 'Red Silk Blend Ready to Wear Saree', 'Red Silk Blend Ready to Wear Saree', '2023-11-29 16:24:29', '2023-11-29 16:24:29'),
(63, 111, 'Women Regular High Rise Blue Jeans', 'Women Regular High Rise Blue Jeans', '2023-11-29 16:31:10', '2023-11-29 16:32:20'),
(64, 112, 'Women Regular Mid Rise Green Jeans', 'Women Regular Mid Rise Green Jeans', '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(65, 113, 'Women Boyfriend High Rise Black Jeans', 'Women Boyfriend High Rise Black Jeans', '2023-11-29 16:47:36', '2023-11-29 16:52:38'),
(66, 114, 'Women Regular Fit White Pure Cotton Trousers', 'Women Regular Fit White Pure Cotton Trousers', '2023-11-29 16:51:52', '2023-11-29 16:52:26'),
(67, 115, 'Women Regular Fit Black Cotton Blend Trousers', 'Women Regular Fit Black Cotton Blend Trousers', '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(68, 116, 'Women Regular Fit Pink Cotton Blend Trousers', 'Women Regular Fit Pink Cotton Blend Trousers', '2023-11-29 17:02:19', '2023-11-29 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_variation`
--

CREATE TABLE `product_variation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` int(11) NOT NULL DEFAULT 0,
  `color_id` int(11) NOT NULL DEFAULT 0,
  `in_stock` int(11) NOT NULL DEFAULT 0,
  `used_stock` int(11) NOT NULL DEFAULT 0,
  `variation_price` decimal(9,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variation`
--

INSERT INTO `product_variation` (`id`, `product_id`, `size_id`, `color_id`, `in_stock`, `used_stock`, `variation_price`, `created_at`, `updated_at`) VALUES
(2, 49, 3, 5, 4, 13, 1000.00, '2023-11-06 10:18:59', '2023-11-21 12:43:49'),
(4, 50, 3, 4, 0, 2, 1500.00, '2023-11-06 10:34:49', '2023-11-14 09:52:54'),
(5, 50, 4, 16, 12, 3, 1600.00, '2023-11-06 10:34:49', '2023-11-21 11:01:29'),
(6, 51, 3, 13, 0, 2, 900.00, '2023-11-06 10:46:06', '2023-11-16 14:40:49'),
(7, 51, 4, 7, 7, 3, 950.00, '2023-11-06 10:46:06', '2023-11-20 17:06:17'),
(8, 51, 5, 4, 10, 0, 1000.00, '2023-11-06 10:46:06', '2023-11-06 10:46:06'),
(9, 52, 3, 9, 3, 2, 1200.00, '2023-11-06 10:51:37', '2023-11-15 15:54:56'),
(10, 52, 3, 12, 14, 1, 1200.00, '2023-11-06 10:51:37', '2023-11-23 16:14:06'),
(11, 52, 4, 17, 5, 0, 1200.00, '2023-11-06 10:51:37', '2023-11-06 10:52:24'),
(12, 53, 3, 16, 6, 4, 800.00, '2023-11-06 11:00:30', '2023-11-21 10:43:13'),
(13, 53, 3, 11, 9, 1, 800.00, '2023-11-06 11:00:30', '2023-11-11 20:25:05'),
(14, 53, 4, 10, 14, 1, 800.00, '2023-11-06 11:00:30', '2023-11-20 12:47:21'),
(15, 54, 3, 12, 3, 7, 500.00, '2023-11-06 11:07:09', '2023-11-20 15:47:11'),
(16, 54, 4, 4, 15, 0, 600.00, '2023-11-06 11:07:09', '2023-11-14 17:00:08'),
(17, 55, 3, 4, 7, 3, 1800.00, '2023-11-06 11:15:02', '2023-11-21 10:11:36'),
(18, 55, 3, 5, 10, 0, 1800.00, '2023-11-06 11:15:02', '2023-11-06 11:15:02'),
(19, 55, 3, 8, 5, 0, 1800.00, '2023-11-06 11:15:02', '2023-11-06 11:15:02'),
(20, 56, 3, 18, 13, 2, 2000.00, '2023-11-06 11:19:47', '2023-11-21 15:42:42'),
(21, 57, 3, 13, 2, 3, 2500.00, '2023-11-06 11:40:49', '2023-11-16 15:14:57'),
(22, 57, 4, 8, 5, 0, 2500.00, '2023-11-06 11:40:49', '2023-11-06 11:41:45'),
(23, 57, 5, 10, 5, 0, 2500.00, '2023-11-06 11:40:49', '2023-11-06 11:41:45'),
(24, 58, 3, 17, 11, 9, 2800.00, '2023-11-06 11:45:17', '2023-11-21 12:14:06'),
(25, 59, 2, 13, 6, 4, 1000.00, '2023-11-06 12:02:01', '2023-11-20 16:46:02'),
(26, 59, 3, 8, 8, 0, 1000.00, '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(27, 59, 3, 12, 8, 0, 1100.00, '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(28, 59, 4, 12, 10, 0, 1100.00, '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(29, 59, 4, 17, 14, 0, 1200.00, '2023-11-06 12:02:01', '2023-11-06 12:02:01'),
(30, 60, 3, 12, 23, 2, 1200.00, '2023-11-06 12:07:52', '2023-11-27 12:01:12'),
(31, 61, 3, 10, 49, 3, 3000.00, '2023-11-06 12:26:00', '2023-11-11 12:12:19'),
(32, 62, 4, 4, 1, 3, 3500.00, '2023-11-06 12:36:31', '2023-11-28 16:35:56'),
(33, 63, 3, 19, 35, 0, 1000.00, '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(34, 63, 4, 19, 15, 0, 1000.00, '2023-11-06 12:47:09', '2023-11-06 12:47:09'),
(35, 64, 3, 11, 10, 0, 900.00, '2023-11-06 16:09:38', '2023-11-06 16:11:00'),
(36, 64, 4, 10, 8, 0, 900.00, '2023-11-06 16:09:38', '2023-11-06 16:11:00'),
(37, 64, 5, 12, 7, 0, 900.00, '2023-11-06 16:09:38', '2023-11-06 16:11:00'),
(38, 66, 15, 12, 10, 0, 4000.00, '2023-11-06 16:32:47', '2023-11-06 16:36:43'),
(39, 66, 15, 8, 10, 0, 4000.00, '2023-11-06 16:36:43', '2023-11-06 16:36:43'),
(40, 66, 15, 17, 10, 0, 4000.00, '2023-11-06 16:36:43', '2023-11-06 16:36:43'),
(41, 66, 15, 5, 10, 0, 4000.00, '2023-11-06 16:36:43', '2023-11-06 16:36:43'),
(43, 67, 15, 19, 40, 0, 2000.00, '2023-11-06 16:41:43', '2023-11-06 16:43:43'),
(44, 50, 3, 10, 1, 1, 100.00, '2023-11-06 16:43:58', '2023-11-07 18:20:44'),
(45, 68, 15, 5, 3, 3, 2500.00, '2023-11-06 17:02:24', '2023-11-08 11:33:49'),
(46, 68, 15, 13, 8, 0, 2500.00, '2023-11-06 17:02:24', '2023-11-06 17:03:00'),
(47, 68, 15, 8, 4, 0, 2500.00, '2023-11-06 17:02:24', '2023-11-06 17:03:00'),
(48, 69, 15, 12, 10, 0, 3000.00, '2023-11-06 17:34:04', '2023-11-06 17:34:04'),
(49, 70, 7, 12, 4, 6, 500.00, '2023-11-07 10:20:06', '2023-11-15 10:52:14'),
(50, 70, 7, 10, 10, 0, 500.00, '2023-11-07 10:20:06', '2023-11-07 10:20:06'),
(51, 70, 8, 10, 10, 0, 500.00, '2023-11-07 10:20:06', '2023-11-07 10:20:06'),
(52, 70, 8, 4, 10, 0, 500.00, '2023-11-07 10:20:06', '2023-11-07 10:20:06'),
(53, 70, 9, 12, 8, 2, 500.00, '2023-11-07 10:20:06', '2023-11-15 17:59:33'),
(54, 71, 7, 5, 0, 2, 600.00, '2023-11-07 10:23:53', '2023-11-16 10:51:57'),
(55, 72, 8, 8, 11, 1, 800.00, '2023-11-07 10:30:56', '2023-11-20 12:47:21'),
(56, 72, 9, 19, 12, 0, 800.00, '2023-11-07 10:30:56', '2023-11-15 13:56:22'),
(57, 72, 9, 18, 11, 1, 800.00, '2023-11-07 10:30:56', '2023-11-15 13:56:22'),
(58, 73, 18, 16, 0, 4, 400.00, '2023-11-07 10:55:33', '2023-11-21 12:15:48'),
(59, 73, 18, 8, 20, 0, 400.00, '2023-11-07 10:55:33', '2023-11-07 10:59:00'),
(60, 74, 10, 8, 0, 2, 500.00, '2023-11-07 11:05:38', '2023-11-21 12:16:59'),
(61, 75, 10, 8, 38, 2, 450.00, '2023-11-07 11:33:38', '2023-11-11 12:26:02'),
(62, 76, 10, 12, 20, 0, 150.00, '2023-11-07 11:53:19', '2023-11-07 11:53:19'),
(63, 76, 10, 17, 19, 1, 150.00, '2023-11-07 11:53:19', '2023-11-11 09:35:49'),
(66, 78, 19, 17, 0, 11, 400.00, '2023-11-08 14:56:00', '2023-11-20 12:50:45'),
(67, 78, 20, 17, 9, 1, 400.00, '2023-11-08 15:02:06', '2023-11-21 10:41:11'),
(68, 78, 21, 17, 4, 6, 400.00, '2023-11-08 15:02:06', '2023-11-27 10:48:55'),
(69, 78, 22, 17, 0, 10, 400.00, '2023-11-08 15:02:06', '2023-11-21 12:39:07'),
(70, 78, 23, 17, 10, 0, 400.00, '2023-11-08 15:02:06', '2023-11-11 09:38:20'),
(71, 79, 20, 20, 10, 4, 400.00, '2023-11-08 15:13:29', '2023-11-21 12:55:26'),
(72, 79, 21, 20, 10, 2, 450.00, '2023-11-08 15:13:29', '2023-11-21 13:17:51'),
(73, 79, 22, 20, 16, 0, 500.00, '2023-11-08 15:13:29', '2023-11-15 16:17:26'),
(74, 80, 21, 5, 13, 3, 450.00, '2023-11-08 15:27:57', '2023-11-21 16:39:04'),
(77, 80, 22, 8, 9, 1, 500.00, '2023-11-11 09:16:31', '2023-11-11 12:36:34'),
(81, 71, 7, 12, 12, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(82, 71, 7, 5, 12, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(83, 71, 7, 16, 10, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(84, 71, 7, 18, 12, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(85, 71, 7, 19, 10, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(86, 71, 7, 14, 20, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(87, 71, 7, 10, 40, 0, 600.00, '2023-11-16 10:50:50', '2023-11-16 10:51:57'),
(88, 92, 3, 20, 15, 0, 700.00, '2023-11-28 12:20:52', '2023-11-28 12:21:38'),
(89, 93, 3, 7, 25, 0, 590.00, '2023-11-28 12:26:27', '2023-11-28 12:29:17'),
(90, 93, 4, 7, 20, 0, 650.00, '2023-11-28 12:26:27', '2023-11-28 12:29:17'),
(91, 94, 4, 19, 20, 0, 800.00, '2023-11-28 12:50:24', '2023-11-28 12:50:24'),
(92, 99, 3, 21, 5, 0, 2819.00, '2023-11-29 14:57:03', '2023-11-29 15:00:23'),
(93, 99, 1, 21, 5, 0, 2819.00, '2023-11-29 14:57:03', '2023-11-29 15:00:23'),
(94, 99, 4, 21, 4, 0, 2819.00, '2023-11-29 14:57:03', '2023-11-29 15:00:23'),
(95, 99, 1, 21, 3, 0, 2819.00, '2023-11-29 14:57:03', '2023-11-29 15:00:23'),
(96, 100, 3, 17, 40, 0, 1000.00, '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(97, 100, 4, 19, 20, 0, 1000.00, '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(98, 100, 2, 12, 12, 0, 1000.00, '2023-11-29 15:15:40', '2023-11-29 15:15:40'),
(99, 101, 3, 20, 20, 0, 1200.00, '2023-11-29 15:20:36', '2023-11-29 15:20:36'),
(100, 102, 1, 21, 3, 0, 2175.00, '2023-11-29 15:23:14', '2023-11-29 15:23:14'),
(101, 102, 5, 21, 2, 0, 2175.00, '2023-11-29 15:23:14', '2023-11-29 15:23:14'),
(102, 103, 3, 11, 40, 0, 1500.00, '2023-11-29 15:24:15', '2023-11-29 15:24:15'),
(103, 104, 3, 17, 40, 0, 2000.00, '2023-11-29 15:29:06', '2023-11-29 15:29:06'),
(104, 105, 1, 22, 5, 0, 1549.00, '2023-11-29 15:33:04', '2023-11-29 15:38:54'),
(105, 105, 4, 22, 3, 0, 1549.00, '2023-11-29 15:33:04', '2023-11-29 15:38:54'),
(106, 106, 1, 8, 3, 0, 2025.00, '2023-11-29 15:45:36', '2023-11-29 15:45:36'),
(107, 106, 5, 8, 5, 0, 2025.00, '2023-11-29 15:45:36', '2023-11-29 15:45:36'),
(108, 107, 1, 10, 4, 0, 3595.00, '2023-11-29 15:55:18', '2023-11-29 15:55:58'),
(109, 107, 3, 10, 3, 0, 3595.00, '2023-11-29 15:55:18', '2023-11-29 15:55:58'),
(110, 108, 2, 12, 2, 0, 5599.00, '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(111, 108, 3, 12, 2, 0, 5599.00, '2023-11-29 16:02:55', '2023-11-29 16:02:55'),
(112, 109, 2, 23, 2, 0, 1503.00, '2023-11-29 16:08:22', '2023-11-29 16:11:27'),
(113, 110, 1, 10, 1, 0, 8999.00, '2023-11-29 16:24:29', '2023-11-29 16:24:29'),
(114, 111, 1, 21, 5, 0, 899.00, '2023-11-29 16:31:10', '2023-11-29 16:32:20'),
(115, 112, 1, 6, 5, 0, 649.00, '2023-11-29 16:40:19', '2023-11-29 16:40:19'),
(116, 113, 4, 12, 10, 0, 649.00, '2023-11-29 16:47:36', '2023-11-29 16:52:38'),
(117, 114, 4, 17, 6, 0, 399.00, '2023-11-29 16:51:51', '2023-11-29 16:52:26'),
(118, 114, 1, 17, 2, 0, 399.00, '2023-11-29 16:51:51', '2023-11-29 16:52:26'),
(119, 115, 3, 12, 4, 0, 599.00, '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(120, 115, 6, 12, 2, 0, 599.00, '2023-11-29 16:55:42', '2023-11-29 16:55:42'),
(121, 116, 5, 8, 4, 0, 699.00, '2023-11-29 17:02:19', '2023-11-29 17:02:56'),
(122, 116, 3, 8, 1, 0, 699.00, '2023-11-29 17:02:19', '2023-11-29 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `returns_exchanges`
--

CREATE TABLE `returns_exchanges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returns_exchanges`
--

INSERT INTO `returns_exchanges` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Returns And Exchanges', '<p>Welcome to Fitforalegend. This page details a limited period Offer provided by our participating sellers redeemable through our Fitforalegend Marketplace Platform. Please read these terms and conditions carefully before participating. You should understand that by participating in the Offer and using our Platform, you agree to be bound by these terms and conditions including Terms of Use and Privacy Policy of the Platform. Please understand that if you refuse to accept these terms and conditions, you will not be able to access the offers provided under our Platform.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2023-11-29 15:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_delivery`
--

CREATE TABLE `shipping_delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_delivery`
--

INSERT INTO `shipping_delivery` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Shipping And Delivery', '<p>Welcome to Fitforalegend. This page details a limited period Offer provided by our participating sellers redeemable through our Fitforalegend Marketplace Platform. Please read these terms and conditions carefully before participating. You should understand that by participating in the Offer and using our Platform, you agree to be bound by these terms and conditions including Terms of Use and Privacy Policy of the Platform. Please understand that if you refuse to accept these terms and conditions, you will not be able to access the offers provided under our Platform.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2023-11-29 09:23:23', '2023-11-29 15:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `status` enum('Active','Deactive') NOT NULL DEFAULT 'Active' COMMENT 'Active/Deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XS', 'Active', NULL, NULL),
(2, 'S', 'Active', NULL, NULL),
(3, 'M', 'Active', NULL, NULL),
(4, 'L', 'Active', NULL, NULL),
(5, 'XXL', 'Active', NULL, NULL),
(6, 'XXXL', 'Active', NULL, NULL),
(7, '0-1 year', 'Active', NULL, NULL),
(8, '1-3 year', 'Active', NULL, NULL),
(9, '3-6 year', 'Active', NULL, NULL),
(10, '30 cm', 'Active', NULL, NULL),
(11, '50 cm', 'Active', NULL, NULL),
(12, '100 cm', 'Active', NULL, NULL),
(13, '4.5 cm', 'Active', '2023-11-06 16:27:04', '2023-11-06 16:27:04'),
(14, '5.5 cm', 'Active', '2023-11-06 16:27:19', '2023-11-06 16:27:19'),
(15, 'Free', 'Active', '2023-11-06 16:33:39', '2023-11-06 16:33:39'),
(16, '10 cm', 'Active', '2023-11-07 10:58:29', '2023-11-07 10:58:29'),
(17, '11 cm', 'Active', '2023-11-07 10:58:35', '2023-11-07 10:58:35'),
(18, '12 cm', 'Active', '2023-11-07 10:58:41', '2023-11-07 10:58:41'),
(19, '4', 'Active', '2023-11-08 14:56:29', '2023-11-08 14:56:29'),
(20, '5', 'Active', '2023-11-08 14:56:33', '2023-11-08 14:56:33'),
(21, '6', 'Active', '2023-11-08 14:56:37', '2023-11-08 14:56:37'),
(22, '7', 'Active', '2023-11-08 14:56:40', '2023-11-08 14:56:40'),
(23, '8', 'Active', '2023-11-08 14:56:43', '2023-11-08 14:56:43'),
(24, '9', 'Active', '2023-11-08 14:56:46', '2023-11-08 14:56:46'),
(25, '10', 'Active', '2023-11-08 14:56:50', '2023-11-08 14:56:50'),
(26, '3', 'Active', '2023-11-11 08:47:50', '2023-11-11 08:47:50'),
(27, '2', 'Active', '2023-11-11 08:47:55', '2023-11-11 08:47:55'),
(28, '1', 'Active', '2023-11-11 08:48:01', '2023-11-29 12:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alabama', 'AL', '2023-10-11 01:38:13', '2023-10-11 01:38:13'),
(5, 1, 'Alaska', 'AK', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(6, 1, 'Arizona', 'AZ', NULL, NULL),
(7, 1, 'Arkansas', 'AR', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(8, 1, 'California', 'CA', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(9, 1, 'Colorado', 'CO', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(10, 1, 'Connecticut', 'CT', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(11, 1, 'Delaware', 'DE', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(12, 1, 'District of Columbia', 'DC', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(13, 1, 'Florida', 'FL', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(14, 1, 'Georgia', 'GA', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(15, 1, 'Hawaii', 'HI', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(16, 1, 'Idaho', 'ID', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(17, 1, 'Illinois', 'IL', '2023-10-30 21:05:28', '2023-10-30 21:05:28'),
(18, 1, 'Indiana', 'IN', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(19, 1, 'Kansas', 'KS', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(20, 1, 'Kentucky', 'KY', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(21, 1, 'Louisiana', 'LA', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(22, 1, 'Maine', 'ME', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(23, 1, 'Maryland', 'MD', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(24, 1, 'Massachusetts', 'MA', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(25, 1, 'Michigan', 'MI', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(26, 1, 'Minnesota', 'MN', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(27, 1, 'Mississippi', 'MS', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(28, 1, 'Missouri', 'MO', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(29, 1, 'Montana', 'MT', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(30, 1, 'Nebraska', 'NE', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(31, 1, 'Nevada', 'NV', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(32, 1, 'New Hampshire', 'NH', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(33, 1, 'New York', 'NY', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(34, 1, 'North Carolina', 'NC', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(35, 1, 'North Dakota', 'ND', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(36, 1, 'Ohio', 'OH', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(37, 1, 'Oklahoma', 'OK', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(38, 1, 'Oregon', 'OR', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(39, 1, 'Pennsylvania', 'PA', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(40, 1, 'Rhode Island', 'RI', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(41, 1, 'South Carolina', 'SC', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(42, 1, 'South Dakota', 'SD', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(43, 1, 'Tennessee', 'TN', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(44, 1, 'Texas', 'TX', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(45, 1, 'Utah', 'UT', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(46, 1, 'Vermont', 'VT', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(47, 1, 'Virginia', 'VA', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(48, 1, 'Washington', 'WA', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(49, 1, 'West Virginia', 'WV', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(50, 1, 'Wisconsin', 'WI', '2023-10-30 21:05:23', '2023-10-30 21:05:28'),
(51, 1, 'Wyoming', 'WY', '2023-10-30 21:05:23', '2023-10-30 21:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(550) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(6, 7, 'Jeans', NULL, NULL, '2023-10-03 09:59:11', '2023-10-05 17:23:28'),
(7, 3, 'Shirts', NULL, NULL, '2023-10-03 10:03:49', '2023-10-03 10:03:49'),
(9, 7, 'Skirts', NULL, NULL, '2023-10-03 10:04:09', '2023-10-03 10:04:09'),
(10, 7, 'Top', NULL, NULL, '2023-10-03 10:04:15', '2023-10-03 10:04:15'),
(12, 7, 'Trousers & capries', NULL, NULL, '2023-10-05 17:29:35', '2023-10-05 17:29:35'),
(13, 3, 'T-shirt', NULL, NULL, '2023-10-05 17:32:16', '2023-10-05 17:32:16'),
(14, 3, 'Track pants', NULL, NULL, '2023-10-05 17:33:08', '2023-10-05 17:33:08'),
(15, 12, 'Shorts', NULL, NULL, '2023-10-05 17:44:08', '2023-10-05 17:44:08'),
(16, 12, 'Jeans', NULL, NULL, '2023-10-05 17:44:38', '2023-10-05 17:44:38'),
(18, 11, 'T-shirt', NULL, NULL, '2023-10-05 17:46:27', '2023-10-05 17:46:27'),
(19, 11, 'winter wear', NULL, NULL, '2023-10-05 17:50:34', '2023-10-05 17:50:34'),
(20, 3, 'Jackets', NULL, NULL, '2023-10-05 17:51:33', '2023-10-05 17:51:33'),
(22, 7, 'Jackets', NULL, NULL, '2023-10-05 17:52:59', '2023-10-05 17:52:59'),
(23, 7, 'Gowns', NULL, NULL, '2023-10-05 17:54:27', '2023-10-05 17:54:27'),
(24, 14, 'Little\'s Soft baby products', NULL, NULL, '2023-10-06 10:16:17', '2023-10-06 10:16:17'),
(25, 9, 'Track Suit', NULL, NULL, '2023-10-06 10:18:50', '2023-10-06 10:19:52'),
(26, 8, 'Formal pants', NULL, NULL, '2023-10-06 10:21:36', '2023-10-06 10:21:36'),
(27, 8, 'Jeans', NULL, NULL, '2023-10-06 10:24:06', '2023-10-06 10:24:06'),
(28, 8, 'Shirt', NULL, NULL, '2023-10-06 10:24:38', '2023-10-06 10:24:38'),
(29, 10, 'casual', NULL, NULL, '2023-10-06 10:28:27', '2023-10-06 10:28:27'),
(30, 10, 'party Wear', NULL, NULL, '2023-10-06 10:29:02', '2023-10-06 10:29:37'),
(31, 15, 'Analog Watch', NULL, NULL, '2023-10-16 03:59:58', '2023-10-16 04:43:48'),
(32, 15, 'Smart watch', NULL, NULL, '2023-10-16 04:44:37', '2023-10-16 04:44:37'),
(33, 16, 'Silver Jewellery', NULL, NULL, '2023-10-16 06:01:05', '2023-10-16 06:05:49'),
(34, 17, 'Wallets', NULL, NULL, '2023-10-16 06:11:44', '2023-10-16 06:11:44'),
(35, 16, 'gold jewellery', NULL, NULL, '2023-10-17 05:44:40', '2023-10-17 05:44:56'),
(36, 16, 'Rose gold jewellery', NULL, NULL, '2023-10-17 05:49:54', '2023-10-17 05:49:54'),
(37, 7, 'Footwear', NULL, NULL, '2023-11-08 14:44:16', '2023-11-08 14:45:15'),
(38, 8, 'saree', NULL, NULL, '2023-11-29 15:31:00', '2023-11-29 15:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Terms And Conditions', '<p>Welcome to Fitforalegend. This page details a limited period Offer provided by our participating sellers redeemable through our Fitforalegend Marketplace Platform. Please read these terms and conditions carefully before participating. You should understand that by participating in the Offer and using our Platform, you agree to be bound by these terms and conditions including Terms of Use and Privacy Policy of the Platform. Please understand that if you refuse to accept these terms and conditions, you will not be able to access the offers provided under our Platform.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2023-11-29 15:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `image` varchar(550) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `country_code`, `gender`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'vikas', 'kushwah', 'vikas@gmai.com', NULL, '$2y$10$dfHjyA.xZz8tT1TLsdavTOsVEpZTmMMaC4xHrOPuNWnPpGZ0G0uSu', '989898989', '1', NULL, NULL, NULL, '2023-10-04 18:23:10', '2023-10-04 18:23:10'),
(3, 'Karan', 'Jain', 'karan@gmail.com', NULL, '$2y$10$fJcUBatRdhCLoguccuNHSe3HIpU2GTYACWwktdYVfmCuBaJWMOJOW', '9669203080', '1', 'Female', NULL, NULL, '2023-10-04 18:25:39', '2023-11-28 11:14:12'),
(10, 'vishakha', 'bhardwaj', 'vishakha@gmail.com', NULL, '$2y$10$L5NZ2gJG.0ekEifGirFxGendYSay.sgsGLeCNHr9nw54xmJ150Vo2', '8105102099', '1', NULL, NULL, NULL, '2023-10-06 09:47:07', '2023-10-06 09:47:07'),
(11, 'vishakha', 'bhardwaj', 'bhardwaj@gmail.com', NULL, '$2y$10$AZ5GqyNvKdnsW1rG3carHetFKOZgt5O8vXyFC2GjbVNBkvjO1QKK2', '8795462129', '1', 'Female', NULL, NULL, '2023-10-10 10:26:31', '2023-11-15 18:06:54'),
(12, 'Dilip', 'Mehta', 'dk@mailinator.com', NULL, '$2y$10$qUJPYKX59QnIcjl9kWo6D.d03lRrKGF0AqF4SPjQKqGn4ClSBo3.m', '7898117785', '1', NULL, NULL, NULL, '2023-10-15 01:01:56', '2023-10-15 01:01:56'),
(13, 'Tasmiyaaa', 'cw', 'tasmiya@mailinator.com', NULL, '$2y$10$PZRPAN52jWq2gNEuKPp96O6VLZ8tmON7u.tEzQ/FwXPEpwd.dyyeu', '8009765430', '2', 'Female', NULL, NULL, '2023-10-17 03:25:42', '2023-10-17 03:51:38'),
(14, 'test', 'tes', 'testji@gmail.com', NULL, '$2y$10$Jx4Ru.k7R22rXWgmm1Q5RO2e/PUS4w1d3Ag4kjZRVUYQYJc4iCpBu', '9669203080', '1', NULL, NULL, NULL, '2023-10-17 03:50:17', '2023-10-17 03:50:17'),
(15, 'karan', 'ltst', 'karan12@gmail.com', NULL, '$2y$10$nqUGf7Eb9U6JPgX3CXDXzug.1TcR/BQhktRDXzdTFpZnv8fVS3I6K', '98989898', '1', NULL, NULL, NULL, '2023-10-19 01:31:02', '2023-10-19 01:31:02'),
(16, 'test', 'tsa', 'sss@gmail.com', NULL, '$2y$10$ZKvTaffBrhcAs3hVxx7ixuNSTiyC3WqUihMjO7z2P22QAC5iC0qdm', '45465', '1', NULL, NULL, NULL, '2023-10-19 02:32:10', '2023-10-19 02:32:10'),
(17, 'Dilip', 'Mehta', 'dilip@mailinator.com', NULL, '$2y$10$xn0IzUUlUypOpKW6CVxCiOsD7ToLFsOcszCVNpY.ETRclKdZJgJjK', '7898117788', '1', 'Male', NULL, NULL, '2023-10-19 04:41:24', '2023-10-19 04:42:02'),
(18, 'riya', 'riya', 'riya@mailinator.com', NULL, '$2y$10$20YH/DSniEJQytkoA79pq.Vqe7x/.QUXZ62GrIc6V6nJBmbWJf.6C', '233434564', '1', NULL, NULL, NULL, '2023-10-27 09:19:03', '2023-10-27 09:19:03'),
(19, 'Bruno', 'Palmer', 'Bruno1.palmer@gmail.com', NULL, '$2y$10$H9wz7piyZRUhVDnKVTRlE.oiX/C8olWyV3RalzZIOHvSkRobxuoAG', '9083463709', '1', NULL, NULL, NULL, '2023-10-28 06:04:14', '2023-10-28 06:04:14'),
(20, 'ajay', 'cw', 'ajay@gmail.com', NULL, '$2y$10$xxaMrxm3956P33Flf6OBx.I1HsKScRj3SUKygQQvg82064YgNZe9W', '654211234', '1', NULL, NULL, NULL, '2023-10-30 13:58:03', '2023-10-30 13:58:03'),
(21, 'Dileep', 'Solanki', 'dileep.cloudwapp@gmail.com', NULL, '$2y$10$5bUVxOpBCPybWPIvrzWN0OqCypZX27bq4UiYq56xlYtVsisLu0lam', '1234567890', '1', NULL, NULL, NULL, '2023-11-01 17:43:56', '2023-11-01 17:43:56'),
(22, 'Raj', 'sharma', 'raj@mailinator.com', NULL, '$2y$10$UCZaI8A2QpFtcwWjTeWBbOGjwogeex2DtyZKbhZPEVmukfTYIaI2O', '7898117755', '1', NULL, NULL, NULL, '2023-11-01 18:15:46', '2023-11-01 18:15:46'),
(23, 'sunil', 'kushwah', 'sunil.cloudwapp@gmail.com', NULL, '$2y$10$bg0.icVkdzEfpmwan.UsI.lDDa1OUbxBw1Ab4yTzg3Q3fQfHMbhFK', '9669203050', '1', NULL, NULL, NULL, '2023-11-09 14:00:16', '2023-11-09 16:01:54'),
(24, 'chetan', 'singh', 'chetan@gmail.com', NULL, '$2y$10$IrklCVq6DrXqMIMshrdsD.q1SN465.jTZ6BalL6mgjEA4QIukAlYm', '6547895233146566', '2', 'Male', NULL, NULL, '2023-11-14 09:59:01', '2023-11-14 09:59:51'),
(25, 'chetan', 'Chouhan', 'chouhan@gmail.com', NULL, '$2y$10$QOyVQZGwwbatZM/OXN3mOeEX/UdwwwnbYOCwFnnss0/gn0bOAO7A.', '6541358765', '1', NULL, NULL, NULL, '2023-11-16 12:21:46', '2023-11-16 12:21:46'),
(26, 'Riya', 'goswami', 'riya01@mailinator.com', NULL, '$2y$10$H7df7PHi4i4kZfmt4nLDzuPHfAZOO6in5KlZZQstHApU7kaiXC.tS', '1111112477', '1', NULL, NULL, NULL, '2023-11-23 12:40:52', '2023-11-23 12:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` enum('Processing','Ordered') NOT NULL DEFAULT 'Processing' COMMENT 'Processing/Ordered',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_coupons`
--

INSERT INTO `user_coupons` (`id`, `coupon_id`, `user_id`, `order_status`, `created_at`, `updated_at`) VALUES
(32, 10, 3, 'Ordered', '2023-11-21 11:17:52', '2023-11-21 11:18:10'),
(36, 10, 11, 'Ordered', '2023-11-21 12:15:28', '2023-11-21 12:15:48'),
(37, 10, 11, 'Ordered', '2023-11-21 12:16:43', '2023-11-21 12:16:59'),
(38, 10, 3, 'Ordered', '2023-11-21 12:30:40', '2023-11-21 12:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(15, 25, 59, '2023-11-16 15:11:47', '2023-11-16 15:11:47'),
(19, 3, 49, '2023-11-22 09:41:57', '2023-11-22 09:41:57'),
(23, 3, 51, '2023-11-22 10:13:36', '2023-11-22 10:13:36'),
(26, 3, 54, '2023-11-22 10:15:18', '2023-11-22 10:15:18'),
(27, 3, 78, '2023-11-22 10:22:57', '2023-11-22 10:22:57'),
(28, 3, 62, '2023-11-27 12:31:58', '2023-11-27 12:31:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `apikeys`
--
ALTER TABLE `apikeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_master_category_id_foreign` (`master_category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `master_categories`
--
ALTER TABLE `master_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_ratings`
--
ALTER TABLE `order_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
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
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_specification_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variation_product_id_foreign` (`product_id`);

--
-- Indexes for table `returns_exchanges`
--
ALTER TABLE `returns_exchanges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_delivery`
--
ALTER TABLE `shipping_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_coupons_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apikeys`
--
ALTER TABLE `apikeys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_categories`
--
ALTER TABLE `master_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `order_ratings`
--
ALTER TABLE `order_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_specification`
--
ALTER TABLE `product_specification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product_variation`
--
ALTER TABLE `product_variation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `returns_exchanges`
--
ALTER TABLE `returns_exchanges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping_delivery`
--
ALTER TABLE `shipping_delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_master_category_id_foreign` FOREIGN KEY (`master_category_id`) REFERENCES `master_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_specification`
--
ALTER TABLE `product_specification`
  ADD CONSTRAINT `product_specification_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variation`
--
ALTER TABLE `product_variation`
  ADD CONSTRAINT `product_variation_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD CONSTRAINT `user_coupons_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
