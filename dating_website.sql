-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2024 at 04:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating website`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Profile_ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Banned_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Profile_ID`, `Name`, `Gender`, `Description`, `Date_of_birth`, `Banned_until`) VALUES
(9, '', '', '', NULL, NULL),
(10, '', '', '', NULL, NULL),
(11, '', '', '', NULL, NULL),
(12, '', '', '', NULL, NULL),
(13, '', '', '', NULL, NULL),
(14, '', '', '', NULL, NULL),
(15, '', '', '', NULL, NULL),
(16, '', '', '', NULL, NULL),
(17, '', '', '', NULL, NULL),
(18, '', '', '', NULL, NULL),
(19, '', '', '', NULL, NULL),
(20, 'joey', 'Male', 'cool cool cool cool cool cool cool cool ', NULL, NULL),
(21, 'Sam', 'Male', 'sam sam sam sam sam sam sam sam sam ', NULL, NULL),
(22, '', '', '', NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL),
(32, 're', 'Male', '', '2024-02-06', NULL),
(33, 'a', 'Male', '', '2024-02-05', NULL),
(34, 'df', 'Male', '', '2024-02-06', NULL),
(35, 'dfvs', 'Male', '', '2024-02-07', NULL),
(36, 'f', 'Male', 'df', '2024-02-14', NULL),
(37, 'fv', 'Male', '', '2024-02-05', NULL),
(38, 'd', 'Male', '', '2024-02-05', NULL),
(39, 'YIPPIEEE', 'Male', 'hi', '2024-02-14', NULL),
(40, 'keke', 'Male', 'discription', '2024-02-08', NULL),
(41, 'fe', 'Male', 'bvmkdfosnvipdfs', '2024-02-01', NULL),
(42, 'mjklf', 'Male', '', '2024-01-08', NULL),
(43, 'a', 'Male', 'ewfawf', '2024-02-14', NULL),
(44, NULL, NULL, NULL, NULL, NULL),
(45, NULL, NULL, NULL, NULL, NULL),
(46, NULL, NULL, NULL, NULL, NULL),
(47, 'wreg', 'Male', 'dgfjf', '2024-02-07', NULL),
(48, 'kfk', 'Male', 'krgkjf', '2024-02-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_interests`
--

CREATE TABLE `profile_interests` (
  `Profile_ID` int(11) NOT NULL,
  `interest` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile_interests`
--

INSERT INTO `profile_interests` (`Profile_ID`, `interest`) VALUES
(38, 'q'),
(38, 'swa boow'),
(38, 'd'),
(38, 'f'),
(39, 'axe throwing'),
(39, 'cooking'),
(39, 'running'),
(40, 'a'),
(40, 'b'),
(40, 'c'),
(42, 'a'),
(42, 'g'),
(42, 'j'),
(42, 'd'),
(43, 'a'),
(43, 'f'),
(43, 'h'),
(43, 'r'),
(43, 's'),
(43, 's'),
(47, 'a'),
(47, 'b'),
(47, 'c'),
(47, 'a'),
(47, 'b'),
(47, 'c'),
(48, '1'),
(48, 's'),
(48, 'f'),
(48, 'y'),
(48, 'g'),
(48, '1'),
(48, 's'),
(48, 'f'),
(48, 'y'),
(48, 'g');

-- --------------------------------------------------------

--
-- Table structure for table `seeking`
--

CREATE TABLE `seeking` (
  `Profile_ID` int(11) NOT NULL,
  `Gender` varchar(13) DEFAULT NULL,
  `Max_Age` int(11) NOT NULL DEFAULT 150,
  `Min_Age` int(11) NOT NULL DEFAULT 18
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seeking`
--

INSERT INTO `seeking` (`Profile_ID`, `Gender`, `Max_Age`, `Min_Age`) VALUES
(48, 'Women', 150, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `Email`, `Password`) VALUES
(9, 'brendan@gmail.com', 'password'),
(10, 'joe@gmail.com', 'password'),
(11, 'mark@gmail.com', 'password'),
(12, 'frank@gmail.com', 'password'),
(13, 'gem@gmail.com', 'password'),
(14, 'fern@gmail.com', 'password'),
(15, 'callum@gmail.com', 'password'),
(16, 'jadgsfg@gmail.com', 'password'),
(17, 'joever@gmail.com', 'password'),
(18, 'lashgf@gmail.com', 'password'),
(19, 'joseph@gmail.com', 'password'),
(20, 'joey@gmail.com', 'password'),
(21, 'sam@gmail.com', 'password'),
(22, 'qeufhda@gmail.com', 'password'),
(23, 'a@b', '1234'),
(24, 'b@a', '1'),
(25, 'a@l', '1'),
(26, 'q@g', '1'),
(27, '1@2', '1'),
(28, 'q@a', '1'),
(29, 'q@1', '1'),
(30, 'q@2', '1'),
(31, 'q@3', '1'),
(32, 'q@4', '1'),
(33, 'q@5', '1'),
(34, 'q@6', '1'),
(35, 'q@7', '1'),
(36, 'q@8', '1'),
(37, 'q@9', '1'),
(38, 'w@1', '1'),
(39, 'w@2', '1'),
(40, 'w@3', '1'),
(41, 'w@4', '1'),
(42, 'w@5', '1'),
(43, 'w@6', '1'),
(44, 'e@1', '1'),
(45, 'e@2', '1'),
(46, 'e@3', '1'),
(47, 'e@4', '1'),
(48, 'e@5', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Profile_ID`);

--
-- Indexes for table `profile_interests`
--
ALTER TABLE `profile_interests`
  ADD KEY `Profile_ID` (`Profile_ID`);

--
-- Indexes for table `seeking`
--
ALTER TABLE `seeking`
  ADD UNIQUE KEY `Profile_ID` (`Profile_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_profile_id` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `fk_profile_and_user_id` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `profile_interests`
--
ALTER TABLE `profile_interests`
  ADD CONSTRAINT `FK_profile_id_intrests` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `seeking`
--
ALTER TABLE `seeking`
  ADD CONSTRAINT `FK_profile_id_seeking` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;