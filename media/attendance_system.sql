-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 04:34 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `attendance_criteria` int(11) NOT NULL,
  `college_name` varchar(30) NOT NULL,
  `attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `name`, `age`, `password`, `attendance_criteria`, `college_name`, `attendance`) VALUES
('alokpurohit18@gmail.com', 'Alok Purohit', 20, 'Alok2000!', 75, 'MPSTME', 87),
('claykacz@gmail.com', 'Clay Kaczmarek', 21, 'Clay#50kacz', 80, 'MPSTME', 88),
('danielcross@gmail.com', 'Daniel Cross', 19, 'Daniel#99cross', 80, 'SBMP', 78),
('desmondmiles@gmail.com', 'Desmond Miles', 19, 'Desmond#1miles', 80, 'Mithibai', 86),
('laylahassan@gmail.com', 'Layla Hassan', 22, 'Layla#5hassan', 80, 'NMIMS B-school', 73),
('lucystillman@gmail.com', 'Lucy Stillman', 19, 'Lucy#2stillman', 80, 'Mithibai', 81),
('realshauryarawat@hotmail.com', 'Shaurya Rawat', 20, 'Shaurya#18rawat', 80, 'MPSTME', 95),
('rebeccacrane@gmail.com', 'Rebecca Crane', 20, 'Rebecca#4crane', 80, 'MPSTME', 83),
('shaunhastings@gmail.com', 'Shaun Hastings', 23, 'Shaun#3hastings', 80, 'NMIMS B-school', 88),
('warrenvidic@gmail.com', 'Warren Vidic', 20, 'Warren#98vidic', 80, 'SBMP', 91);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `s_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hours_completed` int(11) NOT NULL,
  `hours_present` int(11) NOT NULL,
  `hours_absent` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`s_id`, `email`, `name`, `hours_completed`, `hours_present`, `hours_absent`, `credit`, `attendance`) VALUES
(1, 'alokpurohit18@gmail.com', 'Game Development', 35, 30, 5, 4, 86),
(1, 'claykacz@gmail.com', 'Blockchain Technology', 40, 35, 5, 3, 88),
(1, 'danielcross@gmail.com', 'Computer Networks', 50, 38, 12, 4, 76),
(1, 'desmondmiles@gmail.com', 'Accounting', 50, 43, 7, 4, 86),
(1, 'laylahassan@gmail.com', 'Corporate Finance', 30, 22, 8, 4, 73),
(1, 'lucystillman@gmail.com', 'Accounting', 50, 41, 9, 4, 82),
(1, 'realshauryarawat@hotmail.com', 'Game Development', 30, 28, 2, 4, 96),
(1, 'rebeccacrane@gmail.com', 'Blockchain Technology', 40, 33, 7, 3, 83),
(1, 'shaunhastings@gmail.com', 'Corporate Finance', 30, 26, 4, 4, 87),
(1, 'warrenvidic@gmail.com', 'Computer Networks', 50, 45, 5, 4, 90),
(2, 'alokpurohit18@gmail.com', 'Machine Learning', 40, 36, 4, 4, 90),
(2, 'claykacz@gmail.com', 'Data Analytics', 50, 44, 6, 4, 88),
(2, 'danielcross@gmail.com', 'Data Structures', 50, 39, 11, 4, 78),
(2, 'desmondmiles@gmail.com', 'Income Tax Laws', 50, 43, 7, 4, 86),
(2, 'laylahassan@gmail.com', 'Human Resource Management', 30, 22, 8, 3, 73),
(2, 'lucystillman@gmail.com', 'Income Tax Laws', 50, 40, 10, 4, 80),
(2, 'realshauryarawat@hotmail.com', 'Machine Learning', 40, 38, 2, 4, 95),
(2, 'rebeccacrane@gmail.com', 'Data Analytics', 50, 41, 9, 4, 82),
(2, 'shaunhastings@gmail.com', 'Human Resource Management', 30, 27, 3, 3, 90),
(2, 'warrenvidic@gmail.com', 'Data Structures', 50, 45, 5, 4, 90),
(3, 'alokpurohit18@gmail.com', 'Operating System', 50, 42, 8, 4, 84),
(3, 'danielcross@gmail.com', 'Internet Of Things', 50, 40, 10, 4, 80),
(3, 'realshauryarawat@hotmail.com', 'Operating System', 40, 37, 3, 4, 94),
(3, 'warrenvidic@gmail.com', 'Internet Of Things', 50, 46, 4, 4, 92);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`s_id`,`email`),
  ADD KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`email`) REFERENCES `student` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
