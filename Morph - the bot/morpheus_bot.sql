-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 04:26 PM
-- Server version: 10.1.9-MariaDB
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
-- Database: `morpheus_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `know_base`
--

CREATE TABLE `know_base` (
  `know_base_id` int(11) NOT NULL,
  `ans` text,
  `qtns` text,
  `anto` text,
  `syno` text,
  `exam` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `know_base`
--

INSERT INTO `know_base` (`know_base_id`, `ans`, `qtns`, `anto`, `syno`, `exam`) VALUES
(1, 'tending to talk a great deal; talkative.', 'loquacious', NULL, 'talkative,garrulous,voluble,long-winded', 'never loquacious, Sarah was now totally lost for words'),
(2, 'a person that prefers not to associate with others', 'loner', NULL, 'recluse,introvert,lone wolf,hermit,solitary,misanthrope', 'my interest in birdwatching had made me a bit of a loner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `know_base`
--
ALTER TABLE `know_base`
  ADD PRIMARY KEY (`know_base_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `know_base`
--
ALTER TABLE `know_base`
  MODIFY `know_base_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
