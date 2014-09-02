<?php
//Agregar un nuevo link a la bbdd
require_once 'funciones.php';

if(!isset($_SESSION['id'])){ //NO Hacking Gracias!!.seguridad xa que no puedan agregar sin estar registrados, a través del método get y la dirección remota.
	header('location: index.php?mns=1b');
	exit();
}

$url = addslashes(strip_tags($_POST['url']));

if(!strstr($url, 'http://')){//comprobación de si la url contien 'http://',sino se lo agregamos delante.
	$url = 'http://'.$url;
}
if(!@fopen($url,'r')){//comprobamos si la url tiene navegación OK, con fopen averiguamos si el fichero remoto
   header('location: favoritos.php?mnsf=2a');//al que apunta la url existe y tiene permisos de lectura.
   exit();
}
$iduser = $_SESSION['id'];//recogemos la variable de sesión del id de usuario.
$conec = conectarDB01();
$consulta = $conec->query("SELECT url FROM links WHERE url='$url'; ");//comprobamos que no existe en la bbdd
if($consulta->num_rows > 0){
	header('location: favoritos.php?mnsf=2b');//si existe enviamos mensaje de aviso.
	exit();
}else{//realizamos la inserción en bbdd de la nueva url o link.
	$insert = $conec->query("INSERT INTO links VALUES ('','$iduser','$url'); ");
	if(!$insert){
		header('location: favoritos.php?mnsf=1a'); //inserción KO.
		exit();
	}else{
		header('location: favoritos.php?mnsf=0a'); //Inserción OK.
		exit();
	}
}


?>
