-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2025 at 11:54 AM
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
-- Database: `carey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Mint'),
(2, 'Not Mint');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `phone`) VALUES
(1, 'Guest', 'guest@example.com', '000'),
(2, 'Guest', 'guest@example.com', '000'),
(3, 'Guest', 'guest@example.com', '000'),
(4, 'Guest', 'guest@example.com', '000'),
(5, 'Guest', 'guest@example.com', '000'),
(6, 'Guest', 'guest@example.com', '000'),
(7, 'Guest', 'guest@example.com', '000'),
(8, 'Guest', 'guest@example.com', '000'),
(9, 'Guest', 'guest@example.com', '000'),
(10, 'Guest', 'guest@example.com', '000'),
(11, 'Guest', 'guest@example.com', '000'),
(12, 'Guest', 'guest@example.com', '000'),
(13, 'Guest', 'guest@example.com', '000'),
(14, 'Guest', 'guest@example.com', '000'),
(15, 'Guest', 'guest@example.com', '000'),
(16, 'Guest', 'guest@example.com', '000');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`) VALUES
(1, 1, '2025-12-04 18:58:19'),
(2, 2, '2025-12-04 19:36:04'),
(3, 3, '2025-12-04 19:36:08'),
(4, 4, '2025-12-04 19:37:02'),
(5, 5, '2025-12-04 19:40:42'),
(6, 6, '2025-12-04 19:43:05'),
(7, 7, '2025-12-04 19:58:47'),
(8, 8, '2025-12-04 20:01:45'),
(9, 9, '2025-12-04 20:06:29'),
(10, 10, '2025-12-04 20:09:33'),
(11, 11, '2025-12-04 20:20:58'),
(12, 12, '2025-12-04 21:21:37'),
(13, 13, '2025-12-04 21:24:16'),
(14, 14, '2025-12-04 21:25:58'),
(15, 15, '2025-12-04 21:26:33'),
(16, 16, '2025-12-04 21:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `subtotal`) VALUES
(1, 1, 1, 1, 2.00),
(2, 2, 2, 1, 1.50),
(3, 3, 2, 1, 1.50),
(4, 4, 1, 2, 4.00),
(5, 5, 2, 1, 1.50),
(6, 6, 2, 1, 1.50),
(7, 7, 1, 1, 2.00),
(8, 8, 1, 1, 2.00),
(9, 9, 2, 1, 1.50),
(10, 10, 5, 1, 9999.00),
(11, 11, 1, 1, 2.00),
(12, 12, 1, 1, 2.00),
(13, 13, 2, 1, 1.50),
(14, 14, 5, 1, 9999.00),
(15, 15, 5, 5, 49995.00),
(16, 16, 2, 1, 1.50);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `category_id`, `image`, `stock`) VALUES
(1, 'Kopiko', 2.00, 'Coffee candy', 2, 'kopiko.jpg', 13),
(2, 'Fresh', 1.50, 'Chewy fresh mint candy', 1, 'fresh.jpg', 11),
(3, 'Max', 2.00, 'menthol sweet', 1, 'max.jpg', 20),
(4, 'Snowbear', 2.00, 'Strong menthol candy', 1, 'snowbear.jpg', 20),
(5, 'Jandel Fruit', 9999.00, 'Spicy air', 2, '', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
