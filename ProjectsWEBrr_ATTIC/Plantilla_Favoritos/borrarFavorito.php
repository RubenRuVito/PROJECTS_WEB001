<?php
//Borrar un favorito.
require_once 'funciones.php';

if(!isset($_SESSION['id'])){ //NO Hacking Gracias!!.seguridad xa que no puedan agregar sin estar registrados, a través del método get y la dirección remota.
	header('location: index.php?mns=1b');
	exit();
}

$iduser = $_SESSION['id'];//recogemos la variable de sesión del id de usuario.
$idlink = addslashes(strip_tags($_GET['idl']));

$conec = conectarDB01();
$consulta = $conec->query("SELECT id_user2 FROM links WHERE id_link='$idlink'; ");

if($consulta->num_rows == 1){
	$registro = mysqli_fetch_assoc($consulta);//recuperamos el registro en forma de array.
	if($iduser == $registro['id_user2']){ //el usuario que se ha logeado va a borrar un registro que el creo, de la tabla links. 
		$delete = $conec->query("DELETE FROM links WHERE id_link='$idlink' AND id_user2='$iduser'; ");
		if($delete){
			header('location: favoritos.php?mnsf=0b');//delete OK.
			exit();
		}else{
			header('location: favoritos.php?mnsf=1a');//delete KO. error en bbdd.
			exit();									  
		}
	}else{
		header('location: favoritos.php?mnsf=1b');//delete KO. fijo xque x url y el metodo get,un usuario registrado esta
		exit();								  //haciendo hacking el cabroncete(borrar registros que el no ha creado).
	}
}else{
	header('location: favoritos.php?mnsf=1a');//delete KO. error en bbdd.
	exit();
}

?>