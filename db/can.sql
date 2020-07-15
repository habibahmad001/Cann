-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2015 at 10:26 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `can`
--
CREATE DATABASE IF NOT EXISTS `can` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `can`;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `sumary` varchar(256) DEFAULT NULL,
  `description` text,
  `status` enum('draft','proofread','approval_pending','active','blocked') DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `sumary`, `description`, `status`) VALUES
(1, 'Test Course', 'Test Course', 'Test Course', 'active'),
(3, 'Test 2 Course', 'Test 2 Course', 'Test 2 Course', 'approval_pending'),
(4, 'Test 3 Course', 'Test 3 Course', 'Test 3 Course', 'approval_pending'),
(7, 'Test 4 Course', 'Test 4 Course Sumary', 'Test 4 Course Description', 'proofread');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE IF NOT EXISTS `course_categories` (
  `ccid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `parent_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`ccid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`ccid`, `title`, `description`, `parent_id`) VALUES
(1, 'Test', 'Test Description', 0),
(2, 'Test 1', 'sdfs sdfs sdfs', 5),
(3, 'Test 3', 'Test 3', 2),
(4, 'Test 4', 'Test 4', 3),
(5, 'Test 5', 'kkkk', 6),
(6, 'Test 6', 'Test 6', 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_owner`
--

CREATE TABLE IF NOT EXISTS `course_owner` (
  `co_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  PRIMARY KEY (`co_id`),
  UNIQUE KEY `forignkey` (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course_owner`
--

INSERT INTO `course_owner` (`co_id`, `course_id`, `user_id`, `status`, `dat`) VALUES
(1, 1, 1, 'active', '0000-00-00'),
(2, 2, 1, 'active', '2015-06-18'),
(3, 3, 1, 'active', '2015-06-18'),
(4, 4, 1, 'active', '2015-06-18'),
(5, 5, 2, 'active', '2015-06-22'),
(6, 6, 2, 'active', '2015-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `course_section`
--

CREATE TABLE IF NOT EXISTS `course_section` (
  `cscec_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `order` varchar(256) DEFAULT NULL,
  `course_id` int(11) unsigned DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`cscec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `course_section`
--

INSERT INTO `course_section` (`cscec_id`, `title`, `order`, `course_id`, `description`) VALUES
(1, 'Test Section', '8', 1, 'Test Section Description'),
(8, 'Test 1 Section', '2', 1, 'Test 1 Section Description'),
(9, 'Test 2 Section', '3', 1, 'Test 2 Section Description '),
(10, 'Test 3 Section', '2', 1, 'Test 3 Section Description ');

-- --------------------------------------------------------

--
-- Table structure for table `course_section_content`
--

CREATE TABLE IF NOT EXISTS `course_section_content` (
  `csc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `order` varchar(256) DEFAULT NULL,
  `type` enum('paragraph','heading','ol','ul','video','link','images') DEFAULT NULL,
  `cscec_id` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`csc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `course_section_content`
--

INSERT INTO `course_section_content` (`csc_id`, `title`, `description`, `order`, `type`, `cscec_id`) VALUES
(1, 'Test Content', 'Test Content', '3', 'ol', 1),
(2, 'Test 1', 'Test 1', '6', 'link', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_subscriber`
--

CREATE TABLE IF NOT EXISTS `course_subscriber` (
  `cs_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE IF NOT EXISTS `course_user` (
  `cu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  PRIMARY KEY (`cu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `site` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `course_admin` int(11) unsigned DEFAULT NULL,
  `course_owner` int(11) unsigned DEFAULT NULL,
  `subscriber` varchar(256) DEFAULT NULL,
  `course_user` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`site`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `user_name` varchar(256) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `status` enum('active','pending','blocked','disabled') DEFAULT NULL,
  `join_id` int(11) unsigned DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `user_name`, `email`, `password`, `status`, `join_id`, `last_login`) VALUES
(1, 'aaa', 'Mark', 'sssss1@ss.com', '123', 'active', 1, '2015-06-16 12:08:55'),
(2, 'Test', 'Mark1', 'sssss@ss.com', '1234', '', 1, '2015-06-22 11:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'A',
  `flag` tinyint(1) NOT NULL,
  `address` longtext NOT NULL,
  `project` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `name`, `email`, `phone`, `user_password`, `status`, `flag`, `address`, `project`) VALUES
(1, 'admin', 'Superadmin', 'info@myci', '123 4567 89', 'wpsQfOt3xEulJNi3JvTCYMx6fOtpMUpmWLh6H49g63V4lO1iJ+qPRziRQGPXg7/fNTJV8Xx/7eXQC2RjwP4+lg==', 'A', 0, 'Cultivate Artist Network', 'Cultivate Artist Network');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `ur_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `role` enum('site_admin','course_admin','course_owner','course_user') DEFAULT NULL,
  `course_id` int(4) NOT NULL DEFAULT '0',
  `status` enum('active','inactive','pending','blocked') DEFAULT NULL,
  `dat` date NOT NULL,
  PRIMARY KEY (`ur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`ur_id`, `user_id`, `role`, `course_id`, `status`, `dat`) VALUES
(1, 2, 'course_owner', 6, 'active', '2015-06-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
