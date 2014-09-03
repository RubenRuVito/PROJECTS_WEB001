<?php
//FUNCIONES PARA INTERACTUAR CON LAS BBDD.
require_once 'funciones.php';

function conectarbd01(){
	$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
	if (mysqli_connect_errno()) {
	    echo 'Falló la conexión: '.mysqli_connect_error();
	    exit();
	}
	return $conexion;
}
function desconectarbd01($con){
	$con->close();
}

function loginUser2($e,$p){ //Sistema de login con BBDD explicada en la Clase 19 de Pccarrier.
							//comprobamos si existe, recogiendo los datos necesarios en el array "SESSION".
	$registrado=1;
	$conex = conectarbd01();
	$resultconf = $conex->query("SET NAMES 'utf8'");//Siempre antes de insertar en la bbdd textos con posibles acentos o "ñ".
	$result = $conex->query("SELECT * FROM usuarios WHERE email='$e' AND pasword='$p'");
	if($result->num_rows > 0){
		$registro = $result->fetch_assoc();
		//session_start();
		$_SESSION['nom']=$registro['nombre'];
		$_SESSION['ape']=$registro['apellidos'];
		$_SESSION['email']=$registro['email'];
		$_SESSION['id']=$registro['id_user'];
		$_SESSION['nic']=$registro['nick'];
		$_SESSION['fecAlta']=$registro['fec_alta'];
		$registrado=0;
	}
	return $registrado;
	$conex->close();
}

?>