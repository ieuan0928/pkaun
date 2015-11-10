SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `fo_runner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fo_runner`;

CREATE TABLE IF NOT EXISTS `baseentity` (
  `entityId` int(11) NOT NULL AUTO_INCREMENT,
  `entityName` varchar(255) NOT NULL,
  `displayName` text NOT NULL,
  `description` text,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`entityId`),
  UNIQUE KEY `entityname` (`entityName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `entity_group` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `baseEntityId` int(11) NOT NULL,
  `parentGroupId` int(11) DEFAULT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
