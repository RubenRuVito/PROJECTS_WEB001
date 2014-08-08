 <?php 
	    
    function conectar(){
	    //Crear conexion
	    $conexion = new mysqli('edgbrains.com','dioxinet2','do79py8o','edg_dbadmi');
	    //comprobar conexion..
	    if($conexion->connect_errno > 0){
	    	die('Imposible conectar [' . $conexion->connect_error . ']');
	    	// Error...No conectado
	    }else{
	    	echo "Conectado..";
	    	// conectado con la bbdd
	    }
	    return ($conexion);
    }
    
    function conexion() {
    	$con = mysql_connect("edgbrains.com", "dioxinet2", "do79py8o");
    	if (!$con) {
    		die('Could not connect: ' . mysql_error());
    	}
    	mysql_select_db("edg_dbadmi", $con);
    	return ($con);
    }
   
    function desconectar(){
    	mysql_close();
    }

	function combo1(){
	    	
	    	echo "cargando combo1..";
	    	conexion();
	    	$consulta = mysql_query("SELECT id, nombre FROM centros");
	    	#Cerramos la conexion con la base de datos
	    	#desconectar();
	    	
	    	while($registro=mysql_fetch_row($consulta))
	    	{
	    		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	    	}
	    	echo "</select>";
			/*$sqlcombo2="SELECT * FROM cvsys_cursos_verano WHERE id='$opcion'";
	
			if(!$result = $db->query($sqlcombo2)){
				die('Ocurrio un error ejecutando el query [' . $db->error . ']');
			}
			if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
			{
				$combo2="";
				while ($row = $result->fetch_array(MYSQLI_ASSOC))
				{
					$combo2 .=" <option value='".$row['id']."'>".$row['titulo']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
				}
			}
			else
			{
				echo "No hubo resultados";
			}*/

		}
	    
    	
	function consultaFiltrada(){

    	
     	//if ($_POST["submit"]){
			/*//Crear conexion
			$db = new mysqli('edgbrains.com','dioxinet2','do79py8o','edg_dbadmi');
			//comprobar conexion..
			if($db->connect_errno > 0){
				die('Imposible conectar [' . $db->connect_error . ']');
				// Error...No conectado
			}else{
				echo "Conectado..";
				// conectado con la bbdd
			}*/
			conexion();
			$codCurso=$_POST["codcurso"];
			echo "$codCurso";
			$sql=mysql_query("SELECT * FROM cv_solicitud_curso_verano WHERE id_curso_solicitado='$codCurso'");
			
			/*if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			}*/
			
			//while($row = $resultado->fetch_assoc()){
			while($registro=mysql_fetch_row($sql))
			{
				// $fila es un arreglo asociativo con todos los campos que se pusieron en el select
			
				//echo '<br/>';
				//echo $row['id_curso_solicitado'] . '<br/>';
				echo "<tr><td width=\"25%\"><font face=\"verdana\">" . $registro['id'] . "</font></td></br>";
			
			}
			desconectar();

		
	}
       
       
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>AJAX, Ejemplos: Combos (select) dependientes, codigo fuente - ejemplo</title>
<link rel="stylesheet" type="text/css" href="select_dependientes.css">
<script type="text/javascript" src="select_dependientes.js">
	function consultaFiltradaJS(cod){
	  <?php 
	  $codi=cod;
	  consultaFiltrada(cod)?>
	}
</script>
</head>

<body>

			<div id="demo" style="width:600px;">
				<div id="demoDer">
					<select disabled="disabled" name="cursos" id="cursos">
						<option value="0">Selecciona opción...</option>
					</select>
				</div>
				<div id="demoIzq">
					<select name='centros' id='centros' onChange='cargaContenido(this.id)'>
					<option value="0">Elige...</option>
					<?php combo1(); ?>
				</div>
			</div>
			 <input type="text" placeholder="" name="codigo_curso" value="" id="codcurso" required>
             <input id="submit" name="submit" type="submit" value="Buscar" onClick="consultaFiltradaJS(codcurso)">
	
	<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
			<td><font face="verdana"><b>Codigo Curso</b></font></td>
			<td><font face="verdana"><b>Cliente</b></font></td>
			<td><font face="verdana"><b>Importe</b></font></td>
			<td><font face="verdana"><b>Fecha</b></font></td>
		</tr>
	</table>
			
</body>
</html>
 