<?php
//FICHERO DE MÉTODOS, QUE SE INVOCAN A PARTIR DEL EVENTO DE UN ELEMENTO TIPO BUUTON,SELECT..ETC
// Y ESCUCHADO POR CÓDIGO JQUERY PARA RECOGER LOS VALORES DE OTROS ELEMENTOS IDENTIFICADOS(ID),
//Y A SUVEZ LLAMAR A ESTE FICHERO MEDIANTE AJAX Y CON LA OPCION DE FUNCION Q SE REQUIERE EJECUTAR Y
//LOS VARIABLES NECESARIAS.

// PÁGINA "realGalobo.php".

require_once 'funciones.php';

$queFuncion = addslashes(strip_tags($_POST['funcion']));
//$opcionCombo = addslashes(strip_tags($_POST['value']));
/*$titulo = addslashes(strip_tags($_POST['titulo']));
$contenido = addslashes(strip_tags($_POST['contenido']));
$linkimg = addslashes(strip_tags($_POST['linkimg']));
$linkEnla = addslashes(strip_tags($_POST['linkEnla']));*/

//echo 'funcion: '.$queFuncion.' Opcion Combo: '.$opcionCombo;

switch($queFuncion){
	case 0: $opcionCombo = addslashes(strip_tags($_POST['value']));//valor jornada
			cargarTablaResultPorJornada($opcionCombo);
			break;
	case 1: $opcionCombo = addslashes(strip_tags($_POST['value']));//id equipo
			cargarTablaResultPorEquipos($opcionCombo);
			break;
	case 2: $titulo = addslashes(strip_tags($_POST['titulo']));
			$contenido = addslashes(strip_tags($_POST['contenido']));
			$linkimg = addslashes(strip_tags($_POST['linkimg']));
			$linkEnla = addslashes(strip_tags($_POST['linkEnla']));
			guardarNoticiaRG($titulo,$contenido,$linkimg,$linkEnla);//insert en la "tabla noticiasga"
			break;
	case 3: $mensaje = addslashes(strip_tags($_POST['comentario']));
			$idNoticia = addslashes(strip_tags($_POST['idNoticia']));
			guardarComentarioRG($mensaje,$idNoticia); //insert en la tabla "mensajesga"
			break;
	case 4: $opcionCombo = addslashes(strip_tags($_POST['valueJor']));//valor jornada
			cargarComboEquipoA($opcionCombo);
			break;
	case 5: $opcionCombo = addslashes(strip_tags($_POST['value']));//id equipoA
			$opcionJornada = addslashes(strip_tags($_POST['valueJor']));//valor jornada
			cargarComboEquipoB($opcionCombo,$opcionJornada);
			break;
	case 6: $idEquiA = addslashes(strip_tags($_POST['idA']));//id equipoA.
			$idEquiB = addslashes(strip_tags($_POST['idB']));//id EquipoB.
			informarFechaHora($idEquiA,$idEquiB);
			break;
	case 7: $numJor= addslashes(strip_tags($_POST['jornada']));
			$idA = addslashes(strip_tags($_POST['idA']));
			$idB = addslashes(strip_tags($_POST['idB']));
			$golA = addslashes(strip_tags($_POST['golA']));
			$golB = addslashes(strip_tags($_POST['golB']));
			$fecHora = addslashes(strip_tags($_POST['fecHora']));
			$campoBoa = addslashes(strip_tags($_POST['campo']));
			
			$arayIdJugadoresGol = json_decode(stripslashes(addslashes(strip_tags($_POST['arayIdJug']))));
			$arayGolesJug = json_decode(stripslashes(addslashes(strip_tags($_POST['arayGoles']))));
			
			//$quini = addslashes(strip_tags($_POST['linkEnla'])); LE PONEMOS EL VALOR APARTIR DE LOS GOLES DE CADA EQUIPO.
			registrarPartidoYgoleadoresRG($numJor,$idA,$idB,$golA,$golB,$fecHora,$campoBoa,$arayIdJugadoresGol,$arayGolesJug);//insert en la "tabla resultados".
			break;
	case 8: $numJugadoresGol = addslashes(strip_tags($_POST['numJuGol']));
			cargarCombosJugadoresGolRG($numJugadoresGol);
			break;
	case 9: $numJornada = addslashes(strip_tags($_POST['numJor']));
			cargarTablaGoleadoresPorJornada($numJornada);
			break;
}

