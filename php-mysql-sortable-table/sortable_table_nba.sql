-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2021 at 10:59 PM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql_study`
--

-- --------------------------------------------------------

--
-- Table structure for table `sortable_table_nba`
--

CREATE TABLE `sortable_table_nba` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `games` tinyint(100) NOT NULL,
  `points` tinyint(100) NOT NULL,
  `rebounds` tinyint(100) NOT NULL,
  `assists` tinyint(100) NOT NULL,
  `steal` tinyint(100) NOT NULL,
  `block` tinyint(100) NOT NULL,
  `FG` tinyint(100) NOT NULL,
  `3P` tinyint(100) NOT NULL,
  `FT` tinyint(100) NOT NULL,
  `PER` tinyint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sortable_table_nba`
--

INSERT INTO `sortable_table_nba` (`id`, `name`, `games`, `points`, `rebounds`, `assists`, `steal`, `block`, `FG`, `3P`, `FT`, `PER`) VALUES
(1, 'Steph Curry', 79, 25, 5, 7, 2, 0, 47, 41, 90, 25),
(2, 'Kevin Durant', 62, 25, 8, 5, 1, 2, 54, 38, 88, 28),
(3, 'Klay Thompson', 78, 22, 4, 2, 1, 1, 47, 41, 85, 18),
(4, 'Draymond Green', 76, 10, 8, 7, 2, 1, 42, 31, 71, 17),
(5, 'Andre Iguodala', 76, 8, 4, 3, 1, 1, 53, 36, 71, 14),
(6, 'Ian Clark', 77, 7, 2, 1, 1, 0, 49, 37, 76, 13),
(7, 'Javale McGee', 77, 6, 3, 0, 0, 1, 65, 0, 51, 25),
(8, 'Zaza Pachulia', 70, 6, 6, 2, 1, 1, 53, 0, 78, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sortable_table_nba`
--
ALTER TABLE `sortable_table_nba`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sortable_table_nba`
--
ALTER TABLE `sortable_table_nba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
