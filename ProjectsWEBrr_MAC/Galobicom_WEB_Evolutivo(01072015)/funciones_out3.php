<?php
//FICHERO DE MÉTODOS, QUE SE INVOCAN A PARTIR DEL EVENTO DE UN ELEMENTO TIPO BUUTON,SELECT..ETC
// Y ESCUCHADO POR CÓDIGO JQUERY PARA RECOGER LOS VALORES DE OTROS ELEMENTOS IDENTIFICADOS(ID),
//Y A SUVEZ LLAMAR A ESTE FICHERO MEDIANTE AJAX Y CON LA OPCION DE FUNCION Q SE REQUIERE EJECUTAR Y
//LOS VARIABLES NECESARIAS.

// PÁGINA "quinielaGa.php".

require_once 'funciones.php';

$queFuncion = addslashes(strip_tags($_POST['funcion']));

switch($queFuncion){
	case 0: $opcionCombo = addslashes(strip_tags($_POST['value']));//valor jornada
			cargarTablaPartidosQuinielaGa($opcionCombo);
			break;
	case 1: $numJor = addslashes(strip_tags($_POST['numJor']));//valor jornada
			$idPartPrimer = addslashes(strip_tags($_POST['idPartPrimer']));
			$Qpart01 = addslashes(strip_tags($_POST['Qpart01']));
			$Qpart02 = addslashes(strip_tags($_POST['Qpart02']));
			$Qpart03 = addslashes(strip_tags($_POST['Qpart03'])); //Incluir mas partidos cuando sepamos el numero exacto de 
			$Qpart04 = addslashes(strip_tags($_POST['Qpart04']));  // encuentros por jornada...
			$Qpart05 = addslashes(strip_tags($_POST['Qpart05']));
			$idJug01 = addslashes(strip_tags($_POST['idJug01']));
			$idJug02 = addslashes(strip_tags($_POST['idJug02']));
			$idJug03 = addslashes(strip_tags($_POST['idJug03']));
			guardarQuinielaGa($numJor,$idPartPrimer,$Qpart01,$Qpart02,$Qpart03,$Qpart04,$Qpart05,$idJug01,$idJug02,$idJug03);
			break;
	case 2: $numJor = addslashes(strip_tags($_POST['value']));//valor jornada
			cargarTablaQuinielaUser($numJor);
			break;
	case 3: $titulo = addslashes(strip_tags($_POST['titulo']));
			$contenido = addslashes(strip_tags($_POST['contenido']));
			$linkimg = addslashes(strip_tags($_POST['linkimg']));
			$linkEnla = addslashes(strip_tags($_POST['linkEnla']));
			$categoria = addslashes(strip_tags($_POST['categoria']));
			guardarPostBlogGa($titulo,$contenido,$linkimg,$linkEnla,$categoria);
			break;
	case 4: $mensaje = addslashes(strip_tags($_POST['comentario']));
			$idBlog= addslashes(strip_tags($_POST['idBlog']));
			guardarComentarioBlog($mensaje,$idBlog); //insert en la tabla "mensajesga"
			break;
	case 5: $numJor = addslashes(strip_tags($_POST['value']));//valor jornada
			desactivarQuiniela($numJor);
			break;

	case 6: $numJu = addslashes(strip_tags($_POST['numJuGol']));
			$arayJug = addslashes(strip_tags($_POST['arayIdJug']));
			$arayGoles = addslashes(strip_tags($_POST['arayGoles']));
			pruebaGuardarJugGol($numJu,$arayJug,$arayGoles);
			break;

	case 7: $emailReg = addslashes(strip_tags($_POST['emailreg']));
			$nuevoPass = addslashes(strip_tags($_POST['pass']));
			reseteoContrasena2($emailReg,sha1($nuevoPass));
			break;

}

