<?php //PATRONES
// definición del patron1(código) => Caracter delimitador '#^'(inicio),'$#'(fin),
// "XXX0000XXX", X->3 letras de la (A-F), 0->números de (0-9)
// definición del patron2(email) => Caracter del delimitador '/^'(inicio), '$/'(fin),
// "usuario@servidor.com/es", usuario->letras(a-z,A-Z),números(0-9) y (-,_,.), estos ultimos
// ponerlos entre \"carácter de escape" y usuario es obligatorio(+)-->/^[a-zA-Z0-9\_\-\.]+<--,
// @-> obligatorio, servidor->letras(a-z),numeros(0-9) y (-) es obligatorio,
// dominio-> (.) y letras(a-z) con 3 o 4 caracteres.
// *** para el tema mayúsculas y minusculas se pone la 'i' despues del delimitador final'/'
// *** La definición de los patrones es buena idea buscarla por la nube...

$patron1 = '#^[A-F]{3}[0-9]{4}[A-F]{3}$#';
$patron2 = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';

$codigo1 = 'BCA5615FDB';
$codigo2 = 'RCA5615FDB';
$email = 'user@galobicos.es';
$email2 = 'usergalobicos.es';

$codigos = array('BCA5615FDB','RCA5615FDB');
$emails = array('user@galobicos.es','usergalobicos.es');

if(preg_match($patron1, $codigo1)){//función para validar el patrón
	echo 'el código1 cumple el patrón1..';
}else{
	echo 'el código1 NO cumple el patrón1..';
}
echo '<br>';
if(preg_match($patron2, $email)){
	echo 'el email cumple el patrón2..';
}else{
	echo 'el email NO cumple el patrón2..';
}
echo '<br>';
if(preg_match($patron1, $codigo2)){//función para validar el patrón
	echo 'el código2 cumple el patrón1..';
}else{
	echo 'el código2 NO cumple el patrón1..';
}
echo '<br>';
if(preg_match($patron2, $email2)){
	echo 'el email2 cumple el patrón2..';
}else{
	echo 'el email2 NO cumple el patrón2..';
}
echo '<br>--------------vamos a comprobar el contenido de los arrays:<br>';
for($cnt=0;$cnt<count($codigos);$cnt++){
	if(preg_match($patron1, $codigos[$cnt])){//función para validar el patrón
		echo 'el código['.$cnt.'] cumple el patrón1..';
	}else{
		echo 'el código['.$cnt.'] NO cumple el patrón1..';
	}
	echo '<br>';
}
for($cnt=0;$cnt<count($emails);$cnt++){
	if(preg_match($patron2, $emails[$cnt])){//función para validar el patrón
		echo 'el email['.$cnt.'] cumple el patrón1..';
	}else{
		echo 'el email['.$cnt.'] NO cumple el patrón1..';
	}
	echo '<br>';
}
?>