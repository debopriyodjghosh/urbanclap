-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 12:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `c_name` text NOT NULL,
  `c_add` text NOT NULL,
  `c_city` text NOT NULL,
  `c_contact` varchar(13) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_name`, `c_add`, `c_city`, `c_contact`, `c_email`, `password`) VALUES
('Sani Jana', 'South', 'Makordaha', '9123354043', 'janasani2@gmail.com', '12345'),
('Saikat Jana', 'Jhapordah', 'Domjur', '7278661001', 'sanijana15@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_name` varchar(50) NOT NULL,
  `s_desc` text NOT NULL,
  `No_sp` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_name`, `s_desc`, `No_sp`) VALUES
('Beautician', 'make up, hair cutting etc.', 0),
('Electric', 'All type of electrical work', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `sp_name` text NOT NULL,
  `sp_add` text NOT NULL,
  `sp_contact` varchar(13) NOT NULL,
  `sp_email` varchar(255) NOT NULL,
  `sp_exp` int(11) NOT NULL,
  `sp_rating` int(11) NOT NULL,
  `sp_account_no` varchar(20) NOT NULL,
  `sp_IFSC_no` varchar(11) NOT NULL,
  `sp_city` text NOT NULL,
  `sp_s_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_name`, `sp_add`, `sp_contact`, `sp_email`, `sp_exp`, `sp_rating`, `sp_account_no`, `sp_IFSC_no`, `sp_city`, `sp_s_name`, `password`) VALUES
('Babu Manna', 'aaa', '7278661221', 'babu@gmail.com', 3, 3, '11111111111654', 'BAN12345689', 'Makordaha', 'Electric', '1111'),
('Buli Jana', 'Dakshin', '9836541298', 'buli@gmail.com', 3, 2, '00000000012452', 'UCO12457896', 'Domjur', 'Electric', '0000'),
('Himansu Jana', 'Dakshin', '123456789', 'himansu@gmail.com', 10, 5, '1234567890', 'ALHA1234567', 'Domjur', 'Electric', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_email`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`s_name`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`sp_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `sp_s_name` FOREIGN KEY (`sp_s_name`) REFERENCES `service` (`s_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
