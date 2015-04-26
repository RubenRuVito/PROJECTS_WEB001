-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2014 a las 21:25:02
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_ruvio02`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id_blog` int(4) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(3) NOT NULL,
  `titulo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `img_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ext_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_blog`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de noticias de la seccion realGalobo ' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id_blog`, `idfk_user`, `titulo`, `contenido`, `img_link`, `ext_link`, `categoria`, `fec_publicado`) VALUES
(1, 1, 'Primer POST en BLOG GALOBICOM', 'Bueno pues aquí estoy terminando y dándole las últimas pinceladas a lo que va a ser la primera web para la camaradería Galobica, con su blog su zona deportiva y una quiniela con un toque al famoso comunio...bueno espero que os guste, este es un Regalo que quería haceros, hacernos para tener un espacio en la nube donde poder echarnos aun más risass...Si1 esta muy limitado, pero ya ire ampliando el negocio y si que no me importaría una asesoría jurídica en temas de diseño, que ya veis q esta muy muy justita la web...Besos con mucho GA! para tod@s.', 'img/world01.jpg', '', 'galobos', '2014-10-09 04:50:02'),
(2, 1, 'Segundo Post Muy GAlobo', 'Segundo post pero en otra categoría  y ver si funciona el visualizar post por categoríaspulsando en los link de la sección de Categorias..', 'img/world02.jpg', '', 'galobos', '2014-10-09 21:55:09'),
(3, 1, 'Tercer Post', 'Prueba de tercer Post en categoría diferente a los dos anteriores, para ver si funciona la selección de post x categoría..', 'img/modeselektor-monkeytown-.jpg', '', 'ga', '2014-10-09 21:59:51'),
(4, 1, 'cuarto Post', 'scasccascascas', '', '', 'ga', '2014-10-10 05:32:31'),
(5, 1, 'quinto Post ', 'asfdfsgbsdfbhfgbhfgbhgb', '', '', 'rico', '2014-10-10 05:32:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla equipos liga boadilla futbol7' AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nom_equipo`, `puntos`, `jugados`, `ganados`, `empatados`, `perdidos`, `gol_favor`, `gol_contra`) VALUES
(1, 'Real Galobo C.F', 0, 0, 0, 0, 0, 0, 0),
(2, 'A.E. Briones', 0, 0, 0, 0, 0, 0, 0),
(3, 'Zenit Cientos F.C.', 0, 0, 0, 0, 0, 0, 0),
(4, 'Los de Siempre', 0, 0, 0, 0, 0, 0, 0),
(5, 'All Blacks', 0, 0, 0, 0, 0, 0, 0),
(6, 'Celtic de Maca F.C.', 0, 0, 0, 0, 0, 0, 0),
(7, 'Las Lomas U.D.', 0, 0, 0, 0, 0, 0, 0),
(8, 'Monalissa', 0, 0, 0, 0, 0, 0, 0),
(9, 'Real Ciudadela', 0, 0, 0, 0, 0, 0, 0),
(10, 'El Reencuentro', 0, 0, 0, 0, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de perfiles de jugadores' AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `jugadoresga`
--

INSERT INTO `jugadoresga` (`id_jugador`, `nombre`, `apellidos`, `nom_camiseta`, `posicion`, `Comentario`, `cod_magico`) VALUES
(1, 'Jose', '"Parra"', 'PARRA', 'POT', 'Teo Sellers no es tonteria.Lo parra todo!', ''),
(4, 'Mario', '"Romario"', 'MARIO', 'DEF', 'defensa', ''),
(5, 'Alberto', 'Foruny', 'FORU', 'DEF', 'Muy versátil, se adapta cual búho a una noche de caza, gran rematador y si sube...SUBE!', ''),
(7, 'Gonzalo', 'Hernandez', 'GON', 'CNT', 'Medio Centro', ''),
(8, 'David', '"Nazario DaLima"', 'DEIVID N.', 'DEL', 'Delantero centro muy pesado', ''),
(9, 'Hugo', 'Cañibano', 'HUGO', 'DEL', 'Jugador muy gorila, peleón, con potencia máxima de disparo.', ''),
(10, 'Curro', '"Jimenez"', 'KURRO', 'DEF', 'Defensa', ''),
(11, 'Pablo', '"Pableras"', 'KOKO', 'CNT', 'Lateral', ''),
(13, 'Antonio', 'Tolbaños', 'TOÑIN', 'DEF', 'Jugador Estorbo', ''),
(14, 'Angel', 'Yagüe', 'YAGÚE C.', 'CNT', 'centro campista', ''),
(16, 'Adrian', '"Pietrolini"', 'PIETRO', 'CNT', 'Medio Centro Adelantado', ''),
(20, 'Sergio', '"Serch"', 'SERCH', 'CNT', 'Lateral', '');

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
-- Estructura de tabla para la tabla `mensajesblog`
--

CREATE TABLE IF NOT EXISTS `mensajesblog` (
  `id_mensaje` int(5) NOT NULL AUTO_INCREMENT,
  `idfk_blog` int(4) NOT NULL,
  `idfk_user` int(3) NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `idfk_noticia` (`idfk_blog`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla mensajes para noticias en realGalobo' AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `mensajesblog`
--

INSERT INTO `mensajesblog` (`id_mensaje`, `idfk_blog`, `idfk_user`, `mensaje`, `fec_publicado`) VALUES
(1, 1, 1, 'Primer comentario del primer post del blog galobicom.', '2014-10-09 05:28:58'),
(2, 2, 1, 'comentario segundo post en categoria Galob@s', '2014-10-09 21:57:05'),
(3, 2, 1, '1', '2014-10-10 05:01:04'),
(4, 2, 1, '2', '2014-10-10 05:14:05'),
(5, 2, 1, '3\n', '2014-10-10 05:14:50'),
(6, 2, 1, '4', '2014-10-10 05:23:09'),
(7, 2, 1, '5', '2014-10-10 05:24:21'),
(8, 3, 1, '1', '2014-10-10 05:27:13'),
(9, 3, 1, '2', '2014-10-10 05:27:48'),
(10, 3, 1, '3', '2014-10-10 05:28:11'),
(11, 3, 1, '4', '2014-10-10 05:28:23'),
(12, 3, 1, '5', '2014-10-10 05:28:48'),
(13, 3, 1, '6', '2014-10-10 05:29:03'),
(14, 1, 1, 'segundo comentario del primer post', '2014-10-13 15:20:15'),
(15, 1, 1, 'tercer comentario en primer post', '2014-10-13 15:21:44');

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
(5, 2, 1, 'otra pru de COMENTARIOS PARA DIFERENTES POST,este es para la primera notica posteada idnoti2 idusu1', '2014-10-11 18:47:45'),
(6, 2, 1, 'mas pruebas....', '2014-10-11 18:52:42'),
(7, 2, 1, 'joderr mas pruebass...', '2014-10-11 18:53:56'),
(8, 2, 1, 'otro comenterio mas...', '2014-10-11 19:49:26'),
(9, 3, 1, 'otro comentario more...', '2014-11-11 19:53:31');

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
  `puntosQuini` int(4) NOT NULL,
  `efect_quiniela` double NOT NULL,
  `efect_goleadores` double NOT NULL,
  `efect_total` double NOT NULL,
  PRIMARY KEY (`id_puntosQuini`),
  UNIQUE KEY `id_puntosQuini` (`id_puntosQuini`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Puntos de usuario por hacer la quiniela' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quinielaga`
--

CREATE TABLE IF NOT EXISTS `quinielaga` (
  `id_quinielaga` int(4) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(2) NOT NULL,
  `idfk_resultado` int(3) NOT NULL,
  `jornada` int(2) NOT NULL,
  `ids_goleadores` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `quiniela_user` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_quinielaga`)
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
