-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 11:58 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cow`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8 ');

-- --------------------------------------------------------

--
-- Table structure for table `breed`
--

DROP TABLE IF EXISTS `breed`;
CREATE TABLE IF NOT EXISTS `breed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `breed`
--

INSERT INTO `breed` (`id`, `name`) VALUES
(1, 'Berkshire'),
(2, 'British Saddleback'),
(3, 'Duroc'),
(4, 'Large White');

-- --------------------------------------------------------

--
-- Table structure for table `cows`
--

DROP TABLE IF EXISTS `cows`;
CREATE TABLE IF NOT EXISTS `cows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cowno` varchar(255) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `arrived` varchar(10) NOT NULL,
  `remark` text NOT NULL,
  `health_status` varchar(50) NOT NULL,
  `Temperature` int(50) NOT NULL,
  `locationx` int(11) NOT NULL,
  `locationy` int(11) NOT NULL,
  `location_status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cows`
--

INSERT INTO `cows` (`id`, `cowno`, `breed_id`, `weight`, `img`, `gender`, `arrived`, `remark`, `health_status`, `Temperature`, `locationx`, `locationy`, `location_status`) VALUES
(4, 'cow-fms-938', 4, '50kg', 'uploadfolder/default.jpg', 'female', '2017-11-02', 'This is the content', 'active', 50, 25, 50, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `financial_report`
--

DROP TABLE IF EXISTS `financial_report`;
CREATE TABLE IF NOT EXISTS `financial_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `cattle_food` varchar(255) NOT NULL,
  `cattle_medicine` varchar(255) NOT NULL,
  `plants` varchar(255) NOT NULL,
  `cattle_bought` varchar(255) NOT NULL,
  `cattle_sale` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financial_report`
--

INSERT INTO `financial_report` (`id`, `month`, `budget`, `cattle_food`, `cattle_medicine`, `plants`, `cattle_bought`, `cattle_sale`) VALUES
(6, 'testing success', 'testing success', 'testing success', 'testing success', 'testing success', 'testing success', 'testing success'),
(7, 'testing 2', 'testing 2', 'testing 2', 'testing 2', 'testing 2', 'testing 2', 'testing 2');

-- --------------------------------------------------------

--
-- Table structure for table `quarantine`
--

DROP TABLE IF EXISTS `quarantine`;
CREATE TABLE IF NOT EXISTS `quarantine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cow_no` varchar(50) NOT NULL,
  `date_q` varchar(10) NOT NULL,
  `reason` text NOT NULL,
  `breed` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'saim', 'e10adc3949ba59abbe56e057f20f883e', 'Muhammad Saim'),
(2, 'hareem', 'e10adc3949ba59abbe56e057f20f883e', 'Hareem Arshad');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
