# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.2.2-MariaDB-1:11.2.2+maria~ubu2204)
# Database: game_scores
# Generation Time: 2023-12-18 12:00:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table games
# ------------------------------------------------------------

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `link` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;

INSERT INTO `games` (`id`, `name`, `link`)
VALUES
	(1,'Globle','https://globle-game.com/game'),
	(2,'Worldle','https://worldle.teuteuf.fr/'),
	(3,'Wordle','https://www.nytimes.com/games/wordle/index.html'),
	(4,'Flagle','https://www.flagle.io/'),
	(5,'Actorle','https://actorle.com/'),
	(6,'Travle','https://imois.in/games/travle/'),
	(7,'TravleGBR','https://imois.in/games/travle/gbr/'),
	(8,'Lordle','https://lordle.digitaltolkien.com/'),
	(9,'Guess the Dest','https://intelli.travel/game/'),
	(10,'Framed','https://framed.wtf/'),
	(11,'Connections','https://www.nytimes.com/games/connections'),
	(12,'Moviedle','https://moviedle.xyz/moviemoji/');

/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table scores
# ------------------------------------------------------------

DROP TABLE IF EXISTS `scores`;

CREATE TABLE `scores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `player` varchar(256) DEFAULT NULL,
  `game` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;

INSERT INTO `scores` (`id`, `player`, `game`, `date`, `score`)
VALUES
	(1,'Jake',1,'2023-12-15',4),
	(2,'Jake',2,'2023-12-15',7),
	(3,'Jake',3,'2023-12-15',6),
	(4,'Cathy',1,'2023-12-15',5),
	(5,'Cathy',2,'2023-12-15',3),
	(6,'Cathy',3,'2023-12-15',4),
	(7,'Jake',1,'2023-12-16',50),
	(8,'Cathy',2,'2023-12-16',100);

/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
