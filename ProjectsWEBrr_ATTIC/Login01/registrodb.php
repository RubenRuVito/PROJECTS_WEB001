<?php
include_once 'funciones.php';
include_once 'funcionesdb.php';

$nombre = addslashes(strip_tags($_POST['inputNombreReg']));
$apellidos = addslashes(strip_tags($_POST['inputApellidosReg']));
$nick = addslashes(strip_tags($_POST['inputNickReg']));
$email = addslashes(strip_tags($_POST['inputEmailReg']));
$pass1 = addslashes(strip_tags($_POST['inputPasswordReg1']));
$pass2 = addslashes(strip_tags($_POST['inputPasswordReg2']));

$validacionreg = validacionesRegistro($nombre,$apellidos,$nick,$email,$pass1,$pass2);

/*$pass1 = base64_encode(sha1(md5($pass1)));//cifrar la pass introducida x el usuario xa utilizarlo
$pass2 = base64_encode(sha1(md5($pass2)));//con seguridad entre el servidor y las pag del proyecto.
										  //***Hay que cifrarlo tanto al guardar el dato en la bbdd,
										  //como para luego consultarlo..
*/

switch($validacionreg){
	case 0: header('location: index01.php?erroreg=0');
			exit();
			break;
	case 1: header('location: index01.php?erroreg=1');
			exit();
			break;
	case 2: $registro = registroUsuario02($nombre,$apellidos,$nick,$email,$pass1);
			if($registro===0) header('location: index01.php?erroreg=2');//la inserción(INSERT INTO..) en la bbdd01(usuarios_temp) ha ido OK
			if($registro===1) header('location: index01.php?erroreg=3');//KO en BBDD.
			if($registro===2) header('location: index01.php?erroreg=4');//El usuario ya esta registrado o a falta de validar el email de confirmación de alta.
			exit();
			break;
}


?>