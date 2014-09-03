<?php

require 'funciones.php';

function cargarPaginacionPrueba($maxelempag1){
	$iduser = $_SESSION['id'];
	if(!isset($_GET['npag'])){ //Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagActual = 1;
	}else{
		$pagActual = addslashes(strip_tags($_GET['npag']));
	}

	echo $iduser;
 	echo $maxelempag1;
 	echo $pagActual;

	$conexion = conectarDB01();
	$configDatos = $conexion->query("SET NAMES 'utf8';");
	$consulta = $conexion->query("SELECT COUNT(*) as total FROM links WHERE id_user2='$iduser'; "); //esta consulta devuelve un registro con un dato, con el número de resultados que ha recuperado.
	//$registro = mysqli_fetch_assoc($consulta); //
	$registro = $consulta->fetch_assoc();
	desconectarDB($conexion);
	$totalRegistros = $registro['total']; //cálculo del num de páginas a partir del num de registros recuperados.
	
	$paginas = ceil($totalRegistros / $maxelempag1);

	echo '<p>&nbsp;</p>';
	echo '<div class="row text-center">'; //pintamos el bloque de botones para la paginación.
	echo '<ul class="pagination">';
	for($cnt = 1; $cnt <= $paginas; $cnt++){
		if($cnt == $pagActual){ //Pintamos los botones de paginación, e inhabilitamos el botón del num de páginación en la que nos encontramos.
			echo '<li class="disabled"><a href="favoritos.php?npag=' . $cnt . '">' . $cnt . '</a></li>';
		}else{
			echo '<li><a href="favoritos.php?npag=' . $cnt . '">' . $cnt . '</a></li>';
		}

	}
			echo '</ul>';
			echo '</div>';
}

cargarPaginacionPrueba(4);

?>