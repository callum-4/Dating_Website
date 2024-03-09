-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 04:36 PM
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
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `text` text NOT NULL,
  `link` varchar(200) NOT NULL,
  `owner_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ad_reports`
--

CREATE TABLE `ad_reports` (
  `reported_ad_id` int(11) NOT NULL,
  `resolved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matchups`
--

CREATE TABLE `matchups` (
  `Profile_lower_id` int(11) NOT NULL,
  `Profile_higher_id` int(11) NOT NULL,
  `Match_score` int(11) NOT NULL DEFAULT 0,
  `Match_accepted_lower` int(11) DEFAULT NULL,
  `Match_accepted_higher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Profile_ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Datetime_of_birth` datetime DEFAULT NULL,
  `Banned_until` date DEFAULT NULL,
  `latitude_of_birth` float DEFAULT NULL,
  `longitude_of_birth` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Profile_ID`, `Name`, `Gender`, `Description`, `Datetime_of_birth`, `Banned_until`, `latitude_of_birth`, `longitude_of_birth`) VALUES
(9, '', '', '', NULL, NULL, 0, 0),
(10, '', '', '', NULL, NULL, 0, 0),
(11, '', '', '', NULL, NULL, 0, 0),
(12, '', '', '', NULL, NULL, 0, 0),
(13, '', '', '', NULL, NULL, 0, 0),
(14, '', '', '', NULL, NULL, 0, 0),
(15, '', '', '', NULL, NULL, 0, 0),
(16, '', '', '', NULL, NULL, 0, 0),
(17, '', '', '', NULL, NULL, 0, 0),
(18, '', '', '', NULL, NULL, 0, 0),
(19, '', '', '', NULL, NULL, 0, 0),
(20, 'joey', 'Male', 'cool cool cool cool cool cool cool cool ', NULL, NULL, 0, 0),
(21, 'Sam', 'Male', 'sam sam sam sam sam sam sam sam sam ', NULL, NULL, 0, 0),
(22, '', '', '', NULL, NULL, 0, 0),
(28, NULL, NULL, NULL, NULL, NULL, 0, 0),
(29, NULL, NULL, NULL, NULL, NULL, 0, 0),
(30, NULL, NULL, NULL, NULL, NULL, 0, 0),
(31, NULL, NULL, NULL, NULL, NULL, 0, 0),
(32, 're', 'Male', '', '2024-02-06 00:00:00', NULL, 0, 0),
(33, 'a', 'Male', '', '2024-02-05 00:00:00', NULL, 0, 0),
(34, 'df', 'Male', '', '2024-02-06 00:00:00', NULL, 0, 0),
(35, 'dfvs', 'Male', '', '2024-02-07 00:00:00', NULL, 0, 0),
(36, 'f', 'Male', 'df', '2024-02-14 00:00:00', NULL, 0, 0),
(37, 'fv', 'Male', '', '2024-02-05 00:00:00', NULL, 0, 0),
(38, 'd', 'Male', '', '2024-02-05 00:00:00', NULL, 0, 0),
(39, 'YIPPIEEE', 'Male', 'hi', '2024-02-14 00:00:00', NULL, 0, 0),
(40, 'keke', 'Male', 'discription', '2024-02-08 00:00:00', NULL, 0, 0),
(41, 'fe', 'Male', 'bvmkdfosnvipdfs', '2024-02-01 00:00:00', NULL, 0, 0),
(42, 'mjklf', 'Male', '', '2024-01-08 00:00:00', NULL, 0, 0),
(43, 'a', 'Male', 'ewfawf', '2024-02-14 00:00:00', NULL, 0, 0),
(44, NULL, NULL, NULL, NULL, NULL, 0, 0),
(45, NULL, NULL, NULL, NULL, NULL, 0, 0),
(46, NULL, NULL, NULL, NULL, NULL, 0, 0),
(47, 'wreg', 'Male', 'dgfjf', '2024-02-07 00:00:00', NULL, 0, 0),
(48, 'kfk', 'Male', 'krgkjf', '2024-02-05 00:00:00', NULL, 0, 0),
(49, 'fh', 'Male', 'dhdgfh', '2024-02-09 00:00:00', NULL, 0, 0),
(50, NULL, NULL, NULL, NULL, NULL, 0, 0),
(51, NULL, NULL, NULL, NULL, NULL, 0, 0),
(52, 'df', 'Male', 'sdfg', '2024-03-13 00:00:00', NULL, 0, 0),
(53, 'bfd', 'Male', 'gsdfgdfs', '2024-03-12 00:00:00', NULL, 0, 0);

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
(48, 'g'),
(49, 'dfh'),
(49, 'kk'),
(49, 'ssa'),
(52, 'a'),
(52, 'f'),
(52, 'g'),
(52, 'e'),
(52, 'x'),
(52, 'g'),
(52, ''),
(53, 'a'),
(53, 'f'),
(53, 'g'),
(53, 'sf'),
(53, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `profile_reports`
--

CREATE TABLE `profile_reports` (
  `reported_profile_id` int(11) NOT NULL,
  `resolved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(48, 'Women', 150, 18),
(49, 'No preference', 150, 18),
(52, 'Men', 150, 18),
(53, 'Men', 150, 18);

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
(48, 'e@5', '1'),
(49, 'w@7', '1'),
(50, 'r@1', '1'),
(51, 't@1', '1'),
(52, 't@2', '1'),
(53, 't@3', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_reports`
--
ALTER TABLE `ad_reports`
  ADD KEY `FK_add_id` (`reported_ad_id`);

--
-- Indexes for table `matchups`
--
ALTER TABLE `matchups`
  ADD PRIMARY KEY (`Profile_lower_id`,`Profile_higher_id`),
  ADD KEY `matchups_ibfk_2` (`Profile_higher_id`);

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
-- Indexes for table `profile_reports`
--
ALTER TABLE `profile_reports`
  ADD KEY `FK_reported_profile` (`reported_profile_id`);

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
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_reports`
--
ALTER TABLE `ad_reports`
  ADD CONSTRAINT `FK_add_id` FOREIGN KEY (`reported_ad_id`) REFERENCES `ad` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `matchups`
--
ALTER TABLE `matchups`
  ADD CONSTRAINT `matchups_ibfk_1` FOREIGN KEY (`Profile_lower_id`) REFERENCES `profile` (`Profile_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `matchups_ibfk_2` FOREIGN KEY (`Profile_higher_id`) REFERENCES `profile` (`Profile_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_profile_id` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `profile_interests`
--
ALTER TABLE `profile_interests`
  ADD CONSTRAINT `FK_profile_id_intrests` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `profile_reports`
--
ALTER TABLE `profile_reports`
  ADD CONSTRAINT `FK_reported_profile` FOREIGN KEY (`reported_profile_id`) REFERENCES `profile` (`Profile_ID`);

--
-- Constraints for table `seeking`
--
ALTER TABLE `seeking`
  ADD CONSTRAINT `FK_profile_id_seeking` FOREIGN KEY (`Profile_ID`) REFERENCES `users` (`user_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
