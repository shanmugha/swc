/*
SQLyog Community v10.51 
MySQL - 5.5.28-0ubuntu0.12.04.3 : Database - school
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`school` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `school`;

/*Table structure for table `album` */

DROP TABLE IF EXISTS `album`;

CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(50) NOT NULL,
  `description` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `album` */

insert  into `album`(`id`,`album_name`,`description`) values (1,'College Function','saajithZK SJV'),(2,'Sujith','Iam not Shaji but Sanjith...'),(3,'Great 3','Desc4'),(4,'My name','Rohan');

/*Table structure for table `contact` */

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `phone` decimal(10,0) NOT NULL,
  `fax` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contact` */

insert  into `contact`(`id`,`email`,`phone`,`fax`) values (1,'s.reshman@gmail.com',12345,1234);

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`events`,`date`) values (1,'Adds','2013-10-11');

/*Table structure for table `infrastructure` */

DROP TABLE IF EXISTS `infrastructure`;

CREATE TABLE `infrastructure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_acres` varchar(50) DEFAULT NULL,
  `area_sq_mtrs` varchar(50) DEFAULT NULL,
  `area_build_up` varchar(50) DEFAULT NULL,
  `area_playground` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `infrastructure` */

insert  into `infrastructure`(`id`,`area_acres`,`area_sq_mtrs`,`area_build_up`,`area_playground`) values (1,'2323232323','2452345','245','52525');

/*Table structure for table `management` */

DROP TABLE IF EXISTS `management`;

CREATE TABLE `management` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `management` */

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `news` */

insert  into `news`(`id`,`news`) values (1,'My Latest Newsss\r\nsdfgs\r\n'),(2,'This is a Test news'),(3,'Exam has been Started ');

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notifications` tinytext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notification` */

/*Table structure for table `others` */

DROP TABLE IF EXISTS `others`;

CREATE TABLE `others` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `president_name` varchar(50) NOT NULL,
  `address` text,
  `email` varchar(50) DEFAULT NULL,
  `phno` decimal(12,0) DEFAULT NULL,
  `fax` decimal(12,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `others` */

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admissionNo` int(20) NOT NULL,
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
  `year_of_join` varchar(30) DEFAULT NULL,
  `standard` varchar(11) DEFAULT NULL,
  `division` varchar(10) DEFAULT NULL,
  `fa1` float DEFAULT NULL,
  `fa2` float DEFAULT NULL,
  `fa3` float DEFAULT NULL,
  `grandTotal` float DEFAULT NULL,
  `grade` char(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`id`,`admissionNo`,`first_name`,`last_name`,`gender`,`dob`,`bloodgroup`,`guardianFname`,`guardianLname`,`occupation`,`permanent_address`,`current_address`,`telephone`,`mobile`,`year_of_join`,`standard`,`division`,`fa1`,`fa2`,`fa3`,`grandTotal`,`grade`) values (1,0,'ad','','Male','','B+','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL),(2,123,'sdfg','','Male','','B+','ad','sdfgv','sdg','','','','','','','',NULL,NULL,NULL,NULL,NULL),(3,123,'sdfg','','Male','','B+','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL),(4,23,'dghdfghfghfghfghfghfghfg','etyrtyrtutu','Male','21/05/1987','B+','suresh','Bbu','bussiness','greenland','pappala','1233','4534','21/0/2010','5','e',NULL,NULL,NULL,NULL,NULL),(5,1213,'wilson','gomas','Male','','B+','e','e','s','sd','e','232414','35435','21/10/2010','XI','D',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `teacher` */

DROP TABLE IF EXISTS `teacher`;

CREATE TABLE `teacher` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `teacher` */

/*Table structure for table `uploads` */

DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `path` varchar(70) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `album` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album` (`album`),
  CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`album`) REFERENCES `album` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `uploads` */

insert  into `uploads`(`id`,`name`,`path`,`category`,`album`) values (1,'Screenshot from 2013-07-19 00:21:55.png','/uploads/Screenshot from 2013-07-19 00:21:55.png','gallery',1),(2,'Screenshot from 2013-08-17 21:43:44.png','/uploads/Screenshot from 2013-08-17 21:43:44.png','gallery',1),(3,'Screenshot from 2013-08-17 21:43:44.png','/uploads/Screenshot from 2013-08-17 21:43:44.png','gallery',2),(4,'Screenshot from 2013-08-17 22:49:07.png','/uploads/Screenshot from 2013-08-17 22:49:07.png','gallery',2),(5,'Screenshot from 2013-09-11 08:59:06.png','/uploads/Screenshot from 2013-09-11 08:59:06.png','gallery',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `token` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`email`,`firstname`,`lastname`,`password`,`token`) values (1,'admin','admin','admin','21232f297a57a5a743894a0e4a801fc3',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
