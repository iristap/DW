-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 08:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwcpekps`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `academic_year`
-- (See below for the actual view)
--
CREATE TABLE `academic_year` (
`วันที่` date
,`วันที่หลังเปิดเทอม` int(8)
,`สัปดาห์ที่หลังเปิดเทอม` int(9)
,`เทอม` varchar(20)
,`ปีการศึกษา` varchar(5)
,`เป็นสอบกลางภาค` int(1)
,`เป็นสอบปลายภาค` int(1)
,`ก่อนmid:0 หลังmid:1` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `getdate`
--

CREATE TABLE `getdate` (
  `get_id` int(11) NOT NULL,
  `get_date` date NOT NULL,
  `calendar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opendate`
--

CREATE TABLE `opendate` (
  `calendar_id` int(11) NOT NULL,
  `open_date` date NOT NULL COMMENT 'วันเปิดเทอม',
  `close_date` date DEFAULT NULL COMMENT 'วันปิดเทอม',
  `start_mid_date` date DEFAULT NULL COMMENT 'วันเริ่มสอบมิดเทอม',
  `last_mid_date` date DEFAULT NULL COMMENT 'วันสุดท้ายของการมิดเทอม',
  `start_final_date` date DEFAULT NULL COMMENT 'วันเริ่มสอบไฟนอล',
  `last_final_date` date DEFAULT NULL COMMENT 'วันสุดท้ายของการสอบไฟนอล',
  `term_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `opendate`
--

INSERT INTO `opendate` (`calendar_id`, `open_date`, `close_date`, `start_mid_date`, `last_mid_date`, `start_final_date`, `last_final_date`, `term_id`, `year_id`) VALUES
(1, '2020-07-13', '2020-11-23', '2020-08-29', '2020-09-06', '2020-11-09', '2020-11-20', 1, 1),
(2, '2020-12-07', '2021-04-16', '2021-01-23', '2021-01-31', '2021-03-29', '2021-04-09', 2, 1),
(3, '2021-05-03', '2021-06-08', NULL, NULL, '2021-06-05', '2021-06-07', 3, 1),
(4, '2021-06-28', '2021-11-08', '2021-08-14', '2021-08-22', '2022-10-25', '2022-11-05', 1, 2),
(5, '2021-11-29', '2022-04-11', '2022-01-15', '2022-01-23', '2022-03-26', '2022-04-08', 2, 2),
(6, '2022-04-25', '2022-05-31', NULL, NULL, '2022-05-28', '2022-05-30', 3, 2),
(7, '2022-06-27', '2022-11-07', '2022-08-13', '2022-08-21', '2022-10-24', '2022-11-04', 1, 3),
(8, '2022-11-28', '2023-04-03', '2023-01-14', '2023-01-22', '2023-03-20', '2023-03-31', 2, 3),
(9, '2023-04-24', '2023-06-06', NULL, NULL, '2023-06-03', '2023-06-05', 3, 3),
(10, '2023-06-26', '2023-11-06', '2023-08-12', '2023-08-20', '2023-10-23', '2023-11-03', 1, 4),
(11, '2023-11-20', '2024-04-01', '2024-01-13', '2024-01-21', '2024-03-18', '2024-03-29', 2, 4),
(12, '2024-04-22', '2023-06-04', NULL, NULL, '2024-06-01', '2024-06-03', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL COMMENT 'รหัสภาคเรียน',
  `term_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อภาคเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term_name`) VALUES
(1, 'ภาคต้น'),
(2, 'ภาคปลาย'),
(3, 'ภาคฤดูร้อน');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL COMMENT 'รหัสปี',
  `year_num` varchar(5) NOT NULL COMMENT 'ปีการศึกษา'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year_num`) VALUES
(1, '2563'),
(2, '2564'),
(3, '2565'),
(4, '2566');

-- --------------------------------------------------------

--
-- Structure for view `academic_year`
--
DROP TABLE IF EXISTS `academic_year`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `academic_year`  AS SELECT `getdate`.`get_date` AS `วันที่`, if(`getdate`.`get_date` between `opendate`.`open_date` and `opendate`.`close_date`,to_days(`getdate`.`get_date`) - to_days(`opendate`.`open_date`),NULL) + 1 AS `วันที่หลังเปิดเทอม`, if(`getdate`.`get_date` between `opendate`.`open_date` and `opendate`.`close_date`,ceiling((to_days(`getdate`.`get_date`) - to_days(`opendate`.`open_date`) + 1) / 7),NULL) AS `สัปดาห์ที่หลังเปิดเทอม`, if(`getdate`.`get_date` between `opendate`.`open_date` and `opendate`.`close_date`,`term`.`term_name`,'ปิดเทอม') AS `เทอม`, `year`.`year_num` AS `ปีการศึกษา`, CASE WHEN `getdate`.`get_date` between `opendate`.`start_mid_date` and `opendate`.`last_mid_date` THEN 1 ELSE NULL END AS `เป็นสอบกลางภาค`, CASE WHEN `getdate`.`get_date` between `opendate`.`start_final_date` and `opendate`.`last_final_date` THEN 1 ELSE NULL END AS `เป็นสอบปลายภาค`, CASE WHEN `getdate`.`get_date` between `opendate`.`open_date` and `opendate`.`last_mid_date` THEN 0 WHEN `getdate`.`get_date` between `opendate`.`last_mid_date` and `opendate`.`close_date` THEN 1 ELSE NULL END AS `ก่อนmid:0 หลังmid:1` FROM (((`getdate` join `opendate` on(`getdate`.`calendar_id` = `opendate`.`calendar_id`)) join `term` on(`opendate`.`term_id` = `term`.`term_id`)) join `year` on(`opendate`.`year_id` = `year`.`year_id`)) ORDER BY `getdate`.`get_date` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `getdate`
--
ALTER TABLE `getdate`
  ADD PRIMARY KEY (`get_id`),
  ADD KEY `open_id` (`calendar_id`);

--
-- Indexes for table `opendate`
--
ALTER TABLE `opendate`
  ADD PRIMARY KEY (`calendar_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `getdate`
--
ALTER TABLE `getdate`
  MODIFY `get_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opendate`
--
ALTER TABLE `opendate`
  MODIFY `calendar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสภาคเรียน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสปี', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `getdate`
--
ALTER TABLE `getdate`
  ADD CONSTRAINT `GetDate_ibfk_1` FOREIGN KEY (`calendar_id`) REFERENCES `opendate` (`calendar_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `opendate`
--
ALTER TABLE `opendate`
  ADD CONSTRAINT `OpenDate_ibfk_1` FOREIGN KEY (`term_id`) REFERENCES `term` (`term_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OpenDate_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
