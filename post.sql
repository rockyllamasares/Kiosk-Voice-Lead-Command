-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 07:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `date_created`) VALUES
(9, 'Drinks', '2023-01-25 03:17:18'),
(10, 'Lunch', '2023-01-27 08:40:26'),
(11, 'Dinner', '2023-01-27 08:40:35'),
(12, 'Breakfast', '2023-01-27 08:40:50');

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
  `order_stat` int(1) NOT NULL,
  `date_ordered` date NOT NULL DEFAULT current_timestamp(),
  `order_option` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`id`, `table_number`, `order_number`, `order_details`, `order_quantity`, `total_price`, `order_stat`, `date_ordered`, `order_option`) VALUES
(706, '2', 'RIP102', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(707, '3', 'ZHM312', '', 0, 0, 0, '2023-02-17', ''),
(708, '3', 'BTS321', '', 0, 0, 0, '2023-02-17', ''),
(709, '1', 'FMI130', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(710, '2', 'VHR143', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(711, '1', 'ONG403', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(712, '2', 'XST214', '', 0, 0, 0, '2023-02-17', ''),
(713, '2', 'DEJ240', '', 0, 0, 0, '2023-02-17', ''),
(714, '2', 'KAQ403', '', 0, 0, 0, '2023-02-17', ''),
(715, '3', 'AJN042', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(716, '1', 'RGT310', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(717, '', 'RGT310', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(718, '4', 'DKZ412', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(719, '4', 'BIV142', 'Mocktail', 1, 50, 0, '2023-02-17', ''),
(720, '5', 'QBC014', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(721, '6', 'AIK214', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(722, '1', 'QYM342', '', 0, 0, 0, '2023-02-17', ''),
(724, '2', 'HPD024', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(725, '2', 'HPD024', 'Cocktail', 1, 50, 0, '2023-02-17', ''),
(726, '1', 'RCH304', '', 0, 0, 0, '2023-02-17', ''),
(727, '2', 'BNG430', '', 0, 0, 0, '2023-02-18', ''),
(728, '2', 'QEN231', '', 0, 0, 0, '2023-02-18', ''),
(729, '2', 'HYB304', '', 0, 0, 0, '2023-02-18', ''),
(730, '2', 'UCO320', '', 0, 0, 0, '2023-02-18', ''),
(731, '2', 'WEG134', '', 0, 0, 0, '2023-02-18', ''),
(732, '2', 'GTB314', '', 0, 0, 0, '2023-02-18', ''),
(733, '2', 'UCD012', '', 0, 0, 0, '2023-02-18', ''),
(734, '2', 'TWQ240', '', 0, 0, 0, '2023-02-18', ''),
(735, '2', 'SLE143', '', 0, 0, 0, '2023-02-18', ''),
(736, '2', 'SZG320', '', 0, 0, 0, '2023-02-18', ''),
(737, '2', 'HRO210', '', 0, 0, 0, '2023-02-18', ''),
(738, '2', 'ZTC431', '', 0, 0, 0, '2023-02-18', ''),
(739, '2', 'IGM014', '', 0, 0, 0, '2023-02-18', ''),
(740, '3', 'GOR043', '', 0, 0, 0, '2023-02-18', ''),
(741, '4', 'HZB201', '', 0, 0, 0, '2023-02-24', ''),
(742, '4', 'YZU103', '', 0, 0, 0, '2023-02-24', ''),
(743, '5', 'TQR032', 'Cocktail', 1, 50, 0, '2023-02-24', ''),
(744, '6', 'JSQ034', 'Cocktail', 1, 50, 0, '2023-02-24', ''),
(745, '7', 'MCK402', '', 0, 0, 0, '2023-02-24', ''),
(746, '7', 'ONY412', '', 0, 0, 0, '2023-02-24', ''),
(747, '8', 'SNL432', '', 0, 0, 0, '2023-02-24', ''),
(748, '8', 'ZLH124', '', 0, 0, 0, '2023-02-24', ''),
(749, '8', 'ICW132', '', 0, 0, 0, '2023-02-24', ''),
(750, '8', 'PTS123', '', 0, 0, 0, '2023-02-24', ''),
(751, '8', 'DYQ412', '', 0, 0, 0, '2023-02-24', ''),
(752, '8', 'PQC123', '', 0, 0, 0, '2023-02-24', ''),
(753, '8', 'LWQ024', '', 0, 0, 0, '2023-02-24', ''),
(754, '8', 'RZV143', '', 0, 0, 0, '2023-02-24', ''),
(755, '10', 'KRY124', '', 0, 0, 0, '2023-02-24', ''),
(756, '10', 'PFH324', '', 0, 0, 0, '2023-02-24', ''),
(757, '8', 'OBA234', '', 0, 0, 0, '2023-02-24', ''),
(758, '8', 'EUR031', '', 0, 0, 0, '2023-02-24', ''),
(759, '8', 'XZV430', '', 0, 0, 0, '2023-02-24', ''),
(760, '8', 'FCT104', '', 0, 0, 0, '2023-02-24', ''),
(761, '11', 'VIJ301', 'Cocktail', 1, 50, 0, '2023-02-24', ''),
(762, '8', 'QIM032', '', 0, 0, 0, '2023-02-24', ''),
(763, '8', 'GOM213', '', 0, 0, 0, '2023-02-24', ''),
(764, '8', 'AOB023', '', 0, 0, 0, '2023-02-24', ''),
(765, '1', 'UYR420', 'Cocktail', 1, 50, 0, '2023-02-24', ''),
(766, '1', 'UYR420', 'Cocktail', 1, 50, 0, '2023-02-24', ''),
(767, '1', 'XHQ231', 'Cocktail', 1, 50, 0, '2023-02-24', ''),
(768, '2', 'AZQ412', '', 0, 0, 0, '2023-02-25', ''),
(769, '2', 'CLJ241', '', 0, 0, 0, '2023-02-25', ''),
(770, '2', 'RED034', '', 0, 0, 0, '2023-02-25', ''),
(771, '2', 'YJX134', '', 0, 0, 0, '2023-02-25', ''),
(772, '2', 'NVS321', '', 0, 0, 0, '2023-02-25', ''),
(773, '2', 'TGQ301', '', 0, 0, 0, '2023-02-25', ''),
(774, '2', 'GBT042', '', 0, 0, 0, '2023-02-25', ''),
(775, '2', 'YRS234', '', 0, 0, 0, '2023-02-25', ''),
(776, '2', 'SXC314', '', 0, 0, 0, '2023-02-25', ''),
(777, '2', 'VUM031', '', 0, 0, 0, '2023-02-25', ''),
(778, '2', 'GST201', '', 0, 0, 0, '2023-02-25', ''),
(779, '2', 'UTS421', '', 0, 0, 0, '2023-02-25', ''),
(780, '2', 'SDB102', '', 0, 0, 0, '2023-02-25', ''),
(781, '2', 'NQH420', '', 0, 0, 0, '2023-02-25', ''),
(782, '2', 'COJ324', '', 0, 0, 0, '2023-02-25', ''),
(783, '2', 'ZGN124', '', 0, 0, 0, '2023-02-25', ''),
(784, '2', 'YUI410', '', 0, 0, 0, '2023-02-25', ''),
(785, '2', 'BRI032', '', 0, 0, 0, '2023-02-25', ''),
(786, '2', 'GZR140', '', 0, 0, 0, '2023-02-25', ''),
(787, '2', 'ZWB314', '', 0, 0, 0, '2023-02-25', ''),
(788, '2', 'LWR410', '', 0, 0, 0, '2023-02-25', ''),
(789, '2', 'TSY413', '', 0, 0, 0, '2023-02-25', ''),
(790, '2', 'ABL310', '', 0, 0, 0, '2023-02-25', ''),
(791, '2', 'LHT201', '', 0, 0, 0, '2023-02-26', ''),
(792, '2', 'ZTJ403', '', 0, 0, 0, '2023-02-26', ''),
(793, '2', 'FNT203', '', 0, 0, 0, '2023-02-26', ''),
(794, '2', 'RMF120', '', 0, 0, 0, '2023-02-26', ''),
(795, '2', 'QYA031', '', 0, 0, 0, '2023-02-26', ''),
(796, '2', 'PGR041', '', 0, 0, 0, '2023-02-26', ''),
(797, '2', 'MVL032', '', 0, 0, 0, '2023-02-26', ''),
(798, '2', 'CFS230', '', 0, 0, 0, '2023-02-26', ''),
(799, '2', 'EUG031', '', 0, 0, 0, '2023-02-26', ''),
(800, '2', 'TGX412', '', 0, 0, 0, '2023-02-26', ''),
(801, '2', 'DMG042', '', 0, 0, 0, '2023-02-26', ''),
(802, '2', 'CMN430', '', 0, 0, 0, '2023-02-26', ''),
(803, '2', 'UIZ430', '', 0, 0, 0, '2023-02-26', ''),
(804, '2', 'USE230', '', 0, 0, 0, '2023-02-26', ''),
(805, '2', 'UNY013', '', 0, 0, 0, '2023-02-26', ''),
(806, '2', 'CFE201', '', 0, 0, 0, '2023-02-26', ''),
(807, '2', 'PIO012', '', 0, 0, 0, '2023-02-26', ''),
(808, '2', 'DWZ043', '', 0, 0, 0, '2023-02-26', ''),
(809, '2', 'UQE130', '', 0, 0, 0, '2023-02-26', ''),
(810, '2', 'EYD124', '', 0, 0, 0, '2023-02-26', ''),
(811, '2', 'WSO012', '', 0, 0, 0, '2023-02-26', ''),
(812, '2', 'AMC132', '', 0, 0, 0, '2023-02-26', ''),
(813, '2', 'NAZ432', 'Cocktail', 1, 50, 0, '2023-02-26', ''),
(814, '2', 'EQM324', '', 0, 0, 0, '2023-02-26', ''),
(815, '2', 'GHT340', '', 0, 0, 0, '2023-02-26', ''),
(816, '2', 'KTP312', '', 0, 0, 0, '2023-02-26', ''),
(817, '2', 'GKV340', '', 0, 0, 0, '2023-02-26', ''),
(818, '2', 'PFX234', '', 0, 0, 0, '2023-02-26', ''),
(819, '2', 'JKG420', '', 0, 0, 0, '2023-02-26', ''),
(820, '2', 'QON403', '', 0, 0, 0, '2023-02-26', ''),
(821, '', 'SVC310', '', 0, 0, 0, '2023-02-26', ''),
(822, '3', 'YNT312', '', 0, 0, 0, '2023-02-26', ''),
(823, '3', 'VPW302', '', 0, 0, 0, '2023-02-26', ''),
(824, '', 'FKU320', '', 0, 0, 0, '2023-02-26', ''),
(825, '', 'ABU421', '', 0, 0, 0, '2023-02-26', ''),
(826, '', 'AUI402', '', 0, 0, 0, '2023-02-26', ''),
(827, '', 'BYP142', '', 0, 0, 0, '2023-02-26', ''),
(828, '', 'XRF314', 'Mocktail', 5, 250, 0, '2023-02-26', ''),
(830, '3', 'XJW012', '', 0, 0, 0, '2023-02-26', ''),
(831, '8', 'WNX432', '', 0, 0, 0, '2023-02-26', ''),
(832, '1', 'NCI214', '', 0, 0, 0, '2023-02-28', ''),
(833, '2', 'PYA243', 'Cocktail', 2, 100, 0, '2023-03-05', ''),
(834, '1', 'MOI301', 'Mocktail', 2, 100, 0, '2023-03-05', '');

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
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_type`, `product_pic`, `order_qty`, `date_added`, `status`) VALUES
(18, 'Ramen', '120', 'Breakfast', 'Ramen.jpeg', 0, '2023-01-27 16:21:54', 'enabled'),
(19, 'Pork curry', '180', 'Lunch', 'Pork Curry.jpg', 0, '2023-01-27 16:23:57', 'enabled'),
(20, 'Sizzling', '190', 'Dinner', 'Sizzling.jpg', 0, '2023-01-27 16:24:40', 'enabled'),
(21, 'Vegtable Curry', '180', 'Lunch', 'Vegtable Curry.jpg', 0, '2023-01-27 16:25:38', 'enabled'),
(22, 'Chiken Curry', '180', 'Dinner', 'Chiken Curry.jpg', 0, '2023-01-27 16:26:10', 'enabled'),
(23, 'Beef Massaman', '200', 'Dinner', 'Adobado.jpeg', 0, '2023-01-27 16:30:21', 'enabled'),
(24, 'Cocktail', '50', 'Drinks', 'Coctail.jpg', 0, '2023-01-27 16:33:31', 'disabled'),
(25, 'Mocktail', '50', 'Drinks', 'Mocktail.jpg', 0, '2023-01-27 16:33:55', 'enabled'),
(38, 'yumburger', '80', 'Breakfast', 'chilli 5.jpg', 0, '2023-02-26 16:06:37', 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `reportlist`
--

CREATE TABLE `reportlist` (
  `id` int(11) NOT NULL,
  `table_number` varchar(10) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `order_details` varchar(500) NOT NULL,
  `order_quantity` int(5) NOT NULL,
  `total_price` int(10) NOT NULL,
  `order_stat` int(1) NOT NULL,
  `date_ordered` int(11) NOT NULL DEFAULT current_timestamp(),
  `order_option` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportlist`
--

INSERT INTO `reportlist` (`id`, `table_number`, `order_number`, `order_details`, `order_quantity`, `total_price`, `order_stat`, `date_ordered`, `order_option`) VALUES
(0, '2', 'RYJ142', 'Mocktail', 1, 50, 0, 2023, ''),
(0, '3', 'LXJ243', 'Mocktail', 1, 50, 0, 2023, '');

-- --------------------------------------------------------

--
-- Table structure for table `tablenums`
--

CREATE TABLE `tablenums` (
  `id` int(11) NOT NULL,
  `table_number` int(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tablenums`
--

INSERT INTO `tablenums` (`id`, `table_number`, `status`) VALUES
(59, 1, 'taken'),
(60, 2, 'taken'),
(61, 3, 'taken'),
(62, 4, 'available'),
(63, 5, 'available'),
(64, 6, 'available'),
(65, 7, 'available'),
(66, 8, 'available'),
(67, 9, 'available'),
(68, 10, 'available'),
(69, 11, 'available'),
(70, 12, 'available'),
(71, 13, 'available'),
(72, 14, 'available'),
(73, 15, 'available');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `contact`, `password`, `date_register`, `role`) VALUES
(1, 'admin', 'admin', 'admin@email.com', 911, 'admin', '2022-10-19 06:19:13', 'Admin'),
(23, 'paul', 'paul', 'paul@email.com', 9584890, 'paul123', '2023-03-05 03:31:53', 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=837;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tablenums`
--
ALTER TABLE `tablenums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
