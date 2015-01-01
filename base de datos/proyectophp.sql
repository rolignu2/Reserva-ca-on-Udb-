-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2012 a las 00:01:04
-- Versión del servidor: 5.5.24
-- Versión de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiovisual`
--

CREATE TABLE IF NOT EXISTS `audiovisual` (
  `id_audiovisual` int(11) NOT NULL AUTO_INCREMENT,
  `prestado` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_audiovisual`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `audiovisual`
--

INSERT INTO `audiovisual` (`id_audiovisual`, `prestado`, `estado`, `fecha`, `horainicio`, `horafin`, `id_usuario`, `id_marca`, `id_modelo`, `id_tipo`) VALUES
(1, 1, 1, '2012-09-27', '06:50:00', '09:10:00', 'ad100105', 1, 1, 1),
(2, 1, 1, '2012-09-27', '06:50:00', '09:10:00', 'ad100105', 1, 1, 2),
(3, 0, 1, NULL, NULL, NULL, NULL, 1, 1, 1),
(4, 0, 1, NULL, NULL, NULL, NULL, 2, 2, 2),
(5, 0, 1, NULL, NULL, NULL, NULL, 3, 2, 1),
(6, 0, 1, NULL, NULL, NULL, NULL, 2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`) VALUES
(1, 'sanyo'),
(2, 'sony'),
(3, 'phillips');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `modelo`) VALUES
(1, 'eb100-6548'),
(2, 'ex-6655b'),
(3, 'en-255-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` varchar(255) NOT NULL,
  `rol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
('100', 'root'),
('AD100105', 'usuario'),
('CH370475', 'usuario'),
('MO602777', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad`
--

CREATE TABLE IF NOT EXISTS `seguridad` (
  `id_seguridad` varchar(255) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridad`
--

INSERT INTO `seguridad` (`id_seguridad`, `usuario`, `clave`) VALUES
('S100', 'roli', 'linux'),
('AD100105', 'chino', 'linux'),
('MO602777', 'alsajib', 'linux'),
('CH370475', 'chumpe', 'chumpe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `canion` int(1) DEFAULT NULL,
  `laptop` int(1) DEFAULT NULL,
  `aula` varchar(45) DEFAULT NULL,
  `estado_solicitud` int(1) DEFAULT NULL,
  `id_usuario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `descripcion`, `fecha_solicitud`, `hora_inicio`, `hora_final`, `canion`, `laptop`, `aula`, `estado_solicitud`, `id_usuario`) VALUES
(10, 'caÃ±on ', '2012-09-25', '08:50:00', '09:10:00', 1, 1, 'c-35', 1, 'ad100105'),
(23, 'caÃ±on para clase de php', '2012-09-27', '06:50:00', '09:10:00', 1, 1, 'A25', 1, 'ad100105');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `tipo`) VALUES
(1, 'Canion'),
(2, 'Laptop');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` varchar(255) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `Facultad` varchar(255) NOT NULL,
  `id_seguridad` varchar(255) NOT NULL,
  `id_rol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `Facultad`, `id_seguridad`, `id_rol`) VALUES
('AD100105', 'HERBERTH', 'CHINO', 'ingenieria', 'AD100105', 'AD100105'),
('CH370475', 'arturo', 'chompipollo', 'Estudios Tecnologicos', 'CH370475', 'CH370475'),
('MO602777', 'kevin', 'monterrosa', 'Ingenieria', 'MO602777', 'MO602777'),
('U100', 'rolando', 'arriaza', 'Ingenieria', 'S100', '100');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