function cargarTablaResultPorJornada($opcCom){
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consulta = $conex->query("SELECT * FROM resultados WHERE jornada='$opcCom'; ");
	if($consulta){
			
		while($registro = mysqli_fetch_assoc($consulta)){
			if($registro['campo'] == 1){
				$campo='CD FÚTBOL 7';
			}else if($registro['campo'] == 2){
				$campo='FÚTBOL 7 1-A';
			}else if($registro['campo'] == 3){
				$campo='FÚTBOL 7 1-B';
			}
			$id_equipoA = $registro['idfk_equipoA'];
			$id_equipoB = $registro['idfk_equipoB'];
			$consultaA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoA'; ");
			$registroA = mysqli_fetch_assoc($consultaA); //Sacamos el nombre de los equipos apartir de su id(idfk..) de la tabla "equipos".
			$consultaB = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoB'; ");
			$registroB = mysqli_fetch_assoc($consultaB);
			echo "<tr>";
			echo "<td class='text-center'>".$opcCom."</td>";
			echo "<td class='text-center'>".$registroA['nom_equipo']."</td>";
			echo "<td class='text-center'>".$registroB['nom_equipo']."</td>";
			echo "<td class='text-center'>".$registro['gol_A']."-".$registro['gol_B']."</td>";
			if($registro['fec_hora']=='' || $registro['fec_hora']==null){
				echo "<td class='text-center'>No Jugado.</td>";
			}else{
				echo "<td class='text-center'>".$registro['fec_hora']."</td>";
			}
			echo "<td class='text-center'>".$campo."</td>";
			echo "</tr>";
		}
	}else{
		cargarAlerts('warning','sm','Error en Base de datos(db)');
	}
	desconectarDB01($conex);
}

function cargarTablaResultPorEquipos($opcCom){
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consulta = $conex->query("SELECT * FROM resultados WHERE idfk_equipoA='$opcCom' || idfk_equipoB='$opcCom'; ");
	if($consulta){

		while($registro = mysqli_fetch_assoc($consulta)){
			$id_equipoA = $registro['idfk_equipoA'];
			$id_equipoB = $registro['idfk_equipoB'];
			$consultaA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoA'; ");
			$registroA = mysqli_fetch_assoc($consultaA);
			$consultaB = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoB'; ");
			$registroB = mysqli_fetch_assoc($consultaB);
			echo "<tr>";
			echo "<td class='text-center'>".$registro['jornada']."</td>";
			echo "<td class='text-center'>".$registroA['nom_equipo']."</td>";
			echo "<td class='text-center'>".$registroB['nom_equipo']."</td>";
			echo "<td class='text-center'>".$registro['gol_A']."-".$registro['gol_B']."</td>";
			echo "</tr>";
		}
	}else{
		cargarAlerts('warning','sm','Error en Base de datos(db)');
	}
	desconectarDB01($conex);
}

