-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 05:42 AM
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
  `admin_username` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `admin_password` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
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
  `c_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_add` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_contact` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `c_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_name`, `c_add`, `c_city`, `c_contact`, `c_email`, `password`) VALUES
('Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', 'Howrah', '08961376487', 'debopriyodjghosh@gmail.com', '123'),
('Debopriyo Ghosh', 'mallick fatak howrah', 'Howrah', '08961376487', 'ghosh@gmail.com', '123'),
('Mousumi Mondal', 'Uttarpara, Howrah', 'Howrah', '1234567890', 'mou@gmail.com', '123'),
('Saradindu Rana', 'Mednapur Town ,Midnapur', 'Mednapur', '1234567890', 'rana@gmail.com', '123'),
('Saikat Jana', 'Domjur howrah', 'Howrah', '1234567890', 'sani@gmail.com', '123'),
('Srila Parui', 'domjur  howrah', 'Howrah', '1234567890', 'srila@gmail.com', '123');

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
(48, 'Beautician', 'debopriyodjghosh@gmail.com', '222@gmail.com', '1 ', 1000, 'Ordered_finished', '2021-03-25'),
(53, 'Saloon', 'debopriyodjghosh@gmail.com', '111@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 555, 'Ordered_finished', '2021-03-20'),
(54, 'Beautician', 'debopriyodjghosh@gmail.com', '222@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 1000, 'Ordered_finished', '2021-03-26'),
(55, 'Saloon', 'debopriyodjghosh@gmail.com', '111@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 555, 'Ordered_finished', '2021-04-09'),
(56, 'Saloon', 'debopriyodjghosh@gmail.com', '111@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 100, 'Pending', '2021-04-01'),
(57, 'Saloon', 'debopriyodjghosh@gmail.com', '111@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 100, 'Pending', '2021-03-12'),
(58, 'Electric', 'debopriyodjghosh@gmail.com', '444@gmail.com', '1 R.M Ghose lane , mallick fatak howrah', 400, 'Pending', '2021-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `s_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_price` int(10) DEFAULT NULL,
  `s_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `No_sp` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`s_name`, `s_price`, `s_desc`, `s_img`, `No_sp`) VALUES
('Beautician', 1200, 'make up, hair cutting etc.', '14231.jpg', 0),
('Car Repair', 1500, 'Car repair', '791282.jpg', 0),
('Carpenter', 2500, 'Carpenter can design your interior', '542182.jpg', 0),
('Cleaning', 1000, 'home clean', '714554.jpg', 0),
('Electric', 500, 'All type of electrical work', '45968.jpg', 0),
('Grooming', 3500, 'personality devolopment', '129543.jpg', 1),
('Hair Style', 400, 'hair style', '73765.jpg', 0),
('Makeup', 3500, 'Bridal makeup', '415519.jpg', 0),
('Massage', 300, 'body massage', '395723.jpg', 0),
('Painter', 500, 'home paint', '669628.jpg', 0),
('Pest Control', 500, 'pest control', '76476.jpg', 2),
('Saloon', 500, 'spa ', '215134.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `sp_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_add` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_contact` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_exp` int(11) NOT NULL,
  `sp_rate` int(11) NOT NULL,
  `sp_account_no` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_IFSC_no` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sp_city` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `s_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_name`, `sp_add`, `sp_contact`, `sp_email`, `sp_exp`, `sp_rate`, `sp_account_no`, `sp_IFSC_no`, `sp_city`, `s_name`, `password`) VALUES
('Gupi Gayen', 'Kolkata', '1234567890', '111@gmail.com', 5, 100, '123', 'ABC1234', 'Howrah', 'Saloon', '123'),
('Bagha Bayen', 'Kolkata', '1234567890', '222@gmail.com', 1, 200, '1234', 'ABC123', 'Kolkata', 'Beautician', '123'),
('Seyal Pondit', 'Jungle, sundorbon', '1234567890', '333@gmail.com', 9, 300, '1234', 'ABC1234', 'Sundorbon', 'Painter', '123'),
('Toto Company', 'Mumbai', '123456789', '444@gmail.com', 10, 400, '1234', 'ABC 1234', 'Mumbai', 'Electric', '123'),
('Mamata Banerjee', 'Nobanno howrah', '123456789', '555@gmail.com', 20, 500, '1234', 'ABC 1234', 'Howrah', 'Makeup', '123'),
('Narendra Modi', 'Delhi', '123456789', '666@gmail.com', 25, 600, '123456', 'ABC123', 'Delhi', 'Carpenter', '123'),
('Srila Parui', 'Domjur howrah', '123456789', '7777@gmail.com', 6, 700, '123', 'ABC123', 'Howrah', 'Painter', '123'),
('Saikat Jana', 'Domjur howrah', '123456789', '888@gmail.com', 8, 800, '123', 'ABC123', 'Domjur', 'Pest Control', '123'),
('Mousumi Mondal', 'Uttorpara howrah', '123456789', '999@gmail.com', 0, 1000, '1234', 'ABC 1234', 'Uttorpara', 'Cleaning', '123'),
('Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'debopriyodj@gmail.com', 5, 4000, '123', '1233', 'Howrah', 'Pest Control', '123'),
('Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'djg@gmail.com', 5, 555, '123', '1233', 'Howrah', 'Pest Control', '123'),
('Debopriyo Ghosh', '1 R.M Ghose lane , mallick fatak howrah', '08961376487', 'ghosh@gmail.com', 5, 5000, '123', 'ABC123', 'Howrah', 'Grooming', '123'),
('Saradindu Rana', 'Mednapur town', '123456789', 'rana@gmail.com', 9, 2000, '1234', 'ABC 1234', 'Bhuvaneswar', 'Beautician', '123');

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
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `c_email` (`c_email`),
  ADD KEY `sp_email` (`sp_email`);

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
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `c_email` FOREIGN KEY (`c_email`) REFERENCES `customer` (`c_email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sp_email` FOREIGN KEY (`sp_email`) REFERENCES `service_provider` (`sp_email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `s_name` FOREIGN KEY (`s_name`) REFERENCES `service` (`s_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
