-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 06:22 PM
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
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `img` varchar(300) NOT NULL,
  `user_card_id` varchar(30) NOT NULL,
  `date` varchar(300) NOT NULL,
  `update` varchar(300) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `chowadmin`
--

INSERT INTO `chowadmin` (`id`, `userName`, `name`, `email`, `img`, `user_card_id`, `date`, `update`, `pass`) VALUES
(1, 'admin', 'Abdullah', 'Abdullah@gmail.com', '../asset/UploadFile/Addmin/44d46e9326.jpg', '1703310201526', '2020-09-09 08:24:22', '22 September 2020, 12:24 am', '1234'),
(2, 'admin1', 'Arif', 'Arif@gmail.com', '../asset/UploadFile/Addmin/ccc362f2c5.jpg', '1703310201510', '2020-09-22 04:17:19', '22 September 2020, 1:00 am', '124'),
(3, 'Admin3', 'Jubair Chy', 'Jubair@gmail.com', '', '1703310201527', '2020-09-22 12:17:25', '', 'Jub1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE IF NOT EXISTS `tbl_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_add_date` varchar(300) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`, `cat_add_date`) VALUES
(1, 'Lunch', '2020-08-29 02:13:35'),
(2, 'Breakfast', '2020-08-29 02:14:13'),
(3, 'Diner ', '2020-08-29 02:14:13'),
(4, 'Barger', '2020-09-08 12:43:45'),
(5, 'Juices', '20 September 2020, 7:45 am');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_delevery_boy`
--

INSERT INTO `tbl_delevery_boy` (`dlb_id`, `dlb_name`, `dlb_mail`, `dlb_phone`, `dlb_address`, `dlb_img`, `dlb_curd_id`, `dlb_joinDate`) VALUES
(0, '----', '', '', '', '', 0, '2020-09-25 16:02:59'),
(1, 'Abdul', 'Abdul@gmail.com', '123456789012', 'dhaka,bangladesg', '../asset/UploadFile/Deleveryboy/avt-img.jpg', 12345, '2020-09-04 20:04:43'),
(2, 'Tokir', 'Abdul@gmail.com', '123456789012', 'dhaka,bangladesg', '../asset/UploadFile/Deleveryboy/avt-img.jpg', 12346, '2020-09-04 20:04:43'),
(3, 'Jobair', 'Abdul@gmail.com', '123456789012', 'dhaka,bangladesg', '../asset/UploadFile/Deleveryboy/avt-img.jpg', 12347, '2020-09-04 20:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fooddetails`
--

CREATE TABLE IF NOT EXISTS `tbl_fooddetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fd_name` varchar(300) NOT NULL,
  `fd_description` text NOT NULL,
  `fd_price` double NOT NULL,
  `fd_discount` double NOT NULL,
  `fd_image` varchar(300) NOT NULL,
  `fd_addDate` varchar(300) NOT NULL,
  `fd_catagoery_name` varchar(255) NOT NULL,
  `fd_cat_id` int(11) NOT NULL,
  `fd_rating` double DEFAULT NULL,
  `fd_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fd_product` (`fd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_fooddetails`
--

INSERT INTO `tbl_fooddetails` (`id`, `fd_name`, `fd_description`, `fd_price`, `fd_discount`, `fd_image`, `fd_addDate`, `fd_catagoery_name`, `fd_cat_id`, `fd_rating`, `fd_id`) VALUES
(16, 'Rice with meat', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae voluptatibus ab ducimus nisi laborum porro corrupti, rerum ipsa impedit quibusdam alias laudantium illo accusantium eaque. Culpa nam quas nulla sit.', 100, 0, '../asset/UploadFile/FoodItemImg/fb8b76c0a0.jpg', '18 September 2020, 11:22 pm', 'Lunch', 1, 2.5, 'LunRic1'),
(17, 'Barger', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae voluptatibus ab ducimus nisi laborum porro corrupti, rerum ipsa impedit quibusdam alias laudantium illo accusantium eaque. Culpa nam quas nulla sit.', 30, 12, '../asset/UploadFile/FoodItemImg/8f5bf0a4a6.jpg', '18 September 2020, 11:23 pm', 'Breakfast', 2, 2.5, 'BreBar3'),
(18, 'Mea', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae voluptatibus ab ducimus nisi laborum porro corrupti, rerum ipsa impedit quibusdam alias laudantium illo accusantium eaque. Culpa nam quas nulla sit.', 50, 0, '../asset/UploadFile/FoodItemImg/0f53d3778d.jpg', '18 September 2020, 11:24 pm', 'Diner ', 3, 2.5, 'DinMea0'),
(19, 'Chicken ', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae voluptatibus ab ducimus nisi laborum porro corrupti, rerum ipsa impedit quibusdam alias laudantium illo accusantium eaque. Culpa nam quas nulla sit.', 50, 0, '../asset/UploadFile/FoodItemImg/1232ecda7d.jpg', '18 September 2020, 11:25 pm', 'Juices', 1, 2.5, 'LunChi1'),
(20, 'vagitable', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae voluptatibus ab ducimus nisi laborum porro corrupti, rerum ipsa impedit quibusdam alias laudantium illo accusantium eaque. Culpa nam quas nulla sit.', 30, 0, '../asset/UploadFile/FoodItemImg/ff1312e284.jpg', '18 September 2020, 11:25 pm', 'Lunch', 1, 2.5, 'Lunvag5'),
(21, 'Chicken ', 'sdf', 50, 0, '../asset/UploadFile/FoodItemImg/becd569420.jpg', '18 September 2020, 11:27 pm', 'Juices', 1, 2.5, 'LunChi7');

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
  `delvery_boy_id` int(11) DEFAULT '0',
  `delevery_reject_by` varchar(255) NOT NULL,
  `delever_date` datetime NOT NULL,
  `od_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orderCustomId` int(11) NOT NULL,
  PRIMARY KEY (`od_id`),
  KEY `customer_id` (`customer_id`),
  KEY `delvery_boy_id` (`delvery_boy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`od_id`, `od_type`, `od_items`, `od_paymentStatus`, `od_price`, `customer_id`, `od_Loction`, `delvery_boy_id`, `delevery_reject_by`, `delever_date`, `od_date`, `orderCustomId`) VALUES
(9, 2, '20', 1, 250, 1, 'Sylate', 1, 'a,1', '2020-09-25 19:45:38', '2020-09-07 17:36:01', 125),
(12, 4, '16,21', 2, 257, 2, 'Dahaka', 1, 'a,1', '2020-09-25 22:17:23', '2020-09-23 22:29:42', 128),
(14, 2, '16', 1, 250, 1, 'Sylate', 1, 'a,1', '2020-09-25 19:43:15', '2020-09-07 17:36:01', 130),
(17, 3, '17', 1, 250, 1, 'Sylate', 1, 'a,1', '2020-09-25 21:39:20', '2020-09-07 17:36:01', 133),
(18, 3, '17', 1, 250, 1, 'Sylate', 1, 'a,1', '2020-09-25 21:45:16', '2020-09-07 17:36:01', 134),
(20, 1, '21,16', 1, 250, 1, 'Dhaka', 0, '', '0000-00-00 00:00:00', '2020-09-25 16:19:42', 135),
(21, 1, '21,16', 1, 500, 2, 'Ctg', 0, '', '0000-00-00 00:00:00', '2020-09-25 16:19:42', 136),
(22, 0, '', 0, 0, NULL, '', 0, '', '0000-00-00 00:00:00', '2020-09-25 16:21:10', 0),
(23, 0, '', 0, 0, NULL, '', 0, '', '0000-00-00 00:00:00', '2020-09-25 16:21:10', 0),
(24, 3, '16,19', 1, 400, 1, 'syllet', 0, '', '0000-00-00 00:00:00', '2020-09-25 16:21:10', 138);

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
(1, 'Abdullah', 'Abdullah@gmail.com', '012', 'chittagong,Bangladesh', '12345', '2020-09-04 15:01:48'),
(2, 'Jubair', 'Jubair@gmail.com', '012454559632', 'chittagong,Bangladesh', '12345', '2020-09-04 15:01:48');

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