function guardarNoticiaRG($titulo,$contenido,$linkimg,$linkEnla){
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

	$consNoti = $conex->query("SELECT count(idfk_user) as numNoti FROM noticiasga WHERE month(fec_publicado)='$mesActual' AND idfk_user='$idUsuario'; ");
	$regisNumNoticias = mysqli_fetch_assoc($consNoti);
	$numNoticiasUserMes = $regisNumNoticias['numNoti']; //numero de comentarios de un usuario en un post.
	if($numNoticiasUserMes < 5){

		$insertar = $conex->query("INSERT INTO noticiasga (id_noticia,idfk_user,titulo,contenido,img_link,ext_link,fec_publicado) VALUES ('','$idUsuario','$titulo','$contenido','$linkimg','$linkEnla','$fecHora'); ");
		desconectarDB01($conex);
		if($insertar){
			echo '<br>';
			cargarAlerts('success','','Noticia Registrada satisfactoriamente'); // Método alojado en "funciones_out.php", pudiendolo invocar por el "require_once 'funciones.php'".
			//header('location: realGalobo.php'); //METODO PARA ACTUALIZAR Y QUE SALGA EL POST, HAY QUE MEJORALO...
			//exit();
		}else{
			echo '<br>';
			cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde'); //
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Has llegado al máximo de Noticias creadas por ti, para este mes..sorry!');
	}
}

function guardarComentarioRG($mensaje,$idNoticia){
	$idUsuario = $_SESSION['id']; //recogemos el id del usuario logeado para ponerle como autor de la noticia.
	$fecHora = date('Y-m-d H:i:s'); //Recogemos la fecha y la hora,(PREGUNTAR POR SI POSTEAN DESDE OTRO PAIS O EL SERVIDOR ESTA EN OTRO PAIS???)
	$mesActual = date('m');

	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consComent = $conex->query("SELECT count(idfk_user) as numComents FROM mensajesga WHERE month(fec_publicado)='$mesActual' AND idfk_user='$idUsuario' AND idfk_noticia='$idNoticia'; ");
	$regisNumComents = mysqli_fetch_assoc($consComent);
	$numComentsUserMes = $regisNumComents['numComents']; //numero de comentarios de un usuario en un post.
	if($numComentsUserMes < 5){
		$insertar = $conex->query("INSERT INTO mensajesga (id_mensaje,idfk_noticia,idfk_user,mensaje,fec_publicado) VALUES ('','$idNoticia','$idUsuario','$mensaje','$fecHora'); ");
		desconectarDB01($conex);
		if($insertar){
			echo '<br>';
			cargarAlerts('success','','Comentario Registrado satisfactoriamente'); // Método alojado en "funciones_out.php", pudiendolo invocar por el "require_once 'funciones.php'".
			//header('location: realGalobo.php'); //METODO PARA ACTUALIZAR Y QUE SALGA EL POST, HAY QUE MEJORALO...
			//exit();    //NO FUNCIONAARRRR..
		}else{
			echo '<br>';
			cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde'); //
		}
	}else{
		cargarAlerts('danger','','Has llegado al máximo de comentarios para esta Noticia..sorry!');
	}
}

function cargarComboEquipoA($opcCom){
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consPartPorJor = $conex->query("SELECT count(jornada) as numPartPorJor FROM resultados WHERE jornada='$opcCom'; ");
	$registroCountPartPorJor = mysqli_fetch_assoc($consPartPorJor);
	$numPartPorJor = $registroCountPartPorJor['numPartPorJor'];
	$consNumJor = $conex->query("SELECT count(DISTINCT jornada) as JornadasJugadas FROM resultados; ");
	$registroCountJorJgadas = mysqli_fetch_assoc($consNumJor);
	$numJornadasJugadas = $registroCountJorJgadas['JornadasJugadas'];
	if($consNumJor){
		if($opcCom >= $numJornadasJugadas){//selecciona "Configurar Jornada Siguente"(confeccionar la jornada siguiente)(tema Admin), x lo que se pintan todos los equipos.en el "comboA", o "Jornada siguiente Sin configurar"(queda algun partido sin configurar)
			if($opcCom == $numJornadasJugadas){ //Si la jornada seleccionada es la penultima, xq ya se esta configurando la siguiente.
				if($numPartPorJor==5){ //si tiene el num de partidos por jornada (q es una constante) o no. ya configurados en bbdd,con o sin resultados.
					$consPartiJor = $conex->query("SELECT * FROM resultados WHERE jornada='$opcCom'; ");
						//echo "<select id='combEquiA' class='form-control' onchange=''>";
								echo "<option value=''>Elige Equipo Local/casa.</option>";
					while($regResultado = mysqli_fetch_assoc($consPartiJor)){
						if($regResultado['gol_A'] == NULL && $regResultado['gol_B'] == NULL){ //tb valdría regResultado['quiniela'] != 'NULL';
							$idfkequiA = $regResultado['idfk_equipoA'];
							$consIdequipoA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$idfkequiA'; ");
							$regEquipoA = mysqli_fetch_assoc($consIdequipoA);
								echo "<option value='".$idfkequiA."'>".$regEquipoA['nom_equipo']."</option>";
						}
					}
				}else{ //si no estan los configurados todos los partidos de la jornada
					$consPartidosJor = $conex->query("SELECT idfk_equipoA,idfk_equipoB FROM resultados WHERE jornada='$opcCom'; ");
						echo "<option value=''>Elige Equipo Local/casa.</option>";
					$i=0;	
					while($regPartiJor = mysqli_fetch_assoc($consPartidosJor)){ // en un array incluimos los id de equipos que tinen 
						//echo "<option value=''>-----</option>";				// configurado ya el partido de la jornada seleccionada
						$arayIdEquiNoPintar[$i]=$regPartiJor['idfk_equipoA'];
						//echo "<option value=''>".$arayIdEquiConf[$i]."</option>";
						$i++;
						$arayIdEquiNoPintar[$i]=$regPartiJor['idfk_equipoB'];
						//echo "<option value=''>".$arayIdEquiConf[$i]."</option>";
						$i++;
					}
					$consEquiEnCasa = $conex->query("SELECT idfk_equipoA FROM resultados WHERE jornada='$opcCom'-1; ");
					while($regEquiJorAnt = mysqli_fetch_assoc($consEquiEnCasa)){ //incluimos en el array los idS de los equipos que han jugado en 
						$arayIdEquiNoPintar[$i]= $regEquiJorAnt['idfk_equipoA'];// casa la jornada anterior.	
						$i++;
					} 
				 	 
					$consTodsEquipos = $conex->query("SELECT id_equipo,nom_equipo FROM equipos; "); //recorremos la tabla de equipos para pintar los nombres de equipos o no.
					while($regEquipo = mysqli_fetch_assoc($consTodsEquipos)){ //coinciden con los ids de equipos de cada partido registrado. 
						$flagPintar=0;
						for($cnt=0; $cnt<count($arayIdEquiNoPintar); $cnt++){
							if($regEquipo['id_equipo'] == $arayIdEquiNoPintar[$cnt]){
								$flagPintar++; //Flag para indicar que no se pinta en el comboA.
							}
						}
						if($flagPintar==0){ // se pinta en el comboA, ya que no coincide con ningun id de equipos ya configurados xa esa jornada.
							echo "<option value='".$regEquipo['id_equipo']."'>".$regEquipo['nom_equipo']."</option>";
						}	
					}
				}
			}else{//si es la jornada siguiente para configurar el primer partido.."Configurar Jornada Siguiente".
						echo "<option value=''>Elige Equipo Local/casa.</option>";
				$consTodsEquipos = $conex->query("SELECT id_equipo,nom_equipo FROM equipos; ");	
				while($regEquipo = mysqli_fetch_assoc($consTodsEquipos)){ //Se pintan todos los equipos...en comboA.
						//echo "<option value=''>idEqui: ".$regEquipo['id_equipo']."</option>";
					$flagPintar=0;
					$consEquiEnCasa = $conex->query("SELECT idfk_equipoA FROM resultados WHERE jornada='$opcCom'-1; ");
					while($regEquiJorAnt = mysqli_fetch_assoc($consEquiEnCasa)){
						//echo "<option value=''>idEquiCasa: ".$regEquiJorAnt['idfk_equipoA']."</option>";					
						if($regEquipo['id_equipo'] == $regEquiJorAnt['idfk_equipoA']){
							$flagPintar++;
						}
					}
					if($flagPintar==0){
						echo "<option value='".$regEquipo['id_equipo']."'>".$regEquipo['nom_equipo']."</option>";
					}
				}
			}
				
		}else{ // elige una jornada "incompleta (Informar Resultados)", puede ser que no se sepan los resultados(no se hayan publicado),se haya aplazado un partido,
			$consPartiJor = $conex->query("SELECT * FROM resultados WHERE jornada='$opcCom'; ");
						//echo "<select id='combEquiA' class='form-control' onchange=''>";
						echo "<option value=''>Elige Equipo Local/casa.</option>";
			while($regResultado = mysqli_fetch_assoc($consPartiJor)){  //Te pìnta en el comboA los equipos que juegan en esa jornada seleccionada.
				if($regResultado['gol_A'] == NULL && $regResultado['gol_B'] == NULL){ //tb valdría regResultado['quiniela'] != 'NULL';
					$idfkequiA = $regResultado['idfk_equipoA'];
					$consIdequipoA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$idfkequiA'; ");
					$regEquipoA = mysqli_fetch_assoc($consIdequipoA);
						echo "<option value='".$idfkequiA."'>".$regEquipoA['nom_equipo']."</option>";
				}
			}
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde'); //
	}
	desconectarDB01($conex);					
}	

function cargarComboEquipoB($opcCom,$opcJor){
	$conex = conectarDB01();
	$conex2 = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consNumJor = $conex->query("SELECT count(DISTINCT jornada) as JornadasJugadas FROM resultados; ");
	$registroCountJorJugadas = mysqli_fetch_assoc($consNumJor);
	$numJornadas = $registroCountJorJugadas['JornadasJugadas'];
	$consPartPorJor = $conex->query("SELECT count(jornada) as numPartPorJor FROM resultados WHERE jornada='$opcJor'; ");
	$registroCountPartPorJor = mysqli_fetch_assoc($consPartPorJor);
	$numPartPorJor = $registroCountPartPorJor['numPartPorJor'];
	if($consNumJor){
		if($opcJor >= $numJornadas){     //Posible ERROR!!x el == del segundo if.
			if($opcJor == $numJornadas){ // CONDICIONES CASI PARECIDAS AL COMBOA
				if($numPartPorJor == 5){
					$consPartiCasaEqui = $conex->query("SELECT * FROM resultados WHERE idfk_equipoA='$opcCom' AND jornada='$opcJor' ; ");//añadir al where q no haya null en los campos goles, o quiniela.
					$regIdEquiB = mysqli_fetch_assoc($consPartiCasaEqui);
					$idEquiB = $regIdEquiB['idfk_equipoB'];
					$consEquipo = $conex->query("SELECT id_equipo,nom_equipo FROM equipos WHERE id_equipo='$idEquiB'; ");
					$regEqui = mysqli_fetch_assoc($consEquipo);
					echo "<option value=''>Elige Equipo Visitante.</option>";
					echo "<option value='".$regEqui['id_equipo']."'>".$regEqui['nom_equipo']."</option>";
				}else{

					$consPartiCasaEqui = $conex->query("SELECT * FROM resultados WHERE idfk_equipoA='$opcCom'; ");
					$i=0;//cntador de partidos completados. Para saber con que equips ya ha jugado y no mostrarlos en el comboB.
					$z=0;//contador de partidos de idA que no han sido completados (x aplazamiento y estan en otra combinacion de combos)
					if($consPartiCasaEqui->num_rows > 0){
						while($regPartEqui = mysqli_fetch_assoc($consPartiCasaEqui)){
							if($regPartEqui['gol_A'] != NULL && $regPartEqui['gol_B'] != NULL){ //forma un array con los "idB" con los que ha jugado "idA", y sus resultados estan definidos(Podria ser:
								$arayNoPrint[$i] = $regPartEqui['idfk_equipoB'];            // un partido no jugado, o la proxima jornada, si es este caso, deben aparecer en el "comboB").
								$i++;
							}
							if($regPartEqui['gol_A'] == NULL && $regPartEqui['gol_B'] == NULL){
								$arayNoComple[$z] = $regPartEqui['idfk_equipoB'];//id de equiposB con los que EquipoA tiene el partido pendiente.
								$z++;
							}
						}
					}else{
						$arayNoComple[]=''; //para que NO pete cuando la consulta no obtiene ningun resultado.
					}
					$consPartiUltiJornada = $conex->query("SELECT idfk_equipoA,idfk_equipoB FROM resultados WHERE jornada='$opcJor'; ");
					while($regPartiJor = mysqli_fetch_assoc($consPartiUltiJornada)){ //le añadimos al array de idsB los id de los equipos  
						$arayNoPrint[$i] = $regPartiJor['idfk_equipoA'];		//que tienen registrado un partido para la misma jornada.
						$i++;
						$arayNoPrint[$i] = $regPartiJor['idfk_equipoB'];
						$i++;
					}
					$consEquiEnCasa = $conex->query("SELECT idfk_equipoB FROM resultados WHERE jornada='$opcJor'-1; ");
					while($regEquiJorAnt = mysqli_fetch_assoc($consEquiEnCasa)){ //incluimos en el array los idS de los equipos que han jugado fuera 
						$arayNoPrint[$i]= $regEquiJorAnt['idfk_equipoB'];// de casa la jornada anterior.	
						$i++;
					} 					   		 
					$consTodsEquipos = $conex->query("SELECT id_equipo,nom_equipo FROM equipos; ");
								echo "<option value=''>Elige Equipo Visitante.</option>";
					while($regPartEqui = mysqli_fetch_assoc($consTodsEquipos)){ //Vamos a comparar los id del array con los id de la tabla equipos, el que esta en el arra no se le pinta su nom en "comboB".
							$flagNoPintar = 0; //bandera de si se pinta el nombre del equipo segun la logica siguiente..
							for($cnt=0; $cnt < count($arayNoPrint); $cnt++){
								if($regPartEqui['id_equipo'] == $arayNoPrint[$cnt]){ //el partido ya se jugo, esta completado, no se pinta en comboB
									$flagNoPintar++;
								}
							}
							if($regPartEqui['id_equipo'] == $opcCom){//si es el mismo equipo logicamente no se pinta en comboB
								$flagNoPintar++;
							}
							if($flagNoPintar == 0){ // si es =0 se pinta, ya que no ha habido coincidencias ,de si el partido ya se ha jugado o es el mismo id de equipo. 
								$flagNopintar2 = 0;
								for($cnt=0; $cnt < count($arayNoComple); $cnt++){ //procedemos a ver de que manera pintamos el nombre del equipo contrario si available xq es un partido q todavia tiene q disputarse.
									if($regPartEqui['id_equipo'] == $arayNoComple[$cnt]){ //o es un partido aplazado q todavia no se ha podido disputar..entonces se pinta disabled, Y CON MENSAJE RECORDATORIO.
										echo "<option value='".$regPartEqui['id_equipo']."' disabled>".$regPartEqui['nom_equipo']." - Partido Aplazado en Jornada anterior[COMPLETAR!!].</option>";
										$flagNopintar2++;
									}
								}
								if($flagNopintar2 == 0){
										echo "<option value='".$regPartEqui['id_equipo']."'>".$regPartEqui['nom_equipo']."</option>";
								}
							}else{
								for($cnt=0; $cnt < count($arayNoComple); $cnt++){
									if($regPartEqui['id_equipo'] == $arayNoComple[$cnt]){desconectarDB01($conex);
										echo "<option value='".$regPartEqui['id_equipo']."' disabled>".$regPartEqui['nom_equipo']." - Partido Aplazado en Jornada anterior[COMPLETAR!!].</option>";
									}
								}
							}
					}		
				}
			}else{//se va a configurar el primer partido de la siguiente jornada, ya que ha seleccionado "configurar siguiente jornada".
				$consPartiCasaEqui = $conex->query("SELECT * FROM resultados WHERE idfk_equipoA='$opcCom'; ");
					$i=0;//cntador de partidos completados. Para saber con que equips ya ha jugado y no mostrarlos en el comboB.
					$z=0;//contador de partidos de idA que no han sido completados (x aplazamiento y estan en otra combinacion de combos)
					while($regPartEqui = mysqli_fetch_assoc($consPartiCasaEqui)){
						if($regPartEqui['gol_A'] != NULL && $regPartEqui['gol_B'] != NULL){ //forma un array con los "idB" con los que ha jugado "idA", y sus resultados estan definidos(Podria ser:
							$arayCompletados[$i] = $regPartEqui['idfk_equipoB'];            // un partido no jugado, o la proxima jornada, si es este caso, deben aparecer en el "comboB").
							$i++;
						}
						if($regPartEqui['gol_A'] == NULL && $regPartEqui['gol_B'] == NULL){
							$arayNoComple[$z] = $regPartEqui['idfk_equipoB'];//id de equiposB con los que EquipoA tiene el partido pendiente.
							$z++;
						}
					}
					$consEquiEnCasa = $conex->query("SELECT idfk_equipoB FROM resultados WHERE jornada='$opcJor'-1; ");
					while($regEquiJorAnt = mysqli_fetch_assoc($consEquiEnCasa)){ //incluimos en el array "arayCompletados" los idS de los equipos que han jugado fuera
						$arayCompletados[$i]= $regEquiJorAnt['idfk_equipoB'];// de casa la jornada anterior.	
						$i++;
					} 
					$consTodsEquipos = $conex->query("SELECT id_equipo,nom_equipo FROM equipos; ");
								echo "<option value=''>Elige Equipo Visitante.</option>";
					while($regPartEqui = mysqli_fetch_assoc($consTodsEquipos)){ //Vamos a comparar los id del array con los id de la tabla equipos, el que esta en el arra no se le pinta su nom en "comboB".
							$flagPintar = 0; //bandera de si se pinta el nombre del equipo segun la logica siguiente..
							for($cnt=0; $cnt < count($arayCompletados); $cnt++){
								if($regPartEqui['id_equipo'] == $arayCompletados[$cnt]){ //el partido ya se jugo, esta completado, no se pinta en comboB
									$flagPintar++;
								}
							}
							if($regPartEqui['id_equipo'] == $opcCom){//si es el mismo equipo logicamente no se pinta en comboB
								$flagPintar++;
							}
							if($flagPintar == 0){ // si es =0 se pinta, ya que no ha habido coincidencias ,de si el partido ya se ha jugado o es el mismo id de equipo. 
								$flagYaPintado = 0; //procedemos a ver de que manera pintamos el nombre del equipo contrario si available xq es un partido q todavia tiene q disputarse
								for($cnt=0; $cnt < count($arayNoComple); $cnt++){ //o es un partido aplazado q todavia no se ha podido disputar..entonces se pinta disabled..
									if($regPartEqui['id_equipo'] == $arayNoComple[$cnt]){
										$flagYaPintado++;
										echo "<option value='".$regPartEqui['id_equipo']."' disabled>".$regPartEqui['nom_equipo']." - Partido Aplazado en Jornada anterior[COMPLETAR!!].</option>";
									}
								}
								if($flagYaPintado==0){
									echo "<option value='".$regPartEqui['id_equipo']."'>".$regPartEqui['nom_equipo']."</option>";
								}
							}
					}
			}
		}else{ //hemos seleccionado un partido pendiente de completar "Incomplet (Informar Resultados)"..
			$consPartiCasaEqui = $conex->query("SELECT * FROM resultados WHERE idfk_equipoA='$opcCom' AND jornada='$opcJor' ; ");//añadir al where q no haya null en los campos goles, o quiniela.
			$regIdEquiB = mysqli_fetch_assoc($consPartiCasaEqui);
			$idEquiB = $regIdEquiB['idfk_equipoB'];
			$consEquipo = $conex->query("SELECT id_equipo,nom_equipo FROM equipos WHERE id_equipo='$idEquiB'; ");
			$regEqui = mysqli_fetch_assoc($consEquipo);
			echo "<option value=''>Elige Equipo Visitante.</option>";
			echo "<option value='".$regEqui['id_equipo']."'>".$regEqui['nom_equipo']."</option>";
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde');
	}
	desconectarDB01($conex);
}

function informarFechaHora($idEquipoA,$idEquipoB){ //Método para informar la fecha y hora cuando este registrada o poner un mensaje informatorio como
	$conex = conectarDB01();					   // "No definido" Partido Aplazado, para el input de fecha y hora..
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consExiste = $conex->query("SELECT fec_hora FROM resultados WHERE idfk_equipoA='$idEquipoA' AND idfk_equipoB='$idEquipoB'; ");
	if($consExiste){
		if($consExiste->num_rows > 0){
			$regPartido = mysqli_fetch_assoc($consExiste);
			$fechaHora = $regPartido['fec_hora'];
			if(!$fechaHora){ $fechaHora='No definidas.(Partido aplazado)';}
			echo "<label class=''>Fecha y hora del Encuentro:</label>";
            echo "<input class='form-control' type='text' id='fechorapart' placeholder='".$fechaHora."' disabled></input>";
		}else{
			echo "<label class=''>Fecha y hora del Encuentro:</label>";
            echo "<input class='form-control' type='datetime-local' id='fechorapart' required></input>";
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde');
	}
	desconectarDB01($conex);
}

function registrarPartidoYgoleadoresRG($numJornada,$idEquipoA,$idEquipoB,$golA,$golB,$fecHora,$campoBoa,$arayIdJug,$arayGol){  //Método para insertar o actualizar los registros de la tabla "resultados".
	$quiniela='';
	if($golA!='' && $golB!=''){  //Sacar el valor de quiniela 1-x-2.
		if($golA == $golB){
			$quiniela = 'x'; //lo ponemos a X xq a "0" daba problemas con Jquery y AJAX..el valos de la quiniela lo 
		}else if($golA < $golB){ // calculamos en donde sea necesario a partir de los goles.
			$quiniela = 2;
		}else{
			$quiniela = 1;
		}
	}else{
		$golA = ''; //si no se saben los resultados, aplazamientos o configurando la jornada siguiente..
		$golB = '';
	}
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consExiste = $conex->query("SELECT id_resultado FROM resultados WHERE idfk_equipoA='$idEquipoA' AND idfk_equipoB='$idEquipoB' AND jornada='$numJornada'; ");
	if($consExiste){
		if($consExiste->num_rows > 0){ //Significa que este partido ya esta registrado porque es un partido atrasado o esta configurado xa una jornada siguiente(UPDATE).
			$regPartido = mysqli_fetch_assoc($consExiste);  //significando que el usuario le va informar los goles, y quiniela.
			$idPartidoRes = $regPartido['id_resultado'];
			$update = $conex->query("UPDATE resultados SET gol_A='$golA', gol_B='$golB',quiniela='$quiniela' WHERE id_resultado='$idPartidoRes'; ");
			if($update){
				echo '<br>';
				cargarAlerts('success','','Partido Actualizado Satisfactoriamente..');
			}else{
				echo '<br>';
				cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde');
			}

		}else{
			if($golA == '' && $golB == ''){ //Significa que los valores de Goles y quiniela los insertamos a NULL.-> Configurando jornada futura.
				$insert = $conex->query("INSERT INTO resultados (id_resultado,idfk_equipoA,idfk_equipoB,gol_A,gol_B,jornada,fec_hora,campo,quiniela,activa) VALUES ('','$idEquipoA','$idEquipoB',NULL,NULL,'$numJornada','$fecHora','$campoBoa',NULL,1); ");
			}else{
				$insert = $conex->query("INSERT INTO resultados (id_resultado,idfk_equipoA,idfk_equipoB,gol_A,gol_B,jornada,fec_hora,campo,quiniela,activa) VALUES ('','$idEquipoA','$idEquipoB','$golA','$golB','$numJornada','$fecHora','$campoBoa','$quiniela',1); ");
			}
			if($insert){
				echo '<br>';
				cargarAlerts('success','','Partido registrado Satisfactoriamente..');
			}else{
				echo '<br>';
				cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde');
			}
		}
	}
	desconectarDB01($conex);
	if($quiniela!='' || $quiniela==='x'){ //EL 0 Q ES UN POSIBLE VALOR REAL DE QUINIELA PHP LO INTERPRETA TB COMO NULL..O ESO PARECE.
		updatesTablaEquipos($idEquipoA,$idEquipoB,$golA,$golB); //funcion en "funciones_utils.php".
		if(count($arayIdJug) != 0 ){
			updateTablaJugadoresGol($idPartidoRes,$numJornada,$arayIdJug,$arayGol);
		}
		updateTablaPuntosQuiniela($idPartidoRes,$numJornada,$quiniela,$arayIdJug,$arayGol);
	}     
}

function cargarCombosJugadoresGolRG($numJug){ //esto pinta segun el num de jugadores diferentes q han marcado gol
	$con = conectarDB01();					// un numero de inpu xa seleccionar el nom del jugador y los goles q ha metido.
	$resultconf = $con->query("SET NAMES 'utf8'");
	$consJugadores = $con->query("SELECT id_jugador,nom_camiseta FROM jugadoresga; ");
	if($consJugadores){
		for($cnt=1;$cnt<=$numJug;$cnt++){
				echo "<div id='divJugadores0".$cnt."' class='col-sm-6'>";
				echo "<label for='' class=''>Jugador con MOJO:</label>";
	            echo "<select id='selJugadores0".$cnt."' class='form-control' onchange='valoresIdJugadoresGol(this);' required>";
				echo "<option value=''>Selecciona al jugador que ha mojado.</option>";
			while($regisJugador = mysqli_fetch_assoc($consJugadores)){
				echo "<option value='".$regisJugador['id_jugador']."'>".$regisJugador['nom_camiseta']."</option>";
			}
				echo "</select>";
				echo "</div>";
				echo "<div id='divGoles0".$cnt."' class='col-sm-6'>";
				echo "<label for='' class=''>Cuntos goles:</label>";
	            echo "<select id='goles0".$cnt."' class='form-control' onChange='valoresGolesJugador(this);' required>";
				echo "<option value=''>Número de goles del Jugador.</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>";
				echo "<option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option>";
				echo "</select>";
				echo "</div>";
			mysqli_data_seek($consJugadores,0);//reiniciar el array de registros a la poasición 0.
		}
	}else{
		echo '<br>';
		cargarAlerts('danger','','Error en Base de datos(DB_ruvio01).Intentelo más tarde');
	}
	desconectarDB01($con);
}	

function cargarTablaGoleadoresPorJornada($numJornada){
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT id_resultado FROM resultados WHERE jornada='$numJornada' AND (idfk_equipoA='1' OR idfk_equipoB='1'); ");
	$regisResultado = mysqli_fetch_assoc($consulta);
	$idResultado = $regisResultado['id_resultado'];
	$consGoleadores = $conect->query("SELECT idfk_jugador,goles FROM jugadores_goles WHERE idfk_resultado='$idResultado'; ");
	if($consulta && $consGoleadores){
   	  if($consGoleadores->num_rows > 0){
		while($regisGoleadores = mysqli_fetch_assoc($consGoleadores)){
			$idJugador = $regisGoleadores['idfk_jugador'];
			$consNomJugador = $conect->query("SELECT nom_camiseta,id_jugador FROM jugadoresga WHERE id_jugador='$idJugador'; ");
			$regisJugador = mysqli_fetch_assoc($consNomJugador);
			
?>	
			<tr>
                <td class="text-center"><?php echo $regisJugador['id_jugador']." - ".$regisJugador['nom_camiseta']; ?></td>
                <td class="text-center"><?php echo $regisGoleadores['goles']; ?></td>
            </tr>
<?php
		} 
	  }else{
		cargarAlerts('warning','sm','No hay Goles (o sois bunta pelotuda,o todavía no se ha disputado el encuentro)');
	  }
	 }else{
	 	cargarAlerts('warning','sm','Error en Base de datos(db)');
	 }
	desconectarDB01($conect);
}
?>