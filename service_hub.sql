-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2015 at 01:33 PM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `House_No` int(5) DEFAULT NULL,
  `Street` varchar(30) DEFAULT NULL,
  `Area` varchar(30) DEFAULT NULL,
  `Contact_No` int(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Name`, `House_No`, `Street`, `Area`, `Contact_No`, `email`) VALUES
(1, 'Ferdous Amin', 12345, '33, Alaol Avenue,Sector 6', 'Uttara', 1943583556, 'famin@gmail.com'),
(2, 'Jamal Uddin', 12347, ' 187,Elephant Road', 'Dhanmondi', 1943583650, 'ujamal@gmail.com'),
(3, 'Rashed Rayhan', 12348, '33,Alaul Avenue,Sector 6', 'Uttara', 1943583750, 'rrayhan@gmail.com'),
(4, 'Sourav Mondal', 12349, ' 187,Elephant Road', 'Dhanmondi', 1763853665, 'smondal@gmail.com'),
(5, 'Tarikul Islam', 12350, '33,Alaul Avenue,Sector 6', 'Uttara', 1763853005, 'tarik345@yahoo.com'),
(6, 'Abul Kalam', 12345, ' 187,Elephant Road', 'Dhanmondi', 1843583550, 'akalam@gmail.com'),
(39, 'AB', 604, 'Abc', 'Uttara', 1943583555, 'ab@gmail.com'),
(40, 'Amit', 12345, 'West Polashi Road', 'Azimpur', 1943583850, 'amit@gmail.com'),
(41, 'Masud', 604, 'shahjahanpur', 'shahjahanpur', 1521569928, 'masudroshmi@gmail.com'),
(42, 'Hasan', 231, 'Vuter Goli', 'Panthapath', 1919121212, 'hasan@gmail.com'),
(43, 'nisha', 307, '1A', 'Mirpur', 0, 'amina@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `History_ID` int(10) NOT NULL,
  `Transaction_Date` date DEFAULT NULL,
  `Customer_Comment` varchar(100) DEFAULT NULL,
  `Provider_Comment` varchar(100) DEFAULT NULL,
  `ProviderProvider_ID` int(10) NOT NULL,
  `Completion_Status` varchar(20) DEFAULT NULL,
  `Payment_Status` varchar(20) DEFAULT NULL,
  `CustomerCustomer_ID` int(10) NOT NULL,
  `Service_CategoryService_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`History_ID`, `Transaction_Date`, `Customer_Comment`, `Provider_Comment`, `ProviderProvider_ID`, `Completion_Status`, `Payment_Status`, `CustomerCustomer_ID`, `Service_CategoryService_ID`) VALUES
(1, '2012-10-13', 'Satisfactory', 'Job done almost', 1, '', '', 1, 1),
(2, '2012-10-14', 'Not so well', 'Ok', 2, 'Yes', 'No', 2, 2),
(3, '2012-11-14', 'Could be better', 'Ok', 3, 'Yes', 'Paid', 3, 3),
(4, '2013-10-13', 'Bad Service', 'Tools were not good', 4, 'No', 'Yes', 4, 4),
(5, '2012-09-13', 'Seems ok', 'Job done', 5, 'Yes', 'No', 5, 5),
(6, '2013-01-13', 'Excellent service', 'Job successfully done', 6, 'Yes', 'Yes', 6, 6),
(19, '2020-12-15', 'aa', 'aa', 1, 'aa', 'aa', 39, 1),
(20, '2015-03-05', 'Good job', 'Job done almost', 11, 'Yes', 'Yes', 40, 1),
(21, '2015-12-21', 'solved', 'good', 6, 'completed', 'paid ', 41, 6),
(22, '2015-12-21', 'solved', 'good', 2, 'completed', 'paid ', 42, 2),
(23, '2015-12-21', 'solved', 'good', 3, 'completed', 'paid ', 43, 3);

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

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `Material_ID` int(10) NOT NULL,
  `Item_Name` varchar(30) DEFAULT NULL,
  `HistoryHistory_ID` int(10) NOT NULL,
  `Item_Description` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`Material_ID`, `Item_Name`, `HistoryHistory_ID`, `Item_Description`) VALUES
(1, 'Yes', 1, 'wet4'),
(2, 'Yes', 2, 'assfsda'),
(3, 'Yes', 3, 'assfsda'),
(4, 'Yes', 4, 'assfsda'),
(5, 'Yes', 5, 'assfsda'),
(6, 'Yes', 6, 'assfsda'),
(15, 'No', 19, 'ddf'),
(16, 'Drill Machine', 20, 'Crapenters'),
(17, 'No', 21, 'pqr'),
(18, 'Yes', 22, 'spare keys'),
(19, '', 23, '');

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

-- --------------------------------------------------------

--
-- Table structure for table `service_category`
--

CREATE TABLE `service_category` (
  `Service_ID` int(10) NOT NULL,
  `Service_Type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_category`
--

INSERT INTO `service_category` (`Service_ID`, `Service_Type`) VALUES
(1, 'Electricians'),
(2, 'Key Makers'),
(3, 'Sanitary Mechanic'),
(4, 'Gas Mechanic'),
(5, 'Glass Mechanic'),
(6, 'Tiles Mechanic'),
(7, 'Shifting Labour'),
(8, 'Carpenters'),
(9, 'Painters'),
(10, 'Mason');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`History_ID`),
  ADD KEY `FKHistory841660` (`CustomerCustomer_ID`),
  ADD KEY `FKHistory980260` (`Service_CategoryService_ID`),
  ADD KEY `FKHistory92647` (`ProviderProvider_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`Material_ID`),
  ADD KEY `FKMaterials631134` (`HistoryHistory_ID`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`Provider_ID`),
  ADD KEY `FKProvider14251` (`LocationLocation_ID`),
  ADD KEY `FKProvider450427` (`Service_CategoryService_ID`);

--
-- Indexes for table `service_category`
--
ALTER TABLE `service_category`
  ADD PRIMARY KEY (`Service_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `History_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `Material_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `Provider_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `service_category`
--
ALTER TABLE `service_category`
  MODIFY `Service_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
