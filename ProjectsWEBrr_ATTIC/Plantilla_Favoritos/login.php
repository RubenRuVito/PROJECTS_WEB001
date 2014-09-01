<?php
//Script de Login.
require 'funciones.php';

$e = addslashes(strip_tags($_POST['inputEmail']));
$p = addslashes(strip_tags($_POST['inputPass']));

//INCORPORAR VALIDACIONES,PATRONES,SEGURIDAD aqui directamente o invocando a funciones o métodos
//de un archivo php, encargado de todo esto..típico llamarle "funciones_val".

//Mucho mas eficiente crear una funcion en "funciones_db" que realice el login;y la invocamos desde aquí.
/*$con = conectarDB01();
$configDatos = $con->query("SET NAMES 'utf8';");//Realizar esta instrucción siempre antes de recuperar,modificar,crear registros en las tablas(entidades).
$consulta = $con->query("SELECT * FROM users WHERE email='$e' AND password=sha1('$p');");
if($consulta->num_rows > 0){//comprobamos si la consulta a obtenido registros(quiere decir que el usuario esta registrado).
	$registro = mysql_fetch_assoc($consulta);//recogemos el registro en un array.
	session_start();//levantamos la session y creamos algunas variables de session.
	$_SESSION['email'] = $registro['email'];
	$_SESSION['fecAlta'] = $registro['fec_alta'];
	header('location: index.php');//redireccionamos el flujo a la pagina de salida, con una sesión de usuario creada y única.
	exit();
}*/
login($e,sha1($p));

?>