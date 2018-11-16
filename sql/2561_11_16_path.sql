-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 06:18 AM
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
(1, 'ชุติมา นุรักษ์', '0995239602', 'nan@gmail.com'),
(2, 'บุญสิตา ธรรมคณา', '0995234615', 'num@gmail.com'),
(3, 'ศุภลักษณ์ ภูอุทา', '0874512546', 'Jane@gmail.com'),
(4, 'จารุวรรณ สาระบุตร', '0976153480', 'nin@gmail.com');

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
(1, '2018-11-13 11:56:41', 32, 38, 'ม.วไลย - ฟิวเจอร์');

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
(1, 1, '31', '7', 'คลองหนึ่ง', 'คลองหลวง', 'ปทุมธานี', '12120', 14.0807768, 100.62282679999998),
(2, 2, '2', '7', 'คลองหนึ่ง', 'คลองหลวง', 'ปทุมธานี', '12120', 14.0395306, 100.61501850000002),
(3, 3, '75', '7', 'คลองหนึ่ง', 'คลองหลวง', 'ปทุมธานี', '12120', 13.9894503, 100.61683459999995),
(4, 4, '45', '7', 'คลองหนึ่ง', 'คลองหลวง', 'ปทุมธานี', '12120', 13.9894503, 100.61683459999995);

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
(1, 4, 3, 6, 1, 7),
(3, 1, 1, 16, 1, 19),
(20, 2, 2, 10, 1, 12);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลูกค้า', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `ID_Job` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรอบงาน', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `ID_Position` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `ID_Route` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสเส้นทาง', AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
