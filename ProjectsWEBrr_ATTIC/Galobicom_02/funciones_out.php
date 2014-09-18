<?php
//FUNCIONES PARA CREAR LA PARTE VISUAL DE LA WEB(por partes)(para no escribir el mismo código varias
//veces, como en el caso de las cabeceras y pies de página).
//variable $pag --> indica en que ventana se encuentra el usuario y en su caso la barra fija NAVBAR.
// =1 --> index.php  =2 --> formRegistro.php

require_once 'funciones.php';
//session_start();

function cargarCabecera($titulo,$pag){ //Método que recoge el título y la pagina en donde se encuentra la Barra NAVBAR
?>
	<!-- código Html para visualizar en navegador -->
	<!DOCTYPE html>
	<html>
	<head><title>Galobicom - <?php echo $titulo; ?></title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="img/radiohead.ico">
		<!-- Incluiyendo archivos CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/miestilo.css">
		
		<!-- incluyendo archivos Java Script -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/matrixtext.js"></script>
		
	</head>
	<body onload="init();" style="background-color: black;">
		<div class="container" style="background-color: black; border-radius: 10px;">
		  <!--<canvas id="theMatrix" width="1150" height="200"></canvas> -->

<?php
cargarBarraNav($pag); //poniendola aqui, no la tendrias que invocar en el fichero index.php
}

function cargarAlerts($tipo,$tam,$mensaje){
	if($tam != ''){
		$tam='-'.$tam; //vacio=grande "sm=pequeño".
    }  
      switch($tipo){
      	case 'success':
      		$clase = 'alert'.$tam.' alert-success alert-dismissible';
      		break;
      	case 'warning':
      		$clase = 'alert'.$tam.' alert-warning alert-dismissible';
      		break;
      	case 'danger':
      		$clase = 'alert'.$tam.' alert-danger alert-dismissible';
      		break;
      }
?>		
		<div class="<?php echo $clase; ?>" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Atención!</strong> <?php echo $mensaje; ?>.
		</div>
	
<?php
}

function cargarPie(){
?>
			<div class="row">
				<div class="col-md-12 text-center"><small>Copyright &copy - Galobicom 2014</small></div>
			</div>
		</div>
	  <!--<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	  <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
	</body>
	</html>

<?php
}

function cargarBarraNav($pag){ //Barra tipica de las pg Web en la parte superior del navegador.(contendra un sistema de login)
?>

<!-- Código html que interpretara el navegador del usuario (sacado de la pg de bootstrap/css y adaptado).-->
	<!-- <br style="line-height: 1px;"/> -->
	<br>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius: 10px;" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Galobicom</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!--<li class="active"><a href="#">Link</a></li> -->
	        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
	        <li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Zonas <span class="caret"></a>
	        	<ul class="dropdown-menu navbar-inverse" role="menu" style="border-radius: 10px;">
	        		<li><a style="color: #777;" href="indexga.php?p=<?php echo $pag; ?>">BloGA <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="realGalobo.php?p=<?php echo $pag; ?>">Real Galobo F.C. <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu02">Eventos GA! <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu03">Por el Mundo <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu04">Juegos GA!<small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu05">Galobas <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        	</ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php 
	      		if(isset($_SESSION['id'])){
	      	?>
	      	<!-- <li><br><p style="color: #777;"><?php echo 'Hola!' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';?></p></li> -->
	      	<!-- <li><a class="navbar-brand"><?php echo 'Hola! ' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';?></a></li> -->
	      	<li><a class="navbar-brand"><?php echo 'Hola! ' . $_SESSION['nic'];?></a></li>
	      	<li><a href="logout.php">Cerrar Sesión</a></li>
	      	
	      	<?php
	      	echo '<li class="navbar-brand">';
	      			if(isset($_GET['mnsl'])){
						switch($_GET['mnsl']){
							case '0a': cargarAlerts('success','sm','Estás Dentro!..Bienvenido!!');
										break;
						}
					}
			echo '</li>';
	      		}else{
	      	?> <!-- Envio en el formulario de variables por post y get (SORPRENDENTEMENTE SE PUEDE COMBINAR) "login.php?p=<?php echo $pag; ?>". -->
			</li>
			<form class="navbar-form form-inline" role="login" name="login" action="login.php?p=<?php echo $pag; ?>" method="post">
			  <div class="form-group">
			    <input type="text" class="form-control input-sm" placeholder="Email" name="inputEmail">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control input-sm" placeholder="Password" name="inputPassword">
			  </div>
			  <button type="submit" class="btn btn-success btn-sm">Login</button>
			  <?php 
					if(isset($_GET['mnsl'])){
						switch($_GET['mnsl']){
							case '0a': cargarAlerts('success','sm','Estás Dentro!..Bienvenido!!');//SOBRA.
									break;
							case '0b': cargarAlerts('success','sm','Estás Fuera!..Sesión cerrada');
									break;
							case '1a': //echo '<br></br><div class="alert-md alert-danger" role="alert" style="border-radius: 3px;"><button type="button" class="close" data-dismiss="alert">
									  //<span aria-hidden="true">&times;</span></button><strong>Atención!</strong> Usuario NO registrado.</div>';
									cargarAlerts('danger','sm','Usuario NO registrado');
									break;
							case '1b': cargarAlerts('danger','sm','Hacking!?No grácias!Usuario NO registrado..regístrate hijoPuta!');
									break;

							case '2a': //echo '<br></br><div class="alert-md alert-danger" role="alert" style="border-radius: 3px;"><button type="button" class="close" data-dismiss="alert">
									   //<span aria-hidden="true">&times;</span></button><strong>Atención!</strong> Datos de Login incorrectos.</div>';
									cargarAlerts('warning','sm','Datos de Login incorrectos.');
									break;
						}
					}
			   }
			  ?> 
			  
			</form>
		   </ul>
		</div>
	 </div>
	</nav>
<?php
}

