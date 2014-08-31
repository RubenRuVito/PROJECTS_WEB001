<?php
//CÓDIGO PHP PARA LOGEARSE CONTRA LA BBDD.
include 'funciones.php';

//$email = $_POST['inputEmail'];
//$pass = $_POST['inputPassword'];

$email = addslashes(strip_tags($_POST['inputEmail']));
$pass = addslashes(strip_tags($_POST['inputPassword']));

//$pass = base64_encode(sha1(md5($pass)));//cifrar la pass introducida x el usuario xa utilizarlo
										//con seguridad entre el servidor y las pag del proyecto.
										//***Hay que cifrarlo tanto al guardar el dato en la bbdd,
										//como para luego consultarlo..
//echo 'email: '.$email.' pass: '.$pass;

$validacion = validacionLogin($email,$pass);// en "funciones_val.php".
echo $validacion;

if($validacion===1){
	header('location: index.php?error=1');//error del patron, lo tratamos en el index01.
	exit();
}elseif($validacion===0){

	$registrado = loginUser2($email,$pass);// en "funciones_db.php"
	echo $registrado;

	if($registrado===0){ // =0 registrado, =1 No registrado.
			/*session_start();
			$_SESSION['usuario']=$email;*/
			header('location: indexga.php');
			exit();
		}elseif($registrado===1){
			header('location: index.php?error=2');//error de usuario no registrado, lo tratamos en el index01.
			exit();
		}
}

?>