-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2026 at 07:36 AM
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
-- Database: `dessert-product`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Cakes'),
(2, 'Cookies'),
(3, 'Dounts'),
(4, 'Macroions'),
(5, 'CupCake');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`) VALUES
(1, 'Habiba ali', 'delicious and i will order more'),
(2, 'sara', 'very delicios'),
(3, 'Basma', 'I really enjoy eating this dessert'),
(4, 'mariam', 'more product please');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `product_id`, `created_at`) VALUES
(1, 'sara', 'sa22299444@gmail.com', '01233333456', 'elmahla', 15, '2026-03-27 09:05:02'),
(2, 'sara', 'sa22299444@gmail.com', '01233333456', 'elmahla', 20, '2026-03-27 09:55:47'),
(21, 'donia', 'da3575@gmail.com', '0126789000', 'Elmahla', 17, '2026-03-27 19:13:05'),
(22, 'Habiba Ali', 'ha22299444@gmail.com', '012683735945', 'Elmahla', 30, '2026-03-27 19:13:39'),
(23, 'Rahma', 'Ra22299444@gmail.com', '0137734487843', 'Elmansoura', 31, '2026-03-27 19:32:25'),
(24, 'Habiba Ali', 'ha22299444@gmail.com', '0126789000', 'mansoura', 20, '2026-03-27 20:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(15, 'chocolate cake', 'with chocolate', 300, '1774255770_chocolate cake.jpg', '1'),
(17, 'Red felfet Cake', 'red flfet', 500, '1774255890_red felfet cake.jpg', '1'),
(18, 'chocolate dount', 'with chocolate', 80, '1774255923_chocolate dount.jpg', '3'),
(19, 'Red felfet Dount', 'red flfet', 100, '1774255976_dount (2).jpg', '3'),
(20, 'caramel cookie', 'with extra caramel', 200, '1774256023_caramel cookie.jpg', '2'),
(21, 'pesstisho cookie', 'extra pesstisho ', 300, '1774256075_pesstisho cookie.jpg', '2'),
(22, 'red felfet cookie', 'red flfet', 400, '1774256132_red felfet cookie.jpg', '2'),
(24, 'macaroins', 'red flfet', 300, '1774256208_macaroins.jpg', '4'),
(25, 'macaroins', 'different kind', 600, '1774256252_footer.jpg', '4'),
(26, 'vinalla dount', 'vinalla', 200, '1774256318_vinalla dount.jpg', '3'),
(27, 'strawberry macaroins', 'extra strawberry', 400, '1774256466_strawberry macaroins.jpg', '4'),
(28, 'chocolate macaroins', 'extra chocolate', 600, '1774256504_chocolate macaroins.jpg', '4'),
(29, 'louts Dount', 'extra Louts', 400, '1774256546_1774253610_dount3.jpg', '3'),
(30, 'chocolate cookie', 'extra chocolate', 500, '1774266137_chocolate cookie.jpg', '2'),
(31, 'Cupcake', 'vinalla Cupcake', 60, '1774639851_cupcake1.jpg', '5'),
(33, 'Cupcake chocolate', 'choclate cupcake', 90, '1774640089_Cupcake2.jpg', '5'),
(34, 'BlueBerry cupcake', 'BlueBerry cupcake', 120, '1774640255_cupcake3.jpg', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
