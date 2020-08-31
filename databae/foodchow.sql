-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 10:13 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`cat_id`, `cat_name`, `cat_add_date`) VALUES
(1, 'Lunchf', '2020-08-28 20:13:35'),
(2, 'Breakfast', '2020-08-28 20:14:13'),
(3, 'Diner ', '2020-08-28 20:14:13'),
(5, 'Juice', '2020-08-31 07:39:33');

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
  `fd_barcode` int(11) NOT NULL,
  `fd_addDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fd_catagoery` int(11) NOT NULL,
  `fd_rating` double DEFAULT NULL,
  PRIMARY KEY (`fd_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_fooddetails`
--

INSERT INTO `tbl_fooddetails` (`fd_id`, `fd_name`, `fd_description`, `fd_price`, `fd_discount`, `fd_image`, `fd_barcode`, `fd_addDate`, `fd_catagoery`, `fd_rating`) VALUES
(1, 'Barger', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ut quasi explicabo rerum ratione commodi doloribus impedit exercitationem porro obcaecati! Culpa laudantium debitis velit, id delectus inventore repellendus possimus assumenda?', 230.5, 0, 'gallery-img-06.jpg', 12546, '2020-08-27 12:56:39', 1, 4.2),
(2, 'Pzza', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat ut quasi explicabo rerum ratione commodi doloribus impedit exercitationem porro obcaecati! Culpa laudantium debitis velit, id delectus inventore repellendus possimus assumenda?', 235, 0, 'blog-img-04.jpg', 12546, '2020-08-27 12:56:44', 1, 3.5),
(3, 'Chicken', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sapiente rerum perspiciatis dolore error quam sint. Error facilis architecto porro deserunt praesentium iusto quo similique? Quia expedita quaerat atque suscipit.', 50, 0, 'blog-img-01.jpg', 123456, '2020-08-27 13:40:43', 2, 3),
(4, 'Chicken Casserole', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sapiente rerum perspiciatis dolore error quam sint. Error facilis architecto porro deserunt praesentium iusto quo similique? Quia expedita quaerat atque suscipit.', 40, 0, 'blog-img-02.jpg', 1254, '2020-08-27 13:40:43', 2, 5),
(5, 'Chicken Broth', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sapiente rerum perspiciatis dolore error quam sint. Error facilis architecto porro deserunt praesentium iusto quo similique? Quia expedita quaerat atque suscipit.', 60, 0, 'blog-img-03.jpg', 0, '2020-08-27 13:40:43', 3, 3.5),
(6, 'Chicken Brest', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sapiente rerum perspiciatis dolore error quam sint. Error facilis architecto porro deserunt praesentium iusto quo similique? Quia expedita quaerat atque suscipit.', 20, 0, 'blog-img-04.jpg', 0, '2020-08-27 13:40:43', 3, NULL),
(7, 'Chicken and Rich', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sapiente rerum perspiciatis dolore error quam sint. Error facilis architecto porro deserunt praesentium iusto quo similique? Quia expedita quaerat atque suscipit.', 50, 0, 'blog-img-05.jpg', 0, '2020-08-27 13:40:43', 1, 4.7);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
