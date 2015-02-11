-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.5.32 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4792
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных booker
CREATE DATABASE IF NOT EXISTS `booker` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `booker`;


-- Дамп структуры для таблица booker.booked
CREATE TABLE IF NOT EXISTS `booked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookedTime` datetime NOT NULL,
  `roomId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9DA2136FA46403DE` (`roomId`),
  KEY `IDX_9DA2136F64B64DCC` (`userId`),
  CONSTRAINT `FK_9DA2136F64B64DCC` FOREIGN KEY (`userId`) REFERENCES `employees` (`id`),
  CONSTRAINT `FK_9DA2136FA46403DE` FOREIGN KEY (`roomId`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы booker.booked: ~4 rows (приблизительно)
DELETE FROM `booked`;
/*!40000 ALTER TABLE `booked` DISABLE KEYS */;
INSERT INTO `booked` (`id`, `bookedTime`, `roomId`, `userId`) VALUES
	(15, '2015-02-12 13:00:00', 22, 9),
	(16, '2015-02-11 12:00:00', 23, 10),
	(17, '2015-02-12 11:00:00', 23, 10),
	(18, '2015-02-11 12:00:00', 22, 9);
/*!40000 ALTER TABLE `booked` ENABLE KEYS */;


-- Дамп структуры для таблица booker.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы booker.employees: ~3 rows (приблизительно)
DELETE FROM `employees`;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `username`, `password`, `createdDate`) VALUES
	(9, 'user1', 'cZlm/l/+FD5FWRmu4zPneyKi9HjQYhrUxp7+dybI4CSo1uvqGKp98H3l3arD2uo1X2KEOdtiuX9BIDdcoIXhRw==', '2015-02-09 14:07:30'),
	(10, 'user2', '9+BBS5jh6EXIEvDp60hIjdBQrIiUbeEjuQf0y0IyO+pV8xaESnKgH+nTVkOihR+3EfXK/mVIUFDeYu+nEQQrYw==', '2015-02-09 14:07:30'),
	(11, 'user3', 'nH84U3Pzys1ycjg781zlVhbTsgMoOWpsFuj6vtdNhG/nGqW+z/cvTot9cW2vERxMNVFe/Qou8HBjHiSfJes0hg==', '2015-02-09 14:07:30');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;


-- Дамп структуры для таблица booker.rooms
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы booker.rooms: ~3 rows (приблизительно)
DELETE FROM `rooms`;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` (`id`, `name`) VALUES
	(22, 'Room 1'),
	(23, 'Room 2'),
	(24, 'Room 3');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