function cargarTablaPartidosQuinielaGa($opcJor){ //valor de una jornada futura "jornada configurada", que esta configurada pero sin los resultados.
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consJorConfig = $conex->query("SELECT * FROM resultados WHERE jornada='$opcJor'; ");
	if($consJorConfig){
		$i=1; // Contador para identificar que radiobutton se a pulsado en cada partido de la tabla.
		while($registro = mysqli_fetch_assoc($consJorConfig)){
			$id_partido = $registro['id_resultado']; //id del partido jugado ( identifica un partido unico de la tabla resultados).
			$id_equipoA = $registro['idfk_equipoA'];
			$id_equipoB = $registro['idfk_equipoB'];
			$consultaA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoA'; ");
			$registroA = mysqli_fetch_assoc($consultaA); //Sacamos el nombre de los equipos apartir de su id(idfk..) de la tabla "equipos".
			$consultaB = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoB'; ");
			$registroB = mysqli_fetch_assoc($consultaB);
			echo "<tr>";
			echo "<td id='idPart' class='text-center'>".$id_partido."</td>";
			echo "<td class='text-center'>".$opcJor."</td>";
			echo "<td class='text-center'>".$registroA['nom_equipo']."</td>";
			echo "<td class='text-center'>".$registroB['nom_equipo']."</td>";
			echo "<td id='".$id_partido."' class='text-center'> <input type='radio' name='quini".$id_partido."' id='quini".$id_partido."' value='1' onclick='valorQuiniPartido0".$i."(this)'> ";
			echo "<input type='radio' name='quini".$id_partido."' id='quini".$id_partido."' value='0' onclick='valorQuiniPartido0".$i."(this)' required> <input type='radio' name='quini".$id_partido."' id='quini".$id_partido."' value='2' onclick='valorQuiniPartido0".$i."(this)'></td>";
			echo "</tr>";
			$i++;
		}
	}else{
		cargarAlerts('warning','sm','Error en Base de datos(db)');
	}
	desconectarDB01($conex);

}

function guardarQuinielaGa($numJor,$idPartPrimer,$Qpart01,$Qpart02,$Qpart03,$Qpart04,$Qpart05,$idJug01,$idJug02,$idJug03){
	$arayJorIdsJugGol=array();
	$arayQuinielas =array();
	$cadIdsJugGol = $idJug01.','.$idJug02.','.$idJug03;
	if($Qpart01==0){
		$Qpart01='x';
	}
	if($Qpart02==0){
		$Qpart02='x';
	}
	if($Qpart03==0){
		$Qpart03='x';
	}
	if($Qpart04==0){
		$Qpart04='x';
	}
	if($Qpart05==0){
		$Qpart05='x';
	}
//AÑADIR EL NÚMERO EXACTO DE PARTIDOS POR JORNADA.
	array_push($arayQuinielas,$Qpart01,$Qpart02,$Qpart03,$Qpart04,$Qpart05);

	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$flagError1 = 0;
	$flagError2 = 0;
	for($cnt=0;$cnt<5;$cnt++){ //5 xq son cinco partidos por jornada
		$quiniela = $arayQuinielas[$cnt];
		$consPartido = $conex->query("SELECT idfk_equipoA,idfk_equipoB,activa FROM resultados WHERE id_resultado='$idPartPrimer'; ");
		$regisPartido = mysqli_fetch_assoc($consPartido);
		if($regisPartido['activa'] == 1){
			if($regisPartido['idfk_equipoA'] == 1 || $regisPartido['idfk_equipoB'] == 1){ // =1 significa q juega El Equipo con id 1 (real GAlobo), y le incluimos los id de los goleadores.
				$consGuarQuini = $conex->query("INSERT INTO quinielaga (id_quinielaga,idfk_user,idfk_resultado,jornada,ids_goleadores,quiniela_user) VALUES ('','".$_SESSION['id']."','$idPartPrimer','$numJor','$cadIdsJugGol','$quiniela'); ");
			}else{
				$consGuarQuini = $conex->query("INSERT INTO quinielaga (id_quinielaga,idfk_user,idfk_resultado,jornada,quiniela_user) VALUES ('','".$_SESSION['id']."','$idPartPrimer','$numJor','$quiniela'); ");			
			}
			$idPartPrimer++;
			if(!$consGuarQuini){
				$falgError=1;
			}
		}else if($regisPartido['activa'] == 2){
			$flagError2=1;
		}
	}
	if($flagError1!=0){
		cargarAlerts('danger','sm','Error en Base de datos(db)');
	}else if($flagError2 !=0){
		cargarAlerts('warning','sm','La quiniela esta desactivada,se te paso el plazo');
	}else{
		cargarAlerts('success','sm','Quiniela registrada satisfactoriamente');
	}
	desconectarDB01($conex);
}

