<?php
include_once 'funciones.php';

//$email = $_POST['inputEmail'];
//$pass = $_POST['inputPassword'];

$email = addslashes(strip_tags($_POST['inputEmail']));
$pass = addslashes(strip_tags($_POST['inputPassword']));

echo 'email: '.$email.' pass: '.$pass;

$patronPass = '#^[A-Za-z0-9]{8}$#';
$patronEmail = '/^[a-zA-Z0-9\_\-\.]+@[a-z0-9\-]+\.[a-z]{2,4}$/i';

$validacion = validacionLogin($email,$pass);

echo $validacion;

$userYpass = array( //array bidimensional con usuarios registrados y sus password.
	array('ruben@galobi.com','000000a1'),
	array('pepe@galobi.com','000000a2')
	);

/*for($fila=0;$fila<count($userYpass);$fila++){

}

if ($user===)*/
?>
