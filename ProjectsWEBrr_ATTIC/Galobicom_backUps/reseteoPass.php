<?php
//include_once 'funciones.php';
require_once 'funciones.php';

$clave = addslashes(strip_tags($_GET['cod']));
$conexion = conectarDB01();
$resultconf = $conexion->query("SET NAMES 'utf8'");
$resultado = $conexion->query("SELECT id_user,email,password FROM users_temp WHERE cod_activacion='$clave';");

if($resultado->num_rows == 1){
	$registro=mysqli_fetch_assoc($resultado);
	$id = $registro['id_user'];
	$correo = $registro['email'];
	$nuevoPass = $registro['password'];
}else{
	header('location: formRegistro.php?mnsr=1b');
	exit();
}
echo "<p>Id user temp: ".$id."</p>";
desconectarDB01($conexion);
if(reseteoPassword($correo,$nuevoPass)){
	if(eliminarUsuarioTemp($id)){
		header('location: formRegistro.php?mnsr=0c');
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