function cargarTablaQuinielaUser($numJor){
	//echo "<p>NumJornada: " .$numJor."</p>";
	$idUser = $_SESSION['id'];
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consQuiniela = $conect->query("SELECT * FROM quinielaga WHERE idfk_user='$idUser' AND jornada='$numJor'; ");
	if($consQuiniela){
				echo "<table id='' class='table table-striped table-bordered table-hover' style='' border='' width=''>";
                echo "<thead>";    
                echo "<tr>";
                echo "<th class='text-center'>Local:</th>";
                echo "<th class='text-center'>Visitante:</th>";
                echo "<th class='text-center'>1-X-2</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody id='misQuinielas'>";
		while($regisQuini = mysqli_fetch_assoc($consQuiniela)){
			$idPartido = $regisQuini['idfk_resultado'];
			$consResultados = $conect->query("SELECT idfk_equipoA,idfk_equipoB FROM resultados WHERE id_resultado='$idPartido'; ");
			$regisPartido = mysqli_fetch_assoc($consResultados); 
			if($regisPartido['idfk_equipoA'] == 1 || $regisPartido['idfk_equipoB'] == 1){
				$cadIdsGoleadores = $regisQuini['ids_goleadores'];
			}
			$idEquiA = $regisPartido['idfk_equipoA'];	//recuperando los id de los equipos q dispunta el encuentro
			$idEquiB = $regisPartido['idfk_equipoB'];	// a traves del id de partido en la tabla "resultados".
			$consEquipoA = $conect->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$idEquiA'; ");
			$regisEquipoA = mysqli_fetch_assoc($consEquipoA); //Recuperando los Nombres de Equipo con los ids de equipo
			$nombreEquiA = $regisEquipoA['nom_equipo'];		// en la tabla "equipos".
			$consEquipoB = $conect->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$idEquiB'; ");
			$regisEquipoB = mysqli_fetch_assoc($consEquipoB);
			$nombreEquiB= $regisEquipoB['nom_equipo'];
				echo "<tr>";
				echo "<td class='text-center'>".$nombreEquiA."</td>";
				echo "<td class='text-center'>".$nombreEquiB."</td>";
				echo "<td class='text-center' style='font-size: 20px;'>".$regisQuini['quiniela_user']."</td>";
				echo "</tr>";

		}
           		echo "</tbody>";
                echo "</table>";
		$arayIdsGoleadores = explode(",",$cadIdsGoleadores);
				echo "<div class='text-center form-group'>";
				echo "<div class='well'>";
				echo "<h3>Tus Killer para esta Jornada Son:</h3>";
				echo "<hr style='border-top-color: black;'>";
		for($cnt=0;$cnt<count($arayIdsGoleadores);$cnt++){
				$idJugador = $arayIdsGoleadores[$cnt];
				$consJugadores = $conect->query("SELECT id_jugador,nom_camiseta,posicion FROM jugadoresga WHERE id_jugador='$idJugador'; ");
				$regisJugador = mysqli_fetch_assoc($consJugadores);
				If($regisJugador['posicion']==='DEL'){
					$puntos = 5;
				}else if($regisJugador['posicion']==='DEF'){
					$puntos = 18;
				}else if($regisJugador['posicion']==='CNT'){
					$puntos = 10;
				}else{
					$puntos =50;
				}
				echo "<div class='well'>";
				echo "<h4>killer [".$cnt."]:</h4>";
				echo "<h4>Dorsal:<strong> ".$regisJugador['id_jugador']."</strong> Nombre: <strong>".$regisJugador['nom_camiseta']."</strong></h4>";
				echo "<h4>Posición:<strong> ".$regisJugador['posicion']."</strong> Puntuación:<strong> ".$puntos."</strong></h4>"; 
				echo "</div>";
		}
				echo "</div>";
				echo "</div>";
	}

}

