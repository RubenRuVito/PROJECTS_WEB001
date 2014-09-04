<?php
require 'funciones.php';

cargarCabecera('Crear Cuenta',2);
cargarFormRegistro();
if(isset($_GET['mnsr'])){
	switch($_GET['mnsr']){
		case '0a': cargarAlerts('success','','Usuario registrado correctamente,[identificate en la barra de inicio..]'); 
					break;
		case '0b': cargarAlerts('success','','Proceso de registro realizado al 50%, Para finalizar activa tu cuenta en el email que recibirás en tu bandeja de entrada..'); 
					break;
		case '1a': cargarAlerts('danger','','Error en Base de Datos(db), inténtelo de nuevo más tarde');
				break;
		case '1b': cargarAlerts('danger','','Hacking!?No grácias!Usuario NO registrado..regístrate hijoPuta!');
				break;
		case '2a': cargarAlerts('warning','','Datos de formulario incorrectos!.[Ayuda: -Las cuentas de correo deben de ser "hotmail","gmail" o "yahoo". -Nombre y Apellidos 1ªletra mayúcula. - Password entre 8 y 15 carácteres.]');
				break;
		case '2b': cargarAlerts('warning','','Las Password introducidas no son idénticas.');
				break;
		case '2c': cargarAlerts('warning','','El Usuario ya esta registrado, o está pendiente de confirmar correo de activacón en su bandeja de entrada.');
				break;
	}
}
cargarPie();
?>