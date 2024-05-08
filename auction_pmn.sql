-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2024 at 09:38 AM
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

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(0, 'ธนาคารกสิกรไทย'),
(1, 'พร้อมเพย์'),
(2, 'ธนาคารกรุงไทย');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `bid_id` int NOT NULL COMMENT 'รหัสการประมูล',
  `user_id` int NOT NULL COMMENT 'รหัสผู้ใช้',
  `order_id` int NOT NULL COMMENT 'รหัสคำสั่งซื้อ',
  `bid_price_up` int NOT NULL COMMENT 'จำนวนเงินประมูลที่เพิ่มขึ้น',
  `bid_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ช่วงเวลาที่เกิดการวางเงินประมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `dlv_id` int NOT NULL COMMENT 'รหัสขนส่ง',
  `order_id` int NOT NULL,
  `dlvt_id` int NOT NULL COMMENT 'รหัสประเภทขนส่ง',
  `dlv_code` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'หมายเลขพัสดุ',
  `dlv_status` int NOT NULL DEFAULT '1' COMMENT 'สถานะขนส่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_type`
--

CREATE TABLE `delivery_type` (
  `dlvt_id` int NOT NULL COMMENT 'รหัสประเภทขนส่ง',
  `dlvt_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อประเภทขนส่ง',
  `dlvt_link` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ลิงค์ขนส่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_type`
--

INSERT INTO `delivery_type` (`dlvt_id`, `dlvt_name`, `dlvt_link`) VALUES
(1, 'ไปรษณีย์ไทย', 'https://track.thailandpost.co.th/'),
(2, 'KERRY EXPRESS', 'https://th.kerryexpress.com/th/track/'),
(3, 'FLASH EXPRESS', 'https://flashexpress.com/fle/tracking'),
(4, 'SCG EXPRESS', 'https://www.scgexpress.co.th/tracking/'),
(5, 'J&T EXPRESS', 'https://www.jtexpress.co.th/service/track'),
(6, 'DHL EXPRESS\r\n', 'https://www.dhl.com/th-th/home/tracking.html'),
(7, 'NINJA VAN', 'https://www.ninjavan.co/en-th/tracking'),
(8, 'SPEED-D', 'https://speed-d.allspeedy.co.th/'),
(9, 'อื่นๆ', '');

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
-- Stand-in structure for view `favorite_list`
-- (See below for the actual view)
--
CREATE TABLE `favorite_list` (
`fav_user_id` int
,`pd_id` int
,`user_id_owner_pd` int
,`pd_type_id` int
,`pd_name` varchar(150)
,`pd_detail` text
,`pd_price_start` int
,`pd_img` varchar(255)
,`pd_status` int
,`pd_start_show_date` datetime
,`pd_start_date` datetime
,`pd_end_date` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `fee_id` int NOT NULL COMMENT 'รหัสค่าบริการ',
  `fee_percent` int NOT NULL COMMENT 'เปอร์เซ็นต์ค่าธรรมเนียม',
  `fee_active` int NOT NULL DEFAULT '0' COMMENT 'สถานะเปิด/ปิดการใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`fee_id`, `fee_percent`, `fee_active`) VALUES
(0, 0, 0),
(3, 15, 1),
(4, 10, 0),
(7, 20, 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `last_user_bid`
-- (See below for the actual view)
--
CREATE TABLE `last_user_bid` (
`order_id` int
,`latest_bidder` int
,`username` varchar(150)
,`user_email` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int NOT NULL COMMENT 'รหัสผู้ใช้',
  `username` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รหัสผ่านผู้ใช้',
  `user_type` int NOT NULL DEFAULT '1' COMMENT 'ประเภทผู้ใช้',
  `user_status` int NOT NULL DEFAULT '1' COMMENT 'สถานะผู้ใช้',
  `user_email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'อีเมล์ผู้ใช้',
  `email_verified_code` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รหัสยืนยันอีเมล์',
  `email_verified_status` int NOT NULL DEFAULT '0' COMMENT 'การยืนยันอีเมล์',
  `user_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันเวลาที่สร้างผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `username`, `password`, `user_type`, `user_status`, `user_email`, `email_verified_code`, `email_verified_status`, `user_create_date`) VALUES
(1, 'admin', '$2y$10$1DDQL.YURsCxwze/0Jcdnuf/yV1HjfvmFw6O4L9oomTN7NRV6AngO', 0, 1, 'admin@hotmail.com', NULL, 1, '2023-10-02 21:20:37');

-- --------------------------------------------------------

--
-- Stand-in structure for view `need_update_to_end`
-- (See below for the actual view)
--
CREATE TABLE `need_update_to_end` (
`pd_id` int
,`user_id` int
,`pd_type_id` int
,`pd_name` varchar(150)
,`pd_detail` text
,`pd_price_start` int
,`pd_img` varchar(255)
,`pd_condition` int
,`pd_status` int
,`pd_start_show_date` datetime
,`pd_start_date` datetime
,`pd_end_date` datetime
,`pd_create_datetime` timestamp
,`order_id` int
,`order_status` int
,`end_price` int
,`order_create_datetime` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `need_update_to_show`
-- (See below for the actual view)
--
CREATE TABLE `need_update_to_show` (
`pd_id` int
,`user_id` int
,`pd_type_id` int
,`pd_name` varchar(150)
,`pd_detail` text
,`pd_price_start` int
,`pd_img` varchar(255)
,`pd_condition` int
,`pd_status` int
,`pd_start_show_date` datetime
,`pd_start_date` datetime
,`pd_end_date` datetime
,`pd_create_datetime` timestamp
,`order_id` int
,`order_status` int
,`end_price` int
,`order_create_datetime` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `need_update_to_start`
-- (See below for the actual view)
--
CREATE TABLE `need_update_to_start` (
`pd_id` int
,`user_id` int
,`pd_type_id` int
,`pd_name` varchar(150)
,`pd_detail` text
,`pd_price_start` int
,`pd_img` varchar(255)
,`pd_condition` int
,`pd_status` int
,`pd_start_show_date` datetime
,`pd_start_date` datetime
,`pd_end_date` datetime
,`pd_create_datetime` timestamp
,`order_id` int
,`order_status` int
,`end_price` int
,`order_create_datetime` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_detail_last_bid`
-- (See below for the actual view)
--
CREATE TABLE `order_detail_last_bid` (
`order_id` int
,`bidder_username` varchar(150)
,`bidder_fname` varchar(150)
,`bidder_lname` varchar(150)
,`bidder_address` varchar(200)
,`bidder_phone` varchar(150)
,`end_price` decimal(33,0)
,`seller_username` varchar(150)
,`seller_bank_name` varchar(150)
,`seller_bank_number` varchar(150)
,`fee_percent` int
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_summary`
-- (See below for the actual view)
--
CREATE TABLE `order_summary` (
`order_id` int
,`total_price` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `order_id` int NOT NULL COMMENT 'รหัสคำสั่งซื้อ',
  `pd_id` int NOT NULL COMMENT 'รหัสสินค้า',
  `order_details` text COLLATE utf8mb4_general_ci,
  `order_status` int NOT NULL DEFAULT '0' COMMENT 'สถานะคำสั่งซื้อ',
  `end_price` int DEFAULT NULL COMMENT 'ราคาปิดประมูล',
  `order_create_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'วันเวลาที่สร้างคำสั่งซื้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int NOT NULL COMMENT 'รหัสการชำระเงิน',
  `bank_id` int NOT NULL COMMENT 'รหัสธนาคาร',
  `order_id` int NOT NULL COMMENT 'order_id',
  `pay_slip` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รูปหลักฐานการโอนเงิน',
  `pay_status` int NOT NULL DEFAULT '1' COMMENT 'สถานะการชำระเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prefix`
--

CREATE TABLE `prefix` (
  `prefix_id` int NOT NULL COMMENT 'รหัสคำนำหน้าชื่อ',
  `prefix_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'คำนำหน้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prefix`
--

INSERT INTO `prefix` (`prefix_id`, `prefix_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int NOT NULL COMMENT 'รหัสสินค้า',
  `user_id` int DEFAULT NULL COMMENT 'รหัสผู้ใช้',
  `pd_type_id` int DEFAULT NULL COMMENT 'ประเภทสินค้า',
  `fee_id` int DEFAULT NULL COMMENT 'รหัสค่าบริการ',
  `pd_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อสินค้า',
  `pd_detail` text COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รายละเอียดสินค้า',
  `pd_price_start` int NOT NULL COMMENT 'ราคาเริ่มต้น',
  `pd_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รูปสินค้าประมูล',
  `pd_condition` int NOT NULL COMMENT 'สภาพสินค้า',
  `pd_status` int NOT NULL DEFAULT '0' COMMENT 'สถานะสินค้าประมูล',
  `pd_start_show_date` datetime DEFAULT NULL COMMENT 'วัน-เวลาเริ่มการโชว์สินค้า',
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
  `pd_type_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อประเภทสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`pd_type_id`, `pd_type_name`) VALUES
(1, 'Historical Vinyls'),
(2, 'Genre Vinyls'),
(3, 'Artist Vinyls'),
(4, 'Collector’s Vinyls');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_with_username`
-- (See below for the actual view)
--
CREATE TABLE `product_with_username` (
`username` varchar(150)
,`order_status` int
,`pd_id` int
,`user_id` int
,`pd_type_id` int
,`pd_name` varchar(150)
,`pd_detail` text
,`pd_price_start` int
,`pd_img` varchar(255)
,`pd_condition` int
,`pd_status` int
,`pd_start_show_date` datetime
,`pd_start_date` datetime
,`pd_end_date` datetime
,`pd_create_datetime` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `seller_pay`
-- (See below for the actual view)
--
CREATE TABLE `seller_pay` (
`order_id` int
,`pd_id` int
,`ud_fname` varchar(150)
,`ud_lname` varchar(150)
,`order_details` text
,`bank_name` varchar(150)
,`ud_bank_number` varchar(150)
,`dlv_status` int
,`pay_status` int
);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `ud_id` int NOT NULL COMMENT 'รหัสรายละเอียดผู้ใช้',
  `user_id` int NOT NULL COMMENT 'รหัสผู้ใช้งาน',
  `prefix_id` int DEFAULT NULL COMMENT 'รหัสผู้ใช้งาน',
  `ud_address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ที่อยู่ผู้ใช้',
  `ud_phone` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์ผู้ใช้',
  `ud_id_card` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รหัสบัตรประชาชน ',
  `ud_bank_number` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ud_bank_id` int DEFAULT NULL,
  `ud_idcard_img` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รูปบัตรประชาชน',
  `ud_fname` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ชื่อจริง',
  `ud_lname` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'นามสกุล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure for view `favorite_list`
--
DROP TABLE IF EXISTS `favorite_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `favorite_list`  AS SELECT `f`.`user_id` AS `fav_user_id`, `p`.`pd_id` AS `pd_id`, `p`.`user_id` AS `user_id_owner_pd`, `p`.`pd_type_id` AS `pd_type_id`, `p`.`pd_name` AS `pd_name`, `p`.`pd_detail` AS `pd_detail`, `p`.`pd_price_start` AS `pd_price_start`, `p`.`pd_img` AS `pd_img`, `p`.`pd_status` AS `pd_status`, `p`.`pd_start_show_date` AS `pd_start_show_date`, `p`.`pd_start_date` AS `pd_start_date`, `p`.`pd_end_date` AS `pd_end_date` FROM (`product` `p` join `favorite` `f` on((`p`.`pd_id` = `f`.`pd_id`))) WHERE (`p`.`pd_status` > 0)  ;

-- --------------------------------------------------------

--
-- Structure for view `last_user_bid`
--
DROP TABLE IF EXISTS `last_user_bid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `last_user_bid`  AS SELECT `b1`.`order_id` AS `order_id`, `b1`.`user_id` AS `latest_bidder`, `l`.`username` AS `username`, `l`.`user_email` AS `user_email` FROM (`bid` `b1` join `login` `l` on((`b1`.`user_id` = `l`.`user_id`))) WHERE (`b1`.`bid_create_datetime` = (select max(`b2`.`bid_create_datetime`) from `bid` `b2` where (`b1`.`order_id` = `b2`.`order_id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `need_update_to_end`
--
DROP TABLE IF EXISTS `need_update_to_end`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `need_update_to_end`  AS SELECT `p`.`pd_id` AS `pd_id`, `p`.`user_id` AS `user_id`, `p`.`pd_type_id` AS `pd_type_id`, `p`.`pd_name` AS `pd_name`, `p`.`pd_detail` AS `pd_detail`, `p`.`pd_price_start` AS `pd_price_start`, `p`.`pd_img` AS `pd_img`, `p`.`pd_condition` AS `pd_condition`, `p`.`pd_status` AS `pd_status`, `p`.`pd_start_show_date` AS `pd_start_show_date`, `p`.`pd_start_date` AS `pd_start_date`, `p`.`pd_end_date` AS `pd_end_date`, `p`.`pd_create_datetime` AS `pd_create_datetime`, `o`.`order_id` AS `order_id`, `o`.`order_status` AS `order_status`, `o`.`end_price` AS `end_price`, `o`.`order_create_datetime` AS `order_create_datetime` FROM (`product` `p` join `order_tb` `o` on((`p`.`pd_id` = `o`.`pd_id`))) WHERE ((now() >= `p`.`pd_end_date`) AND (`o`.`order_status` = 2))  ;

-- --------------------------------------------------------

--
-- Structure for view `need_update_to_show`
--
DROP TABLE IF EXISTS `need_update_to_show`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `need_update_to_show`  AS SELECT `p`.`pd_id` AS `pd_id`, `p`.`user_id` AS `user_id`, `p`.`pd_type_id` AS `pd_type_id`, `p`.`pd_name` AS `pd_name`, `p`.`pd_detail` AS `pd_detail`, `p`.`pd_price_start` AS `pd_price_start`, `p`.`pd_img` AS `pd_img`, `p`.`pd_condition` AS `pd_condition`, `p`.`pd_status` AS `pd_status`, `p`.`pd_start_show_date` AS `pd_start_show_date`, `p`.`pd_start_date` AS `pd_start_date`, `p`.`pd_end_date` AS `pd_end_date`, `p`.`pd_create_datetime` AS `pd_create_datetime`, `o`.`order_id` AS `order_id`, `o`.`order_status` AS `order_status`, `o`.`end_price` AS `end_price`, `o`.`order_create_datetime` AS `order_create_datetime` FROM (`product` `p` join `order_tb` `o` on((`p`.`pd_id` = `o`.`pd_id`))) WHERE ((now() >= `p`.`pd_start_show_date`) AND (`o`.`order_status` = 0))  ;

-- --------------------------------------------------------

--
-- Structure for view `need_update_to_start`
--
DROP TABLE IF EXISTS `need_update_to_start`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `need_update_to_start`  AS SELECT `p`.`pd_id` AS `pd_id`, `p`.`user_id` AS `user_id`, `p`.`pd_type_id` AS `pd_type_id`, `p`.`pd_name` AS `pd_name`, `p`.`pd_detail` AS `pd_detail`, `p`.`pd_price_start` AS `pd_price_start`, `p`.`pd_img` AS `pd_img`, `p`.`pd_condition` AS `pd_condition`, `p`.`pd_status` AS `pd_status`, `p`.`pd_start_show_date` AS `pd_start_show_date`, `p`.`pd_start_date` AS `pd_start_date`, `p`.`pd_end_date` AS `pd_end_date`, `p`.`pd_create_datetime` AS `pd_create_datetime`, `o`.`order_id` AS `order_id`, `o`.`order_status` AS `order_status`, `o`.`end_price` AS `end_price`, `o`.`order_create_datetime` AS `order_create_datetime` FROM (`product` `p` join `order_tb` `o` on((`p`.`pd_id` = `o`.`pd_id`))) WHERE ((now() >= `p`.`pd_start_date`) AND (`o`.`order_status` = 1))  ;

-- --------------------------------------------------------

--
-- Structure for view `order_detail_last_bid`
--
DROP TABLE IF EXISTS `order_detail_last_bid`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_detail_last_bid`  AS SELECT `lb`.`order_id` AS `order_id`, `l_b`.`username` AS `bidder_username`, `bidder_detail`.`ud_fname` AS `bidder_fname`, `bidder_detail`.`ud_lname` AS `bidder_lname`, `bidder_detail`.`ud_address` AS `bidder_address`, `bidder_detail`.`ud_phone` AS `bidder_phone`, `os`.`total_price` AS `end_price`, `l_s`.`username` AS `seller_username`, `b`.`bank_name` AS `seller_bank_name`, `seller_detail`.`ud_bank_number` AS `seller_bank_number`, `f`.`fee_percent` AS `fee_percent` FROM ((((((((`last_user_bid` `lb` join `product` `p` on((`p`.`pd_id` = `lb`.`order_id`))) join `login` `l_b` on((`l_b`.`user_id` = `lb`.`latest_bidder`))) join `login` `l_s` on((`l_s`.`user_id` = `p`.`user_id`))) join `user_detail` `bidder_detail` on((`bidder_detail`.`user_id` = `l_b`.`user_id`))) join `user_detail` `seller_detail` on((`seller_detail`.`user_id` = `p`.`user_id`))) join `order_summary` `os` on((`os`.`order_id` = `lb`.`order_id`))) join `bank` `b` on((`b`.`bank_id` = `seller_detail`.`ud_bank_id`))) join `fee` `f` on((`f`.`fee_id` = `p`.`fee_id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `order_summary`
--
DROP TABLE IF EXISTS `order_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_summary`  AS SELECT `p`.`pd_id` AS `order_id`, (`p`.`pd_price_start` + coalesce(sum(`b`.`bid_price_up`),0)) AS `total_price` FROM (`product` `p` left join `bid` `b` on((`p`.`pd_id` = `b`.`order_id`))) GROUP BY `p`.`pd_id`;

-- --------------------------------------------------------

--
-- Structure for view `product_with_username`
--
DROP TABLE IF EXISTS `product_with_username`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_with_username`  AS SELECT `l`.`username` AS `username`, `o`.`order_status` AS `order_status`, `p`.`pd_id` AS `pd_id`, `p`.`user_id` AS `user_id`, `p`.`pd_type_id` AS `pd_type_id`, `p`.`pd_name` AS `pd_name`, `p`.`pd_detail` AS `pd_detail`, `p`.`pd_price_start` AS `pd_price_start`, `p`.`pd_img` AS `pd_img`, `p`.`pd_condition` AS `pd_condition`, `p`.`pd_status` AS `pd_status`, `p`.`pd_start_show_date` AS `pd_start_show_date`, `p`.`pd_start_date` AS `pd_start_date`, `p`.`pd_end_date` AS `pd_end_date`, `p`.`pd_create_datetime` AS `pd_create_datetime` FROM ((`product` `p` join `login` `l` on((`p`.`user_id` = `l`.`user_id`))) join `order_tb` `o` on((`p`.`pd_id` = `o`.`pd_id`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `seller_pay`
--
DROP TABLE IF EXISTS `seller_pay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `seller_pay`  AS SELECT `o`.`order_id` AS `order_id`, `o`.`pd_id` AS `pd_id`, `ud`.`ud_fname` AS `ud_fname`, `ud`.`ud_lname` AS `ud_lname`, `o`.`order_details` AS `order_details`, `b`.`bank_name` AS `bank_name`, `ud`.`ud_bank_number` AS `ud_bank_number`, `d`.`dlv_status` AS `dlv_status`, `p`.`pay_status` AS `pay_status` FROM (((((`order_tb` `o` join `product` `pd` on((`pd`.`pd_id` = `o`.`order_id`))) join `user_detail` `ud` on((`ud`.`user_id` = `pd`.`user_id`))) join `delivery` `d` on((`d`.`order_id` = `o`.`order_id`))) join `payment` `p` on((`p`.`order_id` = `d`.`order_id`))) join `bank` `b` on((`b`.`bank_id` = `ud`.`ud_bank_id`)))  ;

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
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`dlv_id`),
  ADD KEY `dlvt_id` (`dlvt_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`dlvt_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pd_id` (`pd_id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`fee_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `pd_id` (`pd_id`) USING BTREE;

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `bank_id` (`bank_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `prefix`
--
ALTER TABLE `prefix`
  ADD PRIMARY KEY (`prefix_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pd_type_id` (`pd_type_id`),
  ADD KEY `fee_id` (`fee_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`pd_type_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`ud_id`),
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `prefix_id` (`prefix_id`),
  ADD KEY `ud_bank_id` (`ud_bank_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสธนาคาร', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `bid_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสการประมูล', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `dlv_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสขนส่ง', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_type`
--
ALTER TABLE `delivery_type`
  MODIFY `dlvt_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทขนส่ง', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `fee_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสค่าบริการ', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำสั่งซื้อ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสการชำระเงิน', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prefix`
--
ALTER TABLE `prefix`
  MODIFY `prefix_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำนำหน้าชื่อ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `pd_type_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทสินค้า', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `ud_id` int NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายละเอียดผู้ใช้', AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_tb` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`dlvt_id`) REFERENCES `delivery_type` (`dlvt_id`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_tb` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `product` (`pd_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD CONSTRAINT `order_tb_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `product` (`pd_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`bank_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order_tb` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pd_type_id`) REFERENCES `product_type` (`pd_type_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`fee_id`) REFERENCES `fee` (`fee_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_ibfk_2` FOREIGN KEY (`prefix_id`) REFERENCES `prefix` (`prefix_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `user_detail_ibfk_3` FOREIGN KEY (`ud_bank_id`) REFERENCES `bank` (`bank_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