function guardarPostBlogGa($titulo,$contenido,$linkimg,$linkEnla,$categoria){
	$idUsuario = $_SESSION['id']; //recogemos el id del usuario logeado para ponerle como autor de la noticia.
	$fecHora = date('Y-m-d H:i:s'); //Recogemos la fecha y la hora,(PREGUNTAR POR SI POSTEAN DESDE OTRO PAIS O EL SERVIDOR ESTA EN OTRO PAIS???)
	$mesActual = date('m');

	if($linkimg != ''){
		if(!strstr($linkimg, 'imgruvio/')){
			if(!strstr($linkimg, 'http://')){//comprobación de si la url contien 'http://',sino se lo agregamos delante.
				$linkimg = 'http://'.$linkimg;
			}
		}
	}
	if($linkEnla != ''){
		if(!strstr($linkEnla, 'http://')){//comprobación de si la url contien 'http://',sino se lo agregamos delante.
			$linkEnla = 'http://'.$linkEnla;
		}
	}
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");

	$consPosts = $conex->query("SELECT count(idfk_user) as numPosts FROM blog WHERE month(fec_publicado)='$mesActual' AND idfk_user='$idUsuario'; ");
	$regisNumPosts = mysqli_fetch_assoc($consPosts);
	$numPostsUserMes = $regisNumPosts['numPosts']; //numero de comentarios de un usuario en un post.
	if($numPostsUserMes < 5){

		$insertar = $conex->query("INSERT INTO blog (id_blog,idfk_user,titulo,contenido,img_link,ext_link,categoria,fec_publicado) VALUES ('','$idUsuario','$titulo','$contenido','$linkimg','$linkEnla','$categoria','$fecHora'); ");
		desconectarDB01($conex);
		if($insertar){
			echo '<br>';
			cargarAlerts('success','','Post Registrado satisfactoriamente'); // Método alojado en "funciones_out.php", pudiendolo invocar por el "require_once 'funciones.php'".
		}else{
			echo '<br>';
			cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde');
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Has llegado al máximo de Post creados por ti, para este mes..sorry!');
	}
}

function guardarComentarioBlog($mensaje,$idBlog){
	$idUsuario = $_SESSION['id']; //recogemos el id del usuario logeado para ponerle como autor del comentario.
	$fecHora = date('Y-m-d H:i:s'); //Recogemos la fecha y la hora,(PREGUNTAR POR SI POSTEAN DESDE OTRO PAIS O EL SERVIDOR ESTA EN OTRO PAIS???)
	$mesActual = date('m');

	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consComent = $conex->query("SELECT count(idfk_user) as numComents FROM mensajesblog WHERE month(fec_publicado)='$mesActual' AND idfk_user='$idUsuario' AND idfk_blog='$idBlog'; ");
	$regisNumComents = mysqli_fetch_assoc($consComent);
	$numComentsUserMes = $regisNumComents['numComents']; //numero de comentarios de un usuario en un post.
	if($numComentsUserMes < 5){
		$insertar = $conex->query("INSERT INTO mensajesblog (id_mensaje,idfk_blog,idfk_user,mensaje,fec_publicado) VALUES ('','$idBlog','$idUsuario','$mensaje','$fecHora'); ");
		desconectarDB01($conex);
		if($insertar){
			echo '<br>';
			cargarAlerts('success','','Comentario Registrado satisfactoriamente'); // Método alojado en "funciones_out.php", pudiendolo invocar por el "require_once 'funciones.php'".
		}else{
			echo '<br>';
			cargarAlerts('danger','','Error en Base de datos.Intentelo más tarde'); //
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Has llegado al máximo de comentarios para este post..sorry!');
	}
}

function desactivarQuiniela($numJor){
	$conex = conectarDB01();
	$consResultados = $conex->query("SELECT id_resultado,activa FROM resultados WHERE jornada='$numJor'; ");
	if($consResultados){
		$flagError=0;
		while($regisResultado=mysqli_fetch_assoc($consResultados)){
			$idResultado=$regisResultado['id_resultado'];
			$uploadResultados = $conex->query("UPDATE resultados SET activa='2' WHERE id_resultado='$idResultado'; ");
			if(!$uploadResultados){
				$flagError=1;
			}
		}
		if($flagError != 1){
			echo '<br>';
			cargarAlerts('success','','Quiniela desactivada Satisfactoriamente');
		}else{
			echo '<br>';
			cargarAlerts('danger','','Error en Base de datos.Intentelo más tarde');
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Error en Base de datos.Intentelo más tarde');
	}
}

/*function reseteoContrasena($emailReg,$nuevoPass){  //Reseteo de contraseña directo a la tabla "Users".
	$conexion = conectarDB01();
	$resultconf = $conexion->query("SET NAMES 'utf8'");
	$consUsuario = $conexion->query("SELECT id_user FROM users WHERE email='$emailReg'; ");
	if(mysqli_num_rows($consUsuario)===1){
		$regisUser = mysqli_fetch_assoc($consUsuario);
		$idUsuario = $regisUser['id_user'];
		$updatePass = $conexion->query("UPDATE users SET password='$nuevoPass' WHERE id_user='$idUsuario'; ");
		if($consUsuario && $updatePass){
			cargarAlerts('success','','Cambio de contraseña satisfactorio');
		}else{
			cargarAlerts('danger','','Error en Base de datos.Intentelo más tarde');
		}
	}else{
		cargarAlerts('danger','','Usuario No registrado');
	}
	desconectarDB01($conexion);
}*/

function reseteoContrasena2($emailReg,$nuevoPass){  //Reseteo de contraseña usando la tabla user_temp con codigo,   ***MÁS SEGURO***
	$conexion = conectarDB01();						//y enviado email xa asegurarnos de q el usuario es el dueño de ese email.
	$resultconf = $conexion->query("SET NAMES 'utf8'");
	$consUsuario = $conexion->query("SELECT id_user,nombre,apellidos FROM users WHERE email='$emailReg'; ");
	$consUsuarioTemp = $conexion->query("SELECT id_user FROM users_temp WHERE email='$emailReg'; ");
	if($consUsuario && $consUsuarioTemp){
		if(mysqli_num_rows($consUsuario)===1){
			$regisUser=mysqli_fetch_assoc($consUsuario);
			$idUserReg=$regisUser['id_user'];
			$nombre=$regisUser['nombre'];
			$apellidos=$regisUser['apellidos'];
			if(mysqli_num_rows($consUsuarioTemp)===1){
				cargarAlerts('warning','','Cambio de contraseña Ya! solicitado, revise su correo "SPAM".(si lo ha borrado consulte con el Admin)');
			}else{
				$codigoReseteo = generarCodigoAlta(20,false);//generamos codigo de alta para enviar con el email de confirmacion de reseteo de passwor o nuevo password.
				$resultconf = $conexion->query("SET NAMES 'utf8'");//Siempre antes de insertar en la bbdd textos con posibles acentos o "ñ".
				$insert = $conexion->query("INSERT INTO users_temp (id_user,email,password,cod_activacion) VALUES ('idUserReg','$emailReg','$nuevoPass','$codigoReseteo');");
				//enviarEmailRegistro($nom,$ape,$e,$codigoAlta);//envió del email de activación
				desconectarDB01($conexion);
				if($insert){
					enviarEmailReseteoPass($nombre,$apellidos,$emailReg,$codigoReseteo);//envió del email para la confirmación de reseteo o nueva pass
					//cargarAlerts('success','','Proceso de cambio de contraseña realizado al 50%, Para finalizar, resetea tu contraseña mediante el email que recibirás en tu bandeja de entrada como "SPAM"..');
				}else{																// de un usuario registrado.
					cargarAlerts('danger','','Error en Base de datos.Intentelo más tarde');
				}																	
			}
		}else{
			cargarAlerts('danger','','Usuario No registrado');
		}
	}else{
		cargarAlerts('danger','','Error en Base de datos.Intentelo más tarde');
	}
}

function pruebaGuardarJugGol($numJu,$arayJug,$arayGoles){

	for($cnt=0;$cnt<count($arayJug);$cnt++){
		echo "<p>".$arayJug[$cnt]."</p>";
		echo "<p>".$arayGoles[$cnt]."</p>";
	}

}

?>