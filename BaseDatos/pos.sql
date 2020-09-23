-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para pos
CREATE DATABASE IF NOT EXISTS `pos` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `pos`;

-- Volcando estructura para tabla pos.datos_agua
CREATE TABLE IF NOT EXISTS `datos_agua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroMedidor` int(55) DEFAULT NULL,
  `lecturaActual` int(55) DEFAULT NULL,
  `lecturaAnterior` int(55) DEFAULT NULL,
  `consumoMes` int(55) DEFAULT NULL,
  `tarifaAlcantarilladoSuntuario` int(55) DEFAULT NULL,
  `tarifaAlcantarilladoBasico` int(55) DEFAULT NULL,
  `tarifaAlcantarilladoComplementario` int(55) DEFAULT NULL,
  `tarifaAcueductoSuntuario` int(55) DEFAULT NULL,
  `tarifaAcueductoBasico` int(55) DEFAULT NULL,
  `tarifaAcueductoComplementario` int(55) DEFAULT NULL,
  `cargoFijoLiquidacionAcueducto` int(55) DEFAULT NULL,
  `cargoFijoLiquidacionAlcantarillado` int(55) DEFAULT NULL,
  `snAgua` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `snGas` (`snAgua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.datos_agua: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `datos_agua` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_agua` ENABLE KEYS */;

-- Volcando estructura para tabla pos.datos_energia
CREATE TABLE IF NOT EXISTS `datos_energia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroMedidor` int(55) DEFAULT NULL,
  `lecturaActual` int(55) DEFAULT NULL,
  `lecturaAnterior` int(55) DEFAULT NULL,
  `consumoMes` int(55) DEFAULT NULL,
  `tarifaEnergia` int(55) DEFAULT NULL,
  `snEnergia` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `snEnergia` (`snEnergia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.datos_energia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `datos_energia` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_energia` ENABLE KEYS */;

-- Volcando estructura para tabla pos.datos_gas
CREATE TABLE IF NOT EXISTS `datos_gas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeroMedidor` int(55) DEFAULT NULL,
  `lecturaActual` int(55) DEFAULT NULL,
  `lecturaAnterior` int(55) DEFAULT NULL,
  `consumoMes` int(55) DEFAULT NULL,
  `factorCorreccion` int(55) DEFAULT NULL,
  `rango` int(2) DEFAULT NULL,
  `snGas` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `snGas` (`snGas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.datos_gas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `datos_gas` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_gas` ENABLE KEYS */;

-- Volcando estructura para tabla pos.usuarios
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
	(29, 'administrador', 'admin', '$2y$10$2xdGX0v0nGMA9j/pgsZnsuC64lPAvt0D7DKiuSiuQBKZz/d4fxb3S', 'Administrador', 'images/usuarios/admin/746.png', '1', '2020-09-10 11:27:32', NULL),
	(29, 'administrador', 'admin', '$2y$10$2xdGX0v0nGMA9j/pgsZnsuC64lPAvt0D7DKiuSiuQBKZz/d4fxb3S', 'Administrador', 'images/usuarios/admin/746.png', '1', '2020-09-17 11:06:59', NULL),
	(61, 'juan valencia', 'juan', '$2y$10$jDbWrrPWtasESGaVDvs8X.Ct6XreSIR40JtelKSd4QmjMFoP0aaAS', 'Administrador', 'images/usuarios/juan/213.png', '1', '2020-05-14 16:45:02', NULL),
	(65, 'andres gonzales', 'andres', '$2y$10$yu4EH9H19oJvVusekRhmkO7o/YXClDimJdEFFa2SGrJMrW68OoNXa', 'Invitado', 'images/usuarios/andres/302.png', '0', '2020-05-13 22:48:35', NULL),
	(71, 'monica aristizabal', 'monica', '$2y$10$sm3lslO0b5gpYZgaJSfsGOofljBWkAzDZvSpePLXWEiF05yz3N2BC', 'Invitado', 'images/usuarios/monica/966.png', '0', '2020-05-11 13:50:07', NULL),
	(73, 'german ramirez', 'german', '$2y$10$QH8Uky5T8uVes6S1NJ292epvzug3E1rgQxQl5OXsHe1pBt7ox/vwq', 'Invitado', 'images/usuarios/german/888.png', '1', '2020-05-14 16:45:52', NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla pos.validar_recibos
CREATE TABLE IF NOT EXISTS `validar_recibos` (
  `idGas` int(11) DEFAULT NULL,
  `idAgua` int(11) DEFAULT NULL,
  `idEnergia` int(11) DEFAULT NULL,
  `snGasValidar` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  `snAguaValidar` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  `snEnergiaValidar` char(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n',
  KEY `id_gas` (`idGas`),
  KEY `id_agua` (`idAgua`),
  KEY `id_energia` (`idEnergia`),
  KEY `snGasV` (`snGasValidar`),
  KEY `snAguaV` (`snAguaValidar`),
  KEY `snEnergiaV` (`snEnergiaValidar`),
  CONSTRAINT `id_agua` FOREIGN KEY (`idAgua`) REFERENCES `datos_agua` (`id`),
  CONSTRAINT `id_energia` FOREIGN KEY (`idEnergia`) REFERENCES `datos_energia` (`id`),
  CONSTRAINT `id_gas` FOREIGN KEY (`idGas`) REFERENCES `datos_gas` (`id`),
  CONSTRAINT `snAguaV` FOREIGN KEY (`snAguaValidar`) REFERENCES `datos_agua` (`snAgua`),
  CONSTRAINT `snEnergiaV` FOREIGN KEY (`snEnergiaValidar`) REFERENCES `datos_energia` (`snEnergia`),
  CONSTRAINT `snGasV` FOREIGN KEY (`snGasValidar`) REFERENCES `datos_gas` (`snGas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla pos.validar_recibos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `validar_recibos` DISABLE KEYS */;
/*!40000 ALTER TABLE `validar_recibos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
