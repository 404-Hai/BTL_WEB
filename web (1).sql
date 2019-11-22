-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 06:05 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_admin`
--

CREATE TABLE `account_admin` (
  `username` varchar(50) NOT NULL,
  `password` char(50) NOT NULL,
  `numberphone` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `accounttype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_admin`
--

INSERT INTO `account_admin` (`username`, `password`, `numberphone`, `name`, `accounttype`) VALUES
('canh@gmail.com', '123', 56892, 'Canh', 'Admin'),
('hai@gmail.com', '123', 349032699, 'Thanh Hai', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `account_customer`
--

CREATE TABLE `account_customer` (
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `numberphone` char(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `accounttype` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_customer`
--

INSERT INTO `account_customer` (`username`, `password`, `numberphone`, `name`, `accounttype`, `id`) VALUES
('khach@gmail.com', '123', '0329462698', 'KhÃ¡ch má»™t', 'KhÃ¡ch', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bangtam`
--

CREATE TABLE `bangtam` (
  `stt` int(11) NOT NULL,
  `checkin` int(11) NOT NULL,
  `checkout` int(11) NOT NULL,
  `people` int(50) NOT NULL,
  `number` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `nameuser` varchar(254) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `name`, `price`, `nameuser`, `email`, `phone`) VALUES
(6, ' P-201', 2070, 'Nguyen Thanh Hai', 'khach@gmail.com', '0987543256');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` char(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `name`, `price`, `description`, `amount`) VALUES
(1, 'P-101', '50%', 'Nhân dịp sinh nhật 1 năm của khách sạn chúng tôi.', 1),
(2, 'P-202', '10%', 'Mung nam moi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `brand`, `price`, `description`, `image`) VALUES
(23, 'P-101', 'singleroom', 300, 'ÄÃ¢y lÃ  phÃ²ng Ä‘Æ¡n, phÃ¹ vá»›i 1-2 ngÆ°á»i', 'phongdon1.jpg'),
(24, 'P-201', 'doubleroom', 500, 'ÄÃ¢y lÃ  phÃ²ng dÃ nh cho 2-4 ngÆ°á»i', 'phongdoi1.jpg'),
(25, 'P-301', 'quadrupleroom', 900, 'ÄÃ¢y lÃ  phÃ²ng dÃ nh cho má»™t nhÃ³m tá»« 4-8 ngÆ°á»i', 'phongdorm1.jpg'),
(26, 'P-401', 'kingroom', 1200, 'CÄƒn phÃ²ng nÃ y Ä‘áº·c biá»‡t sang trá»ng, dÃ nh cho nhá»¯ng ngÆ°á»i cÃ³ nhu cáº§u hÆ°á»Ÿng thá»¥', 'phongking1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_admin`
--
ALTER TABLE `account_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `account_customer`
--
ALTER TABLE `account_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bangtam`
--
ALTER TABLE `bangtam`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_customer`
--
ALTER TABLE `account_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bangtam`
--
ALTER TABLE `bangtam`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
