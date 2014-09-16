-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2014 a las 17:28:01
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_ruvio01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(2) NOT NULL AUTO_INCREMENT,
  `posicion` int(2) NOT NULL,
  `nom_equipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `puntos` int(2) NOT NULL,
  `jugados` int(2) NOT NULL,
  `ganados` int(2) NOT NULL,
  `empatados` int(2) NOT NULL,
  `perdidos` int(2) NOT NULL,
  `gol_favor` int(3) NOT NULL,
  `gol_contra` int(3) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla equipos liga boadilla futbol7' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `posicion`, `nom_equipo`, `puntos`, `jugados`, `ganados`, `empatados`, `perdidos`, `gol_favor`, `gol_contra`) VALUES
(1, 0, 'Real Galobo C.F', 0, 0, 0, 0, 0, 0, 0),
(2, 0, 'Mi Nabo De Kiev C.F', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id_jornada` int(2) NOT NULL AUTO_INCREMENT COMMENT 'el id primary coincide con el numero de la jornada.',
  `jornada` int(2) NOT NULL,
  `id_equipoA` int(2) NOT NULL,
  `id_equipoB` int(2) NOT NULL,
  `gol_A` int(2) NOT NULL,
  `gol_B` int(2) NOT NULL,
  `quiniela` int(1) NOT NULL,
  PRIMARY KEY (`id_jornada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla resultados,jornada y quiniela.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `fec_alta` date NOT NULL,
  `fec_baja` date DEFAULT NULL,
  `nivel_acceso` int(2) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla usuarios principal' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `nombre`, `apellidos`, `nick`, `email`, `password`, `fec_alta`, `fec_baja`, `nivel_acceso`) VALUES
(1, 'Rubén', 'García Álvarez', 'Ruvito_O', 'raibandj@hotmail.com', '77f71f3aedf57876448a141b5eda12ebb481d527', '2014-09-04', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_temp`
--

CREATE TABLE IF NOT EXISTS `users_temp` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_activacion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla usuarios principal' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
