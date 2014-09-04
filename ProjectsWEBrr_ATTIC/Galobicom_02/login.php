<?php
//CÓDIGO PHP PARA LOGEARSE CONTRA LA BBDD.
require_once 'funciones.php';

//$email = $_POST['inputEmail'];
//$pass = $_POST['inputPassword'];

$email = addslashes(strip_tags($_POST['inputEmail']));
$pass = addslashes(strip_tags($_POST['inputPassword']));
//$p = addslashes(strip_tags($_POST['pagina']));


//$pass = base64_encode(sha1(md5($pass)));//cifrar la pass introducida x el usuario xa utilizarlo
										//con seguridad entre el servidor y las pag del proyecto.
										//***Hay que cifrarlo tanto al guardar el dato en la bbdd,
										//como para luego consultarlo..
//echo 'email: '.$email.' pass: '.$pass;

$validacion = validacionLogin($email,$pass);// en "funciones_val.php".
echo $validacion;

if($validacion===1){
	//header('location: index.php?mnsl=2a');//error del patron, lo tratamos en el index01.
	//exit();
	switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común.
        case 1: header('location: index.php?mnsl=2a');
	            exit();
        case 2: header('location: formRegistro.php?mnsl=2a');
                exit();
        case 3: header('location: index.php?mnsl=1a');
                exit();
    }
}elseif($validacion===0){

	$registrado = loginUser2($email,$pass);// en "funciones_db.php"
	echo $registrado;

	if($registrado===0){ // =0 registrado, =1 No registrado.
			/*session_start();
			$_SESSION['usuario']=$email;*/
			//header('location: indexga.php');
			//exit();
			switch($_GET['p']){//controlamos la navegación a la hora de mostrar mensajes al usuario en la barra NAVBAR común.
		        case 1: header('location: index.php?mnsl=0a');
			            exit();
		        case 2: header('location: formRegistro.php?mnsl=0a');
		                exit();
		        case 3: header('location: index.php?mnsl=1a');
		                exit();
		    }
		}elseif($registrado===1){
			header('location: index.php?mnsl=1a');//error de usuario no registrado, lo tratamos en el index01.
			exit();
		}
}

?>