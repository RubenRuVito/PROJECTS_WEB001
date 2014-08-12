<?php
include_once 'funciones.php';
include_once 'funcionesdb.php';

//$email = $_POST['inputEmail'];
//$pass = $_POST['inputPassword'];

$email = addslashes(strip_tags($_POST['inputEmail']));
$pass = addslashes(strip_tags($_POST['inputPassword']));

/*echo 'email: '.$email.' pass: '.$pass;

$patronPass = '#^[A-Za-z0-9]{8}$#';
$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';*/

$validacion = validacionLogin($email,$pass);
echo $validacion;

if($validacion===1){
	header('location: index01.php?error=1');//error del patron, lo tratamos en el index01.
	exit();
}elseif($validacion===0){

	$registrado = loginUser2($email,$pass);
	echo $registrado;

	if($registrado===0){ // =0 registrado, =1 No registrado.
			session_start();
			$_SESSION['usuario']=$email;
			header('location: index02.php');
			exit();
		}elseif($registrado===1){
			header('location: index01.php?error=2');//error de usuario no registrado, lo tratamos en el index01.
			exit();
		}
}

/*for($fila=0;$fila<count($userYpass);$fila++){

}

if ($user===)*/
?>
