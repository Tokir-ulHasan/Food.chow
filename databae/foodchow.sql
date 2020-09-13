-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 02:47 PM
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
-- Database: `foodchow`
--

-- --------------------------------------------------------

--
-- Table structure for table `chowadmin`
--

CREATE TABLE `chowadmin` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chowadmin`
--

INSERT INTO `chowadmin` (`id`, `userName`, `pass`) VALUES
(1, 'admin', '123'),
(2, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_add_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`, `cat_add_date`) VALUES
(1, 'Lunch', '2020-08-28 20:13:35'),
(2, 'Breakfast', '2020-08-28 20:14:13'),
(3, 'Diner ', '2020-08-28 20:14:13'),
(4, 'Barger', '2020-09-08 06:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_delevery_boy`
--

CREATE TABLE `tbl_delevery_boy` (
  `dlb_id` int(11) NOT NULL,
  `dlb_name` varchar(255) NOT NULL,
  `dlb_mail` varchar(255) NOT NULL,
  `dlb_phone` varchar(255) NOT NULL,
  `dlb_address` text NOT NULL,
  `dlb_img` varchar(255) NOT NULL,
  `dlb_curd_id` int(11) NOT NULL,
  `dlb_joinDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_delevery_boy`
--

INSERT INTO `tbl_delevery_boy` (`dlb_id`, `dlb_name`, `dlb_mail`, `dlb_phone`, `dlb_address`, `dlb_img`, `dlb_curd_id`, `dlb_joinDate`) VALUES
(1, 'Abdul', 'Abdul@gmail.com', '123456789012', 'dhaka,bangladesg', '../asset/UploadFile/FoodItemImg/709e21aa44.jpg', 12345, '2020-09-04 20:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fooddetails`
--

CREATE TABLE `tbl_fooddetails` (
  `fd_id` int(11) NOT NULL,
  `fd_name` varchar(300) NOT NULL,
  `fd_description` text NOT NULL,
  `fd_price` double NOT NULL,
  `fd_discount` double NOT NULL,
  `fd_image` varchar(300) NOT NULL,
  `fd_addDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `fd_catagoery` int(11) NOT NULL,
  `fd_rating` double DEFAULT NULL,
  `fd_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fooddetails`
--

INSERT INTO `tbl_fooddetails` (`fd_id`, `fd_name`, `fd_description`, `fd_price`, `fd_discount`, `fd_image`, `fd_addDate`, `fd_catagoery`, `fd_rating`, `fd_product`) VALUES
(4, 'Rice with meat ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 50, 0, '../asset/UploadFile/FoodItemImg/709e21aa44.jpg', '2020-09-03 15:23:56', 1, 2.5, 1),
(5, 'Rice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 30, 10, '../asset/UploadFile/FoodItemImg/719bd03f21.jpg', '2020-09-03 15:24:45', 1, 2.5, 2),
(6, 'Barger', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 20, 0, '../asset/UploadFile/FoodItemImg/43a0e32914.jpg', '2020-09-03 15:25:23', 2, 2.5, 3),
(7, 'Pizza', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 40, 0, '../asset/UploadFile/FoodItemImg/51992eac60.jpg', '2020-09-03 15:26:04', 2, 2.5, 4),
(8, 'Chicken Boast', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 60, 0, '../asset/UploadFile/FoodItemImg/84ba5825d4.jpg', '2020-09-03 15:26:56', 3, 2.5, 5),
(9, 'Barger', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 60, 0, '../asset/UploadFile/FoodItemImg/11823037c5.jpg', '2020-09-03 15:28:02', 3, 2.5, 6),
(10, 'Barger1', '', 230, 0, '../asset/UploadFile/FoodItemImg/43df57da85.png', '2020-09-08 06:44:22', 4, 2.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `od_id` int(11) NOT NULL,
  `od_type` int(11) NOT NULL,
  `od_items` varchar(255) NOT NULL,
  `od_paymentStatus` int(11) NOT NULL,
  `od_price` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `od_Loction` varchar(300) NOT NULL,
  `delvery_boy_id` int(11) DEFAULT NULL,
  `delever_date` datetime NOT NULL,
  `od_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`od_id`, `od_type`, `od_items`, `od_paymentStatus`, `od_price`, `customer_id`, `od_Loction`, `delvery_boy_id`, `delever_date`, `od_date`) VALUES
(6, 3, '4,5', 1, 450, 2, 'chitagong', 1, '2020-09-07 03:16:24', '2020-09-06 08:56:16'),
(7, 1, '4,6', 2, 254, 2, 'Dahaka', 1, '0000-00-00 00:00:00', '2020-09-07 05:51:43'),
(9, 2, '1', 1, 250, 1, 'Sylate', NULL, '0000-00-00 00:00:00', '2020-09-07 17:36:01'),
(10, 2, '4', 2, 257, 1, 'Dahaka', NULL, '0000-00-00 00:00:00', '2020-09-08 05:51:43'),
(11, 1, '4,5', 1, 250, 1, 'Ctg', 1, '0000-00-00 00:00:00', '2020-09-08 06:40:28'),
(12, 3, '4', 2, 257, 2, 'Dahaka', NULL, '0000-00-00 00:00:00', '2020-09-23 22:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `joinDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `phoneNo`, `address`, `password`, `joinDate`) VALUES
(1, 'Abdullah', 'Abdullah@gmail.com', '01245789632', 'chittagong,Bangladesh', '12345', '2020-09-04 15:01:48'),
(2, 'Jubair', 'Jubair@gmail.com', '01245789632', 'chittagong,Bangladesh', '12345', '2020-09-04 15:01:48'),
(3, 'mj', 'mj@gmail.com', '01760123456', 'gohira', 'Mj10201526', '2020-09-08 09:54:52'),
(4, 'MJobair', 'mjobair@gmail.com', '01820456789', 'Raojan', 'Mj10201526', '2020-09-08 09:57:43'),
(5, 'Abdullah', 'Abdullah@gmail.com', '01789456123', 'Abdullah', 'Ma10201526', '2020-09-08 10:06:12'),
(6, 'Tokir', 'tokir@gmail.com', '01789654123', 'noapara', 'Mt10201510', '2020-09-08 10:07:53'),
(7, 'Mujahid', 'mojahid@gmail.com', '01456789456', 'chittagong', 'Mm10201213', '2020-09-11 12:06:15'),
(8, 'miraz', 'miraz@gmail.com', '01789456123', 'gohira', 'mjhgsajga', '2020-09-11 12:36:26'),
(12, 'fngjd', 'yutd@gmail.com', '01478456123', 'ghsdf', 'jhjsdgg', '2020-09-11 12:57:14'),
(13, 'kjlhl', 'dfhg@gmail.com', '147892546844', 'ghsdf', 'ncvjhgfd', '2020-09-11 12:58:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chowadmin`
--
ALTER TABLE `chowadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_delevery_boy`
--
ALTER TABLE `tbl_delevery_boy`
  ADD PRIMARY KEY (`dlb_id`);

--
-- Indexes for table `tbl_fooddetails`
--
ALTER TABLE `tbl_fooddetails`
  ADD PRIMARY KEY (`fd_id`),
  ADD UNIQUE KEY `fd_product` (`fd_product`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`od_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `delvery_boy_id` (`delvery_boy_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chowadmin`
--
ALTER TABLE `chowadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_delevery_boy`
--
ALTER TABLE `tbl_delevery_boy`
  MODIFY `dlb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_fooddetails`
--
ALTER TABLE `tbl_fooddetails`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`delvery_boy_id`) REFERENCES `tbl_delevery_boy` (`dlb_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
