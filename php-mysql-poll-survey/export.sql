-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 15, 2021 at 04:42 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `maplesyrupweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `poll_id`, `title`, `votes`) VALUES
(1, 1, 'PHP', 4),
(2, 1, 'JavaScript', 0),
(3, 1, 'Dart', 0),
(4, 1, 'Python', 0),
(5, 2, 'Reading', 2),
(6, 2, 'Eating', 0),
(7, 2, 'Cycling', 0),
(8, 2, 'Photography', 1),
(9, 3, 'Sushi', 7),
(10, 3, 'Korean', 6),
(11, 3, 'Chinese', 3),
(12, 3, 'Italian', 3),
(13, 0, 'Friends\r', 0),
(14, 0, 'Simpsons\r', 0),
(15, 0, 'Queens Gambit\r', 0),
(16, 0, 'Little Fires Everywhere\r', 0),
(17, 4, 'Friends\r', 1),
(18, 4, 'Simpsons\r', 0),
(19, 4, 'Fuller House\r', 0),
(20, 4, 'Saved by the bell\r', 0),
(21, 5, 'Cake\r', 0),
(22, 5, 'Ice Cream\r', 0),
(23, 5, 'Bing Soo\r', 0),
(24, 5, 'Bubble Tea\r', 0),
(25, 5, 'All of the above', 0),
(26, 6, 'Alien\r', 0),
(27, 6, 'Sound of Music\r', 0),
(28, 6, 'Titanic\r', 0),
(29, 6, 'Forrest Gump\r', 0),
(30, 6, 'Terminator', 0),
(31, 7, 'Travelling\r', 0),
(32, 7, 'Desserts\r', 0),
(33, 7, 'Ice Coffees\r', 0),
(34, 7, 'Desserts\r', 0),
(35, 7, 'Reading', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
