-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.13-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;



-- Volcando estructura de base de datos para domotica
CREATE DATABASE IF NOT EXISTS `domotica` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `domotica`;


-- Volcando estructura para tabla domotica.bitacorapuertas
CREATE TABLE IF NOT EXISTS `bitacorapuertas` (
  `numero` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `accion` varchar(50) DEFAULT NULL,
  `horaFecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla domotica.bitacorapuertas: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `bitacorapuertas` DISABLE KEYS */;
INSERT INTO `bitacorapuertas` (`numero`, `nombre`, `accion`, `horaFecha`) VALUES
	(1, 'lolito', 'La puerta fue creada', '2020-09-11 15:31:35'),
	(2, 'oscaresgei', 'La puerta fue creada', '2020-09-11 15:52:29'),
	(3, 'felipeesgei', 'La puerta fue creada', '2020-09-11 15:55:44'),
	(4, 'caicedoesgei', 'La puerta fue creada', '2020-09-11 15:58:56'),
	(1, 'lolito', 'La puerta fue creada', '2020-09-11 15:31:35'),
	(2, 'oscaresgei', 'La puerta fue creada', '2020-09-11 15:52:29'),
	(3, 'felipeesgei', 'La puerta fue creada', '2020-09-11 15:55:44'),
	(4, 'caicedoesgei', 'La puerta fue creada', '2020-09-11 15:58:56'),
	(1, 'lolito', 'la alarma fue encendida', '2020-09-15 12:23:20'),
	(1, 'lolito', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 12:23:20'),
	(1, 'lolito', 'la alarma fue encendida', '2020-09-15 12:40:05'),
	(1, 'lolito', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 12:40:05'),
	(1, 'lolito', 'la alarma fue encendida', '2020-09-15 12:40:22'),
	(1, 'lolito', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 12:40:22'),
	(1, 'lolito', 'la alarma fue encendida', '2020-09-15 12:40:25'),
	(1, 'lolito', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 12:40:25'),
	(2, 'oscaresgei', 'la alarma fue encendida', '2020-09-15 13:26:43'),
	(2, 'oscaresgei', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 13:26:43'),
	(2, 'oscaresgei', 'la alarma fue encendida', '2020-09-15 13:26:46'),
	(2, 'oscaresgei', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 13:26:46'),
	(2, 'oscaresgei', 'la alarma fue encendida', '2020-09-15 13:26:52'),
	(2, 'oscaresgei', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 13:26:52'),
	(2, 'oscaresgei', 'la alarma fue encendida', '2020-09-15 13:27:09'),
	(2, 'oscaresgei', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 13:27:09'),
	(2, 'oscaresgei', 'la alarma fue encendida', '2020-09-15 13:27:36'),
	(2, 'oscaresgei', 'no existe o se elimnò el sensor de bloqueo', '2020-09-15 13:27:36');
/*!40000 ALTER TABLE `bitacorapuertas` ENABLE KEYS */;

-- Volcando estructura para tabla domotica.horapuertas
CREATE TABLE IF NOT EXISTS `horapuertas` (
  `numero` int(11) NOT NULL,
  `UltimaHora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla domotica.horapuertas: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `horapuertas` DISABLE KEYS */;
INSERT INTO `horapuertas` (`numero`, `UltimaHora`) VALUES
	(1, '2020-09-15 12:40:25'),
	(2, '2020-09-15 13:27:36'),
	(3, '2020-09-11 15:55:44'),
	(4, '2020-09-11 15:58:56'),
	(1, '2020-09-15 12:40:25'),
	(2, '2020-09-15 13:27:36'),
	(3, '2020-09-11 15:55:44'),
	(4, '2020-09-11 15:58:56');
/*!40000 ALTER TABLE `horapuertas` ENABLE KEYS */;

-- Volcando estructura para tabla domotica.puertas
CREATE TABLE IF NOT EXISTS `puertas` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` mediumtext NOT NULL DEFAULT '',
  `sensorBloqueo` int(11) NOT NULL,
  `alarma` int(11) NOT NULL,
  `foto` mediumtext DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla domotica.puertas: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `puertas` DISABLE KEYS */;
INSERT INTO `puertas` (`numero`, `nombre`, `sensorBloqueo`, `alarma`, `foto`, `estado`) VALUES
	(1, 'lolito', 3, 1, NULL, 1),
	(2, 'oscaresgei', 3, 1, NULL, 0),
	(3, 'felipeesgei', 3, 1, NULL, 0),
	(4, 'caicedoesgei', 3, 1, NULL, 0);
/*!40000 ALTER TABLE `puertas` ENABLE KEYS */;

-- Volcando estructura para tabla domotica.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `perfil` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ultimo_login` datetime DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla domotica.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
	(29, 'administrador', 'admin', '$2y$10$2xdGX0v0nGMA9j/pgsZnsuC64lPAvt0D7DKiuSiuQBKZz/d4fxb3S', 'Administrador', 'images/usuarios/admin/746.png', '1', '2020-09-09 20:44:56', NULL),
	(61, 'juan valencia', 'juan', '$2y$10$jDbWrrPWtasESGaVDvs8X.Ct6XreSIR40JtelKSd4QmjMFoP0aaAS', 'Administrador', 'images/usuarios/juan/213.png', '1', '2020-05-14 16:45:02', NULL),
	(65, 'andres gonzales', 'andres', '$2y$10$yu4EH9H19oJvVusekRhmkO7o/YXClDimJdEFFa2SGrJMrW68OoNXa', 'Invitado', 'images/usuarios/andres/302.png', '0', '2020-05-13 22:48:35', NULL),
	(71, 'monica aristizabal', 'monica', '$2y$10$sm3lslO0b5gpYZgaJSfsGOofljBWkAzDZvSpePLXWEiF05yz3N2BC', 'Invitado', 'images/usuarios/monica/966.png', '0', '2020-05-11 13:50:07', NULL),
	(73, 'german ramirez', 'german', '$2y$10$QH8Uky5T8uVes6S1NJ292epvzug3E1rgQxQl5OXsHe1pBt7ox/vwq', 'Invitado', 'images/usuarios/german/888.png', '1', '2020-05-14 16:45:52', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para disparador domotica.puertas_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `puertas_after_insert` AFTER INSERT ON `puertas` FOR EACH ROW BEGIN
	insert into horapuertas values 
		(new.numero,CURRENT_TIMESTAMP());
		
	INSERT INTO bitacorapuertas values
	(NEW.numero, NEW.nombre, "La puerta fue creada",CURRENT_TIMESTAMP());
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador domotica.puertas_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `puertas_after_update` AFTER UPDATE ON `puertas` FOR EACH ROW BEGIN
	UPDATE horapuertas SET UltimaHora=CURRENT_TIMESTAMP() WHERE numero=NEW.numero;
	
	
	if (NEW.sensorBloqueo = 1) then
	
		insert into bitacorapuertas values 
		(old.numero, old.nombre, "la puerta fue bloqueada", CURRENT_TIMESTAMP());
	END if;
	
	
	
	
	if (NEW.sensorBloqueo = 2) then
	
		insert into bitacorapuertas values 
		(old.numero, old.nombre, "la puerta fue desbloqueada", CURRENT_TIMESTAMP());
	END if;
	
	
	
	if (NEW.alarma = 1) then
		insert into bitacorapuertas values 
		(old.numero, old.nombre, "la alarma fue encendida", CURRENT_TIMESTAMP());
	END if;
	
	
	
	if (NEW.alarma = 2) then
		insert into bitacorapuertas values 
		(old.numero, old.nombre, "la alarma fue apagada", CURRENT_TIMESTAMP());
	END if;
	
	if (NEW.alarma = 3) then
		insert into bitacorapuertas values 
		(old.numero, old.nombre, "no existe o se eliminò el sendor de alarma.", CURRENT_TIMESTAMP());
	END if;
	
	if (NEW.sensorBloqueo = 3) then
	
		insert into bitacorapuertas values 
		(old.numero, old.nombre, "no existe o se elimnò el sensor de bloqueo", CURRENT_TIMESTAMP());
	END if;
	
	if (NEW.nombre <> OLD.nombre) then
	
		insert into bitacorapuertas values 
		(old.numero, new.nombre, "El nombre de la puerta ha sido modiicado", CURRENT_TIMESTAMP());
		
	END if;

	
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador domotica.puertas_before_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `puertas_before_delete` BEFORE DELETE ON `puertas` FOR EACH ROW BEGIN
	INSERT INTO bitacorapuertas values
	(old.numero, old.nombre, "La puerta fue eliminada",CURRENT_TIMESTAMP());
	
	DELETE FROM horapuertas WHERE  numero=OLD.numero;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
