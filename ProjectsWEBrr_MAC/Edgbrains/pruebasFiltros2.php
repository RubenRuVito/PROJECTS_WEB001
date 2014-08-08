<!DOCTYPE HTML>

<header class="principal">
     <h1>Colegio EdgBrains</h1>
     <script type="text/javascript">
		<!-- function combo2(opcion){
			
			document.writeln(opcion);
		}-->


     </script>
</header>
<section class="principal">
     <!-- Aqui irá nuestro formulario -->
    <form method=post action=<?php consultaFiltrada(); ?>>
       <!-- <select name="Colegios" label="Colegios" onchange="javascript:combo2(this.value)"> -->
       <select name="Colegios" label="Colegios" onchange="">
       		<optgroup label="Seleccionar Colegio">
       			<option value="0">Elige</option>
       			<?php combo1();?>
                <!--  <option value="1">Brains La Moraleja</option>
                <option value="2">Brains Maria Lombillo</option>-->
            </optgroup>   
        </select>
        <select label="Cursos" name="Curso">
               
        </select>
         <input type="text" placeholder="" name="codigo_curso" value="" id="codcurso" required>
       <input id="submit" name="submit" type="submit" value="Buscar">
	</form>
	<table border="1" cellspacing=1 cellpadding=2 style="font-size: 8pt"><tr>
			<td><font face="verdana"><b>Codigo Curso</b></font></td>
			<td><font face="verdana"><b>Cliente</b></font></td>
			<td><font face="verdana"><b>Importe</b></font></td>
			<td><font face="verdana"><b>Fecha</b></font></td>
		</tr>
	</table>
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

	function combo1(){
	    	
	    	echo "cargando combo1..";
	    	conectar();
	    	$consulta=mysql_query("SELECT id, nombre FROM centros");
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

    	
     	if ($_POST["submit"]){
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
			
			if(!$resultado = $db->query($sql)){
				die('Ocurrio un error ejecutando el query [' . $db->error . ']');
			}
			
			while($row = $resultado->fetch_assoc()){
			
				// $fila es un arreglo asociativo con todos los campos que se pusieron en el select
			
				//echo '<br/>';
				//echo $row['id_curso_solicitado'] . '<br/>';
				echo "<tr><td width=\"25%\"><font face=\"verdana\">" . $row['id'] . "</font></td></br>";
			
			}
			$db->close();

		}
	}
       
       
       ?>
</section>
 
 