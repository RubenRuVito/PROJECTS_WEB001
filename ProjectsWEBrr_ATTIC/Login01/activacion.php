<?php
//include_once 'funciones.php';
include_once 'funcionesdb.php';

$clave = $_GET['codigo'];
$conexion = conectarbd01();
$resultado = $conexion->query("SELECT * FROM usuarios_temp WHERE cod_alta='$clave'");

while($registro=mysqli_fetch_array($resultado)){
	$nom = $registro['nombre'];
	$ape = $registro['apellidos'];
	$nic = $registro['nick'];
	$correo = $registro['email'];
	$pass = $registro['pasword'];
}
$conexion->close();
if(altaRegistro($nom,$ape,$correo,$pass)){
	header('location: index01.php?erroreg=5');
	exit();
}else{
	header('location: index01.php?erroreg=6');
	exit();
}

//eliminarUsuarioTemp($correo); 

function altaRegistro($nombre,$apellidos,$email,$pas){
	$conex = conectarbd01();
	$result = $conex->query("INSERT INTO usuarios (id_user,nombre,apellidos,nick,email,pasword,fec_alta,fec_baja) VALUES (NULL,'$nom','$ape','$nic','$correo','$pass','',NULL);");
	if($result){
		return true;
	}else{
		return false;
	}
	$conex->close();
}
function elimininarUsuarioTemp($e){//implementar metodo para que borre el registro correspondiente de la tabla usuarios_temp.

}

?>