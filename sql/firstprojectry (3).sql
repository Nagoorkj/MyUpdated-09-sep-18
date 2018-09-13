-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2018 at 06:44 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firstprojectry`
--

-- --------------------------------------------------------

--
-- Table structure for table `newuser`
--

CREATE TABLE `newuser` (
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `otp` varchar(50) DEFAULT NULL,
  `Profession` varchar(50) DEFAULT NULL,
  `Mobile` bigint(10) DEFAULT NULL,
  `Locality` varchar(50) DEFAULT NULL,
  `LastUpdation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Experience` varchar(50) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `State` varchar(50) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `Availability` varchar(50) DEFAULT NULL,
  `DbCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newuser`
--

INSERT INTO `newuser` (`Name`, `Email`, `Password`, `otp`, `Profession`, `Mobile`, `Locality`, `LastUpdation`, `Experience`, `Country`, `State`, `City`, `Availability`, `DbCreation`) VALUES
('IQBAL', 'iqbalhussainkj@gmail.com', 'Allah@7869', NULL, 'Electrician', 9094326889, 'Royapettah', '2018-01-27 17:30:15', NULL, NULL, NULL, NULL, NULL, '2018-01-28 17:18:04'),
('Thaha', 'nagoorkj@gmail.com', '474786', NULL, 'Civil Worker', 9551474786, 'Triplicane', '2018-01-28 17:22:23', '2', 'IND', 'TAMILNADU', 'CHENNAI', 'SECOND', '2018-01-28 17:22:23'),
('Thaha', 'nagoorkj@outlook.com', '474786', NULL, 'Civil Worker', 8681033011, 'Triplicane', '2018-01-28 17:12:29', NULL, NULL, NULL, NULL, NULL, '2018-01-28 17:18:04'),
('testing', 'nagoorkj@wipro.com', '456', NULL, 'Select Your Profession', 9043127866, '---Select Your Locality--', '2018-01-27 17:22:38', NULL, NULL, NULL, NULL, NULL, '2018-01-28 17:18:04'),
('Vijay', 'vijay.waralu@gmail.com', 'testing786', NULL, 'Electrician', 9514606896, 'Lloyds road', '2018-01-28 16:21:46', NULL, NULL, NULL, NULL, NULL, '2018-01-28 17:18:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newuser`
--
ALTER TABLE `newuser`
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Mobile` (`Mobile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
