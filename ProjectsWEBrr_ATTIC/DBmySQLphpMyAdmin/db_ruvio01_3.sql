-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2014 a las 04:24:55
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
  `nom_equipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `puntos` int(2) NOT NULL,
  `jugados` int(2) NOT NULL,
  `ganados` int(2) NOT NULL,
  `empatados` int(2) NOT NULL,
  `perdidos` int(2) NOT NULL,
  `gol_favor` int(3) NOT NULL,
  `gol_contra` int(3) NOT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla equipos liga boadilla futbol7' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nom_equipo`, `puntos`, `jugados`, `ganados`, `empatados`, `perdidos`, `gol_favor`, `gol_contra`) VALUES
(1, 'Real Galobo C.F', 10, 0, 0, 0, 0, 0, 0),
(2, 'Mi Nabo De Kiev C.F', 8, 0, 0, 0, 0, 0, 0),
(3, 'Servillegas F.C.', 0, 0, 0, 0, 0, 0, 0),
(4, 'Los de Siempre C.F.', 0, 0, 0, 0, 0, 0, 0),
(5, 'All Blacks F.C.', 0, 0, 0, 0, 0, 0, 0),
(6, 'Celtic de Maca C.F.', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesga`
--

CREATE TABLE IF NOT EXISTS `mensajesga` (
  `id_mensaje` int(5) NOT NULL AUTO_INCREMENT,
  `idfk_noticia` int(4) NOT NULL,
  `idfk_user` int(3) NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `idfk_noticia` (`idfk_noticia`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla mensajes para noticias en realGalobo' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `mensajesga`
--

INSERT INTO `mensajesga` (`id_mensaje`, `idfk_noticia`, `idfk_user`, `mensaje`, `fec_publicado`) VALUES
(1, 3, 1, 'probando los mensajes en noticia 3, con idnoticia 3 y iduser 1 ', '2014-09-11 17:01:11'),
(2, 2, 1, 'PROBANDO LOS COMENTARIOS PARA DIFERENTES POST,este es para la primera notica posteada idnoti2 idusu1', '2014-09-11 18:31:57'),
(3, 3, 1, 'Mas pruebas de comentario en la noticia mas reciente generada..idnoti3 iduser1..', '2014-09-11 18:37:53'),
(4, 3, 1, 'ultiMas pruebas de comentario en la noticia mas reciente generada..idnoti3 iduser1..', '2014-09-11 18:39:27'),
(5, 2, 1, 'otra pru de COMENTARIOS PARA DIFERENTES POST,este es para la primera notica posteada idnoti2 idusu1', '2014-09-11 18:47:45'),
(6, 2, 1, 'mas pruebas....', '2014-09-11 18:52:42'),
(7, 2, 1, 'joderr mas pruebass...', '2014-09-11 18:53:56'),
(8, 2, 1, 'otro comenterio mas...', '2014-09-11 19:49:26'),
(9, 3, 1, 'otro comentario more...', '2014-09-11 19:53:31'),
(10, 7, 1, 'vamosss!!!!', '2014-09-16 18:07:55'),
(11, 7, 1, 'vamoossss!!2222', '2014-09-16 18:08:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticiasga`
--

CREATE TABLE IF NOT EXISTS `noticiasga` (
  `id_noticia` int(4) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(3) NOT NULL,
  `titulo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `img_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ext_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de noticias de la seccion realGalobo ' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `noticiasga`
--

INSERT INTO `noticiasga` (`id_noticia`, `idfk_user`, `titulo`, `contenido`, `img_link`, `ext_link`, `fec_publicado`) VALUES
(2, 1, 'Prueba NOticia 2 en zona galobica', 'intentando incrustrar una imagen local de la estructura de carpetas del proyecto, ahora tengo que fijarme en un nombre de imagen que este en la carpeta "img" del proyecto y a ver si la piya la proia pagina gaalobica.', 'img/world01.jpg', '', '2014-09-11 04:19:30'),
(3, 1, 'Prueba Noticia 3 ', 'Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 ......', 'img/rombos01.jpg', '', '2014-09-11 04:40:11'),
(4, 1, 'Marca digital', 'Hoy en el periódico marca un reportaje sobre Cristiano Ronaldo ', 'img/ball_small.jpg', 'www.marca.es', '2014-09-11 19:56:26'),
(5, 1, 'Reportaje Diario Marca ', 'Hoy en el periódico marca un reportaje sobre Cristiano Ronaldo', 'img/ball_small.jpg', 'http://www.marca.com', '2014-09-11 20:12:16'),
(6, 1, 'Hugo pichici', 'Después de la jornada 3, nuestro delantero se pone como máximo goleador de la liga.\nToda la info en el siguiente link', 'img/modeselektor-monkeytown-.jpg', 'http://www.deportesboadilladelmonte.es/pichichi', '2014-09-11 20:22:35'),
(7, 1, '3tiempo en la Rincón', 'Después del partido de hoy como casi siempre tomaremos algo en el Rincón Castellano..animense!\nDirección en el siguiente link:', 'img/events01.jpg', 'http://googlemaps.com/rinconcastellano', '2014-09-11 20:41:27'),
(8, 1, 'Noticia Loca', 'blablavblablablaaa!!', '', 'http://', '2014-09-17 00:57:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE IF NOT EXISTS `resultados` (
  `id_resultado` int(3) NOT NULL AUTO_INCREMENT COMMENT 'el id de cada resultado,por cada jornada se generaran tantos id como partidos haya.',
  `idfk_equipoA` int(2) NOT NULL,
  `idfk_equipoB` int(2) NOT NULL,
  `gol_A` int(2) DEFAULT NULL,
  `gol_B` int(2) DEFAULT NULL,
  `jornada` int(2) DEFAULT NULL,
  `fec_hora` datetime DEFAULT NULL,
  `quiniela` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_resultado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla resultados,jornada y quiniela.' AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `idfk_equipoA`, `idfk_equipoB`, `gol_A`, `gol_B`, `jornada`, `fec_hora`, `quiniela`) VALUES
(1, 1, 2, 5, 0, 1, NULL, 1),
(2, 3, 4, 1, 1, 1, NULL, 0),
(3, 5, 6, 2, 2, 1, NULL, 0),
(4, 4, 1, 2, 3, 2, NULL, 2),
(5, 2, 5, NULL, NULL, 2, NULL, NULL),
(6, 6, 3, 3, 1, 2, NULL, 1),
(7, 1, 6, 4, 1, 3, NULL, 1),
(8, 3, 2, 4, 3, 3, NULL, 1),
(9, 5, 4, 2, 5, 3, NULL, 2),
(10, 4, 5, NULL, NULL, 4, '2014-09-15 17:00:00', NULL),
(11, 2, 3, NULL, NULL, 4, NULL, NULL),
(12, 6, 1, NULL, NULL, 4, NULL, NULL),
(13, 1, 4, NULL, NULL, 5, '2014-09-20 17:59:00', NULL),
(14, 2, 6, NULL, NULL, 5, '2014-09-20 18:00:00', NULL),
(15, 5, 3, NULL, NULL, 5, '2014-09-21 17:00:00', NULL),
(16, 1, 3, 4, 2, 6, '2014-09-27 17:00:00', 1),
(17, 5, 2, NULL, NULL, 6, '2014-09-28 18:00:00', NULL),
(18, 6, 4, NULL, NULL, 6, '2014-09-28 19:00:00', NULL);

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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticiasga`
--
ALTER TABLE `noticiasga`
  ADD CONSTRAINT `noticiasga_ibfk_1` FOREIGN KEY (`idfk_user`) REFERENCES `users` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
