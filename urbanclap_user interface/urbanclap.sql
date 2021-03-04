-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 06:56 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbanclap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_username` varchar(500) NOT NULL DEFAULT '',
  `admin_password` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_name` text NOT NULL,
  `c_add` text NOT NULL,
  `c_city` text NOT NULL,
  `c_contact` varchar(13) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_name`, `c_add`, `c_city`, `c_contact`, `c_email`, `password`) VALUES
('Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sp_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_add` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_price` double NOT NULL DEFAULT '0',
  `order_status` varchar(45) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `order_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `order_name`, `c_email`, `sp_email`, `order_add`, `order_price`, `order_status`, `order_date`) VALUES
(15, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-26'),
(16, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-23'),
(17, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '', 334, 'Ordered_finished', '0000-00-00'),
(18, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '', 334, 'Ordered_finished', '0000-00-00'),
(19, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '', 334, 'Ordered_finished', '0000-00-00'),
(20, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '', 334, 'Ordered_finished', '0000-00-00'),
(22, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-10'),
(23, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-17'),
(24, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-10'),
(25, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-28'),
(26, 'Beautician', 'debopriyodjghosh@gmail.com', 'debopriyodjghosh@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 334, 'Ordered_finished', '2021-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_name` varchar(50) NOT NULL,
  `s_price` int(10) DEFAULT NULL,
  `s_desc` text NOT NULL,
  `s_img` varchar(255) DEFAULT NULL,
  `No_sp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_name`, `s_price`, `s_desc`, `s_img`, `No_sp`) VALUES
('Beautician', 1200, 'make up, hair cutting etc.', '14231.jpg', 3),
('Carpenter', 500, 'Carpenter can design your interior', '542182.jpg', 0),
('Electric', 2500, 'All type of electrical work', '45968.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `sp_name` text NOT NULL,
  `sp_add` text NOT NULL,
  `sp_contact` varchar(13) NOT NULL,
  `sp_email` varchar(50) NOT NULL,
  `sp_exp` int(11) NOT NULL,
  `sp_rate` int(11) NOT NULL,
  `sp_account_no` varchar(20) NOT NULL,
  `sp_IFSC_no` varchar(11) NOT NULL,
  `sp_city` text NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_name`, `sp_add`, `sp_contact`, `sp_email`, `sp_exp`, `sp_rate`, `sp_account_no`, `sp_IFSC_no`, `sp_city`, `s_name`, `password`) VALUES
('Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyodjghosh@gmail.com', 1, 334, '1', '1', 'Howrah', 'Beautician', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_name`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`sp_email`),
  ADD KEY `s_name` (`s_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `s_name` FOREIGN KEY (`s_name`) REFERENCES `service` (`s_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
