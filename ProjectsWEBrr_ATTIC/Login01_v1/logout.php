<?php //archivo o fichero de Logout,(destruye la sesion actual de la maquina con el servidor),
	session_start();// y vuelve a la pagina de logeo index01.
	session_destroy();
	header('location: index01.php');
	exit();
?>