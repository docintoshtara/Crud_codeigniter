-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2024 at 06:25 PM
-- Server version: 8.0.37-0ubuntu0.20.04.3
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cudapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `cat_no` int NOT NULL,
  `description` text NOT NULL,
  `std_pack` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `accessories_image`
--

CREATE TABLE `accessories_image` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `accessories_id` int NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connection_data`
--

CREATE TABLE `connection_data` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `title_value` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `connection_data`
--

INSERT INTO `connection_data` (`id`, `product_id`, `title`, `title_value`, `created_at`, `update_at`) VALUES
(1, 3, 'Conductor Cross Section Stranded min.', '1.5 mm²', '2024-07-29 12:02:30', '2024-07-29 12:02:30'),
(2, 3, 'Conductor Cross Section Stranded max.', '10 mm²', '2024-07-29 12:02:30', '2024-07-29 12:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `ordering_information`
--

CREATE TABLE `ordering_information` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `cat_no` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `standar_pack` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ordering_information`
--

INSERT INTO `ordering_information` (`id`, `product_id`, `cat_no`, `description`, `standar_pack`, `created_at`, `update_at`) VALUES
(1, 3, 'CTS25UN', '25 sq.mm Feed Through Terminal Block in Grey colour', 50, '2024-07-29 11:22:54', '2024-07-29 11:22:54'),
(2, 3, 'CTS25UNBK', '25 sq.mm Feed Through Terminal Block in Black colour', 50, '2024-07-29 11:23:53', '2024-07-29 11:23:53'),
(3, 3, 'CTS25UNGN', '25 sq.mm Feed Through Terminal Block in Green colour', 50, '2024-07-29 11:24:13', '2024-07-29 11:24:13'),
(4, 1, 'CTS25UN', '25 sq.mm Feed Through Terminal Block in Grey colour', 50, '2024-07-29 11:22:54', '2024-07-29 11:22:54'),
(5, 1, 'CTS25UNBK', '25 sq.mm Feed Through Terminal Block in Black colour', 50, '2024-07-29 11:23:53', '2024-07-29 11:23:53'),
(6, 1, 'CTS25UNGN', '25 sq.mm Feed Through Terminal Block in Green colour', 50, '2024-07-29 11:24:13', '2024-07-29 11:24:13'),
(7, 2, 'CTS25UN', '25 sq.mm Feed Through Terminal Block in Grey colour', 50, '2024-07-29 11:22:54', '2024-07-29 11:22:54'),
(8, 2, 'CTS25UNBK', '25 sq.mm Feed Through Terminal Block in Black colour', 50, '2024-07-29 11:23:53', '2024-07-29 11:23:53'),
(9, 2, 'CTS25UNGN', '25 sq.mm Feed Through Terminal Block in Green colour', 50, '2024-07-29 11:24:13', '2024-07-29 11:24:13'),
(10, 7, 'CTS25UN', '25 sq.mm Feed Through Terminal Block in Grey colour', 50, '2024-07-29 11:22:54', '2024-07-29 11:22:54'),
(11, 7, 'CTS25UNBK', '25 sq.mm Feed Through Terminal Block in Black colour', 50, '2024-07-29 11:23:53', '2024-07-29 11:23:53'),
(12, 7, 'CTS25UNGN', '25 sq.mm Feed Through Terminal Block in Green colour', 50, '2024-07-29 11:24:13', '2024-07-29 11:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `product_id` int NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `title`, `description`, `photo`, `product_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'CTS6U', '50/70 sq.mm Feed Through Terminal Blocks with Allen Screws', '35 sq.mm Feed Through Terminal Blocks are the most Versatile terminals for control, Automation, Instrumentation and Power Distribution applications. A specially designed flexible foot enable easy mounting and dismounting from the Din rail with the help of screw driver. These Terminal Blocks have marker holding recesses to accept marking tags for circuit identification. Cross connection can be achieved with the aid of shorting links / sleeves & screws.', '615646306.png', 3, 0, '2024-07-29 08:40:16', '2024-07-29 08:40:16'),
(2, 'CTS10U', '35 sq.mm Feed Through Terminal Blocks with Allen Screws', '35 sq.mm Feed Through Terminal Blocks are the most Versatile terminals for control, Automation, Instrumentation and Power Distribution applications. A specially designed flexible foot enable easy mounting and dismounting from the Din rail with the help of screw driver. These Terminal Blocks have marker holding recesses to accept marking tags for circuit identification. Cross connection can be achieved with the aid of shorting links / sleeves & screws.', '1656442197.png', 3, 0, '2024-07-29 09:09:42', '2024-07-29 09:09:42'),
(3, 'CTS35UN', '35 sq.mm Feed Through Terminal Blocks with Slotted Screws', '35 sq.mm Feed Through Terminal Blocks are the most Versatile terminals for control, Automation, Instrumentation and Power Distribution applications. A specially designed flexible foot enable easy mounting and dismounting from the Din rail with the help of screw driver. These Terminal Blocks have marker holding recesses to accept marking tags for circuit identification. Cross connection can be achieved with the aid of shorting links / sleeves & screws.', '727990668.png', 0, 0, '2024-07-29 09:11:02', '2024-07-29 09:11:02'),
(4, '', 'test ', 'datyadas sa', '1447058344.png', 0, 1, '2024-07-29 09:11:24', '2024-07-29 09:11:24'),
(5, '', 'test data', 'test new data', '46144005.png', 0, 1, '2024-07-29 09:38:55', '2024-07-29 09:38:55'),
(6, '', 'new dummy data', 'wagreg gehg rere', '1872451428.png', 0, 1, '2024-07-29 09:47:53', '2024-07-29 09:47:53'),
(7, 'CTS95/120N', '95/120 sq.mm Feed Through Terminal Blocks with Allen Screws', 'CTS95/120N Feed Through Terminal Blocks are the most Versatile terminals for control, Automation, Instrumentation and Power Distribution applications. A specially designed flexible foot enable easy mounting and dismounting from the Din rail with the help of screw driver. These Terminal Blocks have marker holding recesses to accept marking tags for circuit identification. Cross connection can be achieved with the aid of shorting links / sleeves & screws.', '1704127234.png', 3, 0, '2024-07-29 10:48:12', '2024-07-29 10:48:12'),
(8, 'CF4SPFT', '4 sq.mm Standard Feed Through Terminal Blocks', '4 sq.mm Feed Through Terminal Blocks are the most Versatile terminals for control, Automation, Instrumentation and Power Distribution applications. A specially designed flexible foot enable easy mounting and dismounting from the Din rail with the help of screw driver. These Terminal Blocks have marker holding recesses to accept marking tags for circuit identification. Cross connection can be achieved with the aid of shorting links / sleeves & screws.', '953118054.png', 0, 0, '2024-07-29 12:52:06', '2024-07-29 12:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `technical_data`
--

CREATE TABLE `technical_data` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `title_value` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `technical_data`
--

INSERT INTO `technical_data` (`id`, `product_id`, `title`, `title_value`, `created_at`, `update_at`) VALUES
(1, 3, 'Rated Voltage', '1000 V', '2024-07-29 10:51:51', '2024-07-29 10:51:51'),
(2, 3, 'Screw Size', 'M6', '2024-07-29 10:52:50', '2024-07-29 10:52:50'),
(3, 3, 'Operated by', 'Screwdriver', '2024-07-29 10:53:39', '2024-07-29 10:53:39'),
(4, 3, 'Rated Current', '125 A', '2024-07-29 10:54:39', '2024-07-29 10:54:39'),
(5, 3, 'Tightening Torque', '2.5 Nm', '2024-07-29 10:55:14', '2024-07-29 10:55:14'),
(6, 3, 'Product Function', 'Feed Through', '2024-07-29 10:55:31', '2024-07-29 10:55:31'),
(7, 3, 'Mounting Possibility', 'DIN 32/DIN 35/DIN 35-15 Rail', '2024-07-29 10:55:50', '2024-07-29 10:55:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accessories_image`
--
ALTER TABLE `accessories_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connection_data`
--
ALTER TABLE `connection_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordering_information`
--
ALTER TABLE `ordering_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technical_data`
--
ALTER TABLE `technical_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accessories_image`
--
ALTER TABLE `accessories_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `connection_data`
--
ALTER TABLE `connection_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ordering_information`
--
ALTER TABLE `ordering_information`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `technical_data`
--
ALTER TABLE `technical_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
