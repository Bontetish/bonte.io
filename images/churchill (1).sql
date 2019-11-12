-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 11:09 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchill`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id` int(13) NOT NULL,
  `amt` float(12,2) NOT NULL,
  `code` varchar(233) NOT NULL,
  `user` varchar(100) NOT NULL,
  `used` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id`, `amt`, `code`, `user`, `used`) VALUES
(1, 6000.00, 'gffhkjkhffd', '33456767 ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `e_id` int(13) NOT NULL,
  `e_name` varchar(244) NOT NULL,
  `e_date` date NOT NULL,
  `e_mc` varchar(233) NOT NULL,
  `e_venue` varchar(233) NOT NULL,
  `capacity` int(11) NOT NULL,
  `vip` decimal(10,2) NOT NULL,
  `regular` decimal(10,2) NOT NULL,
  `del` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`e_id`, `e_name`, `e_date`, `e_mc`, `e_venue`, `capacity`, `vip`, `regular`, `del`) VALUES
(15, 'Homecoming ', '2019-11-15', 'mc Papsy', 'huko kwetu', 5000, '6000.00', '3500.00', 0),
(17, 'Jamuhuri Edit', '2019-12-12', 'Mc Tricky', 'Carnivore', 1500, '5500.00', '2500.00', 0),
(18, 'Churchill Na Christmas', '2019-11-21', 'ndambuki', 'Mukusu', 1234, '2600.00', '1000.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(12) NOT NULL,
  `uid` varchar(230) NOT NULL,
  `eventid` int(233) NOT NULL,
  `class` varchar(234) NOT NULL,
  `tim` datetime NOT NULL DEFAULT current_timestamp(),
  `trans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `fname` varchar(233) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `nid` varchar(233) NOT NULL,
  `email` varchar(233) NOT NULL,
  `pass1` varchar(255) NOT NULL,
  `pass2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `fname`, `phone`, `nid`, `email`, `pass1`, `pass2`) VALUES
(6, 'Bonface Mutisya Ngila', '0792950816', '33456767', 'bonienkilah@gmail.com', 'Boniface', 'Boniface'),
(7, 'Godwin Kipsang', '0792950816', '33456766', 'bonienkilah@gmail.com', 'Boniface', 'Boniface');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `e_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
