-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 06:07 PM
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
-- Database: `webphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fname`, `mname`, `lname`, `employee_id`, `email`, `created_at`, `status`, `password`) VALUES
(3, 'John Mark', NULL, 'Cuyos', '2025-30174', 'johnmark.cuyos@evsu.edu.ph', '2024-03-20 15:11:28', 0, '$2y$10$n0WoBXcKMmwDX/kVSWTQZuY9CXa6AMYlrwXRTY.vx.QaE.mCKSeZK'),
(4, 'John Mark', NULL, 'Cuyos', '2026-30174', 'johnmark.cuyos@evsu.edu.ph', '2024-03-20 16:23:53', 0, '$2y$10$h3E/s4mOGN1GGxY2RH6KIurTzNCS/1peoj5wdup8JWN08b9wQ0gfm');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `product_name`, `product_image`, `product_description`, `product_quantity`, `product_price`, `status`) VALUES
(6, 3, 'PE UNIFORM', '../images/234546565654455.jpg', 'school PE uniform', 6, 413.00, NULL),
(7, 3, 'PE UNIFORM', '../images/2657884545.png', 'aweawe', 5, 432.00, NULL),
(8, 3, 'waeawe', '../images/902676.png', 'iasugfjkhasdhgjhdfsgklhdsfg', 4534, 454.00, NULL),
(9, 3, 'Shogun', '../images/32423465464567456.png', 'Ethernal', 143, 143.00, NULL),
(10, 4, 'GWAPO KO', '../images/313373726_1564545040643560_7320438641753356798_n.jpg', 'wews', 1, 10000000.00, NULL),
(11, 3, 'waeawe', '../images/420164168_1059726671883075_9091616700933736058_n.jpg', 'adasdasdsa', 6, 213.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `stud_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `stud_id`, `email`, `create_at`, `status`, `password`) VALUES
(1, 'John Mark', NULL, 'Cuyos', '2021-30174', 'johnmark.cuyos@evsu.edu.ph', '2024-03-17 09:32:39', 0, '$2y$10$W.g6kj/O3r1u7um0bswfbueHkZFPHqTeIyOWahacOfec2YWE5bHmq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
