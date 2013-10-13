-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2013 at 04:35 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(50) NOT NULL,
  `description` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `album_name`, `description`) VALUES
(1, 'College Function', 'saajith'),
(2, 'Sujith', 'Iam not Shaji but Sanjith...');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `phone` decimal(10,0) NOT NULL,
  `fax` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `phone`, `fax`) VALUES
(1, 's.reshman@gmail.com', 12345, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `events`
--


-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE IF NOT EXISTS `infrastructure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_acres` varchar(50) DEFAULT NULL,
  `area_sq_mtrs` varchar(50) DEFAULT NULL,
  `area_build_up` varchar(50) DEFAULT NULL,
  `area_playground` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `infrastructure`
--

INSERT INTO `infrastructure` (`id`, `area_acres`, `area_sq_mtrs`, `area_build_up`, `area_playground`) VALUES
(1, '2323232323', '2452345', '245', '52525');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE IF NOT EXISTS `management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `qualification` varchar(30) DEFAULT NULL,
  `pAddress` text,
  `cAddress` text,
  `contact_num` decimal(15,0) DEFAULT NULL,
  `mob_no` decimal(15,0) DEFAULT NULL,
  `category` int(10) DEFAULT NULL,
  `year_of_join` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `management`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news`) VALUES
(1, 'Of course, there is no receipt for any of this. It''s just cash under the table....'),
(2, 'For working parents in town, the rising number of super-smart adolescents''...'),
(4, 'Kannur district collector Rathan Kelkar declared holiday for all the ......');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notifications` tinytext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notification`
--


-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE IF NOT EXISTS `others` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `president_name` varchar(50) NOT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `phno` decimal(12,0) DEFAULT NULL,
  `fax` decimal(12,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `president_name`, `address`, `email`, `phno`, `fax`) VALUES
(2, 'Reset', 'Thank\r\n\r\n\r\n\r\nYou!', 's.reshman@gmail.com', 123456, 12345744);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `bloodgroup` varchar(10) DEFAULT NULL,
  `guardianFname` varchar(50) DEFAULT NULL,
  `guardianLname` varchar(50) DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `permanent_address` text,
  `current_address` text,
  `telephone` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `admissionNo` int(20) NOT NULL,
  `year_of_join` varchar(30) DEFAULT NULL,
  `standard` varchar(11) DEFAULT NULL,
  `division` varchar(10) DEFAULT NULL,
  `maths` float DEFAULT NULL,
  `english` float DEFAULT NULL,
  `socialscience` float DEFAULT NULL,
  `science` float DEFAULT NULL,
  `prev_school` varchar(50) DEFAULT NULL,
  `disability` text,
  `reservation` varchar(6) DEFAULT NULL,
  `achivements` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student`
--


-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_code` int(12) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `eduQualification` varchar(30) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `teacher_type` varchar(10) DEFAULT NULL,
  `year_of_joining` varchar(30) DEFAULT NULL,
  `subject_taught` varchar(30) DEFAULT NULL,
  `salary` decimal(30,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teacher`
--


-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(70) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `album` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album` (`album`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `category`, `album`) VALUES
(1, 'Screenshot from 2013-08-17 21:43:44.png', '/uploads/Screenshot from 2013-08-17 21:43:44.png', 'gallery', 1),
(2, 'IMG_0463-1.jpg', '/uploads/IMG_0463-1.jpg', 'gallery', 1),
(3, 'Screenshot from 2013-08-11 00:43:48.png', '/uploads/Screenshot from 2013-08-11 00:43:48.png', 'gallery', 2),
(4, '20130315_195254.jpg', '/uploads/20130315_195254.jpg', 'gallery', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `firstname`, `lastname`, `password`, `token`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`album`) REFERENCES `album` (`id`);
