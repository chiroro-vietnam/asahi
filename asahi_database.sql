-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2015 at 04:52 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asahi_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `order` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_rental`
--

CREATE TABLE `category_rental` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental_product`
--

CREATE TABLE `rental_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name_auxiliary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_rental_id` int(11) DEFAULT NULL,
  `copy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `set_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annotation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_first` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_second` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `show_rate` tinyint(1) NOT NULL,
  `rental_first_price` decimal(8,2) DEFAULT NULL,
  `rental_one_month_price` decimal(8,2) DEFAULT NULL,
  `service_cost` decimal(8,2) DEFAULT NULL,
  `omotekumi` text COLLATE utf8_unicode_ci,
  `display_top` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

CREATE TABLE `sell_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name_auxiliary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_type` tinyint(1) NOT NULL,
  `cat_product_id` int(11) NOT NULL,
  `copy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `overview` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `set_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annotation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_first` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_second` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_rate` tinyint(1) NOT NULL,
  `sell_price` double(15,8) DEFAULT NULL,
  `annotation_price` double(15,8) DEFAULT NULL,
  `omotekumi` text COLLATE utf8_unicode_ci,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_top` tinyint(1) NOT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `open_tab` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `top_page_show`
--

CREATE TABLE `top_page_show` (
  `id` int(10) UNSIGNED NOT NULL,
  `rental_product_id` int(11) DEFAULT NULL,
  `sell_product_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@chiroro.co.jp', '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu', '4U8rKiqrMNAQMOfj13UGUmFvmvPsfNfP40EkmsfKuDVT0N9RY69EmiMKEGBT', '2015-12-19 20:39:37', '2015-12-19 20:39:37'),
(2, 'kyuma', 'Kyuma ANDO ', 'kyuma@chiroro.com.vn', '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu', '4U8rKiqrMNAQMOfj13UGUmFvmvPsfNfP40EkmsfKuDVT0N9RY69EmiMKEGBT', '2015-12-19 20:39:37', '2015-12-19 20:39:37'),
(3, 'urakami', 'Urakami Yuzo', 'urakami@chiroro.co.jp', '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu', '4U8rKiqrMNAQMOfj13UGUmFvmvPsfNfP40EkmsfKuDVT0N9RY69EmiMKEGBT', '2015-12-19 20:39:37', '2015-12-19 20:39:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_rental`
--
ALTER TABLE `category_rental`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_product`
--
ALTER TABLE `rental_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_product`
--
ALTER TABLE `sell_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_page_show`
--
ALTER TABLE `top_page_show`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_rental`
--
ALTER TABLE `category_rental`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rental_product`
--
ALTER TABLE `rental_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sell_product`
--
ALTER TABLE `sell_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `top_page_show`
--
ALTER TABLE `top_page_show`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
