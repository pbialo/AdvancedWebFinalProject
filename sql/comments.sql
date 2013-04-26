-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2013 at 02:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `username_id` int(32) NOT NULL,
  `blog_id` int(32) NOT NULL,
  `comment` longtext NOT NULL,
  `comment_date` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username_id`, `blog_id`, `comment`, `comment_date`) VALUES
(1, 1, 1, 'Good blog post.', 1366963865),
(2, 4, 1, 'Second!', 1366963988),
(3, 1, 1, 'Test', 1366969294),
(4, 1, 1, 'Test two', 1366969333),
(5, 1, 1, 'Test three', 1366969852),
(6, 1, 6, 'Testing a comment here.', 1366970247),
(7, 5, 6, 'Testing a comment with another name.', 1366970384),
(8, 5, 6, 'Testing again.', 1366970397);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
