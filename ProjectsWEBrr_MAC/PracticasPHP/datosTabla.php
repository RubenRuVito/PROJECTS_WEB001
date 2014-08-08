<?php
	//$conexion = new mysqli('Ip_Servidor_127.0.0.1','User@root','password','nom_bbdd');
	//$conexion = new mysqli('localhost','root','','cdcol');
	//$conexion = new mysqli('127.0.0.1','root','','cdcol');
	$conexion = new mysqli('localhost','root_ruben01','ruben01','cdcol');
	$res = $conexion->query("SELECT * FROM cds");

	echo '<table class="table table-responsive table-striped table-bordered">';
	echo '<tr>';
	echo '<th>columna1</th>'; 
	echo '<th>columna2</th>';
	echo '<th>columna3</th>';
	echo '<th>columna4</th>';
	echo '</tr>';

	while ($registro = $res->fetch_assoc()){
		echo '<tr>';
		echo '<td>' . $registro['id'] . '</td>';
		echo '<td>' . $registro['titel'] . '</td>';
		echo '<td>' . $registro['interpret'] . '</td>';
		echo '<td>' . $registro['jahr'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
?>