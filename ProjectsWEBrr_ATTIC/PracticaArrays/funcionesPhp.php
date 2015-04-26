<?php
//FICHERO DE MÉTODOS, QUE SE INVOCAN A PARTIR DEL EVENTO DE UN ELEMENTO TIPO BUUTON,SELECT..ETC
// Y ESCUCHADO POR CÓDIGO JQUERY PARA RECOGER LOS VALORES DE OTROS ELEMENTOS IDENTIFICADOS(ID),
//Y A SUVEZ LLAMAR A ESTE FICHERO MEDIANTE AJAX Y CON LA OPCION DE FUNCION Q SE REQUIERE EJECUTAR Y
//LOS VARIABLES NECESARIAS.

// PÁGINA "realGalobo.php".

require_once 'funciones.php';

$queFuncion = addslashes(strip_tags($_POST['funcion']));

switch($queFuncion){
	case 0: $numJugadoresGol = addslashes(strip_tags($_POST['numJuGol']));
			cargarCombosJugadoresGolRG($numJugadoresGol);
			break;
	case 1: $arayIdsJugadoresGol = json_decode(stripslashes(addslashes(strip_tags($_POST['ArayIds']))));
			$arayGoles = json_decode(stripslashes(addslashes(strip_tags($_POST['ArayGoles']))));
			visualizarTablaJugadoresGoles($arayIdsJugadoresGol,$arayGoles);
			break;

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

function visualizarTablaJugadoresGoles($arayIdsJugadoresGol,$arayGoles){
	echo '<table class="table table-responsive table-striped table-bordered">';
	echo '<tr>';
	echo '<th>Id. Jugadores</th>'; 
	echo '<th>Goles</th>';
	
	echo '</tr>';

	for($cnt=0; $cnt<count($arayIdsJugadoresGol); $cnt++){
		echo '<tr>';
		echo '<td>' . $arayIdsJugadoresGol[$cnt] . '</td>';
		echo '<td>' . $arayGoles[$cnt] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
}
?>