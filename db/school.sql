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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `album` */

insert  into `album`(`id`,`album_name`,`description`) values (2,'Sujith','Iam not Shaji but Sanjith...'),(3,'Great 3','Desc4'),(4,'Manoj bhai','kadf klw flWLJHgf lWY'),(5,'My New Album','Funnn');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

insert  into `events`(`id`,`events`,`date`) values (1,'10 th Annuversary ','2013-12-25'),(2,'hiii','2013-12-06'),(3,'wUDY AIUgfsiudviuysdf uasygfoasyfoigwr','2013-12-16');

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

insert  into `news`(`id`,`news`) values (1,'qeilurwoeri gqwogyoawigfry\r\n'),(2,'This is a Test news'),(3,'Exam has been Started ');

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
  `type` varchar(20) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`id`,`admissionNo`,`first_name`,`last_name`,`gender`,`dob`,`bloodgroup`,`guardianFname`,`guardianLname`,`occupation`,`permanent_address`,`current_address`,`telephone`,`mobile`,`year_of_join`,`standard`,`division`,`fa1`,`fa2`,`fa3`,`grandTotal`,`grade`) values (1,0,'ad','','Male','','B+','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL),(2,123,'sdfg','','Male','','B+','ad','sdfgv','sdg','','','','','','','',NULL,NULL,NULL,NULL,NULL),(3,123,'sdfg','','Male','','B+','','','','','','','','','','',NULL,NULL,NULL,NULL,NULL),(4,23,'dghdfghfghfghfghfghfghfg','etyrtyrtutu','Male','21/05/1987','B+','suresh','Bbu','bussiness','greenland','pappala','1233','4534','21/0/2010','5','e',NULL,NULL,NULL,NULL,NULL),(6,0,'sf','','Male','121','B+','','','','','','','','','I','',NULL,NULL,NULL,NULL,NULL),(7,0,'sf','','Male','121','B+','','','','','','','','','I','',NULL,NULL,NULL,NULL,NULL),(8,23423,'sdfgd','','Male','21/05/1987','B+','','','','','','','','21/10/13','I','D',NULL,NULL,NULL,NULL,NULL),(9,123,'Yseries','','Female','21/05/1987','B+','Suresh','Babu','Bussiness','GreenLand','Pappala','2425245','34235423','21/05/1997','VIII','5',NULL,NULL,NULL,NULL,NULL),(10,123,'Res','','Male','2342','B+','','','','','','','','','I','',NULL,NULL,NULL,NULL,NULL),(11,23245,'Res','','Female','21/05/1987','B+','Suresh','','Bussiness','sdgasr gaergha ergh','a fga fdgad','45345','345346534','21/05/1997','I','F',NULL,NULL,NULL,NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `teacher` */

insert  into `teacher`(`id`,`teacher_code`,`firstname`,`lastname`,`gender`,`dob`,`eduQualification`,`subject`,`teacher_type`,`year_of_joining`,`subject_taught`,`salary`) values (1,234234,'sdfgd','zdfh','Female','3453','MA','dfv','Regular','w4et5','sdgz',0),(2,234234,'Res','','Female','21/05/1987','MSC','strhrs','Regular','dh','safg',1313),(3,474,'er6uer','rtjs','Male','21/05/1987','','wrtyery','Regular','21/09/2013','wrtawr',343543),(4,1235656,'sajitha','s','Female','21/05/1987','MA','English','Regular','22/10/2013','English',12000);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `uploads` */

insert  into `uploads`(`id`,`name`,`path`,`category`,`album`) values (1,'Screenshot from 2013-07-19 00:21:55.png','/uploads/Screenshot from 2013-07-19 00:21:55.png','gallery',2),(5,'vrinda.jpg','/uploads/vrinda.jpg','gallery',2),(6,'IMG_0463-1.jpg','/uploads/IMG_0463-1.jpg','gallery',4),(8,'deepa.jpg','/uploads/deepa.jpg','gallery',5),(9,'hima.jpg','/uploads/hima.jpg','gallery',5),(11,'DSC_0577.JPG','/uploads/DSC_0577.JPG','gallery',2),(12,'CSC_0399.JPG','/uploads/CSC_0399.JPG','gallery',2);

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
