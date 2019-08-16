SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `codeigniterdatatable` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `codeigniterdatatable`;

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idclientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `CedulaIdentidadl` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS `detalleventas`;
CREATE TABLE IF NOT EXISTS `detalleventas` (
  `iddetalleventas` int(11) NOT NULL AUTO_INCREMENT,
  `ventas_idventas` int(11) DEFAULT NULL,
  `productos_idproductos` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` decimal(3,0) DEFAULT NULL,
  `descripcion` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`iddetalleventas`),
  KEY `productos_idproductos` (`productos_idproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `idpagos` int(11) NOT NULL AUTO_INCREMENT,
  `clientes_idclientes` int(11) DEFAULT NULL,
  `monto` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idpagos`),
  KEY `clientes_idclientes` (`clientes_idclientes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idproductos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idproductos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


DROP TABLE IF EXISTS `terminoventas`;
CREATE TABLE IF NOT EXISTS `terminoventas` (
  `idterminoventas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idterminoventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `idventas` int(11) NOT NULL AUTO_INCREMENT,
  `clientes_idclientes` int(11) DEFAULT NULL,
  `terminoventas_idterminoventas` int(11) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idventas`),
  KEY `clientes_idclientes` (`clientes_idclientes`),
  KEY `terminoventas_idterminoventas` (`terminoventas_idterminoventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_clientes` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ventas`
  ADD CONSTRAINT `clientes_idclientes` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`terminoventas_idterminoventas`) REFERENCES `terminoventas` (`idterminoventas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
