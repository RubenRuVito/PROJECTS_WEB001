<?php //Funciones utiles.

function validacionLogin($e,$p){
	$patronPass = '#^[A-Za-z0-9]{8,20}$#';
	$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';
 	
 	echo 'email: '.$e.' pass: '.$p;
 	
 	if(preg_match($patronPass, $p) && preg_match($patronEmail, $e)){//función para validar el patrón
	 	//echo 'el email y la pass cumplen los patrones..';
	 	return 0;
	}else{
		//echo 'el email y la pass NO cumplen los patrones..';
		return 1;
	}
}

function comprobarUsuario($e,$p){
	$userYpass = array( //array bidimensional con usuarios registrados y sus password.<lo suyo seria tenerlod en una BBDD
	array('ruben@galobi.com','000000a1'),// y realizar una consulta.
	array('pepe@galobi.com','000000a2'),
	array('juan@galobi.com','000000a3'),
	);
	$registrado=1;
	for($filas=0;$filas<count($userYpass);$filas++){
		if($userYpass[$filas][0]===$e && $userYpass[$filas][1]===$p){
			$registrado=0;
		}
	}
	if($registrado===0){ // =0 registrado, =1 No registrado.
		return 0;
	}elseif($registrado===1){
		return 1;
	}
}

function validacionesRegistro($nom,$ape,$nic,$e,$p1,$p2){
	$patronPass = '#^[A-Za-z0-9]{8,20}$#';//Pass minimo 8carac max 20carac, Mayus, minus y numeros, No carac estraños ni . , _ - /....
	$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';// Email Cualquier caracter a-z +@+ a-z +.+ 2cara minimo.
	$patronNom = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,20}$#';//Nombre  1ªMayus, permiten espacios hasta 30caracteres
	$patronApe = '#^[A-ZÑÇÁÉÍÓÚ][a-zA-ZñÑçÇáéíóúüÁÉÍÓÚÜ\ ]{2,35}$#';//Appellidos  1ªMayus, permiten espacios hasta 40caracteres
	$patronNick = '/^[0-9a-AzZñÑçÇáéíóúüÁÉÍÓÚÜ\_]{3,15}$/';//Nick todas las letra y numeros y "_"(solo)Caracteres extraños NO.

	if($p1!==$p2) return 0;

 	if(preg_match($patronPass, $p1) && preg_match($patronPass, $p2) && preg_match($patronEmail, $e) && preg_match($patronNom, $nom) && preg_match($patronApe, $ape) && preg_match($patronNick, $nic)){//función para validar el patrón
	 	//echo 'Todos los datos del registro cumplen los patrones..';
	 	return 2;
	}else{
		//echo 'Algun dato del registro no cumple los patrones..';
		return 1;
	}

}

/*function logout(){
	session_start();
	session_destroy();
	header('location: index01.php');
	exit();
}*/


?>