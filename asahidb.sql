-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2015 at 09:59 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asahidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `name`, `display`, `order`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '発電機', 1, 1, 0, '2015-12-18 02:12:23', '2015-12-18 02:52:32'),
(2, '配水ポリエチレン管融着工具', 1, 2, 0, '2015-12-18 02:12:35', '2015-12-18 02:12:35'),
(3, '鋳鉄管加工機', 1, 3, 0, '2015-12-18 02:12:49', '2015-12-18 02:12:49'),
(4, 'パイプ挿入機', 1, 4, 0, '2015-12-18 02:13:00', '2015-12-18 02:13:00'),
(5, '塩ビパイプ挿入機', 1, 5, 0, '2015-12-18 02:13:14', '2015-12-18 02:33:32'),
(6, '漏水探知機', 1, 6, 0, '2015-12-18 02:13:24', '2015-12-18 02:13:24'),
(7, '各種テスト用機器', 1, 7, 0, '2015-12-18 02:13:34', '2015-12-18 02:13:34'),
(8, 'その他', 0, 8, 0, '2015-12-18 02:13:45', '2015-12-18 02:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `category_rental`
--

CREATE TABLE `category_rental` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `display` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `order` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_rental`
--

INSERT INTO `category_rental` (`id`, `name`, `display`, `is_deleted`, `order`, `created_at`, `updated_at`) VALUES
(1, '配水ポリエチレン管融着工具', 1, 0, 1, '2015-12-18 02:10:35', '2015-12-18 02:10:35'),
(2, '鋳鉄管加工機', 1, 0, 2, '2015-12-18 02:10:47', '2015-12-18 02:10:47'),
(3, 'パイプ挿入機', 1, 0, 3, '2015-12-18 02:11:02', '2015-12-18 02:11:02'),
(4, '塩ビパイプ挿入機', 1, 0, 4, '2015-12-18 02:11:15', '2015-12-18 02:11:15'),
(5, '漏水探知機', 1, 0, 5, '2015-12-18 02:11:26', '2015-12-18 02:15:24'),
(6, '各種テスト用機器', 1, 0, 6, '2015-12-18 02:11:37', '2015-12-18 02:11:37'),
(8, 'その他', 0, 0, 7, '2015-12-18 02:29:35', '2015-12-18 03:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `rental_product`
--

CREATE TABLE `rental_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_auxiliary` varchar(255) NOT NULL,
  `cat_rental_id` int(11) NOT NULL,
  `copy` varchar(255) NOT NULL,
  `overview` varchar(255) DEFAULT NULL,
  `set_content` varchar(255) DEFAULT NULL,
  `annotation` varchar(255) DEFAULT NULL,
  `image_first` varchar(200) DEFAULT NULL,
  `image_second` varchar(200) DEFAULT NULL,
  `display` tinyint(2) DEFAULT NULL,
  `show_rate` tinyint(2) DEFAULT NULL,
  `rental_first_price` decimal(10,0) DEFAULT NULL,
  `rental_one_month_price` decimal(10,0) DEFAULT NULL,
  `service_cost` decimal(10,0) DEFAULT NULL,
  `omotekumi` text,
  `display_top` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sell_product`
--

CREATE TABLE `sell_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_name_auxiliary` varchar(255) NOT NULL,
  `display_type` tinyint(3) DEFAULT NULL,
  `cat_product_id` int(11) NOT NULL,
  `copy` varchar(255) DEFAULT NULL,
  `overview` varchar(200) DEFAULT NULL,
  `set_content` varchar(200) DEFAULT NULL,
  `annotation` varchar(200) DEFAULT NULL,
  `image_first` varchar(255) DEFAULT NULL,
  `image_second` varchar(255) DEFAULT NULL,
  `display_rate` tinyint(2) DEFAULT NULL,
  `sell_price` double DEFAULT NULL,
  `annotation_price` double DEFAULT NULL,
  `omotekumi` text,
  `url` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `display_top` tinyint(2) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `display` tinyint(2) DEFAULT NULL,
  `open_tab` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `top_page_show`
--

CREATE TABLE `top_page_show` (
  `id` int(11) NOT NULL,
  `rental_product_id` int(11) DEFAULT NULL,
  `sell_product_id` int(11) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `top_page_show`
--

INSERT INTO `top_page_show` (`id`, `rental_product_id`, `sell_product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, '2015-12-18 04:12:48', '2015-12-18 04:12:48'),
(2, 2, NULL, 0, '2015-12-18 04:13:38', '2015-12-18 04:13:38'),
(3, 3, NULL, 0, '2015-12-18 04:14:50', '2015-12-18 04:14:50'),
(4, NULL, NULL, 0, '2015-12-19 06:19:13', '2015-12-19 06:19:13'),
(5, NULL, 1, 0, '2015-12-19 06:20:11', '2015-12-19 06:55:48'),
(6, NULL, 2, 0, '2015-12-19 06:20:42', '2015-12-19 06:20:42'),
(7, NULL, 3, 0, '2015-12-19 06:21:51', '2015-12-19 06:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(50, 'admin', 'admin@chiroro.com.vn', '$2y$10$vcFnKXBKGIfxtRKt5pVkneOymfr25T20p0wt9Sg0VXiusLwGzsQDu', 'TGJo4VXaAttYZmFSGusoJF7WsTSfdKSrtin4bCJLXcEbVXuIESqzDVGHMZqy', '2015-12-19 12:10:29', '2015-12-19 06:56:23');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `category_rental`
--
ALTER TABLE `category_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rental_product`
--
ALTER TABLE `rental_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sell_product`
--
ALTER TABLE `sell_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `top_page_show`
--
ALTER TABLE `top_page_show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
