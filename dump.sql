-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `dump_soft`;
CREATE TABLE `dump_soft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL,
  `ITEM_0` varchar(255) NOT NULL,
  `ITEM_0_id` varchar(255) NOT NULL,
  `ITEM_1` varchar(255) NOT NULL,
  `ITEM_2` varchar(255) NOT NULL,
  `ITEM_3` varchar(255) NOT NULL,
  `ITEM_4` varchar(255) NOT NULL,
  `ITEM_5` varchar(255) NOT NULL,
  `ITEM_6` varchar(255) NOT NULL,
  `ITEM_6_min` varchar(255) NOT NULL,
  `ITEM_7` text NOT NULL,
  `ITEM_8` varchar(255) NOT NULL,
  `ITEM_9` varchar(255) NOT NULL,
  `ITEM_10` varchar(255) NOT NULL,
  `ITEM_11` varchar(255) NOT NULL,
  `ITEM_12` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-04-15 07:43:34
