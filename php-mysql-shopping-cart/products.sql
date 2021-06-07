-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2021 at 04:53 PM
-- Server version: 5.6.51-cll-lve
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT '0.00',
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(3, 'Headphones', 'Another great headphones', 19.99, 0.00, 23, 'airpods.png', '2019-03-13 18:47:56'),
(5, 'Headphone', 'Bose bluetooth headphones', 200.00, 300.00, 100, 'boseheadphones.png', '2020-01-22 16:09:05'),
(6, 'Bluetooth headphones', 'Another great pair of headphones', 250.00, 300.00, 100, 'headphones.png', '2021-01-22 16:30:52'),
(7, '8K TV', '8K TV Screen', 2000.00, 2500.00, 100, 'tv.png', '2021-01-22 16:31:47'),
(8, 'Gaming Chair', 'Great gaming chair with lumbar support', 500.00, 750.00, 100, 'chair001.png', '2021-01-22 16:33:37'),
(9, 'Slow Cooker', 'A great slow cooker for healthy meals', 200.00, 300.00, 100, 'slowcooker.png', '2021-01-24 01:06:14'),
(11, 'Light bulbs', 'Great reading light bulbs for your eyes', 50.00, 75.00, 10000, 'bulbs.png', '2021-01-24 01:11:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
