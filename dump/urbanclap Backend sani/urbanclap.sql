-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 10:38 PM
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
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(15) NOT NULL,
  `c_name` text NOT NULL,
  `c_add` text NOT NULL,
  `c_contact` varchar(13) NOT NULL,
  `c_email` text NOT NULL,
  `c_rating` int(11) NOT NULL,
  `pass` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_add`, `c_contact`, `c_email`, `c_rating`, `pass`) VALUES
(1, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyodjghosh@gmail.com', 5, '123456'),
(127, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyoghosh@gmail.com', 4, '12345'),
(128, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyodjghosh@gmail.com', 5, '123456'),
(129, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyodjghosh@gmail.com', 5, '123456'),
(130, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyo@gmail.com', 55, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_name` varchar(50) NOT NULL,
  `s_desc` text NOT NULL,
  `No_sp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_name`, `s_desc`, `No_sp`) VALUES
('electrical', 'service', 12),
('hello ', 'world', 0),
('spa', 'service', 20);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `sp_id` int(15) NOT NULL,
  `sp_name` text NOT NULL,
  `sp_add` text NOT NULL,
  `sp_city` varchar(255) NOT NULL,
  `sp_contact` varchar(13) NOT NULL,
  `sp_email` varchar(255) NOT NULL,
  `sp_exp` int(11) NOT NULL,
  `sp_rating` int(11) DEFAULT NULL,
  `sp_account_no` varchar(20) NOT NULL,
  `sp_IFSC_no` varchar(11) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_id`, `sp_name`, `sp_add`, `sp_city`, `sp_contact`, `sp_email`, `sp_exp`, `sp_rating`, `sp_account_no`, `sp_IFSC_no`, `s_name`, `pass`) VALUES
(2, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', 5, 555, '55', '55', NULL, '12345'),
(3, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'ghosh@gmail.com', 5, 5, '5', '5', NULL, '123456'),
(4, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', 5, 5, '5', '5', 'hello ', '12345'),
(5, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', 3, 3, '3', '3', 'electrical', '12345'),
(6, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', 1, 1, '1', '1', 'electrical', '123456'),
(7, 'Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', 1, 1, '1', '1', 'electrical', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_name`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`sp_id`),
  ADD KEY `s_name` (`s_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `sp_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `service_provider_ibfk_1` FOREIGN KEY (`s_name`) REFERENCES `service` (`s_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
