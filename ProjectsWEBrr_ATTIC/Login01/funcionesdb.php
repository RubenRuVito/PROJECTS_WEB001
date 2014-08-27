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

function registroUsuario($nom,$ape,$nic,$e,$p){ //Alta de usuario en la bbdd(bbdd01/usuarios)..rr
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


//Alta de usuario en la bbdd(bbdd01/usuarios),previa comprobación de que no existen en ninguna tabla,
//y activación mediante email:
//1º)Insertar en tabla "usuarios_temp".
//2º)enviamos email al correo del usuario registrado para realizar la activación mediante la inserción del registro en la tabla "usuarios".
function registroUsuario02($nom,$ape,$nic,$e,$p){
	$registroRes=1; 
	$conex = conectarbd01();

	//Comprobación de si el usuario ya esta registrado en las tablas de bbdd01 "usuarios"(ya esta registrado) o en "usuarios_temp"(usuario pendiente de confirmar email de registro).
	$resConsUserTab01 = $conex->query("SELECT id_user FROM usuarios_temp WHERE email='$e'");//intento de registro,a falta de confirmar email de registro
	$resConsUserTab02 = $conex->query("SELECT id_user FROM usuarios WHERE email='$e'");//usuario ya registrado..
	if($resConsUserTab01 && $resConsUserTab02){
		if(mysqli_num_rows($resConsUserTab01)===1 || mysqli_num_rows($resConsUserTab02)===1){
			$registroRes=2;
		}else{
			$codigoAlta=generarCodigoAlta(20,false);//generamos codigo de alta para enviar con el email de confirmacion de alta.
			$resultconf = $conex->query("SET NAMES 'utf8'");//Siempre antes de insertar en la bbdd textos con posibles acentos o "ñ".
			$result = $conex->query("INSERT INTO usuarios_temp (id_user,nombre,apellidos,nick,email,pasword,cod_alta) VALUES (NULL,'$nom','$ape','$nic','$e','$p','$codigoAlta');");
			envioEmailRegistro($nom,$ape,$e,$codigoAlta);//envió del email de activación
			if($result){
				$registroRes=0;
			}
		}
	} 	
	return $registroRes;
	$conex->close();	 
}

function envioEmailRegistro($nombre,$apellidos,$email,$codigoAlta){
	$from = 'rubenruvito@gmail.com';
	$urlActivacion = 'http://localhost/ProjectsWEBrr_ATTIC/Login01/activacion.php?codigo=';
	$urlActivacion .= $codigoAlta;
	$destinatario = $email;
	$asunto = "GALOBICOM - Activar Usuario";
	$cuerpo = 'GALOBICOM - Activar usuario <h1>Hola';
	$cuerpo .= $nombre;
	$cuerpo .= $apellidos;
	$cuerpo .= '</h1><strong>Gracias por registrarte en GALOBICOM</strong>. Para completar el registro tienes que confirmar que has recibido este email haciendo click en el siguiente enlace:<p style="text-align: center;">';
	$cuerpo .= $urlActivacion;
	$cuerpo .= '</p>';
	 
	//para el envío en formato HTML
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	 
	//dirección del remitente
	$headers .= "From: Admin GALOBICOM \r\n";
	 
	//dirección de respuesta, si queremos que sea distinta que la del remitente
	$headers .= "Reply-To: rubenruvito@gmail.com \r\n";
	 
	//direcciones que recibián copia
	//$headers .= "Cc: correocopia@dominio.com\r\n";
	 
	//direcciones que recibirán copia oculta
	//$headers .= "Bcc: copiaocula1@dominio.com, copiaocula1@dominio.com \r\n";
	 
	mail($destinatario,$asunto,$cuerpo,$headers,$from);
}

function generarCodigoAlta($long,$esp){//Metodo para generar el código de alta..
	$semilla = array();
	$semilla[] = array('a','e','i','o','u');
	$semilla[] = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z');
	$semilla[] = array('0','1','2','3','4','5','6','7','8','9');
	$semilla[] = array('A','E','I','O','U');
	$semilla[] = array('B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
	$semilla[] = array('0','1','2','3','4','5','6','7','8','9');

	if ($esp){ 
		$semilla[] = array('$','#','%','&amp;','@','-','?','¿','!','¡','+','-','*');
	}
 
	// creamos la clave con la longitud indicada
	for ($bucle=0; $bucle<$long; $bucle++)
	{
		// seleccionamos un subarray al azar
		$valor = mt_rand(0, count($semilla)-1);
		// selecccionamos una posición al azar dentro del subarray
		$posicion = mt_rand(0,count($semilla[$valor])-1);
		// cogemos el carácter y lo agregamos a la clave
		$clave .= $semilla[$valor][$posicion];
	}
	// devolvemos la clave
	return $clave;
}


?>