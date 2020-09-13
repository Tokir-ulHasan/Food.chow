-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 08:45 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodchow`
--
CREATE DATABASE IF NOT EXISTS `foodchow` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodchow`;

-- --------------------------------------------------------

--
-- Table structure for table `chowadmin`
--

CREATE TABLE IF NOT EXISTS `chowadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `tbl_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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

CREATE TABLE IF NOT EXISTS `tbl_delevery_boy` (
  `dlb_id` int(11) NOT NULL AUTO_INCREMENT,
  `dlb_name` varchar(255) NOT NULL,
  `dlb_mail` varchar(255) NOT NULL,
  `dlb_phone` varchar(255) NOT NULL,
  `dlb_address` text NOT NULL,
  `dlb_img` varchar(255) NOT NULL,
  `dlb_curd_id` int(11) NOT NULL,
  `dlb_joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`dlb_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_delevery_boy`
--

INSERT INTO `tbl_delevery_boy` (`dlb_id`, `dlb_name`, `dlb_mail`, `dlb_phone`, `dlb_address`, `dlb_img`, `dlb_curd_id`, `dlb_joinDate`) VALUES
(1, 'Abdul', 'Abdul@gmail.com', '123456789012', 'dhaka,bangladesg', '../asset/UploadFile/FoodItemImg/709e21aa44.jpg', 12345, '2020-09-04 20:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fooddetails`
--

CREATE TABLE IF NOT EXISTS `tbl_fooddetails` (
  `fd_id` int(11) NOT NULL AUTO_INCREMENT,
  `fd_name` varchar(300) NOT NULL,
  `fd_description` text NOT NULL,
  `fd_price` double NOT NULL,
  `fd_discount` double NOT NULL,
  `fd_image` varchar(300) NOT NULL,
  `fd_addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fd_catagoery` int(11) NOT NULL,
  `fd_rating` double DEFAULT NULL,
  `fd_product` int(11) NOT NULL,
  PRIMARY KEY (`fd_id`),
  UNIQUE KEY `fd_product` (`fd_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_fooddetails`
--

INSERT INTO `tbl_fooddetails` (`fd_id`, `fd_name`, `fd_description`, `fd_price`, `fd_discount`, `fd_image`, `fd_addDate`, `fd_catagoery`, `fd_rating`, `fd_product`) VALUES
(4, 'Rice with meat', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam numquam, eaque assumenda non odit a incidunt ut itaque consequatur, doloribus earum quo voluptas! Possimus nam quas doloremque suscipit fugiat veritatis?', 50, 0, '../asset/UploadFile/FoodItemImg/709e21aa44.jpg', '2020-09-03 15:23:56', 1, 2.5, 1),
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

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `od_id` int(11) NOT NULL AUTO_INCREMENT,
  `od_type` int(11) NOT NULL,
  `od_items` varchar(255) NOT NULL,
  `od_paymentStatus` int(11) NOT NULL,
  `od_price` double NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `od_Loction` varchar(300) NOT NULL,
  `delvery_boy_id` int(11) DEFAULT NULL,
  `delever_date` datetime NOT NULL,
  `od_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`od_id`),
  KEY `customer_id` (`customer_id`),
  KEY `delvery_boy_id` (`delvery_boy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `emai` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `emai`, `phoneNo`, `address`, `password`, `joinDate`) VALUES
(1, 'Abdullah', 'Abdullah@gmail.com', '01245789632', 'chittagong,Bangladesh', '12345', '2020-09-04 15:01:48'),
(2, 'Jubair', 'Jubair@gmail.com', '01245789632', 'chittagong,Bangladesh', '12345', '2020-09-04 15:01:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_user` (`id`),
  ADD CONSTRAINT `tbl_orders_ibfk_3` FOREIGN KEY (`delvery_boy_id`) REFERENCES `tbl_delevery_boy` (`dlb_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
