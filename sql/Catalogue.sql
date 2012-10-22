-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2012 at 12:14 PM
-- Server version: 5.1.57-log
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web98-admin-4`
--

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE IF NOT EXISTS `components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(125) NOT NULL,
  `description` varchar(555) NOT NULL,
  `view` varchar(125) NOT NULL,
  `technologies` varchar(555) NOT NULL,
  `status` varchar(125) NOT NULL,
  `date_added` varchar(10) NOT NULL,
  `author` varchar(75) NOT NULL,
  `contributors` varchar(555) NOT NULL,
  `version` varchar(5) NOT NULL,
  `git_hub_link` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE IF NOT EXISTS `layouts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(125) NOT NULL,
  `description` varchar(555) NOT NULL,
  `view` varchar(125) NOT NULL,
  `technologies` varchar(555) NOT NULL,
  `status` varchar(125) NOT NULL,
  `template` varchar(125) NOT NULL,
  `date_added` varchar(12) NOT NULL,
  `author` varchar(75) NOT NULL,
  `contributors` varchar(555) NOT NULL,
  `version` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(555) NOT NULL,
  `manager` varchar(125) NOT NULL,
  `campaign` varchar(125) NOT NULL,
  `due_date` varchar(10) NOT NULL,
  `set_date` varchar(10) NOT NULL,
  `comments` varchar(555) NOT NULL,
  `status` varchar(555) NOT NULL,
  `modified` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(125) NOT NULL,
  `title_in_cms` varchar(125) NOT NULL,
  `description` varchar(555) NOT NULL,
  `width` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `title_in_cms`, `description`, `width`) VALUES
(1, 'Full width 100%', 'N/A - Set-up in WSC', 'This template has to be pre-approved by CE before use', 960);

-- --------------------------------------------------------

--
-- Table structure for table `temp_users`
--

CREATE TABLE IF NOT EXISTS `temp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(75) NOT NULL,
  `company` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `temp_users`
--

INSERT INTO `temp_users` (`id`, `email`, `password`, `first_name`, `last_name`, `company`, `key`) VALUES
(3, 'ewan.valentine@boots.co.uk', '34fc977bfdd8b24fc9255f4e8b13915f', 'Ewan', 'Valentine', 'Boots', '92575128d486bfb7f45d8ffdc67cc25c');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(75) NOT NULL,
  `last_name` varchar(125) NOT NULL,
  `email` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `company` varchar(255) NOT NULL,
  `admin` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `company`, `admin`) VALUES
(1, 'Ewan', 'Valentine', 'ewan.valentine@boots.co.uk', '34fc977bfdd8b24fc9255f4e8b13915f', 'Boots', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
