<?php
//include_once 'funciones.php';
require_once 'funciones.php';

$clave = addslashes(strip_tags($_GET['cod']));
$conexion = conectarDB01();
$resultconf = $conexion->query("SET NAMES 'utf8'");
$resultado = $conexion->query("SELECT * FROM users_temp WHERE cod_activacion='$clave';");

if($resultado->num_rows == 1){
	$registro=mysqli_fetch_assoc($resultado);
	$id = $registro['id_user'];
	$nom = $registro['nombre'];
	$ape = $registro['apellidos'];
	$nic = $registro['nick'];
	$correo = $registro['email'];
	$pass = $registro['password'];
}else{
	header('location: formRegistro.php?mnsr=1b');
	exit();
}
desconectarDB01($conexion);
if(altaUsuario($nom,$ape,$nic,$correo,$pass)){
	if(eliminarUsuarioTemp($id)){
		header('location: formRegistro.php?mnsr=0a');
		exit();
	}else{
		header('location: formRegistro.php?mnsr=1a');
		exit();
	}
}else{
	header('location: formRegistro.php?mnsr=1a');
	exit();
}
?>