function cargarFormRegistro(){//formulario de registro de usuario.
?>
	<br>
	<div class="row">
		<h2 style="color: white">Crear Cuenta:</h2>
		<div class="col-md-6 navbar-white jumbotron" style="border-radius: 10px;">
			<form class="form-horizontal" role="form" name="form" action="registro.php" method="post">
		  			<div class="form-group">
		    			<label for="inputNombreReg" class="col-sm-2 control-label" style="color: black">Nombre:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="15" name="inputNombreReg" placeholder="Introduce Nombre">
		    			</div>
		 			</div>
		 			<div class="form-group">
		    			<label for="inputApellidosReg" class="col-sm-2 control-label" style="color: black">Apellidos:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="25" name="inputApellidosReg" placeholder="Introduce Apellidos">
		    			</div>
		 			</div>
		 			<div class="form-group">
		    			<label for="inputNickReg" class="col-sm-2 control-label" style="color: black">Nick:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="10" name="inputNickReg" placeholder="Introduce Nick">
		    			</div>
		 			</div>
		  			<div class="form-group">
		    			<label for="inputEmailReg" class="col-sm-2 control-label" style="color: black">Email:</label>
		    			<div class="col-sm-10">
		      				<input type="email" class="form-control" maxlength="25"name="inputEmailReg" placeholder="Introduce Email">
		    			</div>
		 			</div>
		  			<div class="form-group">
		    			<label for="inputPasswordReg1" class="col-sm-2 control-label" style="color: black">Password:</label>
		    			<div class="col-sm-10">
		      				<input type="password" class="form-control" maxlength="20" name="inputPasswordReg1" placeholder="Introduce Password">
		    			</div>
		    		</div>
		    		<div class="form-group">
		    			<label for="inputPasswordReg2" class="col-sm-2 control-label" style="color: black">Confirmar Password:</label>
		    			<div class="col-sm-10">
		  					<input type="password" class="form-control" maxlength="20" name="inputPasswordReg2" placeholder="Confirmación de Password">
		  				</div>
		  			</div>
		  			<?php 
	      				if(isset($_SESSION['id'])){//si estas logeado o no boton habilitado o no. 
	      			?>
		  			<div class="form-group">
		    			<div class="col-sm-1 col-sm-10">
		      				<button type="submit" class="btn btn-info" disabled>Sign In</button>
		    			</div>
		  			</div>
		  			<?php 
		  				}else{
		  			?>
		  			<div class="form-group">
		    			<div class="col-sm-1 col-sm-10">
		      				<button type="submit" class="btn btn-info">Sign In</button>
		    			</div>
		  			</div>
		  			<?php
		  				}
		  			?>
		  		</form>
		</div>
	</div>

<?php
}

