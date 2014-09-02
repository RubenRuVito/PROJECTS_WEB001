<?php
//Formulario para el registro y alta en la tabla "users" de la base de datos "db_pruebas". 
require_once 'funciones.php';
//session_start(); No lo invocamos xq ya lo hacemos en el archivo de funciones.php

/*if(!isset($_SESSION['email'])){
	header('location: index.php?mns=1a');
	exit();
}*/

cargarCabecera('Crear Cuenta');
//cargarFormRegistro();
cargarFormRegistroCorto();
if(isset($_GET['mnsr'])){
	switch($_GET['mnsr']){
		case '0a': cargarAlerts('success', 'Usuario registrado correctamente,[identificate en la barra de inicio..]'); 
					break;
		case '1a': cargarAlerts('danger','Error en Base de Datos(db), inténtelo de nuevo más tarde');
				break;
		case '2a': cargarAlerts('warning','La cuenta de email es erronea.[ayuda: solo cuentas de "hotmail","gmail" o "yahoo".]');
				break;
		case '2b': cargarAlerts('warning','Las Password introducidas no son idénticas.');
				break;
		case '2c': cargarAlerts('warning','El Usuario ya esta registrado');
				break;
	}
}
cargarPie();
?>