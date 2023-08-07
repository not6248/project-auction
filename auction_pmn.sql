-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2023 at 06:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_pmn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int NOT NULL COMMENT 'รหัสธนาคาร',
  `bank_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อธนาคาร'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int NOT NULL COMMENT 'รหัสการประมูล',
  `user_id` int NOT NULL COMMENT 'รหัสผู้ใช้',
  `order_id` int NOT NULL COMMENT 'รหัสคำสั่งซื้อ',
  `bid_price_up` int NOT NULL COMMENT 'จำนวนเงินประมูลที่เพิ่มขึ้น',
  `bid_status` int NOT NULL COMMENT 'สถานะการประมูล',
  `bid_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ช่วงเวลาที่เกิดการวางเงินประมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `dlv_id` int NOT NULL COMMENT 'รหัสขนส่ง',
  `dlvt_id` int NOT NULL COMMENT 'รหัสประเภทขนส่ง',
  `dlv_code` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'หมายเลขพัสดุ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_type`
--

CREATE TABLE `delivery_type` (
  `dlvt_id` int NOT NULL COMMENT 'รหัสประเภทขนส่ง',
  `dlvt_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อประเภทขนส่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `user_id` int NOT NULL,
  `pd_id` int NOT NULL,
  `fav_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int NOT NULL COMMENT 'รหัสผู้ใช้',
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รหัสผ่านผู้ใช้',
  `user_type` int NOT NULL DEFAULT '1' COMMENT 'ประเภทผู้ใช้',
  `user_status` int NOT NULL DEFAULT '1' COMMENT 'สถานะผู้ใช้',
  `email_verified_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รหัสยืนยันอีเมล์',
  `email_verified_status` int NOT NULL DEFAULT '0' COMMENT 'การยืนยันอีเมล์',
  `user_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันเวลาที่สร้างผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `user_type`, `user_status`, `email_verified_code`, `email_verified_status`, `user_create_date`) VALUES
(1, 'admin', 'admin0000', 0, 1, '0', 0, '2023-07-10 12:20:42'),
(12, 'not6248', '$2y$10$mTWoejdGsVuv1RyiDzunt.HD5zfT6PiieCzNizWtdEb0aGENqSjyy', 1, 1, NULL, 0, '2023-08-07 16:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int NOT NULL COMMENT 'รหัสคำสั่งซื้อ',
  `pd_id` int NOT NULL COMMENT 'รหัสสินค้า',
  `dlv_id` int NOT NULL COMMENT 'รหัสขนส่ง',
  `pay_id` int NOT NULL COMMENT 'รหัสการชำระเงิน',
  `order_status` int NOT NULL COMMENT 'สถานะคำสั่งซื้อ',
  `end_price` int NOT NULL COMMENT 'ราคาปิดประมูล',
  `order_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันเวลาที่สร้างคำสั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int NOT NULL COMMENT 'รหัสการชำระเงิน',
  `bank_id` int NOT NULL COMMENT 'รหัสธนาคาร',
  `pay_slip` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รูปหลักฐานการโอนเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `prefix_id` int NOT NULL COMMENT 'รหัสคำนำหน้าชื่อ',
  `prefix_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'คำนำหน้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int NOT NULL COMMENT 'รหัสสินค้า',
  `user_id` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รหัสผู้ใช้',
  `pd_type_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ประเภทสินค้า',
  `pd_name` int NOT NULL COMMENT 'ชื่อสินค้า',
  `pd_detail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รายละเอียดสินค้า',
  `pd_price_start` int NOT NULL COMMENT 'ราคาเริ่มต้น',
  `pd_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รูปสินค้าประมูล',
  `pd_condition` int NOT NULL COMMENT 'สภาพสินค้า',
  `pd_status` int NOT NULL COMMENT 'สถานะสินค้าประมูล',
  `pd_start_date` datetime NOT NULL COMMENT 'วัน-เวลาเริ่มการประมูล',
  `pd_end_date` datetime NOT NULL COMMENT 'วัน-เวลาจบการประมูล',
  `pd_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันเวลาสร้างสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `pd_type_id` int NOT NULL COMMENT 'รหัสประเภทสินค้า',
  `pd_type_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `ud_id` int NOT NULL COMMENT 'รหัสรายละเอียดผู้ใช้',
  `user_id` int NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `prefix_id` int DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `ud_address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ที่อยู่ผู้ใช้',
  `ud_phone` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์ผู้ใช้',
  `ud_email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'อีเมล์ผู้ใช้',
  `ud_id_card` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รหัสบัตรประชาชน ',
  `ud_idcard_img` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รูปบัตรประชาชน',
  `ud_fname` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ชื่อจริง',
  `ud_lname` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'นามสกุล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`ud_id`, `user_id`, `prefix_id`, `ud_address`, `ud_phone`, `ud_email`, `ud_id_card`, `ud_idcard_img`, `ud_fname`, `ud_lname`) VALUES
(12, 12, NULL, NULL, NULL, 'not-6248@hotmail.com', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`dlv_id`);

--
-- Indexes for table `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`dlvt_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`prefix_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pd_type_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`ud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสธนาคาร';

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสการประมูล';

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `dlv_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสขนส่ง';

--
-- AUTO_INCREMENT for table `delivery_type`
--
ALTER TABLE `delivery_type`
  MODIFY `dlvt_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทขนส่ง';

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำสั่งซื้อ';

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสการชำระเงิน';

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `prefix_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำนำหน้าชื่อ';

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pd_type_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า';

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `ud_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดผู้ใช้', AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
