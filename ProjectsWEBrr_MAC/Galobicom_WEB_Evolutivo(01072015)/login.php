<?php
//CÓDIGO PHP PARA LOGEARSE CONTRA LA BBDD.
require_once 'funciones.php';

$email = addslashes(strip_tags($_POST['inputEmail']));
$pass = addslashes(strip_tags($_POST['inputPassword']));
//$p = addslashes(strip_tags($_POST['pagina']));

//$pass = base64_encode(sha1(md5($pass)));//cifrar la pass introducida x el usuario xa utilizarlo
										//con seguridad entre el servidor y las pag del proyecto.
										//***Hay que cifrarlo tanto al guardar el dato en la bbdd,
										//como para luego consultarlo..
//echo 'email: '.$email.' pass: '.$pass;

$validacion = validacionLogin($email,$pass);// en "funciones_val.php".
//echo $validacion;

if($validacion===1){//Validaciones KO.
	switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común, en la ventana en la que nos encontramos.
        case 1: header('location: index.php?mnsl=2a');//En principio Solamente para las paginas en donde no estemos logueados(index y formRegistro..)
	            exit();
        case 2: header('location: formRegistro.php?mnsl=2a');
                exit();
    }
}elseif($validacion===0){
	$registrado = loginUser($email,sha1($pass));// en "funciones_db.php"
	//echo $registrado;

	if($registrado===0){ // REGISTRADO! (=0 registrado, =1 No registrado).
			switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común,en la ventana en la que nos encontramos.
		        case 1: header('location: index.php?mnsl=0a');//En principio Solamente para las paginas en donde no estemos logueados(index y formRegistro..)
			            exit();
		        case 2: header('location: formRegistro.php?mnsl=0a');
		                exit();
		    }
		}else if($registrado===1){//error de usuario no registrado, lo tratamos en el lapagina donde haya intentado logearse.
			switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común,en la ventana en la que nos encontramos.
		        case 1: header('location: index.php?mnsl=1a');//En principio Solamente para las paginas en donde no estemos logueados(index y formRegistro..)
			            exit();
		        case 2: header('location: formRegistro.php?mnsl=1a');
		                exit();
		    }
		}
}

?>