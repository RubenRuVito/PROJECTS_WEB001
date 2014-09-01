<?php 
//Script de registro o alta de usuario en la base de datos "db_pruebas" en la tabla "users".
require 'funciones.php';

$e = addslashes(strip_tags($_POST['inputEmailReg']));
$p1 = addslashes(strip_tags($_POST['inputPassReg1']));
$p2 = addslashes(strip_tags($_POST['inputPassReg2']));

//INCORPORAR VALIDACIONES,PATRONES,SEGURIDAD aqui directamente o invocando a funciones o métodos
//de un archivo php, encargado de todo esto..típico llamarle "funciones_val".

$patron = '/^[a-zA-Z0-9\_\-\.]+@+(gmail|hotmail|yahoo)+\.(com|es)$/i';

if(!preg_match($patron, $e)){
	header('location: formRegistro.php?mnsr=2a');
	exit();
}

//comprobamos que el ususario no existe en la base de datos(que no esta registrado) y que las password son iguales.
$con = conectarDB01();
$consulta = $con->query("SELECT * FROM users WHERE email='$e';");

if($consulta->num_rows === 0){
	if($p1===$p2){
		registro($e,sha1($p1));
	}else{
		header('location: formRegistro.php?mnsr=2b');
		exit();
	}
}else{
	header('location: formRegistro.php?mnsr=2c');
	exit();
}

?>