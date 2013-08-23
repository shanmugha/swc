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
  `album_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `album` */

insert  into `album`(`id`,`album_name`) values (16,'qwf'),(17,'qwf'),(18,'fq'),(19,'fq'),(20,'fq');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `news` */

/*Table structure for table `notification` */

DROP TABLE IF EXISTS `notification`;

CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notifications` tinytext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `notification` */

insert  into `notification`(`id`,`notifications`,`date`) values (1,'There is no notification','0000-00-00'),(2,'asgr awrghaws','0000-00-00'),(3,'Reshman\r\n','2013-07-23'),(4,'Notifiy','2013-07-24'),(5,'jhgvjhgcvkgv khgv igkhv','2013-07-30');

/*Table structure for table `student` */

DROP TABLE IF EXISTS `student`;

CREATE TABLE `student` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `student` */

insert  into `student`(`id`,`first_name`,`last_name`,`gender`,`dob`,`bloodgroup`,`guardianFname`,`guardianLname`,`occupation`,`permanent_address`,`current_address`,`telephone`,`mobile`,`admissionNo`,`year_of_join`,`standard`,`division`,`maths`,`english`,`socialscience`,`science`,`prev_school`,`disability`,`reservation`,`achivements`) values (1,'Where','No','Male','saDg','B+','SDG','SDG','DSG','SDG','DSG','SDG','DSG',0,'DSG','','',2323,0,0,0,'','Sdd','Yes','');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `teacher` */

insert  into `teacher`(`id`,`teacher_code`,`firstname`,`lastname`,`gender`,`dob`,`eduQualification`,`subject`,`teacher_type`,`year_of_joining`,`subject_taught`,`salary`) values (1,12000,'Reshman','No','Male','13123','MA','sqaef','Regular','12/05/87','efe4534',1033323);

/*Table structure for table `uploads` */

DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(70) DEFAULT NULL,
  `studentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studentId` (`studentId`),
  CONSTRAINT `uploads_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `album` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `uploads` */

insert  into `uploads`(`id`,`path`,`studentId`) values (1,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(2,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(3,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(4,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(5,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(6,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(7,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(8,'/uploads/Screenshot from 2013-04-02 21:00:35.png',NULL),(9,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(10,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(11,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(12,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(13,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(14,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(15,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(16,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL),(17,'/uploads/Screenshot from 2013-08-17 22:49:07.png',NULL),(18,'/uploads/Screenshot from 2013-08-17 21:43:44.png',NULL);

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

insert  into `user`(`id`,`email`,`firstname`,`lastname`,`password`,`token`) values (1,'s.reshman@gmail.com','super','admin','2df5a223b02237f221cc75a0ffb05b2b','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
