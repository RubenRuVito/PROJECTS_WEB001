<?php
function generaCentros()
{
	include 'conecction.php';
	conexion();
	$consulta=mysql_query("SELECT id, nombre FROM centros");
	desconectar();
	echo "estoy dentro de la funcion Recuperar nombre de Centros ";
	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='centros' id='centros' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>AJAX, Ejemplos: Combos (select) dependientes, codigo fuente - ejemplo</title>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js"></script>
</head>

<body>

			<div id="demo" style="width:600px;">
				<div id="demoDer">
					<select disabled="disabled" multiple data-rel="chosen" name="cursos" id="cursos">
						<option value="0">Selecciona opción...</option>
					</select>
				</div>
				<div id="demoIzq"><?php generaCentros(); ?></div>
			</div>
			
</body>
</html>