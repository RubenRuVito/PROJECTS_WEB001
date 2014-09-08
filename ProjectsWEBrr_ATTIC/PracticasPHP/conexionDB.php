<?php

function conexion() {
	$con = mysql_connect("localhost", "root_ruben01", "ruben01");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	//mysql_select_db("edg_dbadmi_dump01", $con);
	mysql_select_db("cdcol", $con);
	return ($con);
}
$con=conexion();
mysql_query("SET NAMES 'utf8'");
$res=mysql_query("select * from cds",$con);

echo '<table class="table table-responsive table-striped" border="1">';
	echo '<tr>';
	echo '<th>columna1</th>'; 
	echo '<th>columna2</th>';
	echo '<th>columna3</th>';
	echo '<th>columna4</th>';
	echo '</tr>';

	while ($registro=mysql_fetch_array($res)){
		echo '<tr>';
		echo '<td>' . $registro['id'] . '</td>';
		echo '<td>' . $registro['titel'] . '</td>';
		echo '<td>' . $registro['interpret'] . '</td>';
		echo '<td>' . $registro['jahr'] . '</td>';
		echo '</tr>';
	}
	echo '</table>';
?>