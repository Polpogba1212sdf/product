-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 22, 2021 at 10:30 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `product_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(1000) NOT NULL,
  `middle_price` float NOT NULL,
  `created_at` datetime NOT NULL,
  `name_added_user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `img`, `middle_price`, `created_at`, `name_added_user`) VALUES
(1, 'q', 'https://st4.depositphotos.com/1064024/20942/i/600/depositphotos_209420380-stock-photo-digital-illustration-little-cute-unicorn.jpg', 1, '2021-03-21 22:32:50', 'w'),
(2, 'qq', 'https://st4.depositphotos.com/1064024/20942/i/600/depositphotos_209420380-stock-photo-digital-illustration-little-cute-unicorn.jpg', 1, '2021-03-21 22:33:22', 'ww'),
(3, 'sdfd', 'https://st4.depositphotos.com/1064024/20942/i/600/depositphotos_209420380-stock-photo-digital-illustration-little-cute-unicorn.jpg', 1, '2021-03-21 22:40:34', 'qweqwe'),
(4, 'qwe', 'https://st4.depositphotos.com/1064024/20942/i/600/depositphotos_209420380-stock-photo-digital-illustration-little-cute-unicorn.jpg', 1, '2021-03-22 02:04:08', 'qwe');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int NOT NULL,
  `name_added_user` varchar(20) NOT NULL,
  `mark` varchar(2) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `product_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name_added_user`, `mark`, `comment`, `created_at`, `product_id`) VALUES
(2, 'retere', '2', 'ertret', '2021-03-22 00:54:23', '1'),
(3, 'a', '8', 'x', '2021-03-22 00:54:53', '1'),
(4, 'sdf', '1', 'sdf', '2021-03-22 00:55:15', '2'),
(5, 'sdf', '1', 'sdf', '2021-03-22 00:55:25', '2'),
(6, 'sdf', '1', 'sdf', '2021-03-22 00:56:11', '2'),
(7, 'e', '1', 'e', '2021-03-22 00:57:06', '2'),
(8, 'sdg', '1', 'sdg', '2021-03-22 01:10:14', '2'),
(9, '', '1', '', '2021-03-22 01:10:46', '2'),
(10, '', '1', '', '2021-03-22 01:10:57', '2'),
(11, 't', '1', 't', '2021-03-22 01:25:39', '2'),
(12, 't', '1', 't', '2021-03-22 01:26:02', '2'),
(13, 't', '1', 't', '2021-03-22 01:27:15', '2'),
(14, 't', '1', 't', '2021-03-22 01:27:54', '2'),
(15, 't', '1', 't', '2021-03-22 01:30:48', '2'),
(16, 't', '1', 't', '2021-03-22 01:31:17', '2'),
(17, 'h', '1', 'h', '2021-03-22 01:32:38', '2'),
(18, 'd', '1', 'd', '2021-03-22 01:32:42', '2'),
(19, 'd', '1', 'd', '2021-03-22 01:38:33', '2'),
(20, 'wewer', '1', 'dfg', '2021-03-22 02:05:19', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
