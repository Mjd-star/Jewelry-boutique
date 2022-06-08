-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 10:56 PM
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
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(7) NOT NULL,
  `customer_id` int(7) NOT NULL,
  `product_id` int(7) NOT NULL,
  `quantity` int(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `quantity`, `country`, `city`) VALUES
(2, 14, 14, 1, 'saudi arabia', 'riyadh'),
(3, 14, 13, 1, 'saudi arabia', 'riyadh'),
(4, 14, 13, 1, 'saudi arabia', 'riyadh');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `ID` int(7) NOT NULL,
  `F_name` varchar(25) NOT NULL,
  `L_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` int(10) NOT NULL,
  `user_type` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`ID`, `F_name`, `L_name`, `username`, `email`, `password`, `phone`, `user_type`) VALUES
(2, 'Sara', 'Alnr', 'wwsar', 'sarra@hotmail.com', 'a1ce50ffa0baef8f05ef501da024f030', 562873098, 'User'),
(3, 'muneera', 'Alnassar', 'm_alnassar', 'muneera@hotmail.com', '92586b94b314b2d9d7250a60cd11e14e', 562873983, 'User'),
(4, 'lama', 'Alnassar', 'l_alnassar', 'lama@hotmail.com', '5ba45df302a532b6f7e9f6bfbae69ec8', 562873984, 'User'),
(5, 'fahad', 'Alnassar', 'f_alnassar', 'fahad@hotmail.com', '555d6c24bf51d67a2e4fc681a519f54b', 562873985, 'User'),
(6, 'muna', 'Alnassar', 'muna_alnassar', 'muna@hotmail.com', 'c30f657f1f5005cf03a8c25bf3152030', 562873986, 'User'),
(14, 'sara', 'saleh', 'mms', 'ethar@gmail.com', '202cb962ac59075b964b07152d234b70', 544444444, 'User'),
(16, 'maha', 'ahmad', 'maha', 'maha@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', 566666666, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` decimal(25,0) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `price`, `pic`, `Description`, `product_type`, `stock`) VALUES
(13, 'Earrings', '100000', 'Earings1.jpg', '   Earrings in white gold, set with two diamonds.', 'Earring', 9),
(15, 'Ring', '60000', 'Ring1.jpg', 'Diamond ring in rose gold, set with a pear-shaped pink quartz.', 'Ring', 3),
(16, 'Necklace', '4500', 'Necklace2.jpg', 'Necklace1 in rose gold half pavé diamond.', 'Necklace', 8),
(17, 'Bracelet', '9000', 'Bracelet1.jpg', 'Bracelet in white gold, set with diamonds.', 'Bracelet', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`,`customer_id`,`product_id`),
  ADD KEY `customer id` (`customer_id`),
  ADD KEY `product id` (`product_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `persons` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
