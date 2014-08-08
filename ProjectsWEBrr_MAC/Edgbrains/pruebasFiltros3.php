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
    
    function desconectar(){
    	mysql_close();
    }

	function combouno(){
	    	
	    	echo "cargando combo1..";
	    	conectar();
	    	$consulta = mysql_query("SELECT id, nombre FROM centros");
	    	#Cerramos la conexion con la base de datos
	    	#desconectar();
	    	echo "<select name='centros' id='centros' onChange='cargaContenido(this.id)'>";
	    	echo "<option value='0'>Elige</option>";
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
			conectar();
			$codCurso=$_POST["codcurso"];
			echo ("");
			$sql="SELECT * FROM cv_solicitud_curso_verano WHERE id_curso_solicitado='$codCurso'";
			
			if(!$resultado = $conexion->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $conexion->error . ']');
			}
			
			while($row = $resultado->fetch_assoc()){
			
				// $fila es un arreglo asociativo con todos los campos que se pusieron en el select
			
				//echo '<br/>';
				//echo $row['id_curso_solicitado'] . '<br/>';
				echo "<tr><td width=\"25%\"><font face=\"verdana\">" . $row['id'] . "</font></td></br>";
			
			}
			$conexion->close();

		
	}
       
       
?>

<<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

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
						<option value="0">Selecciona opci—n...</option>
					</select>
				</div>
				<div id="demoIzq"><?php combouno(); ?></div>
			</div>
			
			
</body>
</html>
 