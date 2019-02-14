-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 01:32 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(10) NOT NULL,
  `Street` varchar(30) DEFAULT NULL,
  `Area` varchar(30) DEFAULT NULL,
  `City` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Street`, `Area`, `City`) VALUES
(1, 'Elephant Road', 'Dhanmondi', 'Dhaka'),
(2, 'Alaul Avenue,Sector 6', 'Uttara', 'Dhaka'),
(3, 'Stadium Market Road', 'Gulistan', 'Dhaka'),
(4, 'Bazar Road', 'Malibagh', 'Dhaka'),
(5, 'Main Road', 'Mirpur', 'Dhaka'),
(6, 'Old Road', 'Mohammadpur', 'Dhaka'),
(7, '14,Dhakeshwari Mondir Road', 'Lalbag', 'Dhaka'),
(8, 'Link Road', 'Jatrabari', 'Dhaka'),
(9, 'Adarshanagar Road', 'Badda', 'Dhaka'),
(10, 'Buddha Mondir Road', 'Basaboo', 'Dhaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
