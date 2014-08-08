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

?>