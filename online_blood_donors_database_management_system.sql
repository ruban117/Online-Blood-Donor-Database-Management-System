-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 06:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_blood_donors_database_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceptance`
--

CREATE TABLE `acceptance` (
  `id` int(11) NOT NULL,
  `donor_email` varchar(50) NOT NULL,
  `req_email` varchar(50) NOT NULL,
  `accepted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acceptance`
--

INSERT INTO `acceptance` (`id`, `donor_email`, `req_email`, `accepted`) VALUES
(6, 'rubanpathak706@gmail.com', 'rubanpathak706@gmail.com', 0),
(7, 'rubanpathak706@gmail.com', 'soumendranathpathak@gmail.com', 1),
(8, 'souvikbanerjee241@gmail.com', 'rubanpathak706@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneno` varchar(10) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `pin_code` varchar(6) NOT NULL,
  `blood_group` varchar(2) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `picture` varchar(255) DEFAULT 'images/Default.png',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phoneno`, `address`, `pin_code`, `blood_group`, `state`, `city`, `picture`, `password`) VALUES
(2, 'Ruban Pathak', 'rubanpathak706@gmail.com', '6289814242', '28, South Baishnavpara Road Post:- Garifa Dist:- 24 PGS (North)', '743166', 'B+', 'West Bengal', 'Naihati', '../images/20231001_204231.jpg', 'aruda4344');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `c_id` int(11) NOT NULL,
  `requester_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`c_id`, `requester_id`, `donor_id`, `date_time`) VALUES
(1, 1, 2, '2023-10-30 11:15:43'),
(2, 1, 1, '2023-10-30 23:55:02'),
(3, 2, 2, '2023-10-31 00:07:23'),
(4, 2, 1, '2023-10-31 00:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `blood_group` varchar(2) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `availability` varchar(1) DEFAULT '1',
  `age` int(3) NOT NULL,
  `picture` varchar(255) DEFAULT '../images/Default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `email`, `phone`, `address`, `pincode`, `blood_group`, `state`, `city`, `password`, `availability`, `age`, `picture`) VALUES
(1, 'Souvik Banerjee', 'souvikbanerjee241@gmail.com', '7439497726', '294/5, sarat sarani balir more, hooghly.', '712103', 'A+', 'West Bengal', 'Chinsurah', 'Souvik@123', '1', 18, '../images/Default.png'),
(2, 'Ruban Pathak', 'rubanpathak706@gmail.com', '6289814242', '28, Dakhin Baishnab Para Road,Naihati', '743166', 'B+', 'West Bengal', 'Naihati', '1234', '1', 20, '../images/20231001_204231.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `blood_group` varchar(2) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(255) DEFAULT '../images/Default.png',
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `phone`, `address`, `pincode`, `blood_group`, `state`, `city`, `password`, `picture`, `age`) VALUES
(1, 'Ruban Pathak', 'rubanpathak706@gmail.com', '6289814242', '28, Dakhin Baishnab Para Road,Naihati', '743166', 'B+', 'West Bengal', 'Naihati', '1234', '../images/R.png', 20),
(2, 'Soumendra Natha Pathak', 'soumendranathpathak@gmail.com', '7890329221', 'Naihati', '743166', 'B+', 'West Bengal', 'Naihati', '1234', '../images/Default.png', 50);

-- --------------------------------------------------------

--
-- Table structure for table `not_member`
--

CREATE TABLE `not_member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `not_member`
--

INSERT INTO `not_member` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'souvik banerjee', 'souvikbanerjee241@gmail.com', 'a very good website..');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `rid` int(11) NOT NULL,
  `reporter` varchar(50) NOT NULL,
  `reportie` varchar(50) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rid`, `reporter`, `reportie`, `content`) VALUES
(1, 'rubanpathak706@gmail.com', 'rubanpathak706@gmail.com', 'Spam User'),
(2, 'rubanpathak706@gmail.com', 'soumendranathpathak@gmail.com', 'Spam User'),
(3, 'rubanpathak706@gmail.com', 'rubanpathak706@gmail.com', 'Spam User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptance`
--
ALTER TABLE `acceptance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneno` (`phoneno`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `requester_id` (`requester_id`),
  ADD KEY `donor_id` (`donor_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_member`
--
ALTER TABLE `not_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceptance`
--
ALTER TABLE `acceptance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `not_member`
--
ALTER TABLE `not_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `contact_details_ibfk_1` FOREIGN KEY (`requester_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `contact_details_ibfk_2` FOREIGN KEY (`donor_id`) REFERENCES `donor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
