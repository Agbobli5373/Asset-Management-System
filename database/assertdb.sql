-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 01:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assertdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_tbl`
--

CREATE TABLE `asset_tbl` (
  `asset_id` int(100) NOT NULL,
  `asset_name` varchar(50) NOT NULL,
  `department_id` varchar(100) NOT NULL,
  `asset_quantity` int(50) DEFAULT NULL,
  `category_id` varchar(100) NOT NULL,
  `asset_price` decimal(10,2) NOT NULL,
  `depreciated_rate` decimal(5,2) NOT NULL,
  `details` varchar(250) NOT NULL,
  `asset_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `asset_tbl`
--

INSERT INTO `asset_tbl` (`asset_id`, `asset_name`, `department_id`, `asset_quantity`, `category_id`, `asset_price`, `depreciated_rate`, `details`, `asset_timestamp`) VALUES
(8, 'Computer System ', '11', 10, '2', '1.00', '0.00', 'Computer for the department', '2023-03-13 22:31:03'),
(9, 'Telephone', '3', 6, '3', '78.00', '0.02', 'Telephone for the department', '2023-03-14 09:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`, `category_timestamp`) VALUES
(2, 'Electronic device', '2023-03-12 16:50:50'),
(3, 'Funitures', '2023-03-12 16:50:59');

-- --------------------------------------------------------

--
-- Table structure for table `complain_tbl`
--

CREATE TABLE `complain_tbl` (
  `complain_id` int(100) NOT NULL,
  `asset_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `department_id` int(100) NOT NULL,
  `complain_detail` varchar(150) NOT NULL,
  `complain_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `isResolve` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `department_id` int(100) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`department_id`, `department_name`, `department_timestamp`) VALUES
(1, 'Food Tech', '2023-03-12 07:39:01'),
(3, 'HND', '2023-03-12 07:53:55'),
(11, 'stock1', '2023-03-12 09:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` mediumtext NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `department_id` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `email`, `role`, `department_id`, `timestamp`) VALUES
(1, 'admin', '12345678', 'admin@gmail.com', 'admin', '0', '2023-03-11 18:53:31'),
(2, 'ayuba', '12345678', 'ayuba@gmail.com', 'user', '3', '2023-03-11 22:13:19'),
(3, 'Aku Franca', '12345678', 'kojo@gmail.com', 'user', '1', '2023-03-13 05:55:29'),
(5, 'leo', '12345678', 'leo@gmail.com', 'user', '1', '2023-03-15 18:30:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_tbl`
--
ALTER TABLE `asset_tbl`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `complain_tbl`
--
ALTER TABLE `complain_tbl`
  ADD PRIMARY KEY (`complain_id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_tbl`
--
ALTER TABLE `asset_tbl`
  MODIFY `asset_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complain_tbl`
--
ALTER TABLE `complain_tbl`
  MODIFY `complain_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `department_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
