-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: พ.ค. 03, 2017 at 02:50 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foods`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(2) NOT NULL,
  `status_detail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_detail`) VALUES
(1, 'ว่าง'),
(2, 'ไม่วาง');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_code` int(10) NOT NULL,
  `admin_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_code`, `admin_name`, `admin_email`, `admin_img`) VALUES
(1234, 5821423, 'teat_admin', 'test@gmail.com', ''),
(5532, 12345678, 'แอดมิน_admin', 'admin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employe`
--

CREATE TABLE `tb_employe` (
  `emp_id` int(10) NOT NULL,
  `emp_code` int(10) NOT NULL,
  `emp_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emp_email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emp_add` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `emp_tel` int(10) NOT NULL,
  `emp_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_employe`
--

INSERT INTO `tb_employe` (`emp_id`, `emp_code`, `emp_name`, `emp_email`, `emp_add`, `emp_tel`, `emp_img`) VALUES
(5, 27122535, 'วีรชัย อ่อนมณี', 'name@gmail.com', '92 ม.9 ต.ห้วยตึ๊กชู  อ.ภูสิงห์ จ.ศรีสะเกษ', 991013326, '18606_2017-04-04.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foods`
--

CREATE TABLE `tb_foods` (
  `fd_id` int(10) UNSIGNED NOT NULL,
  `fd_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fd_cost` double(6,2) NOT NULL,
  `fd_img` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_foods`
--

INSERT INTO `tb_foods` (`fd_id`, `fd_name`, `fd_cost`, `fd_img`, `type_id`) VALUES
(14, 'ตำปูบลาร้า', 35.00, '2017-04-03.jpg', 7),
(15, 'ซี่โครงหมูสามรส', 50.00, '8809_2017-04-04.jpg', 2),
(16, 'ผักหอมผัดตับไก่', 100.00, '2146_2017-04-04.jpg', 4),
(17, 'ต้มยำกุ้ง', 60.00, '6278_2017-04-05.jpg', 1),
(18, 'เบียร์ช้าง', 55.00, '24797_2017-04-11.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `seat_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `fd_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fd_cost` double(6,2) NOT NULL,
  `sum_cost` double(6,2) NOT NULL,
  `order_count` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_seat`
--

CREATE TABLE `tb_seat` (
  `seat_id` int(10) NOT NULL,
  `seat_name` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_seat`
--

INSERT INTO `tb_seat` (`seat_id`, `seat_name`, `status_id`) VALUES
(20, 'NO.1', 1),
(21, 'NO.2', 1),
(22, 'NO.3', 1),
(23, 'NO.4', 1),
(24, 'NO.5', 1),
(26, 'NO.6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transcript`
--

CREATE TABLE `tb_transcript` (
  `transcript_id` int(10) UNSIGNED NOT NULL,
  `seat_id` int(10) NOT NULL,
  `order_no` int(10) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_foods`
--

CREATE TABLE `type_foods` (
  `type_id` int(10) NOT NULL,
  `type_detail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_foods`
--

INSERT INTO `type_foods` (`type_id`, `type_detail`) VALUES
(1, 'ต้ม'),
(2, 'ทอด'),
(3, 'นึ่ง'),
(4, 'ผัด'),
(5, 'ย่าง'),
(6, 'เครื่องดื่ม'),
(7, 'ตำ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_employe`
--
ALTER TABLE `tb_employe`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tb_foods`
--
ALTER TABLE `tb_foods`
  ADD PRIMARY KEY (`fd_id`),
  ADD KEY `fd_name` (`fd_name`),
  ADD KEY `fd_cost` (`fd_cost`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `seat_id` (`seat_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `fd_name` (`fd_name`),
  ADD KEY `fd_cost` (`fd_cost`),
  ADD KEY `sum_cost` (`sum_cost`),
  ADD KEY `order_count` (`order_count`);

--
-- Indexes for table `tb_seat`
--
ALTER TABLE `tb_seat`
  ADD PRIMARY KEY (`seat_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `tb_transcript`
--
ALTER TABLE `tb_transcript`
  ADD PRIMARY KEY (`transcript_id`),
  ADD KEY `seat_id` (`seat_id`);

--
-- Indexes for table `type_foods`
--
ALTER TABLE `type_foods`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5533;
--
-- AUTO_INCREMENT for table `tb_employe`
--
ALTER TABLE `tb_employe`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_foods`
--
ALTER TABLE `tb_foods`
  MODIFY `fd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_seat`
--
ALTER TABLE `tb_seat`
  MODIFY `seat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tb_transcript`
--
ALTER TABLE `tb_transcript`
  MODIFY `transcript_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_foods`
--
ALTER TABLE `tb_foods`
  ADD CONSTRAINT `tb_foods_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type_foods` (`type_id`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`seat_id`) REFERENCES `tb_seat` (`seat_id`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `tb_employe` (`emp_id`),
  ADD CONSTRAINT `tb_order_ibfk_3` FOREIGN KEY (`fd_cost`) REFERENCES `tb_foods` (`fd_cost`),
  ADD CONSTRAINT `tb_order_ibfk_5` FOREIGN KEY (`fd_name`) REFERENCES `tb_foods` (`fd_name`);

--
-- Constraints for table `tb_seat`
--
ALTER TABLE `tb_seat`
  ADD CONSTRAINT `tb_seat_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`);

--
-- Constraints for table `tb_transcript`
--
ALTER TABLE `tb_transcript`
  ADD CONSTRAINT `tb_transcript_ibfk_1` FOREIGN KEY (`seat_id`) REFERENCES `tb_order` (`seat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
