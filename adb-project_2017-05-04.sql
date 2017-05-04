# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17-0ubuntu0.16.04.2)
# Database: adb-project
# Generation Time: 2017-05-04 07:17:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Admin`;

CREATE TABLE `Admin` (
  `adminID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(16) NOT NULL DEFAULT '',
  `userID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`adminID`),
  KEY `fk_adminID` (`userID`),
  CONSTRAINT `fk_adminID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;

INSERT INTO `Admin` (`adminID`, `name`, `userID`)
VALUES
	(2,'admin',1);

/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Classroom
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Classroom`;

CREATE TABLE `Classroom` (
  `roomID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `room_size` char(11) NOT NULL DEFAULT '',
  `name` char(16) DEFAULT NULL,
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Classroom` WRITE;
/*!40000 ALTER TABLE `Classroom` DISABLE KEYS */;

INSERT INTO `Classroom` (`roomID`, `room_size`, `name`)
VALUES
	(1,'90','I1-311');

/*!40000 ALTER TABLE `Classroom` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table classroom_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `classroom_status`;

CREATE TABLE `classroom_status` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `status` char(11) DEFAULT NULL,
  `periodID` int(11) unsigned NOT NULL,
  `roomID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_status_period` (`periodID`),
  KEY `fk_status_room` (`roomID`),
  CONSTRAINT `fk_status_period` FOREIGN KEY (`periodID`) REFERENCES `RentPeriod` (`periodID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_status_room` FOREIGN KEY (`roomID`) REFERENCES `Classroom` (`roomID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table dateOff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dateOff`;

CREATE TABLE `dateOff` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `adminID` int(11) unsigned NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dateoff_admin` (`adminID`),
  CONSTRAINT `fk_dateoff_admin` FOREIGN KEY (`adminID`) REFERENCES `Admin` (`adminID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Member
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Member`;

CREATE TABLE `Member` (
  `memID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(16) NOT NULL DEFAULT '',
  `position` char(16) NOT NULL DEFAULT '',
  `userID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`memID`),
  KEY `fk_mem_userID` (`userID`),
  CONSTRAINT `fk_mem_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Member` WRITE;
/*!40000 ALTER TABLE `Member` DISABLE KEYS */;

INSERT INTO `Member` (`memID`, `name`, `position`, `userID`)
VALUES
	(1,'member','student',2);

/*!40000 ALTER TABLE `Member` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(3,'2014_10_12_000000_create_users_table',1),
	(4,'2014_10_12_100000_create_password_resets_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table RentPeriod
# ------------------------------------------------------------

DROP TABLE IF EXISTS `RentPeriod`;

CREATE TABLE `RentPeriod` (
  `periodID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `startTime` char(16) NOT NULL DEFAULT '',
  `endTime` char(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`periodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `RentPeriod` WRITE;
/*!40000 ALTER TABLE `RentPeriod` DISABLE KEYS */;

INSERT INTO `RentPeriod` (`periodID`, `startTime`, `endTime`)
VALUES
	(1,'8:00','9:00');

/*!40000 ALTER TABLE `RentPeriod` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table RentRecord
# ------------------------------------------------------------

DROP TABLE IF EXISTS `RentRecord`;

CREATE TABLE `RentRecord` (
  `recordID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `periodID` int(11) unsigned NOT NULL,
  `roomID` int(11) unsigned NOT NULL,
  `Date` datetime NOT NULL,
  `memID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`recordID`),
  KEY `fk_rent_period` (`periodID`),
  KEY `fk_rent_classroom` (`roomID`),
  KEY `fk_rent_member` (`memID`),
  CONSTRAINT `fk_rent_classroom` FOREIGN KEY (`roomID`) REFERENCES `Classroom` (`roomID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rent_member` FOREIGN KEY (`memID`) REFERENCES `Member` (`memID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_rent_period` FOREIGN KEY (`periodID`) REFERENCES `RentPeriod` (`periodID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `RentRecord` WRITE;
/*!40000 ALTER TABLE `RentRecord` DISABLE KEYS */;

INSERT INTO `RentRecord` (`recordID`, `periodID`, `roomID`, `Date`, `memID`)
VALUES
	(6,1,1,'2017-05-04 05:47:16',1),
	(7,1,1,'2017-05-04 05:47:16',1),
	(8,1,1,'2017-05-04 05:47:16',1),
	(9,1,1,'2017-05-04 05:47:17',1),
	(10,1,1,'2017-05-04 05:47:17',1),
	(11,1,1,'2017-05-04 05:47:17',1),
	(12,1,1,'2017-05-04 05:47:17',1),
	(13,1,1,'2017-05-04 05:47:17',1),
	(14,1,1,'2017-05-04 05:47:17',1),
	(15,1,1,'2017-05-04 05:47:17',1),
	(16,1,1,'2017-05-04 05:47:17',1),
	(17,1,1,'2017-05-04 05:47:18',1),
	(18,1,1,'2017-05-04 05:47:18',1),
	(19,1,1,'2017-05-04 05:47:18',1),
	(20,1,1,'2017-05-04 05:47:18',1),
	(21,1,1,'2017-05-04 05:47:18',1),
	(22,1,1,'2017-05-04 05:47:18',1),
	(23,1,1,'2017-05-04 05:47:18',1),
	(24,1,1,'2017-05-04 05:47:18',1),
	(25,1,1,'2017-05-04 05:47:19',1),
	(26,1,1,'2017-05-04 05:47:19',1),
	(27,1,1,'2017-05-04 05:47:19',1),
	(28,1,1,'2017-05-04 05:47:19',1),
	(29,1,1,'2017-05-04 05:47:19',1),
	(30,1,1,'2017-05-04 05:47:19',1),
	(31,1,1,'2017-05-04 05:47:19',1),
	(32,1,1,'2017-05-04 05:47:19',1),
	(33,1,1,'2017-05-04 05:47:20',1),
	(34,1,1,'2017-05-04 05:47:20',1),
	(35,1,1,'2017-05-04 05:47:20',1),
	(36,1,1,'2017-05-04 05:47:20',1),
	(37,1,1,'2017-05-04 05:47:20',1),
	(38,1,1,'2017-05-04 05:47:20',1),
	(39,1,1,'2017-05-04 05:47:20',1),
	(40,1,1,'2017-05-04 05:47:21',1),
	(41,1,1,'2017-05-04 05:47:21',1),
	(42,1,1,'2017-05-04 05:47:21',1),
	(43,1,1,'2017-05-04 05:47:21',1),
	(44,1,1,'2017-05-04 05:47:21',1),
	(45,1,1,'2017-05-04 05:47:22',1),
	(46,1,1,'2017-05-04 05:47:22',1),
	(47,1,1,'2017-05-04 05:47:22',1),
	(48,1,1,'2017-05-04 05:47:27',1),
	(49,1,1,'2017-05-04 05:47:27',1),
	(50,1,1,'2017-05-04 05:47:27',1),
	(51,1,1,'2017-05-04 05:47:27',1),
	(52,1,1,'2017-05-04 05:47:27',1),
	(53,1,1,'2017-05-04 05:47:28',1),
	(54,1,1,'2017-05-04 05:47:28',1),
	(55,1,1,'2017-05-04 05:47:28',1),
	(56,1,1,'2017-05-04 05:47:28',1),
	(57,1,1,'2017-05-04 05:47:28',1),
	(58,1,1,'2017-05-04 05:47:28',1),
	(59,1,1,'2017-05-04 05:47:28',1),
	(60,1,1,'2017-05-04 05:47:28',1),
	(61,1,1,'2017-05-04 05:47:29',1),
	(62,1,1,'2017-05-04 05:47:29',1),
	(63,1,1,'2017-05-04 05:47:29',1),
	(64,1,1,'2017-05-04 05:47:29',1),
	(65,1,1,'2017-05-04 05:47:29',1),
	(66,1,1,'2017-05-04 05:47:29',1),
	(67,1,1,'2017-05-04 05:47:29',1),
	(68,1,1,'2017-05-04 05:47:29',1),
	(69,1,1,'2017-05-04 05:47:37',1),
	(70,1,1,'2017-05-27 00:00:00',1),
	(71,1,1,'2017-05-25 00:00:00',1),
	(72,1,1,'2017-06-01 00:00:00',1);

/*!40000 ALTER TABLE `RentRecord` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roomOfftime
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roomOfftime`;

CREATE TABLE `roomOfftime` (
  `ID` int(11) NOT NULL,
  `roomID` int(11) unsigned NOT NULL,
  `adminID` int(11) unsigned NOT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_room_manager` (`adminID`),
  KEY `fk_classroom` (`roomID`),
  CONSTRAINT `fk_classroom` FOREIGN KEY (`roomID`) REFERENCES `Classroom` (`roomID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_room_manager` FOREIGN KEY (`adminID`) REFERENCES `Admin` (`adminID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table sys_param
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_param`;

CREATE TABLE `sys_param` (
  `systemID` int(11) NOT NULL,
  `adminID` int(11) DEFAULT NULL,
  `name` char(16) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `update_by` int(11) unsigned NOT NULL,
  PRIMARY KEY (`systemID`),
  KEY `fk_admin_update` (`update_by`),
  CONSTRAINT `fk_admin_update` FOREIGN KEY (`update_by`) REFERENCES `Admin` (`adminID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_unique` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `account`, `password`, `userType`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'admin','admin','$2y$10$uGLNWLQNXk//u4rpZgfFX.Vcmf2uCUk76CHnY0UNfxEfUBFjfGavS','Admin','XTf29c920uQxNFIBF2YmTxhcbJct5IkprgYI8mEhlBOLdTAyMjuaDWkKko68',NULL,NULL),
	(2,'member','member','$2y$10$VE/AcUxsJ/92mfT.X6Ll/e51t3XBpq0/hdIIzUzb0fceykSCFok7W','Member','svKjpibXwdLBMTPGnJjqbkp3JTmPoWWjqFdgcO5MhQCLbod6RNG6fUqhEqeQ',NULL,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