function cargarTablaClasificacion(){
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT * FROM equipos ORDER BY puntos DESC;");
	desconectarDB01($conect);
	if($consulta){
		$posicion=1;
		while($registro = mysqli_fetch_assoc($consulta)){	
?>	
			<tr>
                <td class="text-center"><?php echo $posicion; ?></td>
                <td class="text-center"><?php echo $registro['nom_equipo']; ?></td>
                <td class="text-center"><?php echo $registro['puntos']; ?></td>
                <td class="text-center"><?php echo $registro['jugados']; ?></td>
                <td class="text-center"><?php echo $registro['ganados']; ?></td>
                <td class="text-center"><?php echo $registro['empatados']; ?></td>
                <td class="text-center"><?php echo $registro['perdidos']; ?></td>
                <td class="text-center"><?php echo $registro['gol_favor']; ?></td>
                <td class="text-center"><?php echo $registro['gol_contra']; ?></td>
            </tr>
<?php
		$posicion++;
		} 
	}else{
		cargarAlerts('warning','sm','Error en Base de datos(db)');
	}

}

function generaComboEquipos(){
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT id_equipo, nom_equipo FROM equipos ORDER BY nom_equipo; ");
	desconectarDB01($conect);
	//echo "<select name='centros' id='centros' onChange='cargaContenido(this.id)' multiple data-rel='chosen'>";
	//echo "<option value='0'>Elige</option>";
		echo "<select id='combEquipos01' class='form-control' required>";
	if($consulta){
			echo "<option value=''>Elige Equipo</option>";
		while($registro = mysqli_fetch_assoc($consulta))
		{
			echo "<option value='".$registro['id_equipo']."'>".$registro['nom_equipo']."</option>";
		}
		//echo "<button type='submit' class='btn btn-info'>Aceptar</button>";
	}else{
		/*echo "<option value='0'>"<?php cargarAlerts('warning','sm','Error en Base de datos(db)'); ?>"</option>";*/
		//cargarAlerts('warning','sm','Error en Base de datos(db)');
		echo "<option value='0' style='background: red;'>Error en Base de datos</option>";
	}
		echo "</select>";
}

function generaComboJornadas(){ //Para generar la tabla resultados x jornada
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT distinct jornada FROM resultados; ");
	desconectarDB01($conect);
		echo "<select id='combJornadas' class='form-control' onchange='' required>";
	if($consulta){
			echo "<option value=''>Elige Jornada</option>";
		while($registro = mysqli_fetch_assoc($consulta))
		{
			echo "<option value='".$registro['jornada']."'>".$registro['jornada']."</option>";
		}
		//echo "<button type='submit' class='btn btn-info'>Aceptar</button>";
	}else{
		/*echo "<option value='0'>"<?php cargarAlerts('warning','sm','Error en Base de datos(db)'); ?>"</option>";*/
		//cargarAlerts('warning','sm','Error en Base de datos(db)');
		echo "<option value='0' style='background: red;'>Error en Base de datos</option>";
	}
		echo "</select>";
}

