-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 08:00 PM
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
-- Database: `alumni_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(90) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joined_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `joined_at`) VALUES
('admin@gmail.com', 'admin123', '2023-06-17 22:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_table`
--

CREATE TABLE `alumni_table` (
  `registration_no` varchar(20) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `mname` varchar(15) NOT NULL,
  `lname` varchar(18) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `batch` varchar(9) NOT NULL,
  `pass_year` int(4) NOT NULL,
  `cgpa` int(4) NOT NULL,
  `course` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `position` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `alumni_table`
--
ALTER TABLE `alumni_table`
  ADD PRIMARY KEY (`registration_no`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_id` (`course_id`,`course_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
