<?php
//FUNCIONES DE VALIDACIONES.

function validacionLogin($e,$p){
	$patronPass = '#^[A-Za-z0-9]{8,20}$#';
	$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';
 	$resLogin = 1;
 	//echo 'email: '.$e.' pass: '.$p;
 	
 	if(preg_match($patronPass, $p) && preg_match($patronEmail, $e)){//función para validar el patrón
	 	//echo 'el email y la pass cumplen los patrones..';
	 	$resLogin=0;
	}
	//echo 'el email y la pass NO cumplen los patrones..';
	return $resLogin;
}

function validacionesRegistro($nom,$ape,$nic,$e,$p1){
	$patronPass = '#^[A-Za-z0-9]{8,20}$#';//Pass minimo 8carac max 20carac, Mayus, minus y numeros, No carac estraños ni . , _ - /....
	//$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';// Email Cualquier caracter a-z +@+ a-z +.+ 2cara minimo.
	$patronNom = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,20}$#';//Nombre  1ªMayus, permiten espacios hasta 30caracteres
	$patronApe = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,35}$#';//Appellidos  1ªMayus, permiten espacios hasta 40caracteres
	$patronNick = '/^[0-9a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\_]{3,15}$/';//Nick todas las letra y numeros y "_"(solo)Caracteres extraños NO.
	$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@+(gmail|hotmail|yahoo)+\.(com|es)$/i';

 	if(preg_match($patronPass, $p1) && preg_match($patronEmail, $e) && preg_match($patronNom, $nom) && preg_match($patronApe, $ape) && preg_match($patronNick, $nic)){//función para validar el patrón
	 	//echo 'Todos los datos del registro cumplen los patrones..';
	 	return 0;
	}else{
		//echo 'Algun dato del registro no cumple los patrones..';
		return 1;
	}

}
?>