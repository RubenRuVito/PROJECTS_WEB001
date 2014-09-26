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
			cargarQuinielaGa($opcionCombo);
			break;
}

function cargarQuinielaGa($opcJor){ //valor de una jornada futura "jornada configurada", que esta configurada pero sin los resultados.
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consJorConfig = $conex->query("SELECT * FROM resultados WHERE jornada='$opcJor'; ");
	if($consJorConfig){
		while($registro = mysqli_fetch_assoc($consJorConfig)){
			$id_partido = $registro['id_resultado']; //id del partido jugado ( identifica un partido unico de la tabla resultados).
			$id_equipoA = $registro['idfk_equipoA'];
			$id_equipoB = $registro['idfk_equipoB'];
			$consultaA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoA'; ");
			$registroA = mysqli_fetch_assoc($consultaA); //Sacamos el nombre de los equipos apartir de su id(idfk..) de la tabla "equipos".
			$consultaB = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoB'; ");
			$registroB = mysqli_fetch_assoc($consultaB);
			echo "<tr>";
			echo "<td class='text-center'>".$id_partido."</td>";
			echo "<td class='text-center'>".$opcJor."</td>";
			echo "<td class='text-center'>".$registroA['nom_equipo']."</td>";
			echo "<td class='text-center'>".$registroB['nom_equipo']."</td>";
			echo "<td id='".$id_partido."' class='text-center'> <input type='radio' name='quini".$id_partido."' id='quini".$id_partido."' value='1'> ";
			echo "<input type='radio' name='quini".$id_partido."' id='quini".$id_partido."' value='0' checked> <input type='radio' name='quini".$id_partido."' id='quini".$id_partido."' value='2'></td>";
			echo "</tr>";
		}
	}else{
		cargarAlerts('warning','sm','Error en Base de datos(db)');
	}
	desconectarDB01($conex);

}