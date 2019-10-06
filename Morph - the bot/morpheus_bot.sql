-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 01:58 PM
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
-- Database: `morpheus_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact-us`
--

CREATE TABLE `contact-us` (
  `id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact-us`
--

INSERT INTO `contact-us` (`id`, `email`, `subject`, `message`) VALUES
(1, '', '', ''),
(2, 'enitanfanegan@gmail.', 'life mightymighty', 'float:right; padding-right: 20pt; font-size: 20px;float:right; padding-right: 20pt; font-size: 20px;float:right; padding-right: 20pt; font-size: 20px;float:right; padding-right: 20pt; font-size: 20px;'),
(3, 'enitanfanegan@gmail.', 'life mightymighty', 'float:right; padding-right: 20pt; font-size: 20px;float:right; padding-right: 20pt; font-size: 20px;float:right; padding-right: 20pt; font-size: 20px;float:right; padding-right: 20pt; font-size: 20px;'),
(4, 'enitanfanegan@gmail.', 'life mightymighty', 'mightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymightymighty');

-- --------------------------------------------------------

--
-- Table structure for table `know_base`
--

CREATE TABLE `know_base` (
  `know_base_id` int(11) NOT NULL,
  `ans` text DEFAULT NULL,
  `qtns` text DEFAULT NULL,
  `anto` text DEFAULT NULL,
  `syno` text DEFAULT NULL,
  `exam` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `know_base`
--

INSERT INTO `know_base` (`know_base_id`, `ans`, `qtns`, `anto`, `syno`, `exam`) VALUES
(1, 'tending to talk a great deal; talkative.', 'loquacious', NULL, 'talkative,garrulous,voluble,long-winded', 'never loquacious, Sarah was now totally lost for words'),
(2, 'a person that prefers not to associate with others', 'loner', NULL, 'recluse,introvert,lone wolf,hermit,solitary,misanthrope', 'my interest in birdwatching had made me a bit of a loner'),
(3, 'EHDHHBDHBHDBHDBHDBH', 'njkfdfkkjkf', 'm,,mmmmm,m\r\nnfknffnfhnfnf', 'knnkknkjkm\r\nnkgfknkngffdnj', 'knnkkjnkbbgfgg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact-us`
--
ALTER TABLE `contact-us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `know_base`
--
ALTER TABLE `know_base`
  ADD PRIMARY KEY (`know_base_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact-us`
--
ALTER TABLE `contact-us`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `know_base`
--
ALTER TABLE `know_base`
  MODIFY `know_base_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
