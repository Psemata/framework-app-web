-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `todolist`;
CREATE DATABASE `todolist` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `todolist`;

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `admin` int(1) unsigned NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `login` (`id`, `name`, `firstname`, `pseudo`, `admin`, `email`, `password`) VALUES
(12,	'Costa',	'Bruno',	'Psemata',	0,	'bruno.costa@test.ch',	'$2y$10$vKAnC0kUb4cAJleR5vXx/.F1vMm.tlYXqoKiEoU5leWwCMZXdCYw.'),
(13,	'Dupont',	'Jean',	'XXXXXXJEAN',	0,	'test@test.ch',	'$2y$10$WNynk5thQnj3oda5TyrqIORSENVXSqb4S1mvbmAXUkoTnIVf62GS2');

DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  `completed` int(1) NOT NULL,
  `deadline` datetime NOT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  CONSTRAINT `task_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

INSERT INTO `task` (`id`, `description`, `completed`, `deadline`, `creator`) VALUES
(5,	'Finishing the website',	0,	'2021-01-28 18:08:40',	12),
(9,	'Faire en sorte que l\'on modifie une tache',	0,	'2021-01-30 00:00:00',	13),
(12,	'Finition des logs',	1,	'2021-01-29 00:00:00',	13),
(13,	'MÃ©chant test',	0,	'2021-01-30 00:00:00',	13),
(14,	'Croissant d\'Ã©tÃ©',	0,	'2021-01-29 00:00:00',	13),
(15,	'SÃ©lection d\'armÃ©e',	0,	'2021-01-31 00:00:00',	13),
(17,	'TÃ¢che finale',	1,	'2021-01-31 00:00:00',	13);

-- 2021-01-29 13:27:34
