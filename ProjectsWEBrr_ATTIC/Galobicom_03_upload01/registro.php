<?php
//Script de Registro de Usuario.
require_once 'funciones.php';

$nom = addslashes(strip_tags($_POST['inputNombreReg']));
$ape = addslashes(strip_tags($_POST['inputApellidosReg']));
$nick = addslashes(strip_tags($_POST['inputNickReg']));
$email = addslashes(strip_tags($_POST['inputEmailReg']));
$pass1 = addslashes(strip_tags($_POST['inputPasswordReg1']));
$pass2 = addslashes(strip_tags($_POST['inputPasswordReg2']));

if($pass1 != $pass2){
	header('location: formRegistro.php?mnsr=2b');
	exit();
}

$resValreg = validacionesRegistro($nom,$ape,$nick,$email,$pass1);

if($resValreg === 1){
	header('location: formRegistro.php?mnsr=2a');
}elseif($resValreg === 0){
	$resDBreg = registroUsuario($nom,$ape,$nick,$email,sha1($pass1));
	switch($resDBreg){
		case 0: header('location: formRegistro.php?mnsr=0b');
				break;
		case 1: header('location: formRegistro.php?mnsr=1a');
				break;
		case 2: header('location: formRegistro.php?mnsr=2c');
				break;
	}
}
?>