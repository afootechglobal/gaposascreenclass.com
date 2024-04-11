-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 04:52 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
 Database: `gaposa_screenclass_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `counter_tab`
--

CREATE TABLE `counter_tab` (
  `sn` int(11) NOT NULL,
  `counter_id` varchar(500) NOT NULL,
  `counter_description` varchar(500) NOT NULL,
  `counter_value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter_tab`
--

INSERT INTO `counter_tab` (`sn`, `counter_id`, `counter_description`, `counter_value`) VALUES
(1, 'STAFF', 'count number of staffs', '1'),
(2, 'STUDENT', 'count number of students', '0'),
(3, 'FACULTY', 'count number of faculties', '0'),
(4, 'DEPARTMENT', 'count number of department', '0'),
(5, 'COURSE', 'count number of courses', '0'),
(6, 'TOPIC', 'Count Number of Topics', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_tab`
--

CREATE TABLE `course_tab` (
  `sn` int(11) NOT NULL,
  `faculty_id` varchar(200) NOT NULL,
  `department_id` varchar(200) NOT NULL,
  `course_code` varchar(200) NOT NULL,
  `course_title` varchar(200) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_tab`
--

CREATE TABLE `department_tab` (
  `sn` int(11) NOT NULL,
  `faculty_id` varchar(200) NOT NULL,
  `department_id` varchar(200) NOT NULL,
  `department_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tab`
--

CREATE TABLE `faculty_tab` (
  `sn` int(11) NOT NULL,
  `faculty_id` varchar(200) NOT NULL,
  `faculty_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lectures_tab`
--

CREATE TABLE `lectures_tab` (
  `sn` int(11) NOT NULL,
  `staff_id` varchar(200) NOT NULL,
  `course_code` varchar(200) NOT NULL,
  `department_id` varchar(50) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `period_tab`
--

CREATE TABLE `period_tab` (
  `sn` int(11) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `topic_id` varchar(500) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `video` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff_tab`
--

CREATE TABLE `staff_tab` (
  `sn` int(11) NOT NULL,
  `staff_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `department_id` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status_id` varchar(50) NOT NULL,
  `passport` varchar(500) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tab`
--

INSERT INTO `staff_tab` (`sn`, `staff_id`, `firstname`, `middlename`, `lastname`, `password`, `dob`, `gender`, `email`, `country`, `city`, `lga`, `residential_address`, `department_id`, `role`, `status_id`, `passport`, `otp`, `date`) VALUES
(1, 'STAFF001', 'BASIT', '', 'ADETONA', '12', '2022-03-09', 'MALE', 'basit@gmail.com', 'NIGERIA', 'LAGOS', '', '12, KOTCO', '', 'ADMIN', 'ACT', 'IMG-20220111-WA0045.jpg', '', '2022-03-15 17:23:47');

-- --------------------------------------------------------

--
-- Table structure for table `status_tab`
--

CREATE TABLE `status_tab` (
  `sn` int(11) NOT NULL,
  `status_id` varchar(100) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_tab`
--

INSERT INTO `status_tab` (`sn`, `status_id`, `status_name`) VALUES
(1, 'ACT', 'ACTIVE'),
(2, 'SUSP', 'SUSPENDED');

-- --------------------------------------------------------

--
-- Table structure for table `student_tab`
--

CREATE TABLE `student_tab` (
  `sn` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `department_id` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `passport` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `week_tab`
--

CREATE TABLE `week_tab` (
  `sn` int(11) NOT NULL,
  `course_code` varchar(200) NOT NULL,
  `topic_id` varchar(200) NOT NULL,
  `week` varchar(200) NOT NULL,
  `topic` varchar(500) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter_tab`
--
ALTER TABLE `counter_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `course_tab`
--
ALTER TABLE `course_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `department_tab`
--
ALTER TABLE `department_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `faculty_tab`
--
ALTER TABLE `faculty_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `lectures_tab`
--
ALTER TABLE `lectures_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `period_tab`
--
ALTER TABLE `period_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_tab`
--
ALTER TABLE `staff_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `status_tab`
--
ALTER TABLE `status_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `student_tab`
--
ALTER TABLE `student_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `week_tab`
--
ALTER TABLE `week_tab`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter_tab`
--
ALTER TABLE `counter_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_tab`
--
ALTER TABLE `course_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department_tab`
--
ALTER TABLE `department_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_tab`
--
ALTER TABLE `faculty_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lectures_tab`
--
ALTER TABLE `lectures_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `period_tab`
--
ALTER TABLE `period_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_tab`
--
ALTER TABLE `status_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_tab`
--
ALTER TABLE `student_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `week_tab`
--
ALTER TABLE `week_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
