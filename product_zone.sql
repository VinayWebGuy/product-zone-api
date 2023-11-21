-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 10:29 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'cy3GDJCl', 1, NULL, NULL),
(2, 'Vegetables', 'PBuytVjy', 1, NULL, NULL),
(3, 'Fruits', 'oDTm01VY', 1, NULL, NULL),
(4, 'Sanitary', 'XbjWBWjR', 0, NULL, NULL),
(5, 'Kitchen', 'OkQp1ZBo', 1, NULL, NULL),
(6, 'Home Decor', 'YuzFXZI2', 1, NULL, NULL),
(7, 'Clothes', 'R5naBqzK', 1, NULL, NULL),
(8, 'Stationary', '5S2gdRqj', 1, NULL, NULL),
(9, 'Fashion', 'hEmii5Gt', 1, NULL, NULL),
(13, 'Mobiles', '2XARxsfT', 1, NULL, NULL),
(14, 'Laptops', 'tfzvKxvk', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cost`, `product_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tommy Jeans', '5999', 'Xac74QGp', 'R5naBqzK', 1, NULL, NULL),
(2, 'Samsung F62', '23999', '9GYS818H', '2XARxsfT', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `total_hits` int(11) NOT NULL DEFAULT 0,
  `maximum_hits` int(11) NOT NULL DEFAULT 10,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `plan` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `api_key`, `user_id`, `total_hits`, `maximum_hits`, `status`, `plan`, `created_at`, `updated_at`) VALUES
(1, 'VInay', 'vinaywebguy@gmail.com', '7206881088', 'PJv9UBqrlHMa8JrUGp7ISv4B9ag', 'vzr8bMnd', 96, 500, 1, 1, NULL, NULL),
(2, 'Mohan', 'mohankumar@gmail.com', '8812003012', 'IftCdIDaUia2HeAXU6zCrss3R62', 'u1xpcgts', 5, 20, 1, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
