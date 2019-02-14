-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 01:29 PM
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
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `Provider_ID` int(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `Salary_Per_Hour` int(5) DEFAULT NULL,
  `Working_Since` int(4) DEFAULT NULL,
  `Contact_No` int(15) DEFAULT NULL,
  `Service_CategoryService_ID` int(10) NOT NULL,
  `LocationLocation_ID` int(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`Provider_ID`, `Name`, `Age`, `Salary_Per_Hour`, `Working_Since`, `Contact_No`, `Service_CategoryService_ID`, `LocationLocation_ID`, `email`) VALUES
(1, 'Mojnu Mia', 27, 1000, 2012, 1723457865, 1, 1, 'mmojnu@yahoo.com'),
(2, 'Kamal Hossain', 28, 1000, 2012, 1723457866, 2, 2, 'hkamal@yahoo.com'),
(3, 'Abdul Kuddus', 29, 1000, 2012, 1723457867, 3, 3, 'akuddus@yahoo.com'),
(4, 'Md. Rahim', 30, 900, 2010, 1763856005, 4, 4, 'rahimm@gmail.com'),
(5, 'Md. Karim', 32, 900, 2010, 1783853605, 5, 5, 'karimbox@gmail.com'),
(6, 'Salam Munshi', 40, 1200, 2000, 1823457867, 6, 6, 'msalam@yahoo.com'),
(7, 'Jalal Uddin', 36, 1100, 2005, 1683853605, 7, 7, 'jalaluddin@gmail.com'),
(8, 'Bahar Ali', 35, 300, 2011, 1785673452, 8, 8, 'alibahar@gmail.com'),
(9, 'Korom Ali', 39, 300, 2008, 1985673452, 9, 9, 'alikorom@gmail.com'),
(10, 'Rakib Uddin', 34, 600, 2006, 1671231237, 2, 1, 'rakib@gmail.com'),
(11, 'Johir Uddin', 24, 500, 2013, 1781212121, 1, 10, 'jalal@gmail.com'),
(12, 'Kalam Islam', 35, 1200, 2002, 1872341241, 1, 4, 'kalam@gmail.com'),
(13, 'Jamal Uddin', 42, 800, 2000, 1834567890, 4, 7, 'jamal@gmail.com'),
(14, 'Sumon Khan', 25, 500, 2010, 1912334523, 9, 2, 'sumon@gmail.com'),
(15, 'Nazim Mia', 30, 600, 2008, 1671245237, 10, 5, 'nazim@gmail.com'),
(16, 'Nizam Uddin', 35, 700, 2005, 1712312345, 8, 3, 'nizam@gmail.com'),
(17, 'Yousuf Shah', 45, 700, 1996, 1845645623, 7, 10, 'shah@gmail.com'),
(18, 'Lalon Miah', 38, 800, 2002, 1987653423, 6, 9, 'lalon@gmail.com'),
(19, 'Mintu Ali', 27, 400, 2011, 1634567854, 5, 8, 'ali@gmail.com'),
(20, 'Saiful Islam', 31, 500, 2003, 1879854356, 3, 6, 'saiful@gmail.com'),
(21, 'Shoriful Alom', 46, 800, 1999, 1896723654, 6, 10, 'alom@gmail.com'),
(22, 'Rezaul Karim', 36, 1000, 2005, 1978234652, 5, 6, 'reza@gmail.com'),
(23, 'Iqbal Ali', 33, 400, 2001, 1786293746, 2, 7, 'iqbal@gmail.com'),
(24, 'Arman Mollah', 40, 600, 1998, 1978765768, 10, 5, 'arman@gmail.com'),
(25, 'Mizan Rahman', 42, 700, 1996, 1782939847, 8, 9, 'mizan@gmail.com'),
(26, 'Moinul Islam', 28, 400, 2009, 1938476398, 7, 4, 'moinul@gmail.com'),
(27, 'Subrata Poddar', 27, 300, 2010, 1782938738, 3, 3, 'subrata@gmail.com'),
(28, 'Liton Das', 26, 400, 2012, 1893834893, 9, 2, 'liton@gmail.com'),
(29, 'Ismail Hossen', 30, 500, 2007, 1878986897, 10, 8, 'ismail@gmail.com'),
(30, 'Emanuel Gomez', 35, 800, 2000, 1786564278, 4, 1, 'emanuel@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Provider_ID`),
  ADD KEY `FKProvider14251` (`LocationLocation_ID`),
  ADD KEY `FKProvider450427` (`Service_CategoryService_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `Provider_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`Service_CategoryService_ID`) REFERENCES `service_category` (`Service_ID`),
  ADD CONSTRAINT `provider_ibfk_2` FOREIGN KEY (`LocationLocation_ID`) REFERENCES `location` (`Location_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
