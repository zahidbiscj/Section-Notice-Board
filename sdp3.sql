-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 07:28 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` varchar(100) NOT NULL,
  `short_code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `dept_name` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `intake` int(5) NOT NULL,
  `section` int(5) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `short_code`, `name`, `dept_name`, `email`, `password`, `mobile`, `intake`, `section`, `type`) VALUES
('15162103062', NULL, 'Farhan Fardid', 'CSE', 'farhanfardid62@gmail.com', '202cb962ac59075b964b07152d234b70', '01965484126', 32, 2, 'student'),
('', 'SMR', 'Shamim reza shajib', 'CSE', 'shajibbubt@gmail.com', '202cb962ac59075b964b07152d234b70', '019654236544', 0, 0, 'teacher'),
('18015', NULL, 'kawsar', 'CSE', 'kawsar@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01787763019', 30, 2, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `serial_no` int(20) NOT NULL,
  `notice_title` varchar(50) NOT NULL,
  `dept_name` varchar(10) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `intake` int(5) NOT NULL,
  `section` int(5) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `submission_date` date NOT NULL,
  `publish_schedule` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topics` varchar(1000) NOT NULL,
  `others` varchar(100) NOT NULL DEFAULT 'NO other messages'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`serial_no`, `notice_title`, `dept_name`, `course_code`, `course_title`, `intake`, `section`, `semester`, `year`, `submission_date`, `publish_schedule`, `topics`, `others`) VALUES
(1, 'ANNOUNCEMENT FOR QUIZ', 'CSE', 'CSE-101', 'Operating Systems  ', 30, 2, 'Fall', 2018, '2018-10-28', '2018-10-26 13:03:22', 'chapter 5 exercise 2\r\n\r\nchapter10 exercise 10', 'if you don not attend the class you will fine 40 tk.'),
(2, 'ANNOUNCEMENT FOR Assignment', 'CSE', 'CSE-103', 'Software Engineering ', 30, 2, 'Fall', 2018, '2018-10-31', '2018-10-26 13:06:12', 'chapter 5 exercise 4\r\n\r\nchapter 5 exercise 2\r\n', 'if you do not give the assignment i will give you punishment');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `serial_no` int(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `intake` int(5) NOT NULL,
  `section` int(5) NOT NULL,
  `contacts_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`serial_no`, `dept_name`, `course_code`, `course_title`, `semester`, `year`, `intake`, `section`, `contacts_id`) VALUES
(1, 'CSE', 'CSE-101', 'Computer and Programming Concepts', 'Fall', 2018, 32, 2, '15162103062'),
(2, 'CSE', 'CSE-111', 'Structured Programming Language', 'Fall', 2018, 32, 2, '15162103062'),
(4, 'CSE', 'CSE-101', 'Computer and Programming Concepts', 'Fall', 2018, 30, 2, '18015'),
(5, 'CSE', 'CSE-111', 'Operating Systems  ', 'Fall', 2018, 30, 2, '18015'),
(6, 'CSE', 'CSE-103', 'Software Engineering ', 'Fall', 2018, 30, 2, '18015');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `room_no` int(5) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`serial_no`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `serial_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `serial_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
