-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2016 at 06:47 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `credit_card_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_card`
--

CREATE TABLE `apply_card` (
  `occupation` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `ssn` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_card`
--

INSERT INTO `apply_card` (`occupation`, `salary`, `ssn`, `email`) VALUES
('work', 'thirty', '1234567', 'rxg12345@ucmo.edu'),
('student', 'noSalary', '123456', 'vijaypunna@live.com');

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `student` int(25) DEFAULT NULL,
  `regular` int(25) DEFAULT NULL,
  `business` int(25) DEFAULT NULL,
  `secured` int(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`student`, `regular`, `business`, `secured`, `email`) VALUES
(NULL, 1791211, NULL, NULL, 'rxg12345@ucmo.edu'),
(2103370, NULL, NULL, NULL, 'vijaypunna@live.com');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_account_numbers`
--

CREATE TABLE `credit_card_account_numbers` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `account_holder_since` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card_account_numbers`
--

INSERT INTO `credit_card_account_numbers` (`first_name`, `last_name`, `email`, `account_number`, `phone`, `account_holder_since`) VALUES
('anil', 'pathi', 'anil@pathi.ucmo.edu', '1234567', '5124317721', '2014-04-12'),
('Rajashekar', 'Gurram', 'rxg12345@ucmo.edu', '56789', '23456', '0001-12-14'),
('Vijay', 'Punna', 'vijaypunna@live.com', '9533383372', '8168829066', '2013-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_table`
--

CREATE TABLE `credit_card_table` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `security_question` varchar(150) NOT NULL,
  `security_answer` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credit_card_table`
--

INSERT INTO `credit_card_table` (`first_name`, `last_name`, `account_number`, `email`, `phone`, `password`, `security_question`, `security_answer`) VALUES
('Anil', 'Pathi', '1234567', 'anil@pathi.ucmo.edu', '5124317721', 'abcd', 'What is your name?', 'anil'),
('Rajashekar', 'Gurram', '56789', 'rxg12345@ucmo.edu', '23456', 'shekar', 'how are you?', 'fine'),
('Vijay', 'Punna', '9533383372', 'vijaypunna@live.com', '8168829066', 'rise', 'What is your favorite song?', 'rise');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_card`
--
ALTER TABLE `apply_card`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ssn` (`ssn`);

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `student` (`student`),
  ADD UNIQUE KEY `student_2` (`student`);

--
-- Indexes for table `credit_card_account_numbers`
--
ALTER TABLE `credit_card_account_numbers`
  ADD PRIMARY KEY (`account_number`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `credit_card_table`
--
ALTER TABLE `credit_card_table`
  ADD PRIMARY KEY (`account_number`),
  ADD UNIQUE KEY `account_number` (`account_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_card_table`
--
ALTER TABLE `credit_card_table`
  ADD CONSTRAINT `credit_card_table_ibfk_1` FOREIGN KEY (`account_number`) REFERENCES `credit_card_account_numbers` (`account_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
