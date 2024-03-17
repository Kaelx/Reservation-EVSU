-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2024 at 10:43 AM
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
(1, 'John Mark', NULL, 'Cuyos', '2025-30174', 'johnmark.cuyos@evsu.edu.ph', '2024-03-17 09:33:35', 0, '$2y$10$.jzgNYYfC3xST3jM3lSeg.DiqeYXBRncCSN3WHP1X7dOzmZ3oo.2G');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
