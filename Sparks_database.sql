-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 18, 2021 at 07:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions_2`
--

CREATE TABLE `transactions_2` (
  `serial no.` int(3) NOT NULL,
  `id` int(10) NOT NULL,
  `customer name` text NOT NULL,
  `email id` text NOT NULL,
  `account type` text NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions_2`
--

INSERT INTO `transactions_2` (`serial no.`, `id`, `customer name`, `email id`, `account type`, `amount`) VALUES
(1, 45689, 'Tejal', 'tejal@gmail.com', 'Savings', 52600),
(2, 23100, 'Ravindra', 'ravindra@gmail.com', 'Current', 45767),
(3, 56712, 'Nayan', 'nayan@gmail.com', 'Savings', 76500),
(4, 21890, 'Rutuja', 'rutuja@gmail.com', 'Fixed Deposit', 23760),
(5, 87322, 'Sumit', 'sumit@gmail.com', 'Fixed Deposit', 55534),
(6, 32144, 'Yash', 'yash@gmail.com', 'Current', 65000),
(7, 12543, 'Vaibhav', 'vaibhav@gmail.com', 'Savings', 44289),
(8, 65473, 'Sonal', 'sonal@gmail.com', 'Savings', 79250),
(9, 18372, 'Seema', 'seema@gmail.com', 'Fixed Deposit', 66400),
(10, 75648, 'Kartik', 'kartik@gmail.com', 'Current', 58300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions_2`
--
ALTER TABLE `transactions_2`
  ADD PRIMARY KEY (`serial no.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions_2`
--
ALTER TABLE `transactions_2`
  MODIFY `serial no.` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
