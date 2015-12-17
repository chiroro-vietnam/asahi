-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2015 at 11:44 AM
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
(5, 'ASAHI', 1, 6, 0, '2015-12-12 14:50:29', '2015-12-15 09:01:33');

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
(19, 'PTEST', 1, 0, NULL, '2015-12-15 06:25:49', '2015-12-15 23:05:17');

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

--
-- Dumping data for table `rental_product`
--

INSERT INTO `rental_product` (`id`, `product_name`, `product_name_auxiliary`, `cat_rental_id`, `copy`, `overview`, `set_content`, `annotation`, `image_first`, `image_second`, `display`, `show_rate`, `rental_first_price`, `rental_one_month_price`, `service_cost`, `omotekumi`, `display_top`, `order`, `is_deleted`, `created_at`, `updated_at`) VALUES
(18, 'PTEST1', 'PTEST1', 19, 'PTEST1', 'PTEST1', 'PTEST1', 'PTEST1', '/uploads/images/rental_product/1351526239.jpg', '/uploads/images/rental_product/335842127.jpg', 1, 1, '750000', '800000', '860000', 'PTEST1', 1, 3, 0, NULL, '2015-12-17 08:29:02'),
(19, 'PTEST2', 'PTEST2', 19, 'PTEST2', 'PTEST2', 'PTEST2', 'PTEST2', '/uploads/images/rental_product/97710014.jpg', '/uploads/images/rental_product/230611836.jpg', 1, 1, '50000', '600000', '7000000000', 'PTEST2', 1, 2, 0, NULL, '2015-12-17 08:24:36'),
(20, 'PTEST3', 'PTEST3', 19, 'PTEST3', 'PTEST3', 'PTEST3', 'PTEST3', '/uploads/images/rental_product/56464622.jpg', '/uploads/images/rental_product/226552772.jpg', 1, 1, '8000000', '6000000', '9999999', 'PTEST3', 1, 1, 0, NULL, '2015-12-17 08:55:44');

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

--
-- Dumping data for table `sell_product`
--

INSERT INTO `sell_product` (`id`, `product_name`, `product_name_auxiliary`, `display_type`, `cat_product_id`, `copy`, `overview`, `set_content`, `annotation`, `image_first`, `image_second`, `display_rate`, `sell_price`, `annotation_price`, `omotekumi`, `url`, `file`, `display_top`, `order`, `display`, `open_tab`, `is_deleted`, `created_at`, `updated_at`) VALUES
(11, 'ASAHI1', 'ASAHI1', 1, 5, 'ASAHI1', 'ASAHI1', 'ASAHI1', 'ASAHI1', '/uploads/images/sell_product/984160075.jpg', '/uploads/images/sell_product/181641359.jpg', 1, 9999999999, 0, 'ASAHI1<br />\r\nASAHI1<br />\r\nASAHI1', 'http://www.yahoo.co.jp', '/uploads/files/sell_product/587375226.xls', 1, 1, 1, 1, 0, NULL, '2015-12-17 09:34:00'),
(12, 'ASAH2', 'ASAH2', 1, 5, 'ASAH2', 'ASAH2', 'ASAH2', 'ASAH2', '/uploads/images/sell_product/1086641673.jpg', '/uploads/images/sell_product/1072544009.jpg', 1, 800000000000, 0, 'ASAH2<br />\r\nASAH2<br />\r\nASAH2<br />\r\nASAH2', 'http://www.yahoo.co.jp', '/uploads/files/sell_product/796614099.xls', 1, 2, 1, 1, 0, NULL, '2015-12-17 09:25:43');

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
(12, 18, NULL, 0, '2015-12-17 08:23:12', '2015-12-17 08:29:02'),
(13, 19, NULL, 0, '2015-12-17 08:24:36', '2015-12-17 08:24:36'),
(14, 20, NULL, 0, '2015-12-17 08:25:21', '2015-12-17 08:55:44'),
(15, NULL, 11, 0, '2015-12-17 09:00:34', '2015-12-17 09:34:00'),
(16, NULL, 12, 0, '2015-12-17 09:19:03', '2015-12-17 09:24:37');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category_rental`
--
ALTER TABLE `category_rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rental_product`
--
ALTER TABLE `rental_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `sell_product`
--
ALTER TABLE `sell_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `top_page_show`
--
ALTER TABLE `top_page_show`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
