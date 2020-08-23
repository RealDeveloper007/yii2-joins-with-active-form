

-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `designations`;
CREATE TABLE `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `designations` (`id`, `designation_name`, `status`) VALUES
(1,	'Clerk',	1),
(2,	'Math Lecturer',	1);

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee` (`id`, `name`, `email`, `phone`, `status`) VALUES
(11,	'tetsg',	'dndn@gmail.com',	8292920,	1);

DROP TABLE IF EXISTS `employee_details`;
CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emplyoee_id` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `salary` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `designation` (`designation`),
  KEY `emplyoee_id` (`emplyoee_id`),
  CONSTRAINT `employee_details_ibfk_6` FOREIGN KEY (`designation`) REFERENCES `designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `employee_details_ibfk_7` FOREIGN KEY (`emplyoee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employee_details` (`id`, `emplyoee_id`, `designation`, `salary`) VALUES
(3,	11,	1,	'35000');

-- 2018-04-06 03:29:24
