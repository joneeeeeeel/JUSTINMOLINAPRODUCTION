-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2021 at 02:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `availed_services`
--

CREATE TABLE `availed_services` (
  `tran_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `package_dtl_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `package_detail_reference`
--

CREATE TABLE `package_detail_reference` (
  `pack_dtl_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `package_inclusion_desc` text NOT NULL,
  `pck_dtl_price` float NOT NULL,
  `pck_dtl_status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A - Active D - Discontinued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_detail_reference`
--

INSERT INTO `package_detail_reference` (`pack_dtl_id`, `service_id`, `package_inclusion_desc`, `pck_dtl_price`, `pck_dtl_status`) VALUES
(1, 1, '2 Photographers', 5000, 'A'),
(2, 1, '2 Videographers', 5000, 'A'),
(3, 1, 'Coffee Table', 2000, 'A'),
(4, 1, 'Photo Album', 5000, 'A'),
(5, 1, 'RAW File', 5000, 'A'),
(6, 1, 'Pre Nup', 8000, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `package_inclusion_fact`
--

CREATE TABLE `package_inclusion_fact` (
  `package_id` int(11) NOT NULL,
  `pckage_dtl_id` int(11) NOT NULL,
  `package_inc_status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active D = Discontinued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_inclusion_fact`
--

INSERT INTO `package_inclusion_fact` (`package_id`, `pckage_dtl_id`, `package_inc_status`) VALUES
(1, 1, 'A'),
(1, 2, 'A'),
(1, 3, 'A'),
(1, 4, 'A'),
(1, 6, 'A'),
(4, 1, 'A'),
(4, 2, 'A'),
(4, 3, 'A'),
(4, 4, 'A'),
(4, 5, 'A'),
(4, 6, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `package_reference`
--

CREATE TABLE `package_reference` (
  `package_id` int(11) NOT NULL,
  `package_name` text NOT NULL,
  `package_desc` text NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_reference`
--

INSERT INTO `package_reference` (`package_id`, `package_name`, `package_desc`, `service_id`) VALUES
(1, 'Package A - Wedding', '', 1),
(2, 'Package B - Wedding', '', 1),
(3, 'Package C - Wedding', '', 1),
(4, 'Custom Package', 'Choose whatever you want on your wedding', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` text NOT NULL,
  `service_status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A - Active D - Discontinued'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_status`) VALUES
(1, 'Wedding', 'A'),
(2, 'Debut', 'A'),
(3, 'Birthday', 'A'),
(4, 'Christening', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availed_services`
--
ALTER TABLE `availed_services`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `package_detail_reference`
--
ALTER TABLE `package_detail_reference`
  ADD PRIMARY KEY (`pack_dtl_id`);

--
-- Indexes for table `package_reference`
--
ALTER TABLE `package_reference`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package_detail_reference`
--
ALTER TABLE `package_detail_reference`
  MODIFY `pack_dtl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_reference`
--
ALTER TABLE `package_reference`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
