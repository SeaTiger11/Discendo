-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql202.byetcluster.com
-- Generation Time: Jul 09, 2024 at 01:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36807122_quizzes`
--

-- --------------------------------------------------------

--
-- Table structure for table `Biology37`
--

CREATE TABLE `Biology37` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option_correct` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) NOT NULL,
  `option_4` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Biology37`
--

INSERT INTO `Biology37` (`id`, `question`, `option_correct`, `option_2`, `option_3`, `option_4`) VALUES
(1, 'What is our body made of', 'Bones', 'Gummy bears', 'Biscuits', 'Tea'),
(2, 'What is blood', 'Red liquid', 'Green liquid', 'Blue liquid', 'Black liquid'),
(3, 'What is mytoplasm', 'A biological thing', 'a candy', 'food', 'name of a book');

-- --------------------------------------------------------

--
-- Table structure for table `DiscreteMaths36`
--

CREATE TABLE `DiscreteMaths36` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option_correct` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) NOT NULL,
  `option_4` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DiscreteMaths36`
--

INSERT INTO `DiscreteMaths36` (`id`, `question`, `option_correct`, `option_2`, `option_3`, `option_4`) VALUES
(1, 'What is 2+3', '5', '3', '7', '1'),
(2, 'What is 3!', '6', '7', '10', '216'),
(3, 'Name a number', '7', 'b', 'c', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `Geography38`
--

CREATE TABLE `Geography38` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option_correct` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) NOT NULL,
  `option_4` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Geography38`
--

INSERT INTO `Geography38` (`id`, `question`, `option_correct`, `option_2`, `option_3`, `option_4`) VALUES
(1, 'What is the shape of the earth', 'flat disc', 'pentagonal', 'hexagonal', 'cube'),
(2, 'Where is australia', 'South side', 'North side', 'East side', 'West side');

-- --------------------------------------------------------

--
-- Table structure for table `questionwithnospaces40`
--

CREATE TABLE `questionwithnospaces40` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `option_correct` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) NOT NULL,
  `option_4` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionwithnospaces40`
--

INSERT INTO `questionwithnospaces40` (`id`, `question`, `option_correct`, `option_2`, `option_3`, `option_4`) VALUES
(1, '1+1=', '1', '2', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `likes` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `likes`) VALUES
(40, 'questionwithnospaces', 0),
(39, 'mathy math', 0),
(38, 'Geography', 0),
(37, 'Biology', 0),
(36, 'DiscreteMaths', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Biology37`
--
ALTER TABLE `Biology37`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DiscreteMaths36`
--
ALTER TABLE `DiscreteMaths36`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Geography38`
--
ALTER TABLE `Geography38`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionwithnospaces40`
--
ALTER TABLE `questionwithnospaces40`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Biology37`
--
ALTER TABLE `Biology37`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `DiscreteMaths36`
--
ALTER TABLE `DiscreteMaths36`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Geography38`
--
ALTER TABLE `Geography38`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questionwithnospaces40`
--
ALTER TABLE `questionwithnospaces40`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
