-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2021 at 10:39 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sorting_hat`
--

-- --------------------------------------------------------

--
-- Table structure for table `hats`
--

DROP TABLE IF EXISTS `hats`;
CREATE TABLE IF NOT EXISTS `hats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hats`
--

INSERT INTO `hats` (`id`, `house`) VALUES
(1, 'gryffindor'),
(2, 'slytherin'),
(3, 'ravenclaw'),
(4, 'hufflepuff');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `interests` text NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `hatId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hatId` (`hatId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `age`, `gender`, `interests`, `telephone`, `hatId`) VALUES
(1, 'Njotu', 'Awasi', 23, 'male', 'sports', '681305793', 1),
(2, 'Awasi', 'Aghangu', 23, 'male', '', '681305793', 3),
(5, 'Atsu', 'Rex', 23, 'male', '', '444', 2),
(6, 'John', 'Doe', 45, 'male', '', '', 4),
(7, 'Rex', 'Akenji', 23, 'male', '', '', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `profile_house` FOREIGN KEY (`hatId`) REFERENCES `hats` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
