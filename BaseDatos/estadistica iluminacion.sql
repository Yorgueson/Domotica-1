-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.25 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para domotica
CREATE DATABASE IF NOT EXISTS `domotica` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `domotica`;

-- Volcando estructura para tabla domotica.estadisticas
CREATE TABLE IF NOT EXISTS `estadisticas` (
  `IdBombillo` int(11) NOT NULL,
  `Estado` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdBombillo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla domotica.estadisticas: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
INSERT INTO `estadisticas` (`IdBombillo`, `Estado`, `fecha`) VALUES
	(1, 1, '2020-10-27 16:46:49'),
	(2, 1, '2020-10-27 16:47:07'),
	(3, 0, '2020-12-27 17:06:23'),
	(4, 0, '2020-10-27 17:06:45'),
	(5, 1, '2020-10-27 17:06:58'),
	(6, 0, '2020-10-27 17:07:18'),
	(7, 1, '2020-10-27 17:07:56'),
	(8, 0, '2020-10-27 17:08:13'),
	(9, 1, '2020-10-27 17:08:23'),
	(10, 0, '2020-10-27 17:08:36');
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
