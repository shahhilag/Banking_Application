-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2020 at 03:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankusers`
--

CREATE TABLE `bankusers` (
  `CustomerID` int(5) NOT NULL,
  `AccountNumber` int(10) NOT NULL,
  `CustomerName` varchar(50) DEFAULT NULL,
  `TotalWithdrawal` int(20) NOT NULL,
  `TotalDeposist` int(11) NOT NULL,
  `AvailableBalance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankusers`
--

INSERT INTO `bankusers` (`CustomerID`, `AccountNumber`, `CustomerName`, `TotalWithdrawal`, `TotalDeposist`, `AvailableBalance`) VALUES
(1, 112312, 'Amit Shah', 604000, 0, 396000),
(2, 223344, 'Avni Shah', 2200, 0, 24997800),
(3, 3006567, 'Varun Lenka', 89, 901, 673280),
(4, 4001526, 'Arya Patel', 1362, 2367, 3915),
(5, 5003459, 'Kushal Patel', 24, 0, 23835),
(6, 6001676, 'Manan Shah', 10, 278, 2140),
(7, 7008467, 'Aahaan Agrawal', 43, 395, 6244),
(8, 8003758, 'Pratyush Mehta', 34, 99, 366403),
(9, 9008467, 'Krunal Pandya', 0, 113, 843737),
(10, 10005678, 'Hardik Pandya', 0, 34, 34155);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `from_cust_id` int(20) NOT NULL,
  `transferername` varchar(50) NOT NULL,
  `to_cust_id` int(11) NOT NULL,
  `receivername` varchar(50) NOT NULL,
  `cashtransfer` int(20) NOT NULL,
  `transfererbalance` int(11) NOT NULL,
  `receiverbalance` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `from_cust_id`, `transferername`, `to_cust_id`, `receivername`, `cashtransfer`, `transfererbalance`, `receiverbalance`, `date`) VALUES
(1, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999900, 1815, '2020-11-23'),
(2, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999800, 1915, '2020-11-23'),
(3, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999700, 2015, '2020-11-23'),
(4, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999600, 2115, '2020-11-23'),
(5, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999500, 2215, '2020-11-23'),
(6, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999400, 2315, '2020-11-23'),
(7, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999300, 2415, '2020-11-23'),
(8, 1, 'Amit Shah', 7, 'Aahaan Agrawal', 100, 396300, 6244, '2020-11-23'),
(9, 1, 'Amit Shah', 6, 'Manan Shah', 200, 396100, 2140, '2020-11-23'),
(10, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999200, 2515, '2020-11-23'),
(11, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999100, 2615, '2020-11-23'),
(12, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24999000, 2715, '2020-11-23'),
(13, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998900, 2815, '2020-11-23'),
(14, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998800, 2915, '2020-11-23'),
(15, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998700, 3015, '2020-11-23'),
(16, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998600, 3115, '2020-11-23'),
(17, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998500, 3215, '2020-11-23'),
(18, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998400, 3315, '2020-11-23'),
(19, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998300, 3415, '2020-11-23'),
(20, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998200, 3515, '2020-11-23'),
(21, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998100, 3615, '2020-11-23'),
(22, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24998000, 3715, '2020-11-23'),
(23, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24997900, 3815, '2020-11-23'),
(24, 2, 'Avni Shah', 4, 'Arya Patel', 100, 24997800, 3915, '2020-11-23'),
(25, 4, 'Arya Patel', 3, 'Varun Lenka', 100, 3815, 673280, '2020-11-23'),
(26, 1, 'Amit Shah', 4, 'Arya Patel', 100, 396000, 3915, '2020-11-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankusers`
--
ALTER TABLE `bankusers`
  ADD PRIMARY KEY (`AccountNumber`,`CustomerID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
