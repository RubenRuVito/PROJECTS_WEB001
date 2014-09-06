-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2014 a las 16:01:35
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id_link` int(3) NOT NULL AUTO_INCREMENT,
  `id_user2` int(3) NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `links`
--

INSERT INTO `links` (`id_link`, `id_user2`, `url`) VALUES
(2, 1, 'http://www.google.es'),
(3, 1, 'http://www.yahoo.com'),
(5, 2, 'http://www.marca.es'),
(6, 2, 'http://www.google.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(124) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `fec_alta` date NOT NULL COMMENT 'campo que inserta la fecha y hora automaticamente una vez se cree o modifique el registro',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `fec_alta`) VALUES
(1, 'ruben@gmail.com', 'aec3118ab7abde33f41ab28cba11211c8ade0f0d', '2014-09-01'),
(2, 'ruben@hotmail.com', 'aec3118ab7abde33f41ab28cba11211c8ade0f0d', '2014-09-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
