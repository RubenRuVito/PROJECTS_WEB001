<?php
//require_once 'formulario.php';
/*$patronPass = '#^[A-Za-z0-9]{8,20}$#';//Pass minimo 8carac max 20carac, Mayus, minus y numeros, No carac estraños ni . , _ - /....
$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';// Email Cualquier caracter a-z +@+ a-z +.+ 2cara minimo.
$patronNom = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,20}$#';//Nombre  1ªMayus, permiten espacios hasta 30caracteres
$patronApe = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,35}$#';//Appellidos  1ªMayus, permiten espacios hasta 40caracteres
//$patronNick = '/^[0-9a-AzZñÑçÇáéíóúüÁÉÍÓÚÜ\_]{3,15}$/';//Nick todas las letra y numeros y "_"(solo)Caracteres extraños NO.
$patronNick = '#^[a-zA-Z0-9\_\-]{3,15}$#';

$patronEmail2 = '/^[a-zA-Z0-9\_\-\.]+@+(gmail|hotmail|yahoo)+\.(com|es)$/i';*/

//cargarFormRegistro();

$nom = addslashes(strip_tags($_POST['inputNombreReg']));
$ape = addslashes(strip_tags($_POST['inputApellidosReg']));
$nick = addslashes(strip_tags($_POST['inputNickReg']));
$email = addslashes(strip_tags($_POST['inputEmailReg']));
$pass1 = addslashes(strip_tags($_POST['inputPasswordReg1']));
$pass2 = addslashes(strip_tags($_POST['inputPasswordReg2']));



$patronPass = '#^[A-Za-z0-9]{8,20}$#';//Pass minimo 8carac max 20carac, Mayus, minus y numeros, No carac estraños ni . , _ - /....
	//$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';// Email Cualquier caracter a-z +@+ a-z +.+ 2cara minimo.
$patronNom = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,20}$#';//Nombre  1ªMayus, permiten espacios hasta 30caracteres
$patronApe = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,35}$#';//Appellidos  1ªMayus, permiten espacios hasta 40caracteres
$patronNick = '/^[0-9a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\_]{3,15}$/';//Nick todas las letra y numeros y "_"(solo)Caracteres extraños NO.
$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@+(gmail|hotmail|yahoo)+\.(com|es)$/i';

echo $nom;
echo '<br>';
echo $ape;
echo '<br>';
echo $nick;
echo '<br>';
echo $email;
echo '<br>';
echo $pass1;
echo '<br>';

/*$nombre ='Rubén';
$ape = 'García Álvarez';
$nic = 'Ruvito_O';
$email = 'raibandj@hotmail.com';

$email1 = 'ruben@hotail.com';
$email2 = 'ruben.ga@hotmail.com';
$email3 = 'ruben.ga.al@hotmail.com';

$pas = '000000a1';*/

if(preg_match($patronNom, $nom)){//función para validar el patrón
	echo 'el nombre cumple el patrón..';
}else{
	echo 'el nombre NO cumple el patrón..';
}
echo '<br>';
if(preg_match($patronApe , $ape)){
	echo 'el apellido cumple el patrón2..';
}else{
	echo 'el apellido NO cumple el patrón2..';
}
echo '<br>';
if(preg_match($patronNick, $nick)){//función para validar el patrón
	echo 'el nick cumple el patrón1..';
}else{
	echo 'el nick NO cumple el patrón1..';
}
echo '<br>';
if(preg_match($patronEmail, $email)){
	echo 'el email cumple el patrón2..';
}else{
	echo 'el email NO cumple el patrón2..';
}
/*echo '<br>';
if(preg_match($patronEmail2, $email1)){
	echo 'el email1 cumple el patrón2..';
}else{
	echo 'el email1 NO cumple el patrón2..';
	echo preg_match($patronEmail2, $email1);
}
echo '<br>';
if(preg_match($patronEmail2, $email2)){
	echo 'el email2 cumple el patrón2..';
	echo preg_match($patronEmail2, $email2);
}else{
	echo 'el email2 NO cumple el patrón2..';
}
echo '<br>';
if(preg_match($patronEmail2, $email3)){
	echo 'el email3 cumple el patrón2..';
}else{
	echo 'el email3 NO cumple el patrón2..';
}*/
echo '<br>';
if(preg_match($patronPass, $pass1)){
	echo 'el pasword cumple el patrón2..';
}else{
	echo 'el pasword NO cumple el patrón2..';
}
echo '<br>';
$fechaHora = date('Y-m-d');
echo $fechaHora;

//envioEmailRegistro($nombre,$ape,$email,$pas);

function envioEmailRegistro($nombre,$apellidos,$email,$codigoAlta){
	$from = 'rubenruvito@gmail.com';
	$urlActivacion = 'http://localhost/ProjectsWEBrr_ATTIC/Login01/activacion.php?codigo=';
	$urlActivacion .= $codigoAlta;
	$destinatario = $email;
	$asunto = 'GALOBICOM - Activar Usuario';
	$cuerpo = 'GALOBICOM - Activar usuario <h1>Hola'.$nombre.' '.$apellidos;
	//$cuerpo .= $nombre;
	//$cuerpo .= $apellidos;
	$cuerpo .= '</h1><strong>Gracias por registrarte en GALOBICOM</strong>. Para completar el registro tienes que confirmar que has recibido este email haciendo click en el siguiente enlace:<p style="text-align: center;">';
	$cuerpo .= $urlActivacion;
	$cuerpo .= '</p>';
	 
	//para el envío en formato HTML
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	 
	//dirección del remitente
	$headers .= "From: Admin GALOBICOM \r\n";
	 
	//dirección de respuesta, si queremos que sea distinta que la del remitente
	$headers .= "Reply-To: rubenruvito@gmail.com \r\n";
	 
	//direcciones que recibián copia
	//$headers .= "Cc: correocopia@dominio.com\r\n";
	 
	//direcciones que recibirán copia oculta
	//$headers .= "Bcc: copiaocula1@dominio.com, copiaocula1@dominio.com \r\n";
	echo '<br>'; 
	echo 'url:' . $urlActivacion;
	//ini_set('sendmail_from', $from);
	//mail('$destinatario',"$asunto","$cuerpo","$headers",'-f$from');
	if(mail($destinatario,$asunto,$cuerpo,$headers)){
		echo '<br>';
		echo 'email enviado..';
	}else{
		echo '<br>';
		echo 'error en el envio funcion mail()..';
	}
	if(mail('raibandj@hotmail.com','Prueba de email','Funciona el envio de email')){
		echo '<br>';
		echo 'email enviado..';
	}else{
		echo '<br>';
		echo 'error en el envio funcion mail()..';
	}
	if(mail('rubenruvito@gmail.com','Prueba de email','Funciona el envio de email')){
		echo '<br>';
		echo 'email enviado..';
	}else{
		echo '<br>';
		echo 'error en el envio funcion mail()..';
	}
}
?>