/*
SQLyog v10.2 
MySQL - 5.5.20 : Database - xxweb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`xxweb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `xxweb`;

/*Table structure for table `encounter` */

DROP TABLE IF EXISTS `encounter`;

CREATE TABLE `encounter` (
  `ec_id` int(10) NOT NULL AUTO_INCREMENT,
  `ec_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ec_content` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `ec_object` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ec_dowhat` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ec_state` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `ec_type` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ec_posttime` datetime DEFAULT NULL,
  `ec_poster` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `ec_replynumber` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Table structure for table `relation` */

DROP TABLE IF EXISTS `relation`;

CREATE TABLE `relation` (
  `rl_id` int(32) NOT NULL AUTO_INCREMENT,
  `rl_email` varchar(100) NOT NULL,
  `rl_friemail` varchar(100) NOT NULL,
  `rl_friname` varchar(32) NOT NULL,
  `rl_relation` varchar(32) NOT NULL,
  `rl_datetime` datetime NOT NULL,
  PRIMARY KEY (`rl_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `reply` */

DROP TABLE IF EXISTS `reply`;

CREATE TABLE `reply` (
  `rp_id` int(10) NOT NULL AUTO_INCREMENT,
  `rp_ecid` int(10) DEFAULT NULL,
  `rp_replyername` varchar(32) COLLATE utf8_bin NOT NULL,
  `rp_replyer` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `rp_content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rp_posttime` datetime DEFAULT NULL,
  `rp_state` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`rp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Table structure for table `user_actioninfo` */

DROP TABLE IF EXISTS `user_actioninfo`;

CREATE TABLE `user_actioninfo` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `ac_usermail` varchar(120) NOT NULL,
  `ac_allencounter` int(11) NOT NULL DEFAULT '0',
  `ac_allreply` int(11) NOT NULL DEFAULT '0',
  `ac_todayencounter` int(11) NOT NULL DEFAULT '0',
  `ac_todayreply` int(11) NOT NULL DEFAULT '0',
  `ac_date` date NOT NULL,
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Table structure for table `usercenter` */

DROP TABLE IF EXISTS `usercenter`;

CREATE TABLE `usercenter` (
  `uc_id` int(10) NOT NULL AUTO_INCREMENT,
  `uc_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uc_realname` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uc_phonenumber` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uc_address` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uc_birthday` date NOT NULL,
  `uc_worktype` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`uc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Table structure for table `usermsg` */

DROP TABLE IF EXISTS `usermsg`;

CREATE TABLE `usermsg` (
  `um_id` int(32) NOT NULL AUTO_INCREMENT,
  `um_senderemail` varchar(100) NOT NULL,
  `um_receiveremail` varchar(100) NOT NULL,
  `um_receivename` varchar(32) NOT NULL,
  `um_state` varchar(32) NOT NULL,
  `um_content` varchar(255) NOT NULL,
  `um_posttime` datetime NOT NULL,
  PRIMARY KEY (`um_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `us_id` int(10) NOT NULL AUTO_INCREMENT,
  `us_nickname` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `us_password` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `us_sex` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `us_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `us_security` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  `us_regtime` datetime DEFAULT NULL,
  `us_type` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `us_phone` varchar(16) COLLATE utf8_bin NOT NULL,
  `us_emailstate` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
