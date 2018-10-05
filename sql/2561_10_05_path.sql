-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2018 at 09:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `path`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(10) NOT NULL COMMENT 'รหัสลูกค้า',
  `Name` varchar(50) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `Telephone` varchar(10) NOT NULL COMMENT 'เบอร์โทร',
  `Email` varchar(50) NOT NULL COMMENT 'อีเมล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Telephone`, `Email`) VALUES
(3, 'สามิน อินพุต', '021548520', 'oskmfoljer@gmail.com'),
(6, 'มานิดา นุ่นแก้ว', '0987654253', 'ihgnvpr@gmail.com'),
(7, 'สายใจ ทิพย์งาม', '0824561238', 'ihgnvpr@gmail.com'),
(8, 'นามี ใจดี', '0985361270', 'ihgnvpr@gmail.com'),
(9, 'สมใจ อาสา', '0987541230', 'ihgnvpr@gmail.com'),
(10, 'นายชาตรี', '084652163', 'nsnnnlkcf@gmail.com'),
(11, 'สายใจ ทิพย์งาม', '0824561238', 'ihgnvpr@gmail.com'),
(14, 'นายสมคี อินดี', '0879465230', 'yugkfcm@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `ID_Job` int(10) NOT NULL COMMENT 'รหัสรอบงาน',
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วัน/เดือน/ปี และเวลา',
  `Distance_Sum` int(10) NOT NULL COMMENT 'ระยะทางรวม (กิโล)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`ID_Job`, `Date`, `Distance_Sum`) VALUES
(4, '2018-09-21 09:53:49', 777),
(5, '2018-09-22 15:30:43', 50),
(6, '2018-10-02 15:33:03', 0),
(7, '2018-10-03 01:08:32', 0),
(8, '2018-10-03 22:13:19', 0),
(9, '2018-10-03 22:20:14', 0),
(10, '2018-10-04 16:25:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `ID_Position` int(10) NOT NULL COMMENT 'รหัสตำแหน่ง',
  `ID` int(10) NOT NULL COMMENT 'รหัสลูกค้า',
  `House_number` varchar(5) NOT NULL COMMENT 'บ้านเลขที่',
  `Village` varchar(5) NOT NULL COMMENT 'หมู่บ้าน',
  `District` varchar(30) NOT NULL COMMENT 'ตำบล',
  `City` varchar(30) NOT NULL COMMENT 'อำเภอ',
  `Province` varchar(30) NOT NULL COMMENT 'จังหวัด',
  `Zip_code` varchar(5) NOT NULL COMMENT 'รหัสไปรษณีย์',
  `Latitude` double NOT NULL COMMENT 'ละติจูด(X)',
  `Longitude` double NOT NULL COMMENT 'ลองจิจูด(Y)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`ID_Position`, `ID`, `House_number`, `Village`, `District`, `City`, `Province`, `Zip_code`, `Latitude`, `Longitude`) VALUES
(6, 6, '50', '5', 'คลองหลวง', 'คลองหลวง', 'ปุมธานี', '12120', 0, 0),
(7, 7, '65', '8', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(8, 8, '9/85', '4', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(9, 9, '72', '3', 'คลองหลวง', 'คลองหลวง', 'ปุมธานี', '12120', 0, 0),
(10, 10, '44', '2', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 888, 0),
(11, 3, '7', '9', '9', '98', '9', '9', 9, 9),
(12, 3, '7', '9', '9', '98', '9', '9', 9, 9),
(13, 3, '7', '7', '7', '7', '7989u', '7', 7, 7),
(14, 14, '944', '9', '9uu9', '9', '9', '9', 99, 9),
(15, 14, '9', '9', '9', '99', '9', '9', 9, 9),
(16, 8, '8', '8', '8', '8', '8', '8', 8, 8),
(17, 8, '9', '9', '9', '9', '9', '99', 99, 9),
(18, 3, '8', '8', '8', '8', '88', '8', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `ID_Route` int(10) NOT NULL COMMENT 'รหัสเส้นทาง',
  `ID_Job` int(10) NOT NULL COMMENT 'รหัสรอบงาน',
  `ID_Position` int(10) NOT NULL COMMENT 'รหัสตำแหน่ง',
  `Sequence` int(10) NOT NULL COMMENT 'ลำดับที่',
  `District` int(11) NOT NULL COMMENT 'ระยะทาง (กิโล)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`ID_Route`, `ID_Job`, `ID_Position`, `Sequence`, `District`) VALUES
(6, 6, 6, 68, 6),
(7, 8, 8, 8, 0),
(8, 8, 8, 8, 8),
(10, 8, 8, 8, 8),
(11, 9, 9, 9, 9),
(12, 9, 9, 9, 9),
(13, 9, 9, 9, 9),
(14, 9, 9, 9, 9),
(15, 1, 1, 1, 1),
(16, 8, 8, 88, 8),
(17, 9, 9, 9, 99),
(18, 9, 9, 9, 9),
(19, 8, 8, 8, 88),
(20, 8, 8, 8, 8),
(21, 99, 5, 8, 7),
(22, 99, 5, 8, 7),
(23, 7, 8, 9, 0),
(24, 8, 8, 8, 9),
(25, 9, 9, 9, 9),
(26, 8, 8, 8, 8),
(27, 9, 6, 6, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`ID_Job`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID_Position`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`ID_Route`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `ID_Job` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรอบงาน', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID_Position` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `ID_Route` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเส้นทาง', AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
