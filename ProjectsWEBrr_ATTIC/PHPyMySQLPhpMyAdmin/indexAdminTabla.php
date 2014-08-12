<?php
	//$conexion = new mysqli('Ip_Servidor_127.0.0.1','User@root','password','nom_bbdd');
	//$conexion = new mysqli('localhost','root','','cdcol');
	//$conexion = new mysqli('127.0.0.1','root','','cdcol');
	$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
	$res = $conexion->query("SELECT * FROM cds01");

	echo '<!DOCTYPE html>';
	echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">';
	echo '<head>';
	echo '<title>Tabla CDs</title>';
	echo '<meta charset="utf-8">';
	echo '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">';
	echo '<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">';
	echo '<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>';
	echo '<script type="text/javascript" src="js/bootstrap.min.js"></script>';
	echo '</head>';
	echo '<body>';
	echo '<div class="col-xs-12 col-sm-6 col-md-8">';
	echo '<table class="table table-responsive table-striped table-bordered">';
	echo '<tr>';
	echo '<th>ID</th>'; 
	echo '<th>TÍTULO</th>';
	echo '<th>AUTOR</th>';
	echo '<th>AÑO</th>';
	echo '<th>&nbsp;</th>';
	echo '</tr>';

	while ($registro = $res->fetch_assoc()){
		echo '<tr>';
		echo '<td>' . $registro['id_cd'] . '</td>';
		echo '<td>' . $registro['titulo'] . '</td>';
		echo '<td>' . $registro['autor'] . '</td>';
		echo '<td>' . $registro['ano'] . '</td>';
		echo '<td>';
		echo '<a href="formEditarRegistro.php?id='.$registro['id_cd'].'"><img src="img/editar.gif"></a>';
		echo '<a href="eliminarRegistro.php?id='.$registro['id_cd'].'"><img src="img/eliminar.png"></a>';
		echo '</td>';
		echo '</tr>';
	}
	echo '</table>';
	echo '</div>';
	echo '<a href="formNuevoRegistro.php">Nuevo CD</a>';
	echo '</body>';
	echo '</html>';
	$conexion->close();
?>