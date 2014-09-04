<?php
require 'funciones.php';

cargarCabecera('Crear Cuenta',2);
cargarFormRegistro();
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