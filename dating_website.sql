-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2024 at 03:50 PM
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
  `Date_of_birth` date DEFAULT NULL,
  `Banned_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Table structure for table `profile_interests`
--

CREATE TABLE `profile_interests` (
  `Profile_ID` int(11) NOT NULL,
  `interest` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
