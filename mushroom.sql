-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 10:57 AM
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
-- Database: `mushroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `ad_email` varchar(100) NOT NULL,
  `ad_username` varchar(50) NOT NULL,
  `ad_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `ad_email`, `ad_username`, `ad_pass`) VALUES
(0, 'testing@gmail.com', 'testing', '*AC57754462B6D4C373263062D60EDC6E452E574D'),
(0, 'testing@gmail.com', 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `f_name`, `l_name`, `email`, `phone`, `message`, `created_at`) VALUES
(13, 'Ricci', 'Cordero', 'cordero@gmail.com', '09123456789', 'Test Message', '2025-03-13 17:47:48'),
(14, 'Juan', 'Dela Cruz', 'jdelacruz@gmail.com', 'test', 'Test', '2025-03-13 17:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `content`, `created_at`) VALUES
(1, 'Queen V Mushroom Farm', '1741927687_QueenV-logo.png', 'Queen V Mushroom and Lettuce Farm is a local agricultural enterprise located on Manalili Street in Inaon Pulilan, Bulacan. The farm specializes in cultivating a variety of gourmet mushrooms and fresh lettuce, providing high-quality produce to the local community', '2025-03-08 02:05:37'),
(2, 'Kimchi Mushroom', '1741927137_kimchimushroom.jpeg', 'Kimchi Mushroom from Queen V Mushroom farm, made from freshly picked mushrooms.', '2025-03-08 11:09:42'),
(3, 'Crispy Mushroom', '1741927231_crispymushroom1.jpeg', 'Crispy mushroom from Queen V Mushroom Farm, comes with 7 different flavors: Regular, Sour Cream, Cheese, BBQ, Garlic, Spicy and Salted Egg.\\r\\n', '2025-03-08 11:09:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
