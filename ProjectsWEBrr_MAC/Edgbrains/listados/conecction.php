<?php

function conexion() {
	$con = mysql_connect("edgbrains.com", "dioxinet2", "do79py8o");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("edg_dbadmi", $con);
	return ($con);
}
function desconectar()
{
	mysql_close();
}
?>