function generaComboJornadasGuardarRG(){ //combo del form "Registrar Resultados Jornada",para las jornadas que estan sin completar y la nueva jornada.
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT count(DISTINCT jornada) as JornadasJugadas FROM resultados; ");
	$registroCountJorJgadas = mysqli_fetch_assoc($consulta);
	$numJornadasJugadas = $registroCountJorJgadas['JornadasJugadas'];
	$consRegPartiPorJor = $conect->query("SELECT count(jornada) as partidosRegist FROM resultados WHERE jornada='$numJornadasJugadas'; ");
	$registroCountPartPorJor = mysqli_fetch_assoc($consRegPartiPorJor);
	$numPartiRegPorJor = $registroCountPartPorJor['partidosRegist'];
			echo "<select id='combJorGuardar' class='form-control' onchange='' required>";
			echo "<option value=''>Elige Jornada</option>";
			echo "<option value=''>".$numJornadasJugadas."</option>";
			echo "<option value=''>".$numPartiRegPorJor."</option>";
	for($cntJor=1; $cntJor <= $numJornadasJugadas; $cntJor++){
		$consultaResultados = $conect->query("SELECT * FROM resultados WHERE jornada='$cntJor'; ");
		if($consultaResultados && $consulta){
			$cntPartCompletados = 0; $cntPartiRegistrados = 0;	
		   	while($regResultado = mysqli_fetch_assoc($consultaResultados)){
				if($regResultado['gol_A'] != NULL && $regResultado['gol_B'] != NULL){
					$cntPartCompletados++; //Suma los partidos que estan completados golA y golb distintos de NULL.
				}
				$cntPartiRegistrados++;
			}
			if($cntPartCompletados == 3){
				echo "<option value='".$cntJor."' disabled>".$cntJor." - completada</option>"; 
			}else{
				if($cntJor == $numJornadasJugadas && $cntPartiRegistrados == 3){
					echo "<option value='".$cntJor."'>".$cntJor." - Jornada siguiente Configurada</option>";
				}else{
					if($cntPartiRegistrados<3){
						echo "<option value='".$cntJor."'>".$cntJor." - Jornada siguiente Sin Configurar</option>";
					}else{
						echo "<option value='".$cntJor."'>".$cntJor." - incompleta</option>";
					}
				}
			}
			



		 /* if($cntPartCompletados == 3){ //6->Significa que hay 12 euipos que se van a enfrentar en cada jornada,si hubiera un num impar de euipos 
				if($cntJor == $numJornadasJugadas){  // habria un partido mas x jornada en este caso "7",que seria el descanso del quipo q le toque. 
					echo "<option value='".$cntJor."'>".$cntJor." - Jornada siguiente Configurada</option>"; //si se han registrado los partidos de la siguiente jornada.
				}else{
					echo "<option value='".$cntJor."' disabled>".$cntJor." - completada</option>"; 
				}
			}else{
				if($cntJor == $numJornadasJugadas){
					echo "<option value='".$cntJor."'>".$cntJor." - Jornada siguiente No Configurada</option>";
				}else{
					echo "<option value='".$cntJor."'>".$cntJor." - incompleta</option>";
				}
			} */
				
		//echo "<button type='submit' class='btn btn-info'>Aceptar</button>";
		}else{
			/*echo "<option value='0'>"<?php cargarAlerts('warning','sm','Error en Base de datos(db)'); ?>"</option>";*/
			//cargarAlerts('warning','sm','Error en Base de datos(db)');
				echo "<option value='' style='background: red;'>Error en Base de datos</option>";
		}
	}	//el cntador sale con numero de jornadas mas 1, x lo que hay q restarle 1 para hacer la siguiente comparacion..
		//echo "<option value=''>".$cntJor."</option>";
		//echo "<option value=''>".$numPartiRegPorJor."</option>";
		$cntJor--;
		if($cntJor == $numJornadasJugadas &&  $numPartiRegPorJor == 3){
			$cntJor++;
			echo "<option value='".$cntJor."'>".$cntJor." - Configurar Jornada siguiente</option>";
		}
			//echo "<option value=''>".$cntJor."</option>";
			echo "</select>";
}


