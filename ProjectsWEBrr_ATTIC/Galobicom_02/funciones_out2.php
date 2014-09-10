<?php
require_once 'funciones.php';

$queFuncion = addslashes(strip_tags($_POST['funcionJor']));
$opcionCombo = addslashes(strip_tags($_POST['valueJor']));

echo 'funcion: '.$queFuncion.' Opcion Combo: '.$opcionCombo;

switch($queFuncion){
	case 0: cargarTablaResultPorJornada($opcionCombo);
			break;
	case 1: cargarTablaResultPorEquipos($opcionCombo);
			break;
}

function cargarTablaResultPorJornada($opcCom){
	$conex = conectarDB01();
	$resultconf = $conex->query("SET NAMES 'utf8'");
	$consulta = $conex->query("SELECT * FROM resultados WHERE jornada='$opcCom'; ");
	if($consulta){
			
		while($registro = mysqli_fetch_assoc($consulta)){
			$id_equipoA = $registro['idfk_equipoA'];
			$id_equipoB = $registro['idfk_equipoB'];
			$consultaA = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoA'; ");
			$registroA = mysqli_fetch_assoc($consultaA);
			$consultaB = $conex->query("SELECT nom_equipo FROM equipos WHERE id_equipo='$id_equipoB'; ");
			$registroB = mysqli_fetch_assoc($consultaB);
			echo "<tr>";
			echo "<td class='text-center'>".$opcCom."</td>";
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

function cargarTablaResultPorEquipos($opcCom){

}

?>