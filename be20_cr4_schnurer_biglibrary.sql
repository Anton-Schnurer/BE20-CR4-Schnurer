-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2023 at 02:37 PM
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
-- Database: `be20_cr4_schnurer_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be20_cr4_schnurer_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be20_cr4_schnurer_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `biglibrary`
--

CREATE TABLE `biglibrary` (
  `bookid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `isbn_code` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `author_first_name` varchar(255) NOT NULL,
  `author_last_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_address` varchar(255) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biglibrary`
--

INSERT INTO `biglibrary` (`bookid`, `title`, `image`, `isbn_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(1, 'War and Peace', 'default.png', 'A-0010-Z', 'War and Peace broadly focuses on Napoleon’s invasion of Russia in 1812', 'Book', 'Leo', 'Tolstoy', 'Penguin', 'Street City', '1990-01-12', 'available'),
(2, 'Anna Karenina', 'default.png', 'A-0013-Z', 'Anna Karenina, a married socialite, and her affair with the affluent Count Vronsky', 'Book', 'Leo', 'Tolstoy', 'Penguin', 'Street City', '1993-01-15', 'available'),
(3, 'Ressurection', 'default.png', 'A-0016-Z', 'The story is about a nobleman named Dmitri Ivanovich Nekhlyudov', 'Book', 'Leo', 'Tolstoy', 'Penguin', 'Street City', '1996-04-18', 'reserved'),
(4, 'Haru To Shura', 'default.png', 'A-0011-Z', 'Haru Nemuri\'s first album', 'CD', 'Haru', 'Nemuri', 'TO3S', 'Street City', '1991-11-13', 'available'),
(5, 'Shunka Ryougen', 'default.png', 'A-0014-Z', 'Haru Nemuri\'s second album', 'CD', 'Haru', 'Nemuri', 'TO3S', 'Street City', '1994-02-16', 'reserved'),
(6, 'Diana Ross', 'default.png', 'A-0017-Z', 'Her first album', 'CD', 'Diana', 'Ross', 'TO3S', 'Street City', '1997-05-19', 'avaiable'),
(7, 'Ran', 'default.png', 'A-0012-Z', 'Hidetora Ichimonji, a powerful but elderly warlord, decides to divide his kingdom among his three sons', 'DVD', 'Akira', 'Kurosawa', 'Toho', 'Street City', '1992-12-14', 'reserved'),
(8, 'Dreams', 'default.png', 'A-0015-Z', 'The film does not have a single narrative, but is rather episodic in nature', 'DVD', 'Akira', 'Kurosawa', 'Toho', 'Street City', '1995-03-17', 'available'),
(9, 'Rhapsody in August', 'default.png', 'A-0018-Z', 'A tale of three generations in a post-war Japanese family', 'DVD', 'Akira', 'Kurosawa', 'Toho', 'Street City', '1998-06-20', 'reserved'),
(10, 'King Lear', 'default.png', 'A-0019-Z', 'King Lear of Britain, elderly and wanting to retire from the duties of the monarchy, decides to divide his realm among his three daughters', 'Book', 'Wiliam', 'Shakespeare', 'Banana', 'Street City', '1999-07-21', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biglibrary`
--
ALTER TABLE `biglibrary`
  ADD PRIMARY KEY (`bookid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biglibrary`
--
ALTER TABLE `biglibrary`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
