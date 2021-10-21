-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 09:36 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speedco_bus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` int(10) NOT NULL,
  `registration` varchar(256) NOT NULL,
  `group_id` int(100) NOT NULL,
  `assigned_lines` varchar(100) DEFAULT NULL,
  `assigned_time` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `registration`, `group_id`, `assigned_lines`, `assigned_time`) VALUES
(4, 'ABC-123', 17, '1, 2', NULL),
(5, 'JUH-145', 13, NULL, '1, 3'),
(6, 'OBJ-878', 13, NULL, '1, 3'),
(11, 'BJM-202', 17, '1, 2', NULL),
(12, 'FEF-114', 15, NULL, '3, 4'),
(14, 'OTK-282', 16, NULL, '5, 6'),
(15, 'BBJ-025', 17, '1, 2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lines_`
--

CREATE TABLE `lines_` (
  `id` int(100) NOT NULL,
  `number_` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lines_`
--

INSERT INTO `lines_` (`id`, `number_`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(100) NOT NULL,
  `direction` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `_line_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `direction`, `name`, `_line_number`) VALUES
(1, 'forward', 'M44', 1),
(3, 'return', 'H20', 2),
(48, 'forward', 'M55', 1),
(52, 'forward', 'H22', 2),
(76, 'return', 'J1T', 1),
(77, 'forward', '864F', 1),
(78, 'return', 'K12', 1),
(79, 'forward ', 'M1', 44),
(81, 'forward ', 'Q22', 99);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(100) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `time`) VALUES
(1, '7:00'),
(2, '10:00'),
(3, '13:00'),
(4, '16:00'),
(5, '19:00'),
(6, '21:00');

-- --------------------------------------------------------

--
-- Table structure for table `stops`
--

CREATE TABLE `stops` (
  `id` int(100) NOT NULL,
  `_route_name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stops`
--

INSERT INTO `stops` (`id`, `_route_name`, `code`) VALUES
(29, 'M44', 'D2'),
(30, 'M44', 'D3'),
(31, 'M44', 'D4'),
(32, 'M55', 'E1'),
(33, 'M55', 'E2'),
(34, 'J1T', 'B1'),
(35, 'J1T', 'B2'),
(36, '864F', 'T1'),
(37, 'K12', 'K9'),
(38, 'J1T', 'B3'),
(39, 'Q22', 'Y7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lines_`
--
ALTER TABLE `lines_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stops`
--
ALTER TABLE `stops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lines_`
--
ALTER TABLE `lines_`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `stops`
--
ALTER TABLE `stops`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
