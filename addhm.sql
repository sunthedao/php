-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 07:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addhm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `MobileNo` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Firstname`, `Lastname`, `Email`, `MobileNo`, `Address`) VALUES
(1, 'แรก', 'หลัง', 'example@gmail.com', 1150, 'กรุงเทพมหานคร'),
(2, 'หลัง', 'แรก', 'example@gmail.com', 2222222, 'กรุงเทพมหานคร'),
(3, 'ชื่อแรก', 'ชื่อหลัง', 'example@gmail.com', 2222222, 'กรุงเทพมหานคร'),
(4, 'ชื่อเล่น', 'ชื่อจริง', 'example@gmail.com', 88888, 'กรุงเทพมหานคร'),
(5, 'ชื่อเล่น', 'ชื่อจริง', 'example@gmail.com', 88888, 'กรุงเทพมหานคร'),
(6, '', '', '', 0, ''),
(7, 'ชื่อเล่น', 'ชื่อจริง', 'example@gmail.com', 88888, 'กรุงเทพมหานคร'),
(8, 'ชื่อเล่น', 'ชื่อจริง', 'example@gmail.com', 88888, 'กรุงเทพมหานคร'),
(9, 'ชื่อเล่น', 'ชื่อจริง', 'example@gmail.com', 88888, 'กรุงเทพมหานคร');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
