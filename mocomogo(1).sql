-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 03:51 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mocomogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `betlog`
--

CREATE TABLE `betlog` (
  `betID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `betCash` int(11) NOT NULL,
  `betGame` varchar(50) NOT NULL,
  `betType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `betlog`
--

INSERT INTO `betlog` (`betID`, `userName`, `betCash`, `betGame`, `betType`) VALUES
(1, 'Thiri', 2000, 'roulette', '2x'),
(2, 'Chan Min Myat', 1500, 'roulette', '3x'),
(3, 'Kaung Khant', 5000, 'roulette', '3x'),
(4, 'kk', 5000, 'roulette', '20x'),
(5, 'Kaung Khant', 100, '2x', 'roulette'),
(6, 'Kaung Khant', 300, '2x', 'roulette'),
(7, 'Kaung Khant', 300, '3x', 'roulette'),
(8, 'Kaung Khant', 300, 'roulette', '2x'),
(9, 'Kaung Khant', 300, 'roulette', '3x'),
(10, 'Kaung Khant', 1150, 'roulette', '5x'),
(11, 'Kaung Khant', 100, 'roulette', '2x'),
(12, 'Kaung Khant', 100, 'roulette', '2x'),
(13, 'Kaung Khant', 100, 'roulette', '2x'),
(14, 'Kaung Khant', 100, 'roulette', '2x'),
(15, 'Kaung Khant', 100, 'roulette', '2x'),
(16, 'Kaung Khant', 200, 'roulette', '2x'),
(17, 'Kaung Khant', 100, 'roulette', '2x'),
(18, 'Kaung Khant', 100, 'roulette', '2x'),
(19, 'Kaung Khant', 100, 'roulette', '2x'),
(20, 'Kaung Khant', 100, 'roulette', '3x'),
(21, 'Kaung Khant', 10, 'roulette', '3x'),
(22, 'Kaung Khant', 2000, 'roulette', '3x'),
(23, 'Kaung Khant', 10, 'roulette', '3x'),
(24, 'Kaung Khant', 1000, 'roulette', '2x'),
(25, 'Kaung Khant', 0, 'roulette', '2x'),
(26, 'Kaung Khant', 0, 'roulette', '2x'),
(27, 'Kaung Khant', 380, 'roulette', '2x'),
(28, 'Kaung Khant', 4000, 'roulette', '2x'),
(29, 'Kaung Khant', 600, 'roulette', '2x'),
(30, 'Kaung Khant', 400, 'roulette', '2x'),
(31, 'Kaung Khant', 500, 'roulette', '3x'),
(32, 'Kaung Khant', 1000, 'roulette', '3x'),
(33, 'Kaung Khant', 1000, 'roulette', '2x'),
(34, 'Kaung Khant', 1000, 'roulette', '2x'),
(35, 'Kaung Khant', 1000, 'roulette', '2x'),
(36, 'Kaung Khant', 1000, 'roulette', '5x'),
(37, 'Kaung Khant', 0, 'roulette', '2x'),
(38, 'Aung Kaung Myat', 2000, 'roulette', '2x'),
(39, 'Aung Kaung Myat', 600, 'roulette', '3x'),
(40, 'Aung Kaung Myat', 0, 'roulette', '2x'),
(41, 'Kaung Khant', 2000, 'roulette', '2x'),
(42, 'Kaung Khant', 2000, 'roulette', '2x'),
(43, 'Kaung Khant', 1000, 'roulette', '2x'),
(44, 'Chan Min Myat', 10, 'roulette', '2x'),
(45, 'Kaung Khant', 2000, 'roulette', '5x'),
(46, 'Kaung Khant', 2000, 'roulette', '2x'),
(47, 'Kaung Khant', 600, 'roulette', '2x'),
(48, 'Kaung Khant', 1000, 'roulette', '3x'),
(49, 'Kaung Khant', 2000, 'roulette', '2x'),
(50, 'Kaung Khant', 0, 'roulette', '2x'),
(51, 'Kaung Khant', 200, 'roulette', '2x'),
(52, 'Kaung Khant', 200, 'roulette', '2x'),
(53, 'Kaung Khant', 600, 'dice', '6 to 8'),
(54, 'Kaung Khant', 300, 'dice', '9 to 11'),
(55, 'Kaung Khant', 400, 'dice', '4 to 5'),
(56, 'Kaung Khant', 2000, 'dice', '2 to 3'),
(57, 'Kaung Khant', 40, 'dice', '2 to 3'),
(58, 'Kaung Khant', 400, 'dice', '2 to 3'),
(59, 'Kaung Khant', 3000, 'dice', '2 to 3'),
(60, 'Kaung Khant', 100, 'dice', '12'),
(61, 'Kaung Khant', 30, 'dice', '9 to 11'),
(62, 'Kaung Khant', 10, 'dice', '9 to 11'),
(63, 'Kaung Khant', 10, 'dice', '2 to 3'),
(64, 'Kaung Khant', 10, 'dice', '4 to 5'),
(65, 'Kaung Khant', 110, 'dice', '4 to 5'),
(66, 'Kaung Khant', 200, 'dice', '4 to 5'),
(67, 'Kaung Khant', 100, 'dice', '4 to 5'),
(68, 'Kaung Khant', 1000, 'dice', '6 to 8'),
(69, 'Kaung Khant', 20, 'dice', '6 to 8'),
(70, 'Kaung Khant', 20, 'dice', '6 to 8'),
(71, 'Kaung Khant', 5610, 'dice', '6 to 8'),
(72, 'Kaung Khant', 100, 'dice', '6 to 8'),
(73, 'Kaung Khant', 300, 'dice', '6 to 8'),
(74, 'Kaung Khant', 200, 'dice', '4 to 5'),
(75, 'Kaung Khant', 1300, 'dice', '6 to 8'),
(76, 'Kaung Khant', 10, 'dice', '6 to 8'),
(77, 'Kaung Khant', 10, 'dice', '9 to 11'),
(78, 'Kaung Khant', 10, 'dice', '9 to 11'),
(79, 'Kaung Khant', 10, 'dice', '9 to 11'),
(80, 'Kaung Khant', 10, 'dice', '9 to 11'),
(81, 'Kaung Khant', 10, 'dice', '9 to 11'),
(82, 'Kaung Khant', 10, 'dice', '12'),
(83, 'Kaung Khant', 10, 'dice', '12'),
(84, 'Kaung Khant', 300, 'dice', '6 to 8'),
(85, 'Kaung Khant', 200, 'dice', '6 to 8'),
(86, 'Kaung Khant', 500, 'dice', '6 to 8'),
(87, 'Kaung Khant', 500, 'dice', '6 to 8'),
(88, 'Kaung Khant', 500, 'dice', '6 to 8'),
(89, 'Kaung Khant', 500, 'dice', '6 to 8'),
(90, 'Kaung Khant', 500, 'dice', '6 to 8'),
(91, 'Kaung Khant', 500, 'dice', '6 to 8'),
(92, 'Kaung Khant', 100, 'dice', '6 to 8'),
(93, 'Kaung Khant', 750, 'dice', '6 to 8'),
(94, 'Kaung Khant', 100, 'roulette', '3x'),
(95, 'Kaung Khant', 400, 'dice', '2 to 3'),
(96, 'Kaung Khant', 100, 'dice', 'HEAD'),
(97, 'Kaung Khant', 400, 'dice', 'HEAD'),
(98, 'Kaung Khant', 300, 'dice', 'HEAD'),
(99, 'Kaung Khant', 200, 'dice', 'HEAD'),
(100, 'Kaung Khant', 1000, 'dice', 'TAIL'),
(101, 'Kaung Khant', 300, 'dice', 'TAIL'),
(102, 'Kaung Khant', 400, 'dice', 'HEAD'),
(103, 'Kaung Khant', 300, 'dice', 'HEAD'),
(104, 'Kaung Khant', 200, 'dice', 'HEAD'),
(105, 'Kaung Khant', 200, 'dice', 'HEAD'),
(106, 'Kaung Khant', 200, 'dice', 'HEAD'),
(107, 'Kaung Khant', 250, 'dice', 'HEAD'),
(108, 'Kaung Khant', 100, 'dice', 'HEAD'),
(109, 'Kaung Khant', 400, 'dice', 'TAIL'),
(110, 'Kaung Khant', 200, 'dice', 'TAIL'),
(111, 'Kaung Khant', 200, 'dice', 'HEAD'),
(112, 'Kaung Khant', 10, 'dice', 'HEAD'),
(113, 'Kaung Khant', 200, 'dice', 'HEAD'),
(114, 'Kaung Khant', 200, 'dice', 'HEAD'),
(115, 'Kaung Khant', 300, 'dice', 'HEAD'),
(116, 'Kaung Khant', 200, 'dice', 'HEAD'),
(117, 'Kaung Khant', 300, 'dice', 'HEAD'),
(118, 'Kaung Khant', 200, 'dice', 'head'),
(119, 'Kaung Khant', 1000, 'dice', 'tail'),
(120, 'Kaung Khant', 970, 'dice', 'tail'),
(121, 'Kaung Khant', 500, 'roulette', '5x');

-- --------------------------------------------------------

--
-- Table structure for table `bingochatlogs`
--

CREATE TABLE `bingochatlogs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bingochatlogs`
--

INSERT INTO `bingochatlogs` (`id`, `username`, `msg`) VALUES
(0, 'Kaung Khant', 'hi'),
(0, 'Kaung Khant', 'hey'),
(0, 'Kaung Khant', 'twwt');

-- --------------------------------------------------------

--
-- Table structure for table `coinchatlogs`
--

CREATE TABLE `coinchatlogs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coinchatlogs`
--

INSERT INTO `coinchatlogs` (`id`, `username`, `msg`) VALUES
(0, 'Kaung Khant', 'hi'),
(0, 'Kaung Khant', 'hello'),
(0, 'Kaung Khant', 'noob'),
(0, 'Kaung Khant', 'kaung'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `dicechatlogs`
--

CREATE TABLE `dicechatlogs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dicechatlogs`
--

INSERT INTO `dicechatlogs` (`id`, `username`, `msg`) VALUES
(0, 'Kaung Khant', 'hey'),
(0, 'Kaung Khant', 'hi'),
(0, 'Kaung Khant', 'you noob'),
(0, 'Kaung Khant', 'asdf'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'f'),
(0, 'Kaung Khant', 'f'),
(0, 'Kaung Khant', 'f'),
(0, 'Kaung Khant', 'f'),
(0, 'Kaung Khant', 'G'),
(0, 'Kaung Khant', 'GD'),
(0, 'Kaung Khant', 'SDFG'),
(0, 'Kaung Khant', 'd'),
(0, 'Kaung Khant', 'd'),
(0, 'Kaung Khant', 'd'),
(0, 'Kaung Khant', 'asdf'),
(0, 'Kaung Khant', 'd'),
(0, 'Kaung Khant', 'd'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'asdf'),
(0, 'Kaung Khant', 'df'),
(0, 'Kaung Khant', 'd'),
(0, 'Kaung Khant', 'dasf');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `msg`) VALUES
(151, 'Kaung Khant', 'hi'),
(152, 'Chan Min Myat', 'Hello'),
(153, 'Kaung Khant', 'lets play'),
(154, 'Kaung Khant', 'so ez'),
(155, 'Chan Min Myat', 'Ok bro'),
(156, 'Kaung Khant', '5000 in 5x trust me'),
(157, 'Kaung Khant', 'ez win'),
(158, 'Chan Min Myat', 'Ok 5x');

-- --------------------------------------------------------

--
-- Table structure for table `phptimer`
--

CREATE TABLE `phptimer` (
  `Duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phptimer`
--

INSERT INTO `phptimer` (`Duration`) VALUES
(45);

-- --------------------------------------------------------

--
-- Table structure for table `random`
--

CREATE TABLE `random` (
  `randomID` int(11) NOT NULL,
  `randomNumber` int(11) NOT NULL,
  `what` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `random`
--

INSERT INTO `random` (`randomID`, `randomNumber`, `what`) VALUES
(0, 27, 'Roulette'),
(1, 14, 'Roulette'),
(2, 20, 'Roulette'),
(3, 52, 'Roulette'),
(4, 32, 'Roulette'),
(5, 37, 'Roulette'),
(6, 12, 'Roulette'),
(7, 38, 'Roulette'),
(8, 2, 'Roulette'),
(9, 30, 'Roulette'),
(10, 23, 'Roulette'),
(11, 24, 'Roulette'),
(12, 39, 'Roulette'),
(13, 17, 'Roulette'),
(14, 43, 'Roulette'),
(15, 46, 'Roulette'),
(16, 31, 'Roulette'),
(17, 48, 'Roulette'),
(18, 8, 'Roulette'),
(19, 47, 'Roulette'),
(20, 19, 'Roulette'),
(21, 50, 'Roulette'),
(22, 1, 'Roulette'),
(23, 51, 'Roulette'),
(24, 4, 'Roulette'),
(25, 28, 'Roulette'),
(26, 21, 'Roulette'),
(27, 44, 'Roulette'),
(28, 40, 'Roulette'),
(29, 41, 'Roulette'),
(30, 36, 'Roulette'),
(31, 49, 'Roulette'),
(32, 3, 'Roulette'),
(33, 26, 'Roulette'),
(34, 18, 'Roulette'),
(35, 54, 'Roulette'),
(36, 33, 'Roulette'),
(37, 22, 'Roulette'),
(38, 53, 'Roulette'),
(39, 34, 'Roulette'),
(40, 25, 'Roulette'),
(41, 9, 'Roulette'),
(42, 10, 'Roulette'),
(43, 11, 'Roulette'),
(44, 29, 'Roulette'),
(45, 35, 'Roulette'),
(46, 45, 'Roulette'),
(47, 15, 'Roulette'),
(48, 42, 'Roulette'),
(49, 13, 'Roulette'),
(50, 7, 'Roulette'),
(51, 16, 'Roulette'),
(52, 5, 'Roulette'),
(53, 6, 'Roulette'),
(0, 35, 'Bingo'),
(1, 62, 'Bingo'),
(2, 33, 'Bingo'),
(3, 45, 'Bingo'),
(4, 52, 'Bingo'),
(5, 43, 'Bingo'),
(6, 69, 'Bingo'),
(7, 74, 'Bingo'),
(8, 27, 'Bingo'),
(9, 2, 'Bingo'),
(10, 3, 'Bingo'),
(11, 15, 'Bingo'),
(12, 50, 'Bingo'),
(13, 37, 'Bingo'),
(14, 18, 'Bingo'),
(15, 63, 'Bingo'),
(16, 68, 'Bingo'),
(17, 61, 'Bingo'),
(18, 6, 'Bingo'),
(19, 51, 'Bingo'),
(20, 4, 'Bingo'),
(21, 67, 'Bingo'),
(22, 25, 'Bingo'),
(23, 11, 'Bingo'),
(24, 24, 'Bingo'),
(25, 70, 'Bingo'),
(26, 53, 'Bingo'),
(27, 26, 'Bingo'),
(28, 71, 'Bingo'),
(29, 57, 'Bingo'),
(30, 22, 'Bingo'),
(31, 73, 'Bingo'),
(32, 55, 'Bingo'),
(33, 60, 'Bingo'),
(34, 58, 'Bingo'),
(35, 48, 'Bingo'),
(36, 49, 'Bingo'),
(37, 66, 'Bingo'),
(38, 31, 'Bingo'),
(39, 40, 'Bingo'),
(40, 8, 'Bingo'),
(41, 12, 'Bingo'),
(42, 1, 'Bingo'),
(43, 34, 'Bingo'),
(44, 14, 'Bingo'),
(45, 64, 'Bingo'),
(46, 38, 'Bingo'),
(47, 54, 'Bingo'),
(48, 23, 'Bingo'),
(49, 30, 'Bingo'),
(50, 20, 'Bingo'),
(51, 9, 'Bingo'),
(52, 41, 'Bingo'),
(53, 36, 'Bingo'),
(54, 29, 'Bingo'),
(55, 16, 'Bingo'),
(56, 39, 'Bingo'),
(57, 19, 'Bingo'),
(58, 13, 'Bingo'),
(59, 59, 'Bingo'),
(60, 7, 'Bingo'),
(61, 42, 'Bingo'),
(62, 47, 'Bingo'),
(63, 28, 'Bingo'),
(64, 10, 'Bingo'),
(65, 75, 'Bingo'),
(66, 21, 'Bingo'),
(67, 32, 'Bingo'),
(68, 72, 'Bingo'),
(69, 56, 'Bingo'),
(70, 65, 'Bingo'),
(71, 44, 'Bingo'),
(72, 46, 'Bingo'),
(73, 17, 'Bingo'),
(74, 5, 'Bingo'),
(0, 6, 'Dice'),
(1, 2, 'Dice'),
(2, 3, 'Dice'),
(3, 12, 'Dice'),
(4, 10, 'Dice'),
(5, 11, 'Dice'),
(6, 8, 'Dice'),
(7, 4, 'Dice'),
(8, 5, 'Dice'),
(9, 7, 'Dice'),
(10, 9, 'Dice'),
(0, 0, 'Coin'),
(1, 1, 'Coin');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result` varchar(50) NOT NULL,
  `what` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result`, `what`) VALUES
('7', 'bingo'),
('10', 'roulette'),
('head', 'coin'),
('', 'dice'),
('2', 'dice1'),
('1', 'dice2'),
('gg', 'omg');

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `timerID` int(11) NOT NULL,
  `timer` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`timerID`, `timer`, `description`) VALUES
(1, -5, 'Roulette General'),
(2, 3, 'Roll Dice'),
(3, -5, 'Flip a coin'),
(4, 44, 'Bingo '),
(5, 0, 'bingo number');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userCash` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPassword`, `userCash`) VALUES
(6, 'Kaung Khant', 'kaungkhant@uit.edu.mm', '482c811da5d5b4bc6d497ffa98491e38', 49500),
(7, 'Aung May than', 'aungmaythan@gmail.com', '912ec803b2ce49e4a541068d495ab570', 5000),
(8, 'Chan Min Myat', 'chanminmyat@gmail.com', '482c811da5d5b4bc6d497ffa98491e38', 4990),
(9, 'Myat Thiri', 'caroline@gmail.com', 'dfd3099dbb7fe9182648701dc11ae36d', 5180),
(10, 'Aung Kaung Myat', 'agkggmyat@gmail.com', 'e8fbec237147cbe8fcc1d9266c00f1f7', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userID` int(11) NOT NULL,
  `userProfilePic` varchar(255) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userPhone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `betlog`
--
ALTER TABLE `betlog`
  ADD PRIMARY KEY (`betID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`timerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `betlog`
--
ALTER TABLE `betlog`
  MODIFY `betID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `timerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
