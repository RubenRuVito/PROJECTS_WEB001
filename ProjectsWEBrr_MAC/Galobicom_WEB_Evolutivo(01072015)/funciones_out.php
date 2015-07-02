<?php
//FUNCIONES PARA CREAR LA PARTE VISUAL DE LA WEB(por partes)(para no escribir el mismo código varias
//veces, como en el caso de las cabeceras y pies de página).
//variable $pag --> indica en que ventana se encuentra el usuario y en su caso la barra fija NAVBAR.
// =1 --> index.php  =2 --> formRegistro.php

require_once 'funciones.php';

/* INICIO MÉTODOS COMUNES PARA PINTAR EN PAGINAS DE "GALOBICOM". */

function cargarCabecera($titulo,$pag){ //Método que recoge el título y la pagina en donde se encuentra la Barra NAVBAR
?>
	<!-- código Html para visualizar en navegador -->
	<!DOCTYPE html>
	<html>
	<head><title>Galobicom - <?php echo $titulo; ?></title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="imgruvio/radiohead.ico">
		<meta name="keywords" content="quiniela, juegos, blog, competición, gestión, ligas, boadilla, boadilla del monte, deportes, fútbol, Madrid, municipal, real galobo, galobianismo, galobos, galobianista, comunidad">
		<meta name="description" content="Regístrate y hazte Galobic@ digital, una vez dentro, tendrás acceso al contenido, y a las utilidades necesarias para entrenerte
	  	y a la vez enriquecer, dulce/ácida/picante-mente este espacio dedicado a la comunidad, y sentimiento Galobianista.">
		<!-- Incluiyendo archivos CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/miestilo.css">
		
		<!-- incluyendo archivos Java Script -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/matrixtext.js"></script>
		<script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
	</head>
	<body onload="init();" style="background-color: black;">
		<div class="container" style="background-color: black; border-radius: 10px;">
		  <!--<canvas id="theMatrix" width="1150" height="200"></canvas> -->

<?php
cargarBarraNav($pag); //poniendola aqui, no la tendrias que invocar en el fichero index.php o en cularquier
}					  //fichero que pinte la barra NAV, ya que es parte de la cabecera.

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
		<div class="text-center <?php echo $clase; ?>" role="alert">
		  <button id="mensajeAlert" type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
	</body>
	</html>

<?php
}

