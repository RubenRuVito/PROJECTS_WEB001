/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `blog` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de noticias de la seccion realGalobo ';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `equipos` (
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla equipos liga boadilla futbol7';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `jugadoresga` (
  `id_jugador` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom_camiseta` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `posicion` char(3) COLLATE utf8_unicode_ci NOT NULL,
  `Comentario` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cod_magico` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_jugador`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de perfiles de jugadores';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `jugadores_goles` (
  `idfk_jugador` int(2) NOT NULL,
  `idfk_resultado` int(2) NOT NULL,
  `goles` int(11) NOT NULL,
  PRIMARY KEY (`idfk_jugador`,`idfk_resultado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de goles de jugador en partido, ';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `mensajesblog` (
  `id_mensaje` int(5) NOT NULL AUTO_INCREMENT,
  `idfk_blog` int(4) NOT NULL,
  `idfk_user` int(3) NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `idfk_noticia` (`idfk_blog`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla mensajes para noticias en realGalobo';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `mensajesga` (
  `id_mensaje` int(5) NOT NULL AUTO_INCREMENT,
  `idfk_noticia` int(4) NOT NULL,
  `idfk_user` int(3) NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `idfk_noticia` (`idfk_noticia`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla mensajes para noticias en realGalobo';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `noticiasga` (
  `id_noticia` int(4) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(3) NOT NULL,
  `titulo` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `img_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ext_link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fec_publicado` datetime NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `idfk_user` (`idfk_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de noticias de la seccion realGalobo ';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `puntos_quiniela` (
  `id_puntosQuini` int(2) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(2) NOT NULL,
  `puntosQuini` int(4) NOT NULL,
  `efect_quiniela` double NOT NULL,
  `efect_goleadores` double NOT NULL,
  `efect_total` double NOT NULL,
  PRIMARY KEY (`id_puntosQuini`),
  UNIQUE KEY `id_puntosQuini` (`id_puntosQuini`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de Puntos de usuario por hacer la quiniela';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `quinielaga` (
  `id_quinielaga` int(4) NOT NULL AUTO_INCREMENT,
  `idfk_user` int(2) NOT NULL,
  `idfk_resultado` int(3) NOT NULL,
  `jornada` int(2) NOT NULL,
  `ids_goleadores` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `quiniela_user` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_quinielaga`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de quinielas hechas por usuario y partidos de la jorna';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `resultados` (
  `id_resultado` int(3) NOT NULL AUTO_INCREMENT COMMENT 'el id de cada resultado,por cada jornada se generaran tantos id como partidos haya.',
  `idfk_equipoA` int(2) NOT NULL,
  `idfk_equipoB` int(2) NOT NULL,
  `gol_A` int(2) DEFAULT NULL,
  `gol_B` int(2) DEFAULT NULL,
  `jornada` int(2) DEFAULT NULL,
  `fec_hora` datetime DEFAULT NULL,
  `campo` int(1) NOT NULL COMMENT '=1, cd fútbol 7. =2 , fútbol 7 1-A.',
  `quiniela` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activa` int(1) NOT NULL COMMENT 'Para activar ="1" o desactivar= "2", la quiniela a los usuarios q no la hayan hecho antes del sabado por la mañana.cuando decida el admin anular a traves de la aplica.',
  PRIMARY KEY (`id_resultado`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla resultados,jornada y quiniela.';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `users` (
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla usuarios principal';
/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `users_temp` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cod_activacion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla usuarios temporal';

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `equipos` VALUES
(1,"Real Galobo C.F",1,1,0,1,0,4,4),
(2,"A.E. Briones",3,1,1,0,0,3,1),
(3,"Zenit Cientos F.C.",0,1,0,0,1,1,3),
(4,"Los de Siempre",3,1,1,0,0,3,0),
(5,"All Blacks",3,1,1,0,0,7,1),
(6,"Celtic de Maca F.C.",1,1,0,1,0,4,4),
(7,"Las Lomas U.D.",0,1,0,0,1,2,9),
(8,"Monalissa",0,1,0,0,1,1,7),
(9,"Real Ciudadela",0,1,0,0,1,0,3),
(10,"El Reencuentro",3,1,1,0,0,9,2);

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `jugadoresga` VALUES
(1,"Jose","\"Parra\"","PARRA","POT","Teo Sellers no es tonteria.Lo parra todo!",""),
(4,"Mario","\"Romario\"","MARIO","DEF","defensa",""),
(5,"Alberto","Foruny","FORU","DEF","Muy versátil, se adapta cual búho a una noche de caza, gran rematador y si sube...SUBE!",""),
(7,"Gonzalo","Hernandez","GON","CNT","Medio Centro",""),
(8,"David","\"Nazario DaLima\"","DEIVID N.","DEL","Delantero centro muy pesado",""),
(9,"Hugo","Cañibano","HUGO","DEL","Jugador muy gorila, peleón, con potencia máxima de disparo.",""),
(10,"Curro","\"Jimenez\"","KURRO","DEF","Defensa",""),
(11,"Pablo","\"Pableras\"","KOKO","CNT","Lateral",""),
(13,"Antonio","Tolbaños","TOÑIN","DEF","Jugador Estorbo",""),
(14,"Angel","Yagüe","YAGÚE C.","CNT","centro campista",""),
(16,"Adrian","\"Pietrolini\"","PIETRO","CNT","Medio Centro Adelantado",""),
(20,"Sergio","\"Serch\"","SERCH","CNT","Lateral","");

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `jugadores_goles` VALUES
(9,5,2),
(11,5,2);

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `noticiasga` VALUES
(1,1,"Inicio Liga Municipal de Boadilla  Senior 1ª (2014-2015)","El Real Galobo C.F. comienza la liga con novedades en la plantilla, cambio de equipación y nuevo guardameta, datos importantes para esta campaña, que sin una pretemporada planificada y mucho menos materializada, pinta, por lo que se comenta en el graderío, a fracaso monumental, debido creo yo, a bajas importantes y fichajes fallidos de última hora; con todo esto y poco más que comentar deciros, que aquí se informará de todo lo que vaya sucediendo durante el transcurso de la competición, y demás cositas reseñables de la misma, gracias a los jugadores y a la afición que son y somos muy sabios...ánimo y a por todas. \"Real Galobo Ale Aleee Real Galobo alee alee y Real Galobo ALE\"...","imgruvio/escudo-real-galobo_modificado2.gif","","2014-10-16 00:57:19");

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `puntos_quiniela` VALUES
(1,3,30,0,0,0),
(2,4,40,0,0,0),
(3,1,20,0,0,0),
(4,8,50,0,0,0),
(5,9,50,0,0,0),
(6,10,50,0,0,0),
(7,12,20,0,0,0),
(8,11,50,0,0,0);

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `quinielaga` VALUES
(1,3,1,1,"","2"),
(2,3,2,1,"","1"),
(3,3,3,1,"","2"),
(4,3,4,1,"","1"),
(5,3,5,1,"9,14,11","2"),
(6,4,1,1,"","2"),
(7,4,2,1,"","x"),
(8,4,3,1,"","2"),
(9,4,4,1,"","2"),
(10,4,5,1,"8,9,11","2"),
(11,1,1,1,"","2"),
(12,1,2,1,"","1"),
(13,1,3,1,"","2"),
(14,1,4,1,"","1"),
(15,1,5,1,"9,9,8","2"),
(16,8,1,1,"","x"),
(17,8,2,1,"","1"),
(18,8,3,1,"","1"),
(19,8,4,1,"","2"),
(20,8,5,1,"9,16,11","2"),
(21,9,1,1,"","2"),
(22,9,2,1,"","2"),
(23,9,3,1,"","1"),
(24,9,4,1,"","1"),
(25,9,5,1,"9,16,11","2"),
(26,10,1,1,"","1"),
(27,10,2,1,"","1"),
(28,10,3,1,"","2"),
(29,10,4,1,"","2"),
(30,10,5,1,"9,9,16","x"),
(36,12,1,1,"","1"),
(37,12,2,1,"","1"),
(38,12,3,1,"","2"),
(39,12,4,1,"","1"),
(40,12,5,1,"9,14,16","2"),
(41,11,1,1,"","1"),
(42,11,2,1,"","1"),
(43,11,3,1,"","1"),
(44,11,4,1,"","2"),
(45,11,5,1,"9,16,9","2"),
(46,10,6,2,"","2"),
(47,10,7,2,"","2"),
(48,10,8,2,"","1"),
(49,10,9,2,"9,9,8","2"),
(50,10,10,2,"","1"),
(51,1,6,2,"","1"),
(52,1,7,2,"","2"),
(53,1,8,2,"","1"),
(54,1,9,2,"9,8,11","2"),
(55,1,10,2,"","1"),
(56,11,6,2,"","1"),
(57,11,7,2,"","x"),
(58,11,8,2,"","1"),
(59,11,9,2,"9,10,9","2"),
(60,11,10,2,"","1"),
(61,3,6,2,"","x"),
(62,3,7,2,"","x"),
(63,3,8,2,"","x"),
(64,3,9,2,"9,14,20","x"),
(65,3,10,2,"","x"),
(66,12,6,2,"","2"),
(67,12,7,2,"","1"),
(68,12,8,2,"","x"),
(69,12,9,2,"9,11,20","2"),
(70,12,10,2,"","x"),
(71,13,6,2,"","1"),
(72,13,7,2,"","2"),
(73,13,8,2,"","2"),
(74,13,9,2,"9,8,16","2"),
(75,13,10,2,"","x"),
(76,8,6,2,"","2"),
(77,8,7,2,"","1"),
(78,8,8,2,"","x"),
(79,8,9,2,"9,20,8","2"),
(80,8,10,2,"","2");

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `resultados` VALUES
(1,2,3,3,1,1,"2014-10-18 17:00:00",1,"1",2),
(2,7,10,2,9,1,"2014-10-18 18:00:00",1,"2",2),
(3,5,8,7,1,1,"2014-10-19 16:00:00",2,"1",2),
(4,9,4,0,3,1,"2014-10-19 17:00:00",2,"2",2),
(5,6,1,4,4,1,"2014-10-19 16:00:00",1,"x",2),
(6,4,6,NULL,NULL,2,"2014-10-25 17:00:00",1,NULL,2),
(7,8,9,NULL,NULL,2,"2014-10-26 16:00:00",2,NULL,2),
(8,10,5,NULL,NULL,2,"2014-10-26 17:00:00",2,NULL,2),
(9,3,1,NULL,NULL,2,"2014-10-26 19:00:00",2,NULL,2),
(10,2,7,NULL,NULL,2,NULL,2,NULL,2);

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;
INSERT INTO `users` VALUES
(1,"Rubén","García Álvarez","Ruvito_O","raibandj@hotmail.com","77f71f3aedf57876448a141b5eda12ebb481d527","2014-09-04",NULL,1),
(2,"Prueba Uno","User Nivel Básico","Prueba_rr01","rubenruvito@gmail.com","27932bf31dc747544def17b1ab55b48a08581608","2014-10-16",NULL,5),
(3,"Angel","Yague","Enllelo","angelyawe@gmail.com","9736786bd6600d63fff5829f86aad3a2c5d8e311","2014-10-16",NULL,5),
(4,"Emilio","García Fuentes","Emilín_60","emiliogarfu@hotmail.com","e2b6637df486318762f6638ec80d4823e3897336","2014-10-16",NULL,5),
(5,"Daniel","Pintado","Tesla","daniwarner69@gmail.com","18bc67ac2845d32e72bfc0bc9b6cc7d72c1d2e10","2014-10-16",NULL,5),
(6,"Toti","Toti","Toti","tottiherr@gmail.com","56b45a22410ed3c06518c24438c214fadfb0bb43","2014-10-16",NULL,5),
(7,"Angela","Marinovic","Enyela","marinovic_86@hotmail.com","e341a66d89e8073e8489938c6c2b2b1d974b5e79","2014-10-17",NULL,5),
(8,"Sergio","Lucia Casanova","Serch","only_serch@hotmail.com","d07d1a5f0085a8b7614f636b0752b1f3083efea0","2014-10-17",NULL,5),
(9,"Antonio","Tolbaños Lopez","Tolber","familitolbi@hotmail.com","dd1de8e23a16b2337737169bf494976b208bd614","2014-10-18",NULL,5),
(10,"Jose","Curras","Kurro","josecurras12@hotmail.com","ff212a01b59b5e3c7aedd9f3f8b42f8ccb205fdf","2014-10-18",NULL,5),
(11,"Hugo","Hugo","Hugo","hugocani@hotmail.com","70352f41061eda4ff3c322094af068ba70c3b38b","2014-10-18",NULL,5),
(12,"Enrique","Enrique","Quique","quique808@gmail.com","a15825a29089ef330d8470b38d0027f6351a7468","2014-10-18",NULL,5),
(13,"David","López Arias","DeividR9","davidlopezarias9@gmail.com","a82ce147837a36b5d98d474479c2616cd89b3681","2014-10-26",NULL,5);

/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

