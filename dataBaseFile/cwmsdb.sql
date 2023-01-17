-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2023 at 04:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', '2020-12-10 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarwashbooking`
--

CREATE TABLE `tblcarwashbooking` (
  `id` int(11) NOT NULL,
  `bookingId` bigint(10) DEFAULT NULL,
  `packageType` varchar(120) DEFAULT NULL,
  `carWashPoint` int(11) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `washDate` date DEFAULT NULL,
  `washTime` time DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `paymentMode` varchar(120) DEFAULT NULL,
  `txnNumber` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcarwashbooking`
--

INSERT INTO `tblcarwashbooking` (`id`, `bookingId`, `packageType`, `carWashPoint`, `fullName`, `mobileNumber`, `washDate`, `washTime`, `message`, `status`, `adminRemark`, `paymentMode`, `txnNumber`, `postingDate`, `lastUpdationDate`, `City`) VALUES
(1, 316460298, '1', 1, 'ANuj kumar', 1234567890, '2021-12-16', '11:45:00', 'NA', 'Completed', 'Washing completed', 'e-Wallet', '345345345', '2021-12-13 19:14:22', '2022-08-19 01:49:15', 'New Delhi'),
(2, 647869499, '3', 2, 'Anuj kumar', 1234567890, '2021-12-30', '15:47:00', 'na', 'Pending', NULL, NULL, NULL, '2021-12-13 19:14:47', '2022-08-19 02:41:42', 'Noida'),
(3, 215755984, '2', 3, 'AMit', 9874563210, '2021-12-19', '15:05:00', 'NA', 'Pending', NULL, NULL, NULL, '2021-12-13 19:16:19', '2022-08-19 02:43:10', 'Ghaziabad'),
(4, 440337019, '1', 2, 'Sarita', 6987412360, '2022-01-01', '19:37:00', 'NA', 'Pending', NULL, NULL, NULL, '2021-12-14 17:01:55', '2022-08-19 02:43:13', 'Noida'),
(5, 783971257, '2', 2, 'John Doe', 1234567890, '2021-12-25', '13:31:00', 'NA', 'Pending', NULL, NULL, NULL, '2021-12-14 19:00:44', '2022-08-19 02:43:16', 'Noida'),
(6, 328979472, '3 ', 3, 'Rahul Yadav', 1234567890, '2021-12-18', '10:15:00', 'NA', 'Pending', NULL, NULL, NULL, '2021-12-14 19:12:37', '2022-08-19 02:43:18', 'Ghaziabad'),
(7, 151983398, '1', 2, 'Sanjeev', 1234569870, '2021-12-15', '19:50:00', 'Car wash', 'Completed', 'Car Wash Completed', 'Debit/Credit Card', 'DSGFS72342834', '2021-12-14 19:15:28', '2022-08-19 01:33:38', 'Noida'),
(8, 710850503, '1', 1, 'Easwar', 9789027597, '2022-08-11', '19:57:00', 'Booked', 'Rejected', NULL, NULL, NULL, '2022-08-16 11:24:38', '2022-08-19 03:31:25', 'New Delhi'),
(9, 918263848, '4', 1, 'Aravindh', 9789027597, '2022-08-10', '18:57:00', 'Books', 'Pending', NULL, NULL, NULL, '2022-08-16 11:26:00', '2022-08-19 02:43:24', 'New Delhi'),
(10, 698773578, '2', 3, 'Abhi', 9789027597, '2022-08-18', '19:30:00', 'Book', 'Pending', NULL, NULL, NULL, '2022-08-16 11:56:33', '2022-08-19 02:43:26', 'Ghaziabad'),
(11, 954246831, '3', 1, 'Easwar', 9789027597, '2022-08-18', '15:22:00', 'Avasaram', 'Pending', NULL, NULL, NULL, '2022-08-19 03:46:28', NULL, '1'),
(12, 210442199, '4', 2, 'Easwar H', 9789027597, '2022-08-18', '13:16:00', 'Book', 'Pending', NULL, NULL, NULL, '2022-08-19 03:46:57', NULL, '2'),
(13, 482822281, '3', 3, 'Easwar', 9789027597, '2022-08-18', '13:21:00', 'Book\r\n', 'Pending', NULL, NULL, NULL, '2022-08-19 03:47:26', NULL, '3'),
(14, 206688772, '4', 9, 'Easwar H', 9789027597, '2022-08-18', '12:21:00', 'Book', 'Pending', NULL, NULL, NULL, '2022-08-19 03:48:11', NULL, '9'),
(15, 528780734, '2', 2, 'Easwar H', 9789027597, '2022-08-09', '13:25:00', 'book', 'Pending', NULL, NULL, NULL, '2022-08-19 03:51:41', NULL, '2'),
(16, 594698139, '2', 1, 'Josph J', 9789027597, '2022-08-20', '16:00:00', 'Book', 'Pending', NULL, NULL, NULL, '2022-08-19 05:22:15', NULL, '1'),
(17, 144157873, '2', 2, 'Easwar H', 978902759, '2022-08-20', '12:57:00', 'b', 'Pending', NULL, NULL, NULL, '2022-08-19 05:24:49', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(4, 'Anuj kumar', 'anuj@gmail.com', 'General Enquiry', 'I want to know the price of car wash', '2021-12-13 18:27:53', 1),
(5, 'Amit', 'amit@gmail.com', 'Test', 'Test', '2021-12-14 19:14:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL,
  `openignHrs` varchar(255) DEFAULT NULL,
  `phoneNumber` bigint(20) DEFAULT NULL,
  `emailId` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`, `openignHrs`, `phoneNumber`, `emailId`) VALUES
(3, 'aboutus', '																				<div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px;\">CAr Wash Management System is a brand which is literally going to change the way people think about car cleaning. It is a unique mechanized car cleaning concept where cars are getting pampered by the latest equipments including high pressure cleaning machines, spray injection and extraction machines, high powered vacuum cleaners, steam cleaners and so on.</span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"color: rgb(0, 0, 0); font-family: Georgia; font-size: 15px;\">Car Wash&nbsp; Management System is a brand that is literally going to change the way people think about car cleaning. It is a unique mechanized car cleaning concept where cars are getting pampered by the latest equipments including high pressure cleaning machines, spray injection and extraction machines, high powered vacuum cleaners, steam cleaners and so on.&nbsp;</span><br></div><div></div>\r\n										\r\n										', NULL, NULL, NULL),
(11, 'contact', '123 Street, New York, USA', 'Mon - Fri, 8:00 AM - 9:00 PM', 1234567890, 'info@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--

CREATE TABLE `tblservices` (
  `S_id` int(20) NOT NULL,
  `services` varchar(50) NOT NULL,
  `Cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`S_id`, `services`, `Cost`) VALUES
(2, 'Basic Cleaning(1000)', 1000),
(3, 'Premium Cleaning', 2000),
(4, 'Complex Cleaning(3000)', 3000),
(5, 'Super Deluxe(4000)', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `tblwashingpoints`
--

CREATE TABLE `tblwashingpoints` (
  `id` int(11) NOT NULL,
  `washingPointName` varchar(255) DEFAULT NULL,
  `washingPointAddress` varchar(255) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwashingpoints`
--

INSERT INTO `tblwashingpoints` (`id`, `washingPointName`, `washingPointAddress`, `contactNumber`, `creationDate`, `City`) VALUES
(1, 'XYZ Car Washing Point', 'ABC Street New Delhi 1110001', 1236547890, '2021-12-13 16:21:20', 'New Delhi'),
(2, 'ABC Car Washing Point', 'A3263 Sector 1- Noida 201301', 98745463210, '2021-12-13 16:22:38', 'Noida'),
(3, ' Matrix Car washing Point ', 'H911 Indira Puram Ghaziabad 201017 UP', 4582365419, '2021-12-13 16:24:28', 'Ghaziabad'),
(6, 'Chennai Wash point', 'GPR nagar, Chetpet, Chennai - 60029', 9789027597, '2022-08-16 12:12:27', 'Chennai'),
(9, 'Mumbai Car Wash', 'Ghaziranga road,Mumbai- 786605', 9789027597, '2022-08-19 01:42:37', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `p_no` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `p_no`, `Password`) VALUES
('Easwar', 'easwarhari16@gmail.com', '9789027597', 'Easwar16'),
('Gokul', 'gokuldeku@gmail.com', '8996465178', 'Gokul1102'),
('Aravindh', 'aravindhram@gmail.com', '9444724811', 'Aravindh2101'),
('Anirudh', 'anirudh@gmail.com', '8996465178', 'Anirudh@1610');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carWashPoint` (`carWashPoint`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservices`
--
ALTER TABLE `tblservices`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `tblwashingpoints`
--
ALTER TABLE `tblwashingpoints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblservices`
--
ALTER TABLE `tblservices`
  MODIFY `S_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblwashingpoints`
--
ALTER TABLE `tblwashingpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  ADD CONSTRAINT `washingpointid` FOREIGN KEY (`carWashPoint`) REFERENCES `tblwashingpoints` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