function cargarBarraNav($pag){ //Barra tipica de las pg Web en la parte superior del navegador.(contendra un sistema de login)
?>
	<br>
	<nav class="navbar navbar-inverse navbar-fixed-top" style="border-radius: 10px;" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php" style="font-family: cursive;">GALOBICOM</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!--<li class="active"><a href="#">Link</a></li> -->
	        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
	        <li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Zonas <span class="caret"></a>
	        	<ul class="dropdown-menu navbar-inverse" role="menu" style="border-radius: 10px;">
	        		<li><a style="color: #777;" href="indexga.php?p=<?php echo $pag; ?>">BloGA <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        		<li><a style="color: #777;" href="realGalobo.php?p=<?php echo $pag; ?>">Real Galobo C.F. <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        		<li class="disabled"><a style="color: #777;" href="#menu02" disabled>Eventos GA! <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        		<li><a style="color: #777;" href="indexga.php?p=<?php echo $pag; ?>&cat=galobosWorld">Por el Mundo <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        		<li class="dropdown-submenu"><a style="color: #777;" href="">Juegos GA! <small><span class=""></span></small></a>
	        			<ul class="dropdown-menu navbar-inverse">		
	        				<li><a style="color: #777;" href="quinielaGa.php?p=<?php echo $pag; ?>">Quiniela <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        				<li class="disabled"><a style="color: #777;" href="">Torneos <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        			</ul>
	        		</li>
	        		<li class="disabled"><a style="color: #777;" href="#menu05">Galobas <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        	</ul>
	        </li>

	        <li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Projects <span class="caret"></a>
	        	<ul class="dropdown-menu navbar-inverse" role="menu" style="border-radius: 10px;">
	        		<li><a style="color: #777;" href="rubenga/index.html" target="_blank">RubenGA <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        		<li><a style="color: #777;" href="DronnerKebab_Beta01/index.php?p=<?php echo $pag; ?>" target="_blank">DronnerKebab <small><span class="glyphicon glyphicon-eye-open"></span></small></a></li>
	        	</ul>
	        </li>
	        <!-- reglas en el css "miestilo.css" -->
	        <li class="dropdown disabled">
	        	<a id="dLabel" role="button" data-toggle="dropdown" class="" data-target="#" href="/page.html">
                REITOR <span class="caret"></span></a>
	    		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
	              <li><a href="#">Some action</a></li>
	              <li><a href="#">Some other action</a></li>
	              <li class="divider"></li>
	              <li class="dropdown-submenu">
	                <a tabindex="-1" href="#">Hover me for more options</a>
	                <ul class="dropdown-menu">
	                  <li><a tabindex="-1" href="#">Second level</a></li>
	                  <li class="dropdown-submenu">
	                    <a href="#">Even More..</a>
	                    <ul class="dropdown-menu">
	                        <li><a href="#">3rd level</a></li>
	                    	<li><a href="#">3rd level</a></li>
	                    </ul>
	                  </li>
	                  <li><a href="#">Second level</a></li>
	                  <li><a href="#">Second level</a></li>
	                </ul>
	              </li>
	            </ul>
        	
	        </li>
		<li><a href="sobremesa.html" title="Cortometraje.&#13;by:Gonzalo Lint."><span class="glyphicon glyphicon-film"></span> SOBREMESA</a></li>
		<li><a href="http://alxgrande.wix.com/galobicos" target="_blank" title="Proyecto Audio-Visual.&#13;by:Alex S.Grande."><span class="glyphicon glyphicon-camera"></span> GALOBICOS</a></li>
	      </ul>
          

	      <ul class="nav navbar-nav navbar-right">
	      	<?php 
	      		if(isset($_SESSION['id'])){
	      			$elegido='';
	      			if($_SESSION['nivAcceso']==1){
	      				$elegido = '[ES EL ELEGIDO]';
	      			}
	      	?>

	      	<li><a class="navbar-brand"><?php echo 'Hola! ' . $_SESSION['nic'].' '.$elegido; ?></a></li>
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
							case '1a': 
									cargarAlerts('danger','sm','Usuario NO registrado');
									break;
							case '1b': cargarAlerts('danger','sm','Hacking!?No grácias!Usuario NO registrado..regístrate hijoPuta!');
									break;
							case '2a': cargarAlerts('warning','sm','Datos de Login incorrectos.');
									break;
						}
					}
			   ?>
			   <li><a href="#modal01" data-toggle="modal" >¿Olvidaste tu contraseña?</a></li>
			   <?php
			   }
			  ?> 
			  
			</form>

		   </ul>
		</div>
	 </div>
	</nav>
	<div class="modal fade" id="modal01">         
		<div class="modal-dialog">                
			<form class="modal-content" style="border-radius: 25px;">                         
				<div class="modal-header form-group">                                 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>       
					<h4 class="modal-title">Introduce tu e-mail de registro, y tu nueva contraseña.</h4>                        
				</div>                       
				<div class="modal-body form-group">                                         
					<input type="email" class="form-control input-md" placeholder="Introduce el e-mail con el que te registraste." id="emailRegis" required><br>
					<input type="password" class="form-control input-md" placeholder="Introduce nueva vontraseña.[8 caracteres mínimo 20 máximo]" id="nuevoPass" required>
					<input type="password" class="form-control input-md" placeholder="Repite nueva vontraseña. [8 caracteres mínimo 20 máximo]" id="nuevoPass2" required>                         
				</div>                         
				<div class="modal-footer">                              
					<button type="button" class="btn btn-primary" id="btnAceptarModal01">Aceptar</button>                              
					<button type="button" class="btn btn-default" data-dismiss="modal">Salir</button> 
					<br></br>    
					<div class="text-center" id="mensajeModal01">

					</div>
				</div> 

			</form>         
		</div> 
	 </div>
<?php
}

/* FIN. */
/* INICIO PÁGINA "formRegistro.php". */

