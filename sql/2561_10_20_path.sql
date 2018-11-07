-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2018 at 09:07 PM
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
  `Telephone` varchar(11) NOT NULL COMMENT 'เบอร์โทร',
  `Email` varchar(50) NOT NULL COMMENT 'อีเมล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `Name`, `Telephone`, `Email`) VALUES
(1, 'ชุติมา นุรักษ์', '026-5665665', 'yjuyhpr@gmail.com'),
(2, 'สมใจ อาสา', '025-6895565', 'ihgnvpr@gmail.com'),
(3, 'สามิน อินพุต', '035-9824652', 'oskmfoljer@gmail.com'),
(4, 'มานี มีบุญ', '097-5464366', 'ihgnvpr@gmail.com'),
(5, 'มา มีบุญ', '098-5361270', 'ihgnvpr@gmail.com'),
(6, 'มานิดา นุ่นแก้ว', '098-7654253', 'ihgnvpr@gmail.com'),
(7, 'สายใจ ทิพย์งาม', '082-4561238', 'ihgnvpr@gmail.com'),
(8, 'นามี ใจดี', '098-5361275', 'ihgnvpr@gmail.com'),
(9, 'มานี อาสา', '098-7541230', 'ihgnvpr@gmail.com'),
(10, 'ชาตรี ไหมพรหม', '084-6521635', 'nsnnnlkcf@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `ID_Job` int(10) NOT NULL COMMENT 'รหัสรอบงาน',
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วัน/เดือน/ปี และเวลา',
  `Distance_Sum` int(10) NOT NULL DEFAULT '0' COMMENT 'ระยะทางรวม (กิโล)',
  `Time_Sum` int(10) NOT NULL DEFAULT '0' COMMENT 'ระยะเวลารวม (ชั่วโมง)',
  `Name_Job` varchar(50) NOT NULL COMMENT 'ชื่อรอบงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`ID_Job`, `Date`, `Distance_Sum`, `Time_Sum`, `Name_Job`) VALUES
(1, '2015-10-16 11:45:27', 0, 0, 'ใต้'),
(2, '2016-10-16 11:45:27', 0, 0, 'อีสาร'),
(23, '2018-10-20 01:09:31', 0, 0, '0');

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
(1, 1, '301', '8', 'คลองชะอุ่น', 'พนม', 'สุราษฎร์ธานี', '84250', 0, 0),
(2, 1, '4', '7', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรึอยุธยา', '13180', 0, 0),
(3, 3, '9/85', '4', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(4, 2, '66', '8', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(5, 5, '99', '4', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(6, 6, '50', '5', 'คลองหลวง', 'คลองหลวง', 'ปุมธานี', '12120', 0, 0),
(7, 7, '65', '8', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(8, 8, '9/85', '4', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(9, 9, '72', '3', 'คลองหลวง', 'คลองหลวง', 'ปุมธานี', '12120', 0, 0),
(10, 10, '44', '2', 'เชียงรากน้อย', 'บางประอิน', 'พระนครศรีอยุธยา', '13180', 0, 0),
(11, 1, '32', '5', 'คลองชะอุ่น', 'พนม', 'สุราษฎร์ธานี', '84250', 12.8135289, 99.98659550000002);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `ID_Route` int(10) NOT NULL COMMENT 'รหัสเส้นทาง',
  `ID_Position` int(10) NOT NULL COMMENT 'รหัสตำแหน่ง',
  `Sequence` int(10) NOT NULL DEFAULT '0' COMMENT 'ลำดับที่',
  `District` int(10) NOT NULL DEFAULT '0' COMMENT 'ระยะทาง (กิโล)',
  `ID_Job` int(10) NOT NULL COMMENT 'รหัสรอบงาน',
  `Time` int(10) NOT NULL DEFAULT '0' COMMENT 'ระยะเวลารวม (ชั่วโมง)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`ID_Route`, `ID_Position`, `Sequence`, `District`, `ID_Job`, `Time`) VALUES
(1, 1, 588, 0, 4, 0),
(2, 10, 5, 0, 4, 0),
(3, 11, 0, 0, 4, 0),
(4, 9, 0, 0, 1, 0),
(5, 8, 0, 0, 1, 0),
(6, 5, 0, 0, 1, 0),
(7, 8, 0, 0, 2, 0),
(8, 2, 0, 0, 1, 0),
(10, 3, 0, 0, 8, 0);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `ID_Job` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรอบงาน', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID_Position` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `ID_Route` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเส้นทาง', AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
