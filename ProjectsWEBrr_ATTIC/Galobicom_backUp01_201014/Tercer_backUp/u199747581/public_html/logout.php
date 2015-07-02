<?php 
//archivo o fichero de Logout,(destruye la sesion actual de la maquina con el servidor),
// y vuelve a la pagina de logeo index01.
require_once 'funciones.php'; 	

//session_start();
session_destroy();
header('location: index.php?mnsl=0b');
exit();
?>