function cargarFormRegistro(){//formulario de registro de usuario.
?>
	<br>
	<div class="row">
		<br></br>
		<h2 style="color: white">Crear Cuenta:</h2>
		<div class="col-md-6 navbar-white jumbotron" style="border-radius: 10px;">
			<form class="form-horizontal" role="form" name="form" action="registro.php" method="post">
		  			<div class="form-group">
		    			<label for="inputNombreReg" class="col-sm-2 control-label" style="color: black">Nombre:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="15" name="inputNombreReg" placeholder="Introduce Nombre [1ª letra Mayúscula]" required>
		    			</div>
		 			</div>
		 			<div class="form-group">
		    			<label for="inputApellidosReg" class="col-sm-2 control-label" style="color: black">Apellidos:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="25" name="inputApellidosReg" placeholder="Introduce Apellidos [1ª letra Mayúscula]" required>
		    			</div>
		 			</div>
		 			<div class="form-group">
		    			<label for="inputNickReg" class="col-sm-2 control-label" style="color: black">Nick:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="15" name="inputNickReg" placeholder="Introduce Nick" required>
		    			</div>
		 			</div>
		  			<div class="form-group">
		    			<label for="inputEmailReg" class="col-sm-2 control-label" style="color: black">Email:</label>
		    			<div class="col-sm-10">
		      				<input type="email" class="form-control" maxlength="50"name="inputEmailReg" placeholder="Introduce Email" required>
		    			</div>
		 			</div>
		  			<div class="form-group">
		    			<label for="inputPasswordReg1" class="col-sm-2 control-label" style="color: black">Password:</label>
		    			<div class="col-sm-10">
		      				<input type="password" class="form-control" maxlength="20" name="inputPasswordReg1" placeholder="Introduce Password" required>
		    			</div>
		    		</div>
		    		<div class="form-group">
		    			<label for="inputPasswordReg2" class="col-sm-2 control-label" style="color: black">Confirmar Password:</label>
		    			<div class="col-sm-10">
		  					<input type="password" class="form-control" maxlength="20" name="inputPasswordReg2" placeholder="Confirmación de Password" required>
		  				</div>
		  			</div>
		  			<?php 
	      				if(isset($_SESSION['id'])){//si estas logeado o no boton habilitado o no. 
	      			?>
		  			<div class="form-group">
		    			<div class="col-sm-1 col-sm-10">
		      				<button type="submit" class="btn btn-info" disabled>Sign Up</button>
		    			</div>
		  			</div>
		  			<?php 
		  				}else{
		  			?>
		  			<div class="form-group">
		    			<div class="col-sm-1 col-sm-10">
		      				<button type="submit" class="btn btn-info">Sign Up</button>
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

/* FIN. */
/* INICIO PAGINA "realGalobo.php". */

function cargarTablaClasificacion(){
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT *,(gol_favor - gol_contra) as golaverage FROM equipos ORDER BY puntos DESC, golaverage DESC; ");
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
			echo "<select id='combEquipos01' class='form-control' required>";
	if($consulta){
			echo "<option value=''>Elige Equipo</option>";
		while($registro = mysqli_fetch_assoc($consulta))
		{
			echo "<option value='".$registro['id_equipo']."'>".$registro['nom_equipo']."</option>";
		}
	}else{
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
	}else{
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
			echo "<option value='' disabled>Elige Jornada :</option>";
	if($numJornadasJugadas != 0){
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
			if($cntPartCompletados == 5){
				echo "<option value='".$cntJor."' disabled>".$cntJor." - completada</option>"; 
			}else{
				if($cntJor == $numJornadasJugadas && $cntPartiRegistrados == 5){
					echo "<option value='".$cntJor."'>".$cntJor." - Jornada Configurada</option>";
				}else{
					if($cntPartiRegistrados<5){
						echo "<option value='".$cntJor."'>".$cntJor." - Jornada Siguiente Sin Configurar</option>";
					}else{
						echo "<option value='".$cntJor."'>".$cntJor." - incompleta (Informar Resultados)</option>";
					}
				}
			}
		}else{
				echo "<option value='' style='background: red;'>Error en Base de datos</option>";
		}
	 }	//el cntador sale con numero de jornadas mas 1, x lo que hay q restarle 1 para hacer la siguiente comparacion.
		$cntJor--;
		if($cntJor == $numJornadasJugadas &&  $numPartiRegPorJor == 5){
			$cntJor++;
			echo "<option value='".$cntJor."'>".$cntJor." - Configurar Jornada Siguiente</option>";
		}
	}else{
		$cntJor=1; //LA tabla resultados de la base de datos, esta vacia.
		echo "<option value='".$cntJor."'>".$cntJor." - Configurar Jornada Siguiente</option>";
	}
			echo "</select>";
	desconectarDB01($conect);
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
				echo "<h2 id='tituloNoti' value='".$registroNoti['id_noticia']."'>".$registroNoti['titulo']."</h2>";
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
                echo " <div role='form' id='divComment' class='well' value='".$registroNoti['id_noticia']."'>";
                echo "  <h4>Comentario:</h4>";
                echo "   <div class='form-group'>";
                echo "      <textarea id='textComent' class='form-control' rows='2' maxlength='100'></textarea>";
                echo "   </div>";
                echo "   <button type='button' id='btnFormMens' class='btn btn-primary'>Comentar</button>";
                echo "   <div id='alertMens'></div>";
                echo " </div>";
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

function cargarPaginacionNotiRG($maxelemp){
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

/* FIN PAGINA "realGalobo.php". */
/* INICIO PAGINA "indexGa.php". */

function cargarPostBlogGA($maxelem){ //CODIGO xa EL CARGADO DE Posts y sus mensajes relacionados,
	if(!isset($_GET['npag'])){//Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagina = 1;
	}else{
		$pagina = addslashes(strip_tags($_GET['npag']));
	}
	$posicion = ($pagina - 1) * $maxelem;

	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	if(isset($_GET['cat'])){
		$cat=addslashes(strip_tags($_GET['cat']));
		//echo "<p>Categoria: ".$cat."</p>";
		$consulta = $conect->query("SELECT * FROM blog WHERE categoria='$cat' ORDER BY fec_publicado  DESC LIMIT $posicion, $maxelem; ");
		//echo "<p>Numregistros: ".count($consulta)."</p>";
	}else{
		$consulta = $conect->query("SELECT * FROM blog ORDER BY fec_publicado DESC LIMIT $posicion, $maxelem; ");
	}
	if($consulta){
		if($consulta->num_rows != 0){
			while($registroPost = mysqli_fetch_assoc($consulta)){
				$categoria = categoriasBlog($registroPost['categoria']);
				$idUsuarioPost = $registroPost['idfk_user'];
				$consultaNick = $conect->query("SELECT nick FROM users WHERE id_user='$idUsuarioPost'; ");
				$registroUser = mysqli_fetch_assoc($consultaNick);
				echo "<hr style='border-top-color: black;'>";
				echo "<h2 id='tituloNoti' value='".$registroPost['id_blog']."'>".$registroPost['titulo']."</h2>";
               	echo "<p class='lead'>by: <strong>".$registroUser['nick']."</strong> Categoría: <strong>".$categoria."</strong></p>";
				//<!-- Date/Time -->
                echo "<p><span class='glyphicon glyphicon-time'></span> Fecha y hora: ".$registroPost['fec_publicado']."</p>";
                echo "<hr style='border-top-color: black;'>";
				//<!-- Preview Image -->
				if($registroPost['img_link'] != ''){
                echo "<img class='img-responsive' src=".$registroPost['img_link']." alt=''>";
                echo "<hr style='border-top-color: black;'>";
            	}
                //<!-- Post Content -->
                echo "<p class='lead'>".$registroPost['contenido']."</p>";
                if($registroPost['ext_link'] != ''){
                echo "<a class='media' href='".$registroPost['ext_link']."'>Ir al Link.</a>";
            	}
                echo "<hr style='border-top-color: black;'>";
                //<!-- Comments Form -->
                //echo "<div class='small well'>";
                //ASI FUNCIONA SI SOLO MOSTRAMOS UNA NOTICIA POR PAGINA..
                echo " <div id='divComment' class='well' value='".$registroPost['id_blog']."'>";
                echo "  <h4>Commentario:</h4>";
                echo "   <div class='form-group'>";
                echo "      <textarea id='textComent' class='form-control' rows='2' maxlength='100'></textarea>";
                echo "   </div>";
                echo "   <button type='button' id='btnFormComentPost' class='btn btn-primary'>Commenta</button>";
                echo "   <div id='alertMensPost'></div>";
                echo " </div>";
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

				$idBlog = $registroPost['id_blog'];
				$consultaMensajes = $conect->query("SELECT * FROM mensajesblog WHERE idfk_blog='$idBlog'; ");
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

function cargarMensajesBlogGA(){ //LO CARGAMOS EN LA MISMA FUNCION QUE LAS NOTICIAS..

}

function cargarPaginacionBlogGA($maxelemp){ //PAGINACION ADAPTADA ALA PG BLOGA, 
	if(!isset($_GET['npag'])){ //Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagActual = 1;
	}else{
		$pagActual = addslashes(strip_tags($_GET['npag']));
	}
	$conexion = conectarDB01();
	$configDatos = $conexion->query("SET NAMES 'utf8';");
	if(isset($_GET['cat'])){
		$cat=addslashes(strip_tags($_GET['cat']));
		$consulta = $conexion->query("SELECT COUNT(*) as total FROM blog WHERE categoria='$cat'; "); //esta consulta devuelve un registro con un dato, con el número de resultados que ha recuperado.
	}else{
		$consulta = $conexion->query("SELECT COUNT(*) as total FROM blog; ");
	}
	//$registro = mysqli_fetch_assoc($consulta); //
	$registroNoti = $consulta->fetch_assoc();
	desconectarDB01($conexion);
	$totalRegistros = $registroNoti['total']; //cálculo del num de páginas a partir del num de registros recuperados.
	
	$paginas = ceil($totalRegistros / $maxelemp);

			echo '<div class="row text-center text-top">'; //pintamos el bloque de botones para la paginación.
			echo '<ul class="pagination">';
	for($cnt = 1; $cnt <= $paginas; $cnt++){
		if($cnt == $pagActual){ //Pintamos los botones de paginación, e inhabilitamos el botón del num de páginación en la que nos encontramos.
			echo '<li class="disabled"><a>'.$cnt.'<span class="sr-only">'.$cnt.'</span></a></li>';
		}else{
			if(isset($_GET['cat'])){
				$cat=addslashes(strip_tags($_GET['cat']));
				echo '<li><a href="indexga.php?npag='.$cnt.'&cat='.$cat.'">'.$cnt.'</a></li>';
			}else{
				echo '<li><a href="indexga.php?npag='.$cnt.'">'.$cnt.'</a></li>';
			}
		}

	}
			echo '</ul>';
			echo '</div>';
}

/* FIN PAGINA "indexga.php". */
/* INICIO PAGINA "quinielaGa.php". */

function cargarClasificacionQuiniGa($maxelem){ //Tabla "puntos_quiniela" donde estan los puntos totales de los usuarios.
	if(!isset($_GET['npag'])){//Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagina = 1;
	}else{
		$pagina = addslashes(strip_tags($_GET['npag']));
	}
	$posicion = ($pagina - 1) * $maxelem;

	$con = conectarDB01();
	$configDatos = $con->query("SET NAMES 'utf8';");
	$consTablaQuini = $con->query("SELECT * FROM puntos_quiniela ORDER BY puntosQuini DESC LIMIT $posicion, $maxelem; ");
	if($consTablaQuini->num_rows > 0){
	  if($consTablaQuini){
		$posicion = 1;
?>
		<br><br>
		<div class="row">
			
			<div class="table-responsive col-md-12 navbar-white well" style="border-radius: 10px;">
				<h2 class="text-top text-center" style="font-family: cusrsive; color: black">Clasificación Quiniela</h2>
				<table id="" class="table table-striped table-bordered table-hover well" style="" border="" width="">
                  <thead>
                    <tr>
                      <th class="text-center">Posición</th>
                      <th class="text-center">NICK (user)</th>
                      <th class="text-center">Puntuación</th>
                      <th class="text-center">Quinielas Jugadas</th>
                      <th class="text-center">%P.A.% Partidos</th>
                      <th class="text-center">%P.A.% Killers</th>
                      <th class="text-center">Efectividad Estratégica</th>
                    </tr>
                  </thead> 
                  <tbody id="">  
                    		
<?php
		while($regisUserPuntosQuini = mysqli_fetch_assoc($consTablaQuini)){
			$idUser = $regisUserPuntosQuini['idfk_user'];
			$consUser = $con->query("SELECT nick FROM users WHERE id_user='$idUser'; ");
			$regisUser = mysqli_fetch_assoc($consUser);
			$nickUser = $regisUser['nick'];
			$consQuinielasHechas = $con->query("SELECT count(DISTINCT jornada) as numQuinisHechas FROM quinielaga WHERE idfk_user='$idUser'; ");
			$regisQuiniHechas = mysqli_fetch_assoc($consQuinielasHechas);
			$numQuinisHechas = $regisQuiniHechas['numQuinisHechas'];
?>
					 <tr>
                      <td class="text-center"><?php echo $posicion; ?></td>
                      <td class="text-center"><?php echo $nickUser; ?></td>
                      <td class="text-center"><?php echo $regisUserPuntosQuini['puntosQuini']; ?></td>
                      <td class="text-center"><?php echo $numQuinisHechas; ?></td>
                      <td class="text-center" style="font-family: cursive;">%% En construcción.. %%</td>
                      <td class="text-center" style="font-family: cursive;">%% En construcción.. %%</td>
                      <td class="text-center" style="font-family: cursive;">%% En construcción.. %%</td>
                     </tr>
<?php
			$posicion++;
	 	}
?>            
                  </tbody>
                </table>
<?php
cargarPaginacionQunielaGa($maxelem);
   }else{
   	 	cargarAlerts('warning','sm','Error en Base de datos(db)');
   }
 }else{
 ?>
 	<br><br>
		<div class="row">
			
			<div class="table-responsive col-md-12 navbar-white well" style="border-radius: 10px;">
				<h2 class="text-top text-center" style="font-family: cusrsive; color: black">Clasificación Quiniela</h2>
				<table id="" class="table table-striped table-bordered table-hover well" style="" border="" width="">
                  <thead>
                    <tr>
                      <th class="text-center">Posición</th>
                      <th class="text-center">NICK (user)</th>
                      <th class="text-center">Puntuación</th>
                      <th class="text-center">Jornadas Realizadas</th>
                      <th class="text-center">%P.A.% Partidos</th>
                      <th class="text-center">%P.A.% Killers</th>
                      <th class="text-center">Efectividad Estratégica</th>
                    </tr>
                  </thead> 
                  <tbody></tbody>
                </table>
            

<?php
 	cargarAlerts('warning','','No existen Datos de Puntuaciones para el Juego Quiniela GA! (esperar resultados 1ªJornada)');
 	echo "</div>";
 	echo "</div>";
 }
 desconectarDB01($con);
}

function cargarPaginacionQunielaGa($maxelemp){ //Paginacion para la tabla "puntos_quiniela".
	if(!isset($_GET['npag'])){ //Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagActual = 1;
	}else{
		$pagActual = addslashes(strip_tags($_GET['npag']));
	}


	$conexion = conectarDB01();
	$configDatos = $conexion->query("SET NAMES 'utf8';");
	$consPuntosQuini = $conexion->query("SELECT COUNT(*) as total FROM puntos_quiniela; "); //esta consulta devuelve un registro con un dato, con el número de resultados que ha recuperado.
	$registroPuntosQuini = $consPuntosQuini->fetch_assoc();
	desconectarDB01($conexion);
	$totalRegistros = $registroPuntosQuini['total']; //cálculo del num de páginas a partir del num de registros recuperados.
	
	$paginas = ceil($totalRegistros / $maxelemp);

			echo '<div class="row text-center">'; //pintamos el bloque de botones para la paginación.
			echo '<ul class="pagination">';
	for($cnt = 1; $cnt <= $paginas; $cnt++){
		if($cnt == $pagActual){ //Pintamos los botones de paginación, e inhabilitamos el botón del num de páginación en la que nos encontramos.
			echo '<li class="disabled"><a>'.$cnt.'<span class="sr-only">'.$cnt.'</span></a></li>';
		}else{
			echo '<li><a href="quinielaGa.php?npag='.$cnt.'">'.$cnt.'</a></li>';
		}

	}
			echo '</ul>';
			echo '</div>';
		echo '</div>';
	echo '</div>';


}

function generaComboJornadasQuinielaGa($numCombo){ //combo del form "Registrar Resultados Jornada",para las jornadas que estan sin completar y la nueva jornada.
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT count(DISTINCT jornada) as JornadasJugadas FROM resultados; ");
	$registroCountJorJgadas = mysqli_fetch_assoc($consulta);
	$numJornadasJugadas = $registroCountJorJgadas['JornadasJugadas'];
	$consRegPartiPorJor = $conect->query("SELECT count(jornada) as partidosRegist FROM resultados WHERE jornada='$numJornadasJugadas'; ");
	$registroCountPartPorJor = mysqli_fetch_assoc($consRegPartiPorJor);
	$numPartiRegPorJor = $registroCountPartPorJor['partidosRegist'];
	if($numCombo == 1){
			echo "<select id='combJorQuini' class='form-control' onchange='' required>";
	}else if($numCombo == 2){
			echo "<select id='combJorQuiniDesac' class='form-control' onchange='' required>";
	}
			echo "<option value='' disabled>Elige Jornada :</option>";
	if($numJornadasJugadas != 0){
	 for($cntJor=1; $cntJor <= $numJornadasJugadas; $cntJor++){
		$consultaResultados = $conect->query("SELECT * FROM resultados WHERE jornada='$cntJor'; ");
		if($consultaResultados && $consulta){
			$cntPartCompletados = 0; $cntPartiRegistrados = 0; $flagQuinielaActiva = 1;	
		   	while($regResultado = mysqli_fetch_assoc($consultaResultados)){
				if($regResultado['gol_A'] != NULL && $regResultado['gol_B'] != NULL){
					$cntPartCompletados++; //Suma los partidos que estan completados golA y golb distintos de NULL.
				}
				if($regResultado['activa'] == 2){  //ESTA O NO DISPONIBLE LA QUINIELA DE LA JORNADA. =1 SI =2 NO 
					$flagQuinielaActiva = 2;
				}
				$cntPartiRegistrados++;
			}
			if($cntPartCompletados == 5){
				echo "<option value='".$cntJor."' disabled>".$cntJor." - completada</option>"; 
			}else{
				$idUser = $_SESSION['id'];
				$consQuiniHechas = $conect->query("SELECT quiniela_user FROM quinielaga WHERE idfk_user='$idUser' AND jornada='$cntJor'; ");
				if($cntJor == $numJornadasJugadas && $cntPartiRegistrados == 5){
					//COMPROBAR SI EL USUARIO HA REALIZADO LA QUINIELA DE LAS JORNADAS DISPONIBLES,
					//PARA PINTAR UNA COSA U OTRA EN EL COMBO DE "QUINIELA DE LA JORNADA..".
					if($consQuiniHechas->num_rows > 0){
						if($numCombo == 1){
							echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Realizada (Puedes consultarla).</option>";
						}else if($numCombo == 2){
							if($flagQuinielaActiva == 1){
								echo "<option value='".$cntJor."'>".$cntJor." - Desactivar Quiniela.</option>";
							}else if($flagQuinielaActiva == 2){
								echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Desactivada.</option>";
							}
						}
					}else{
						if($numCombo == 1){
							if($flagQuinielaActiva != 2){ //PINTAMOS EN EL COMBO SI PUEDE O NO REALIZAR LA QUINIELA, O SE LE HA PASADO EL PLAZO
								echo "<option value='".$cntJor."'>".$cntJor." - Realizar Quiniela (jornada configurada).</option>";
							}else{
								echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Desactivada (se te paso el Plazo).</option>";
							}
						}else if($numCombo == 2){
							if($flagQuinielaActiva != 2){ //PINTAMOS EN EL COMBO SI PUEDE O NO REALIZAR LA QUINIELA, O SE LE HA PASADO EL PLAZO
								echo "<option value='".$cntJor."'>".$cntJor." - Desactivar Quiniela.</option>";
							}else{
								echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Desactivada.</option>";
							}
						}
					}
				}else{
					if($cntPartiRegistrados<5){
						echo "<option value='".$cntJor."' disabled>".$cntJor." - Jornada Siguiente Sin Configurar</option>";
					}else{
						//echo "<option value='".$cntJor."' disabled>".$cntJor." - incompleta (Informar Resultados)</option>";
						if($consQuiniHechas->num_rows > 0){
							if($numCombo== 1){
								echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Realizada (Puedes consultarla).</option>";
							}else if($numCombo==2){
								if($flagQuinielaActiva == 1){
									echo "<option value='".$cntJor."'>".$cntJor." - Desactivar Quiniela.</option>";
								}else if($flagQuinielaActiva == 2){
									echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Desactivada.</option>";
								}
							}
						}else{
							if($numCombo == 1){
								if($flagQuinielaActiva != 2){ //PINTAMOS EN EL COMBO SI PUEDE O NO REALIZAR LA QUINIELA, O SE LE HA PASADO EL PLAZO
									echo "<option value='".$cntJor."'>".$cntJor." - Realizar Quiniela (jornada configurada).</option>";
								}else{
									echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Desactivada (se te paso el Plazo).</option>";
								}
							}else if($numCombo == 2){
								if($flagQuinielaActiva != 2){ //PINTAMOS EN EL COMBO SI PUEDE O NO REALIZAR LA QUINIELA, O SE LE HA PASADO EL PLAZO
									echo "<option value='".$cntJor."'>".$cntJor." - Desactivar Quiniela.</option>";
								}else{
									echo "<option value='".$cntJor."' disabled>".$cntJor." - Quiniela Desactivada.</option>";
								}
							}
						}
					}
				}
			}
		}else{
				echo "<option value='' style='background: red;'>Error en Base de datos</option>";
		}
	 }	//el cntador sale con numero de jornadas mas 1, x lo que hay q restarle 1 para hacer la siguiente comparacion.
		$cntJor--;
		if($cntJor == $numJornadasJugadas &&  $numPartiRegPorJor == 5){
			$cntJor++;
			echo "<option value='".$cntJor."' disabled>".$cntJor." - Configurar Jornada Siguiente</option>";
		}
	}else{
		$cntJor=1; //LA tabla resultados de la base de datos, esta vacia.
		echo "<option value='".$cntJor."' disabled>".$cntJor." - Configurar Jornada Siguiente</option>";
	}
			//echo "<option value=''>".$cntJor."</option>";
			echo "</select>";
	desconectarDB01($conect);
}

/* FIN PAGINA "quinielaGa.php". */
/* INICIO PAGINA "RealGalobo.php". */

function cargarTablaGoleadoresRG(){
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consGoleadores = $conect->query("SELECT idfk_jugador,sum(goles) as sumaGoles FROM jugadores_goles GROUP BY idfk_jugador ORDER BY sumaGoles DESC; ");
	if($consGoleadores){
			
		while($regisGoleadores = mysqli_fetch_assoc($consGoleadores)){
			$idJugador = $regisGoleadores['idfk_jugador'];
			$consNomJugador = $conect->query("SELECT nom_camiseta,id_jugador FROM jugadoresga WHERE id_jugador='$idJugador'; ");
			$regisJugador = mysqli_fetch_assoc($consNomJugador);
			
?>	
			<tr>
                <td class="text-center"><?php echo $regisJugador['id_jugador']." - ".$regisJugador['nom_camiseta']; ?></td>
                <td class="text-center"><?php echo $regisGoleadores['sumaGoles']; ?></td>
            </tr>
<?php
		} 
	}else{
		cargarAlerts('warning','sm','Error en Base de datos(db)');
	}
	desconectarDB01($conect);
}

function cargarComboGoleadoresPorJornada(){
	$conect = conectarDB01();
	$resultconf = $conect->query("SET NAMES 'utf8'");
	$consulta = $conect->query("SELECT distinct jornada FROM resultados; ");
	desconectarDB01($conect);
	if($consulta){
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
}

/* FIN PAGINA "realGalobo.php". */
/* INICIO PAGINA "quinielaGa.php". */

function cargarCombosJugadoresQuiniRG(){
	$con = conectarDB01();
	$resultconf = $con->query("SET NAMES 'utf8'");
	$consJugadores = $con->query("SELECT id_jugador,nom_camiseta,posicion FROM jugadoresga; ");
	if($consJugadores){
			echo "<option value=''>Elige a tu Killer:</option>";
		while($regisJugador = mysqli_fetch_assoc($consJugadores)){
			echo "<option value='".$regisJugador['id_jugador']."'>".$regisJugador['id_jugador']." - ".$regisJugador['nom_camiseta']." - ".$regisJugador['posicion']."</option>";
		}
	}
	desconectarDB01($con);
}

function generarComboQuinielasHechas(){
	$conectar = conectarDB01();
	$resultconf = $conectar->query("SET NAMES 'utf8'"); 
	$consQuiniHechas = $conectar->query("SELECT DISTINCT jornada FROM quinielaga WHERE idfk_user='".$_SESSION['id']."'; ");
	if($consQuiniHechas){
		if($consQuiniHechas->num_rows > 0){
				echo "<select id='combQuiniHecha' class='form-control' onchange='' required>";
				echo "<option value='' disabled>Elige Jornada :</option>";
			while($regisQuiniHechas=mysqli_fetch_assoc($consQuiniHechas)){
				echo "<option value='".$regisQuiniHechas['jornada']."'>Quiniela de la Jornada - ".$regisQuiniHechas['jornada']."</option>";
			}
				echo "</select>";
		}else{
			
			cargarAlerts('warning','','No tienes ninguna Quiniela Guardada. Anímate! y haz la primera');
			
		}
	}
	desconectarDB01($conectar);
}
/* FIN PAGINA "quinielaGa.php". */
?>