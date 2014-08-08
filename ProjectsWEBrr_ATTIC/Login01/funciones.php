<?php 

function validacionLogin($e,$p){
	$patronPass = '#^[A-Za-z0-9]{8}$#';
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
		if($userYpass[$filas][0]===$e && $userYpass[$filas][1]){
			$registrado=0;
		}
	}
	if($registrado===0){ // =0 registrado, =1 No registrado.
		return 0;
	}elseif($registrado===1){
		return 1;
	}
}

function logout(){
	session_start();
	session_destroy();
	header('location: index01.php');
	exit();
}

?>