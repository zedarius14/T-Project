-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 06:21 PM
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
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_phone` varchar(32) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_phone`, `admin_email`, `admin_password`) VALUES
(1, 'admin', '09677649079', 'admin@email.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(31, 250.00, 'shipped', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-10 17:33:49'),
(32, 479.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-10 17:34:12'),
(33, 220.00, 'paid', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-11 11:43:42'),
(56, 69.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-12 14:33:37'),
(57, 69.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-12 14:36:13'),
(58, 569.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-12 14:46:45'),
(59, 569.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-12 15:05:05'),
(60, 0.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-12 15:08:14'),
(61, 569.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-12 15:09:13'),
(70, 229.00, 'paid', 8, 2147483647, 'Taguig', '29 Pres Quirino', '2024-06-14 17:59:51'),
(71, 250.00, 'paid', 9, 2147483647, 'Taguig City', 'shsjabenck', '2024-06-14 18:06:31'),
(79, 799.00, 'pay cod', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-16 17:23:46'),
(84, 799.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-16 17:51:23'),
(85, 799.00, 'payment pending', 7, 2147483647, 'Taguig', 'Pres. Quirino', '2024-06-16 18:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(8, 10, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 1, '2024-06-09 20:36:56'),
(9, 11, 4, 'DONQUIXOTE SHORT', 'dnqxtshort1.jpg', 229.00, 2, 1, '2024-06-09 20:38:16'),
(10, 12, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 1, '2024-06-10 11:10:25'),
(11, 13, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 1, '2024-06-10 11:11:45'),
(12, 14, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 5, '2024-06-10 11:14:37'),
(13, 15, 4, 'DONQUIXOTE SHORT', 'dnqxtshort1.jpg', 229.00, 1, 5, '2024-06-10 11:35:47'),
(14, 16, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 5, '2024-06-10 12:03:08'),
(15, 17, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 1, 5, '2024-06-10 12:06:24'),
(16, 18, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 2, 5, '2024-06-10 12:12:30'),
(17, 19, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 1, '2024-06-10 12:20:48'),
(18, 20, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 6, '2024-06-10 13:42:17'),
(19, 21, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 1, 6, '2024-06-10 13:42:49'),
(20, 22, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 6, '2024-06-10 13:51:52'),
(21, 23, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 2, 1, '2024-06-10 13:58:46'),
(22, 24, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 1, '2024-06-10 13:59:06'),
(23, 25, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 2, 1, '2024-06-10 14:01:41'),
(24, 26, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 1, '2024-06-10 14:06:44'),
(25, 27, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 1, '2024-06-10 14:11:39'),
(26, 28, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 1, '2024-06-10 14:12:11'),
(27, 29, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-10 16:35:59'),
(28, 30, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-10 16:36:56'),
(29, 31, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 7, '2024-06-10 17:33:49'),
(30, 32, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 7, '2024-06-10 17:34:12'),
(31, 32, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-10 17:34:12'),
(32, 33, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-11 11:43:42'),
(33, 34, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-11 17:22:34'),
(34, 35, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-11 21:58:04'),
(35, 36, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 1, 7, '2024-06-11 22:45:48'),
(36, 37, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 11:53:41'),
(37, 38, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 11:55:37'),
(38, 39, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 12:14:26'),
(39, 40, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 13:26:28'),
(40, 41, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 13:27:19'),
(41, 42, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-12 13:28:08'),
(42, 43, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-12 13:30:53'),
(43, 44, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-12 13:32:02'),
(44, 45, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-12 13:41:31'),
(45, 46, 2, 'DONQUIXOTE PTown', 'dnqxtshirt2.png', 220.00, 1, 7, '2024-06-12 13:45:30'),
(46, 47, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 2, 7, '2024-06-12 13:46:00'),
(47, 47, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 13:46:00'),
(48, 48, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 13:54:42'),
(49, 49, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 14:02:36'),
(50, 50, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 14:06:11'),
(51, 51, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 14:07:32'),
(52, 52, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 14:11:39'),
(53, 53, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 14:21:09'),
(54, 53, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 1, 7, '2024-06-12 14:21:09'),
(55, 54, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 4, 7, '2024-06-12 14:22:25'),
(56, 54, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 1, 7, '2024-06-12 14:22:25'),
(57, 55, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 14:30:48'),
(58, 56, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 14:33:37'),
(59, 57, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 14:36:13'),
(60, 58, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 14:46:45'),
(61, 58, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 2, 7, '2024-06-12 14:46:45'),
(62, 59, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 15:05:05'),
(63, 59, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 2, 7, '2024-06-12 15:05:05'),
(64, 60, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 15:08:14'),
(65, 60, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 2, 7, '2024-06-12 15:08:14'),
(66, 61, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 15:09:13'),
(67, 61, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 2, 7, '2024-06-12 15:09:13'),
(68, 62, 6, 'TRISKILION SHIRT', 'Triskelion black.png', 239.00, 1, 7, '2024-06-12 15:10:12'),
(69, 63, 6, 'TRISKILION SHIRT', 'Triskelion black.png', 239.00, 1, 7, '2024-06-12 15:14:29'),
(70, 64, 4, 'DONQUIXOTE SHORT', 'dnqxtshort1.jpg', 229.00, 1, 7, '2024-06-12 15:20:16'),
(71, 65, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 17:26:55'),
(72, 66, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 1, 7, '2024-06-12 17:38:35'),
(73, 66, 7, 'DONQUIXOTE SNEAKER', 'shoes1.jpg', 349.00, 4, 7, '2024-06-12 17:38:35'),
(74, 67, 8, 'DONQUIXOTE SOCK', 'sock1.jpg', 69.00, 5, 7, '2024-06-12 17:45:26'),
(75, 68, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 21:04:56'),
(76, 69, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 7, '2024-06-12 22:09:15'),
(77, 70, 5, 'DNQXT AIR JORDAN ', 'DNQXT aj 1.png', 229.00, 1, 8, '2024-06-14 17:59:51'),
(78, 71, 1, 'DONQUIXOTE Rapgod', 'f1.png', 250.00, 1, 9, '2024-06-14 18:06:31'),
(79, 72, 3, 'DONQUIXOTE Shorts', 'dnqxtshort2.jpg', 229.00, 1, 10, '2024-06-16 12:36:15'),
(80, 73, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 16:22:20'),
(81, 74, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 16:58:13'),
(82, 75, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 17:00:28'),
(83, 80, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 17:25:58'),
(84, 81, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 17:37:54'),
(85, 82, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 17:38:22'),
(86, 83, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 17:40:11'),
(87, 84, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 17:51:23'),
(88, 85, 9, 'Red Air jordan Shoes', 'Red Shoes1.png', 799.00, 1, 7, '2024-06-16 18:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 33, 7, '6', '2024-06-13 03:58:54'),
(2, 31, 7, '2', '2024-06-13 03:58:54'),
(3, 55, 7, '7AH46615F0039740N', '2024-06-12 22:02:22'),
(4, 70, 8, '1TW64031TN724362F', '2024-06-14 18:02:35'),
(5, 71, 9, '69W68955E9779301N', '2024-06-14 18:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'DONQUIXOTE Rapgod', 'shirts', 'Rapgod Shirt White', 'f1.png', 'f1.png', 'f1.png', 'f1.png', 249.00, 0, 'White'),
(2, 'DONQUIXOTE PTown', 'shirts', 'DONQUIXOTE PTown Shirt', 'dnqxtshirt2.png', 'dnqxtshirt2.png', 'dnqxtshirt2.png', 'dnqxtshirt2.png', 220.00, 0, 'RED'),
(3, 'DONQUIXOTE Shorts', 'shorts', 'DNQXT Short', 'dnqxtshort2.jpg', 'dnqxtshort2.jpg', 'dnqxtshort2.jpg', 'dnqxtshort2.jpg', 229.00, 0, 'BLACK'),
(4, 'DONQUIXOTE SHORT', 'shorts', 'DNQXT Non Colored Short', 'dnqxtshort1.jpg', 'dnqxtshort1.jpg', 'dnqxtshort1.jpg', 'dnqxtshort1.jpg', 229.00, 0, 'WHITE'),
(5, 'DNQXT AIR JORDAN ', 'shirts', 'DONQUIXOTE SHIRT ', 'DNQXT aj 1.png', 'DNQXT aj 1.png', 'DNQXT aj 1.png', 'DNQXT aj 1.png', 229.00, 0, 'BLACK'),
(6, 'TRISKILION SHIRT', 'shirts', 'TRISKILION SHIRT', 'Triskelion black.png', 'Triskelion black.png', 'Triskelion black.png', 'Triskelion black.png', 239.00, 0, 'BLACK'),
(7, 'DONQUIXOTE SNEAKER', 'footwear', 'DONQUIXOTE BLUE SNEAKER', 'shoes1.jpg', 'shoes1.jpg', 'shoes1.jpg', 'shoes1.jpg', 349.00, 0, 'BLUE'),
(9, 'Red Air jordan Shoes', 'shirts', 'Air Jordan Red', 'Red Shoes1.png', 'Red Shoes2.png', 'Red Shoes3.png', 'Red Shoes4.png', 799.00, 10, 'Red');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(7, 'Skye', 'Skye@email.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'Skye Vera', 'amvievera1429@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(9, 'gojo saturo', 'ptc.karllaurencelimbo@gmail.com', '75fb8d37655f98d5d535c31aca857083'),
(10, 'karl', 'ptc.karllaurencelimb@gmail.com', 'c5592d5dc037753b7e7ec84e19cc7896');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `'user_email'` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
