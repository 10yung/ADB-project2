

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
  PRIMARY KEY (`adminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table Classroom
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Classroom`;

CREATE TABLE `Classroom` (
  `roomID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` char(11) NOT NULL DEFAULT '',
  `room_size` char(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`roomID`)
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
  PRIMARY KEY (`memID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table RentPeriod
# ------------------------------------------------------------

DROP TABLE IF EXISTS `RentPeriod`;

CREATE TABLE `RentPeriod` (
  `periodID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  PRIMARY KEY (`periodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
