-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2016 at 10:27 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_tool_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_table`
--

CREATE TABLE IF NOT EXISTS `department_table` (
  `dept_row_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_status` varchar(255) NOT NULL,
  `dept_row_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_table`
--

INSERT INTO `department_table` (`dept_row_id`, `dept_name`, `dept_status`, `dept_row_created_date`) VALUES
(1, 'Administration', 'Active', '2016-06-01 06:54:51'),
(2, 'Business Devlopment', 'Active', '2016-03-22 04:36:44'),
(3, 'Finance', 'Active', '2016-03-22 04:36:44'),
(4, 'Gateway Operations', 'Active', '2016-03-22 04:36:44'),
(5, 'HR', 'Active', '2016-06-01 06:54:39'),
(6, 'Implementation', 'Active', '2016-03-22 04:36:44'),
(7, 'IT', 'Active', '2016-03-22 04:36:44'),
(8, 'MD''s Office', 'Active', '2016-03-22 04:36:44'),
(9, 'Mobile Financial Services', 'Active', '2016-03-22 04:36:44'),
(10, 'NOC', 'Active', '2016-03-22 04:36:44'),
(11, 'Operations & Maintenance - 1', 'Active', '2016-03-22 04:36:44'),
(12, 'Operations & Maintenance - 2', 'Active', '2016-03-22 04:36:44'),
(13, 'Others', 'Disabled', '2016-06-01 06:54:24'),
(14, 'Planning, Architecture & Design', 'Active', '2016-03-22 04:36:44'),
(15, 'Power & Projects', 'Active', '2016-03-22 04:36:44'),
(16, 'Regulatory Affairs', 'Active', '2016-03-22 04:36:44'),
(17, 'Revenue Collection', 'Active', '2016-03-22 04:36:44'),
(18, 'Sales & Marketing', 'Active', '2016-03-22 04:36:44'),
(19, 'Supply Chain', 'Active', '2016-03-22 04:36:44'),
(28, 'Sample', 'Disabled', '2016-03-28 04:16:31'),
(29, 'N/A', 'Active', '2016-06-05 06:22:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_table`
--
ALTER TABLE `department_table`
  ADD PRIMARY KEY (`dept_row_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_table`
--
ALTER TABLE `department_table`
  MODIFY `dept_row_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
