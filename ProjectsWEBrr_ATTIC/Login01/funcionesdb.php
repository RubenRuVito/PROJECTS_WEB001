<?php //FUNCIONES PARA INTERACTUAR CON LAS BBDD.

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

function loginUser($e,$p){ //Función para logearse a tavés de la bbdd by rr.
	$cone = conectarbd01();

	$registrado=1;

	/*$query="SELECT email FROM usuarios WHERE email=?";
	$stmt=$mysqli->prepare($query);
	$stmt->bind_param('s',$e);
	$stmt->execute();
	$stmt->bind_result($email);
	$stmt->fetch();
	$stmt->close();*/


	//$result = $cone->query("SELECT email FROM usuarios WHERE usuarios.email='.$e'");
	$result = $cone->query("SELECT email,pasword FROM usuarios");
	/*if(!$result){
		echo 'Error Consulta...';
 		exit;
	}*/

	while ($registro = $result->fetch_assoc()){
		echo $registro['email'];
		if($registro['email']===$e && $registro['pasword']===$p){
			$registrado=0;
		}
	}
	desconectarbd01($cone);

	//$row=mysqli_fetch_row($result);
	//$registrouser = mysqli_fetch_assoc($result);

	//$user = $cone->mysql_fetch_array("SELECT email FROM usuarios u WHERE u.email='$e'");

	//$pass = $cone->query("SELECT pasword FROM usuarios u WHERE u.email='$e'");
	//$pass = $cone->mysql_fetch_array("SELECT pasword FROM usuarios u WHERE u.email='$e'");

	//echo $registrouser['email'];
	//echo $pass;
	//echo $row[0];

	

	if($registrado===0){ // =0 registrado, =1 No registrado.
		return 0;
	}elseif($registrado===1){
		return 1;
	}
	
}

function loginUser2($e,$p){ //Sistema de login con BBDD explicada en la Clase 19 de Pccarrier.

	$registrado=1;
	$conex = conectarbd01();
	$result = $conex->query("SELECT * FROM usuarios WHERE email='$e' AND pasword='$p'");
	if($result->num_rows > 0){
		$registrado=0;
	}
	return $registrado;
	$conex->close();
}

function registroUsuario($nom,$ape,$nic,$e,$p){ //Alta de usuario en la bbdd(bbdd01/usuarios)..
	$registroOK=1;
	$conex = conectarbd01();
	$resultconf = $conex->query("SET NAMES 'utf8'");//Siempre antes de insertar en la bbdd textos con posibles acentos o "ñ".
	$result = $conex->query("INSERT INTO usuarios (id_user,nombre,apellidos,nick,email,pasword) VALUES (NULL,'$nom','$ape','$nic','$e','$p');");

	if($result){
		$registroOK=0;
	}
	return $registroOK;
	$conex->close();	 
}

?>