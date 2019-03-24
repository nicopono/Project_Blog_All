-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `blog_json` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `blog_json`;

DROP TABLE IF EXISTS `article_table`;
CREATE TABLE `article_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titledB` text NOT NULL,
  `contentdB` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `article_table` (`id`, `titledB`, `contentdB`) VALUES
(38,	'trztu',	'aaww'),
(107,	'5555',	'qqqq'),
(120,	'5555',	'qqqq'),
(121,	'5555',	'qqqq'),
(122,	'hg',	'jhj');

DROP TABLE IF EXISTS `user_tb_db`;
CREATE TABLE `user_tb_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_tb_db` (`id`, `lastname`, `firstname`, `email`) VALUES
(44,	'smith23',	'hannibal',	'h@smith.com'),
(57,	'lecter',	'hannibal',	'hhhh@smith.com'),
(60,	'343',	'243',	'34'),
(62,	'343',	'243',	'34'),
(63,	'343',	'243',	'34'),
(65,	'smith',	'hannibal',	'h@smith.com');

-- 2019-03-24 15:48:56
