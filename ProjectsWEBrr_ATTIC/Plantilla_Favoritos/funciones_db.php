<?php
//Funciones o métodos para interactuar con las tablas de la base de datos.

function conectarDB01(){
	$conexion = new mysqli('localhost','root_ruben01','ruben01','db_pruebas');
	if(mysqli_connect_errno()){
		echo 'Falló en la conexión a la BBDD de tipo: '.mysqli_connect_errno();
		exit();
	}
	return $conexion;
}

function desconectarBD($conex){
	$conex->close();
	exit();
}

function login($e,$p){
	$con = conectarDB01();
	$configDatos = $con->query("SET NAMES 'utf8';");//Realizar esta instrucción siempre antes de recuperar,modificar,crear registros en las tablas(entidades).
	$consulta = $con->query("SELECT * FROM users WHERE email='$e' AND password=('$p');");
	if($consulta->num_rows > 0){//comprobamos si la consulta a obtenido registros(quiere decir que el usuario esta registrado).
		//$registro = mysqli_fetch_assoc($consulta);
		$registro = $consulta->fetch_assoc();//recogemos el registro en un array.
		session_start();//levantamos la session y creamos algunas variables de session.
		$_SESSION['email'] = $registro['email'];
		$_SESSION['fecAlta'] = $registro['fec_alta'];
		$_SESSION['id'] = $registro['id_user'];
		header('location: index.php?mns=0a');//redireccionamos el flujo a la pagina de salida, con una sesión de usuario creada y única.
		exit();
	}else{
		header('location: index.php?mns=1a');//Usuario no Registrado..
		exit();
	}
}

function registro($e,$p){
	//comprobamos que el ususario no existe en la base de datos(que no esta registrado) y que las password son iguales.
	$con = conectarDB01();
	$configDatos = $con->query("SET NAMES 'utf8';");//Realizar esta instrucción siempre antes de recuperar,modificar,crear registros en las tablas(entidades).
	$consulta = $con->query("SELECT * FROM users WHERE email='$e';");

	if($consulta->num_rows === 0){
		if($p1===$p2){
			$fecha=date('Y-m-d');
			$consulta = $con->query("INSERT INTO users VALUES ('', '$e', '$p','$fecha'); ");
			if($consulta){ //inserción OK.
				header('location: formRegistro.php?mnsr=0a');
				exit();
			}else{ //inserción KO.
				header('location: formRegistro.php?mnsr=1a');
				exit();
			}
		}
	}
}
?>
