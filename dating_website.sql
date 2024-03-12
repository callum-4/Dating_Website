-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2024 at 05:29 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
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
-- Table structure for table `matchup`
--

CREATE TABLE `matchup` (
  `profile_lower_id` int(11) NOT NULL,
  `profile_higher_id` int(11) NOT NULL,
  `match_score` int(11) NOT NULL DEFAULT 0,
  `match_accepted_lower` tinyint(1) DEFAULT NULL,
  `match_accepted_higher` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `matchup_lower_profile_id` int(11) NOT NULL,
  `matchup_higher_profile_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `content` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `datetime_of_birth` datetime DEFAULT NULL,
  `banned_until` date DEFAULT NULL,
  `latitude_of_birth` float DEFAULT NULL,
  `longitude_of_birth` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_interest`
--

CREATE TABLE `profile_interest` (
  `profile_id` int(11) NOT NULL,
  `interest` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_report`
--

CREATE TABLE `profile_report` (
  `reported_profile_id` int(11) NOT NULL,
  `resolved` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seeking`
--

CREATE TABLE `seeking` (
  `id` int(11) NOT NULL,
  `gender` varchar(13) DEFAULT NULL,
  `max_age` int(11) NOT NULL DEFAULT 150,
  `min_age` int(11) NOT NULL DEFAULT 18
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_reports`
--
ALTER TABLE `ad_reports`
  ADD KEY `FK_add_id` (`reported_ad_id`);

--
-- Indexes for table `matchup`
--
ALTER TABLE `matchup`
  ADD PRIMARY KEY (`profile_lower_id`,`profile_higher_id`),
  ADD KEY `FK_higher_id` (`profile_higher_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_message_sender_id` (`sender_id`),
  ADD KEY `FK_message_matchup` (`matchup_lower_profile_id`,`matchup_higher_profile_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_profile_id_picture` (`profile_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_interest`
--
ALTER TABLE `profile_interest`
  ADD KEY `Profile_ID` (`profile_id`);

--
-- Indexes for table `profile_report`
--
ALTER TABLE `profile_report`
  ADD KEY `FK_reported_profile` (`reported_profile_id`);

--
-- Indexes for table `seeking`
--
ALTER TABLE `seeking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_ID` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_user` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ad_reports`
--
ALTER TABLE `ad_reports`
  ADD CONSTRAINT `FK_add_id` FOREIGN KEY (`reported_ad_id`) REFERENCES `ad` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `matchup`
--
ALTER TABLE `matchup`
  ADD CONSTRAINT `FK_higher_id` FOREIGN KEY (`profile_higher_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_lower_id` FOREIGN KEY (`profile_lower_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_message_matchup` FOREIGN KEY (`matchup_lower_profile_id`,`matchup_higher_profile_id`) REFERENCES `matchup` (`Profile_lower_id`, `Profile_higher_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_message_sender_id` FOREIGN KEY (`sender_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `FK_profile_id_picture` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `FK_profile_id` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `profile_interest`
--
ALTER TABLE `profile_interest`
  ADD CONSTRAINT `FK_intrested_profile` FOREIGN KEY (`Profile_ID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `profile_report`
--
ALTER TABLE `profile_report`
  ADD CONSTRAINT `FK_reported_profile` FOREIGN KEY (`reported_profile_id`) REFERENCES `profile` (`id`);

--
-- Constraints for table `seeking`
--
ALTER TABLE `seeking`
  ADD CONSTRAINT `FK_profile_id_seeking` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