function cargarNoticiasRG($maxelem){ //Método para cargar las noticias y los mensajes relacionados, mas el código para insertar mensajes con relación a esa noticia.
	if(!isset($_GET['npag'])){//Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagina = 1;
	}else{
		$pagina = addslashes(strip_tags($_GET['npag']));
	}
	$posicion = ($pagina - 1) * $maxelem;

	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT * FROM noticiasga ORDER BY fec_publicado DESC LIMIT $posicion, $maxelem; ");
	if($consulta){
		if($consulta->num_rows != 0){
			while($registroNoti = mysqli_fetch_assoc($consulta)){
				$idUsuarioNoti = $registroNoti['idfk_user'];
				$consultaNick = $conect->query("SELECT nick FROM users WHERE id_user='$idUsuarioNoti'; ");
				$registroUser = mysqli_fetch_assoc($consultaNick);
				echo "<hr style='border-top-color: black;'>";
				echo "<h2>".$registroNoti['titulo']."</h2>";
               	echo "<p class='lead'>by ".$registroUser['nick']."</p>";
				//<!-- Date/Time -->
                echo "<p><span class='glyphicon glyphicon-time'></span> ".$registroNoti['fec_publicado']."</p>";
                echo "<hr style='border-top-color: black;'>";
				//<!-- Preview Image -->
				if($registroNoti['img_link'] != ''){
                echo "<img class='img-responsive' src=".$registroNoti['img_link']." alt=''>";
                echo "<hr style='border-top-color: black;'>";
            	}
                //<!-- Post Content -->
                echo "<p class='lead'>".$registroNoti['contenido']."</p>";
                if($registroNoti['ext_link'] != ''){
                echo "<a class='media' href='".$registroNoti['ext_link']."'>Ir al Link.</a>";
            	}
                echo "<hr style='border-top-color: black;'>";
                //<!-- Comments Form -->
                //echo "<div class='small well'>";
                //ASI FUNCIONA SI SOLO MOSTRAMOS UNA NOTICIA POR PAGINA..
                echo " <form role='form' id='formCom' class='well' value='".$registroNoti['id_noticia']."'>";
                echo "  <h4>Commentario:</h4>";
                echo "   <div class='form-group'>";
                echo "      <textarea id='textComent' class='form-control' rows='2' maxlength='100'></textarea>";
                echo "   </div>";
                echo "   <button type='button' id='btnFormMens' class='btn btn-primary'>Commenta</button>";
                echo "   <div id='alertMens'></div>";
                echo " </form>";
                // CON ESTO REFERENCIAS Y LE DAS UN IDENTIFICADOR ÚNICO A LOS ELEMENTOS GENERADOS DINÁMICAMENTE,CONCATENANDOLE EL ID DE LA NOTICIA.
                // EL PROBLEMA QUE NO TENGO NI PUTA IDEA DE COMO SABER EN JQUERY Q ELEMENTO GENERADO DINAMICAMENTE SE PULSADO O "EVENTUA"
                /*echo " <form role='form' id='formCom".$registroNoti['id_noticia']."' class='well' value='".$registroNoti['id_noticia']."'>";
                echo "  <h4>Commentario:</h4>";
                echo "   <div class='form-group'>";
                echo "      <textarea id='textComent".$registroNoti['id_noticia']."' class='form-control' rows='2' maxlength='100'></textarea>";
                echo "   </div>";
                echo "   <button type='button' id='btnFormMens".$registroNoti['id_noticia']."' class='btn btn-primary'>Commenta</button>";
                echo "   <div id='alertMens'></div>";
                echo " </form>";*/
                //echo "</div>";
				//echo "<hr style='border-top-color: black;'>";

				$idNoticia = $registroNoti['id_noticia'];
				$consultaMensajes = $conect->query("SELECT * FROM mensajesga WHERE idfk_noticia='$idNoticia'; ");
				if($consultaMensajes){
					if($consultaMensajes->num_rows != 0){
						while($registroMens = mysqli_fetch_assoc($consultaMensajes)){
							$idUsuarioMensa = $registroMens['idfk_user'];
							$consultaNick = $conect->query("SELECT nick FROM users WHERE id_user='$idUsuarioMensa'; ");
							$registroUser = mysqli_fetch_assoc($consultaNick);
							echo "<div class='media'>";
		                  //echo "	<a class='pull-left' href='#'>";
		                  //echo "    <img class='media-object' src='http://placehold.it/64x64' alt=''>";
		                  //echo "  </a>";
		                    echo " <div class='media-body'>";
		                    echo "    <h4 class='media-heading'><span class='glyphicon glyphicon-time'></span><small> ".$registroMens['fec_publicado']." by:</small> ".$registroUser['nick']."</h4>";
		                    echo $registroMens['mensaje']; 
		                    echo " </div>";
		                    echo "</div>";
		                    echo "<hr style='border-top-color: black;'>";
		                 } //final 2ºwhile.
		                 	echo "<hr style='border-top-color: black;'>";
					}else{
						cargarAlerts('warning','','No Hay ningun Comentario Publicado..se tu el primero_O');
					}
				}else{
					cargarAlerts('danger','','Error en Base de datos(db)');
				}
			} //final 1ºWhile
		}else{
			cargarAlerts('warning','','No Hay ningun post Publicado..se tu el primero_O');
		}
	}else{
		cargarAlerts('danger','','Error en Base de datos(db)');
	}
	desconectarDB01($conect);
}

function cargarMensajesNotiRG(){ //LO CARGAMOS EN LA MISMA FUNCION QUE LAS NOTICIAS..

}

function cargarPaginacion($maxelemp){
	if(!isset($_GET['npag'])){ //Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagActual = 1;
	}else{
		$pagActual = addslashes(strip_tags($_GET['npag']));
	}


	$conexion = conectarDB01();
	$configDatos = $conexion->query("SET NAMES 'utf8';");
	$consulta = $conexion->query("SELECT COUNT(*) as total FROM noticiasga; "); //esta consulta devuelve un registro con un dato, con el número de resultados que ha recuperado.
	//$registro = mysqli_fetch_assoc($consulta); //
	$registroNoti = $consulta->fetch_assoc();
	desconectarDB01($conexion);
	$totalRegistros = $registroNoti['total']; //cálculo del num de páginas a partir del num de registros recuperados.
	
	$paginas = ceil($totalRegistros / $maxelemp);

			echo '<div class="row text-center">'; //pintamos el bloque de botones para la paginación.
			echo '<ul class="pagination">';
	for($cnt = 1; $cnt <= $paginas; $cnt++){
		if($cnt == $pagActual){ //Pintamos los botones de paginación, e inhabilitamos el botón del num de páginación en la que nos encontramos.
			echo '<li class="disabled"><a>'.$cnt.'<span class="sr-only">'.$cnt.'</span></a></li>';
		}else{
			echo '<li><a href="realGalobo.php?npag='.$cnt.'">'.$cnt.'</a></li>';
		}

	}
			echo '</ul>';
			echo '</div>';
}



?>