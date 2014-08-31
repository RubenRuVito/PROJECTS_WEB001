<?php
//Pruebas de datos.
$e='ruben@galobi.com';
$p='000000a1';

$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
	if (mysqli_connect_errno()) {
	    echo 'Falló la conexión: '.mysqli_connect_error();
	    exit();
	}

$result = $conexion->query("SELECT * FROM usuarios WHERE email='$e' AND pasword='$p'");
	if($result->num_rows > 0){
		$registro = $result->fetch_assoc();
		session_start();
		$_SESSION['nom']=$registro['nombre'];
		$_SESSION['ape']=$registro['apellidos'];
		$_SESSION['id']=$registro['id_user'];
		$_SESSION['nic']=$registro['nick'];
	}
header('location: pruebasDatos02.php');
exit();
?>