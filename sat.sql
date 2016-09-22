-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2016 at 12:14 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sat`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`email`, `password`) VALUES
('Administrator', 'Techithon2016'),
('Guest', 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `mother_ship`
--

CREATE TABLE `mother_ship` (
  `id` int(11) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mother_ship`
--

INSERT INTO `mother_ship` (`id`, `latitude`, `longitude`) VALUES
(1, 17.8674, 66.543),
(2, 17.8674, 66.543),
(3, 17.8674, 66.543);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `model_reference` varchar(30) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `duration` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `model_reference`, `start_date`, `end_date`, `duration`) VALUES
(1, 'project_1', '2016-08-01', '2016-09-30', '23:00:00'),
(2, 'project_2', '2016-07-27', '2016-08-23', '21:01:01'),
(3, 'project_3', '2016-07-01', '2016-08-31', '09:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `start_latitude` float NOT NULL,
  `start_longitude` float NOT NULL,
  `end_latitude` float NOT NULL,
  `end_longitude` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `ship_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `start_latitude`, `start_longitude`, `end_latitude`, `end_longitude`, `start_date`, `end_date`, `ship_name`) VALUES
(1, 9.92911, 76.2456, 16.5344, 52.8442, '2016-08-01', '2016-08-17', 'KocOmn'),
(1, 19.027, 72.8137, 19.027, 72.8137, '2016-08-05', '2016-08-21', 'MumMum'),
(1, 23.6104, 58.435, 24.7932, 66.991, '2016-08-17', '2016-09-30', 'MsctKrch'),
(2, 21.111, 71.983, 12.641, 54.405, '2016-07-27', '2016-08-01', 's1'),
(2, 25.002, 61.827, 15.098, 73.854, '2016-08-05', '2016-08-23', 's2'),
(2, 25.288, 60.446, 22.314, 68.991, '2016-07-31', '2016-08-12', 's3'),
(3, 12.12, 75.006, 19.141, 72.555, '2016-07-12', '2016-08-07', 'time'),
(3, 15.286, 51.595, 15.084, 73.84, '2016-07-31', '2016-08-23', 's2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
