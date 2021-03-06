-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-10-2014 a las 04:40:31
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_ruvio01_pruebas`
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
(1, 'Real Galobo C.F', 4, 2, 1, 1, 0, 8, 8),
(2, 'Mi Nabo De Kiev C.F', 5, 5, 0, 5, 0, 10, 10),
(3, 'Servillegas F.C.', 2, 2, 0, 2, 0, 7, 7),
(4, 'Los de Siempre C.F.', 1, 2, 0, 1, 1, 4, 4),
(5, 'All Blacks F.C.', 4, 4, 0, 4, 0, 8, 8),
(6, 'Celtic de Maca C.F.', 3, 3, 0, 3, 0, 9, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadoresga`
--

CREATE TABLE IF NOT EXISTS `jugadoresga` (
  `id_jugador` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom_camiseta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `posicion` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cod_magico` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_jugador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de perfiles de jugadores' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `jugadoresga`
--

INSERT INTO `jugadoresga` (`id_jugador`, `nombre`, `apellidos`, `nom_camiseta`, `posicion`, `Comentario`, `cod_magico`) VALUES
(1, 'Hugo', 'Cañibano', 'Verduras', 'DEL', 'Jugador muy gorila, peleón, con potencia máxima de disparo.', ''),
(2, 'Alberto', 'Foruny', 'La Rata', 'DEF', 'Muy versátil, se adapta cual búho a una noche de caza, gran rematador y si sube...SUBE!', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores_goles`
--

CREATE TABLE IF NOT EXISTS `jugadores_goles` (
  `idfk_jugador` int(2) NOT NULL,
  `idfk_resultado` int(2) NOT NULL,
  `goles` int(11) NOT NULL,
  PRIMARY KEY (`idfk_jugador`,`idfk_resultado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de goles de jugador en partido, ';

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla mensajes para noticias en realGalobo' AUTO_INCREMENT=10 ;

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
(9, 3, 1, 'otro comentario more...', '2014-09-11 19:53:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de noticias de la seccion realGalobo ' AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `noticiasga`
--

INSERT INTO `noticiasga` (`id_noticia`, `idfk_user`, `titulo`, `contenido`, `img_link`, `ext_link`, `fec_publicado`) VALUES
(2, 1, 'Prueba NOticia 2 en zona galobica', 'intentando incrustrar una imagen local de la estructura de carpetas del proyecto, ahora tengo que fijarme en un nombre de imagen que este en la carpeta "img" del proyecto y a ver si la piya la proia pagina gaalobica.', 'img/world01.jpg', '', '2014-09-11 04:19:30'),
(3, 1, 'Prueba Noticia 3 ', 'Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 Prueba Noticia 3 ......', 'img/rombos01.jpg', '', '2014-09-11 04:40:11'),
(4, 1, 'Marca digital', 'Hoy en el periódico marca un reportaje sobre Cristiano Ronaldo ', 'img/ball_small.jpg', 'www.marca.es', '2014-09-11 19:56:26'),
(5, 1, 'Reportaje Diario Marca ', 'Hoy en el periódico marca un reportaje sobre Cristiano Ronaldo', 'img/ball_small.jpg', 'http://www.marca.com', '2014-09-11 20:12:16'),
(6, 1, 'Hugo pichici', 'Después de la jornada 3, nuestro delantero se pone como máximo goleador de la liga.\nToda la info en el siguiente link', 'img/modeselektor-monkeytown-.jpg', 'http://www.deportesboadilladelmonte.es/pichichi', '2014-09-11 20:22:35'),
(7, 1, '3tiempo en la Rincón', 'Después del partido de hoy como casi siempre tomaremos algo en el Rincón Castellano..animense!\nDirección en el siguiente link:', 'img/events01.jpg', 'http://googlemaps.com/rinconcastellano', '2014-09-11 20:41:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_quiniela`
--

CREATE TABLE IF NOT EXISTS `puntos_quiniela` (
  `id_puntosQuini` int(2) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(2) NOT NULL,
  `jornada` int(2) NOT NULL,
  `puntosQuini` int(3) NOT NULL,
  PRIMARY KEY (`id_puntosQuini`),
  UNIQUE KEY `id_puntosQuini` (`id_puntosQuini`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Puntos de usuario por hacer la quiniela' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quinielaga`
--

CREATE TABLE IF NOT EXISTS `quinielaga` (
  `id_quinielaGa` int(4) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(2) NOT NULL,
  `idfk_resultado` int(3) NOT NULL,
  `jornada` int(2) NOT NULL,
  `quiniela_user` int(1) NOT NULL,
  PRIMARY KEY (`id_quinielaGa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de quinielas hechas por usuario y partidos de la jornada' AUTO_INCREMENT=1 ;

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
  `quiniela` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_resultado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla resultados,jornada y quiniela.' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `idfk_equipoA`, `idfk_equipoB`, `gol_A`, `gol_B`, `jornada`, `fec_hora`, `quiniela`) VALUES
(1, 1, 4, 5, 1, 1, '2014-09-27 17:00:00', '1'),
(2, 3, 6, 2, 2, 1, '2014-09-27 18:00:00', '0'),
(3, 2, 5, 1, 1, 1, '2014-09-27 19:00:00', '0'),
(4, 4, 1, NULL, NULL, 2, '2014-09-28 17:00:00', NULL),
(5, 6, 2, NULL, NULL, 2, '2014-09-28 18:00:00', NULL),
(6, 5, 3, NULL, NULL, 2, '2014-09-28 19:00:00', NULL);

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
