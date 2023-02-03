-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 09:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `id` int(11) NOT NULL,
  `table_number` varchar(10) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `order_details` varchar(500) NOT NULL,
  `order_quantity` int(5) NOT NULL,
  `total_price` int(10) NOT NULL,
  `order_stat` varchar(100) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `table_number`, `order_number`, `order_details`, `order_quantity`, `total_price`, `order_stat`, `date_ordered`) VALUES
(353, '', 'IVQ410', 'Meal 1', 2, 400, '', '2022-12-05 01:24:36'),
(354, '', 'IVQ410', 'Meal 3', 2, 600, '', '2022-12-05 01:30:06'),
(359, '', 'KJB143', 'Meal 1', 2, 400, '', '2022-12-06 05:27:25'),
(360, '', 'KJB143', 'Meal 1', 2, 400, '', '2022-12-06 05:27:34'),
(361, '', 'AIH130', 'Meal 2', 3, 1050, '', '2022-12-06 07:49:00'),
(364, '', 'KAD124', 'Meal 1', 3, 600, '', '2022-12-06 07:53:38'),
(365, '', 'KAD124', 'Meal 2', 4, 1400, '', '2022-12-06 07:54:09'),
(366, '', 'VPN123', '', 0, 0, '', '2022-12-06 07:55:16'),
(367, '', 'MSK023', 'Meal 1', 1, 200, '', '2022-12-06 07:55:59'),
(368, '', 'PLU403', '', 0, 0, '', '2022-12-06 07:58:06'),
(372, '', 'NWI420', '', 0, 0, '', '2022-12-07 07:44:17'),
(373, '', 'TLS140', '', 0, 0, '', '2022-12-07 07:44:20'),
(374, '', 'DBE413', '', 0, 0, '', '2022-12-07 07:48:24'),
(375, '', 'THV412', '', 0, 0, '', '2022-12-07 07:49:34'),
(376, '', 'LMX013', '', 0, 0, '', '2022-12-07 07:53:11'),
(377, '', 'XHL013', '', 0, 0, '', '2022-12-07 07:53:40'),
(378, '', 'UQS412', '', 0, 0, '', '2022-12-07 07:54:16'),
(379, '', 'ZJY042', '', 0, 0, '', '2022-12-07 08:01:31'),
(380, '', 'TQH012', '', 0, 0, '', '2022-12-07 08:02:00'),
(381, '', 'VWG013', '', 0, 0, '', '2022-12-07 08:02:13'),
(382, '', 'ZRX402', '', 0, 0, '', '2022-12-07 08:04:25'),
(383, '', 'CHZ423', '', 0, 0, '', '2022-12-07 08:05:15'),
(384, '', 'BSY134', '', 0, 0, '', '2022-12-07 08:08:23'),
(385, '', 'AGR104', '', 0, 0, '', '2022-12-07 08:08:38'),
(386, '', 'WLC042', 'Meal 1', 2, 400, '', '2022-12-07 08:12:23'),
(387, '5', 'BWM021', 'Meal 1', 1, 200, '', '2022-12-07 08:15:36'),
(388, '6', 'EQS420', 'Meal 1', 3, 600, '', '2022-12-07 08:18:58'),
(389, '', 'EQS420', 'Meal 2', 3, 1050, '', '2022-12-07 08:19:13'),
(390, '7', 'MCX241', 'Meal 1', 3, 600, '', '2022-12-07 08:19:45'),
(391, '', 'MCX241', 'Meal 2', 3, 1050, '', '2022-12-07 08:19:55'),
(392, '', 'MCX241', 'Meal 3', 3, 900, '', '2022-12-07 08:20:00'),
(393, '', 'MCX241', 'Meal 3', 1, 300, '', '2022-12-07 08:20:00'),
(394, '8', 'CVD132', '', 0, 0, '', '2022-12-07 08:20:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_price` varchar(15) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_pic` varchar(255) NOT NULL,
  `order_qty` int(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_type`, `product_pic`, `order_qty`, `date_added`) VALUES
(10, 'Meal 1', '200', 'Breakfast', 'English-breakfast-GettyImages-120682141-58adafb35f9b58a3c9abe578.jpg', 0, '2022-11-28 09:57:50'),
(11, 'Meal 2', '350', 'Lunch', 'Bourbon-Chicken-Entree-Kitchen.jpg', 0, '2022-11-28 09:58:17'),
(12, 'Meal 3', '300', 'Dinner', 'th (2).jpg', 0, '2022-11-28 09:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `tablenums`
--

CREATE TABLE `tablenums` (
  `id` int(11) NOT NULL,
  `table_number` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tablenums`
--

INSERT INTO `tablenums` (`id`, `table_number`, `status`) VALUES
(43, 1, 'available'),
(44, 2, 'taken'),
(45, 3, 'taken'),
(46, 4, 'taken'),
(47, 5, 'taken'),
(48, 6, 'taken'),
(49, 7, 'taken'),
(50, 8, 'taken'),
(51, 9, 'available'),
(52, 10, 'available'),
(53, 11, 'available'),
(54, 12, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` int(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `contact`, `password`, `date_register`, `role`) VALUES
(1, 'admin', 'admin', 'admin@email.com', 911, 'admin', '2022-10-19 06:19:13', 'Admin'),
(9, 'Neil Babasa', 'NEIL', 'Jhudy@email.com', 9111, '123', '2022-11-21 13:41:39', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablenums`
--
ALTER TABLE `tablenums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tablenums`
--
ALTER TABLE `tablenums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
