<?php
//FUNCIONES PARA INTERACTUAR CON LAS BBDD.
require_once 'funciones.php';

function conectarDB01(){
	//$conexion = new mysqli('localhost','root_ruben01','ruben01','db_ruvio01');
	//$conexion = new mysqli('localhost','root_ruben01','ruben01','db_ruvio01_pruebas');
	$conexion = new mysqli('localhost','root_ruben01','ruben01','db_ruvio01_2fase');
	if (mysqli_connect_errno()) {
	    echo 'Falló la conexión: '.mysqli_connect_error();
	    exit();
	}
	return $conexion;
}
function desconectarDB01($con){
	$con->close();
}

function loginUser($e,$p){ //Sistema de login con BBDD explicada en la Clase 19 de Pccarrier.
							//comprobamos si existe, recogiendo los datos necesarios en el array "SESSION".
	$registrado=1;
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");//Siempre antes de interactuar con la bbdd textos con posibles acentos o "ñ".
	$result = $conex->query("SELECT * FROM users WHERE email='$e' AND password='$p'; ");
	desconectarDB01($conex);
	if($result->num_rows > 0){
		$registro = $result->fetch_assoc();
		//session_start();
		$_SESSION['nom']=$registro['nombre']; //recuperamos los datos de usuario y se los asignamos a variables de sessión.
		$_SESSION['ape']=$registro['apellidos'];
		$_SESSION['email']=$registro['email'];
		$_SESSION['id']=$registro['id_user'];
		$_SESSION['nic']=$registro['nick'];
		$_SESSION['fecAlta']=$registro['fec_alta'];
		$_SESSION['nivAcceso']=$registro['nivel_acceso'];
		$registrado=0;
	}
	return $registrado;
}

function registroUsuario($nom,$ape,$nic,$e,$p){
	$registroRes=1; 
	$conex = conectarDB01();

	//Comprobación de si el usuario ya esta registrado en las tablas de db_ruvio01 "users"(ya esta registrado) o en "usuarios_temp"(usuario pendiente de confirmar email de registro).
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$resConsUserTab01 = $conex->query("SELECT id_user FROM users_temp WHERE email='$e'; ");//intento de registro,a falta de confirmar email de registro
	$resConsUserTab02 = $conex->query("SELECT id_user FROM users WHERE email='$e'; ");//usuario ya registrado..
	
	if($resConsUserTab01 && $resConsUserTab02){
		if(mysqli_num_rows($resConsUserTab01)===1 || mysqli_num_rows($resConsUserTab02)===1){
			$registroRes=2;
		}else{
			$codigoAlta = generarCodigoAlta(20,false);//generamos codigo de alta para enviar con el email de confirmacion de alta.
			$resultconf = $conex->query("SET NAMES 'utf8'");//Siempre antes de insertar en la bbdd textos con posibles acentos o "ñ".
			$result = $conex->query("INSERT INTO users_temp (id_user,nombre,apellidos,nick,email,password,cod_activacion) VALUES (NULL,'$nom','$ape','$nic','$e','$p','$codigoAlta');");
			//enviarEmailRegistro($nom,$ape,$e,$codigoAlta);//envió del email de activación
			desconectarDB01($conex);
			if($result){
				enviarEmailRegistro($nom,$ape,$e,$codigoAlta);//envió del email de activación
				$registroRes=0;
			}
		}
	}
	desconectarDB01($conex); 	
	return $registroRes;	 
}

function altaUsuario($nom,$ape,$nic,$correo,$pas){
	$fecActual = date('Y-m-d H:i:s');
	$nivelAcceso = 'buquido';
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$result = $conex->query("INSERT INTO users (id_user,nombre,apellidos,nick,email,password,fec_alta,fec_baja,nivel_acceso) VALUES (NULL,'$nom','$ape','$nic','$correo','$pas','$fecActual',NULL,'$nivelAcceso');");
	desconectarDB01($conex);
	if($result){
		return true;
	}else{
		return false;
	}
}

function eliminarUsuarioTemp($id){//implementar metodo para que borre el registro correspondiente de la tabla usuarios_temp.
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$result = $conex->query("DELETE FROM users_temp WHERE id_user=$id; ");
	desconectarDB01($conex);
	if($result){
		return true;
	}else{
		return false;
	}
}

?>