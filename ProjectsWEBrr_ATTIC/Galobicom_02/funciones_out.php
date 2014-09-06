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
		<div class="container-fluid" style="background-color: black; border-radius: 10px;">
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
	      	<li class="navbar-brand">
	      	<?php
	      			if(isset($_GET['mnsl'])){
						switch($_GET['mnsl']){
							case '0a': cargarAlerts('success','sm','Estás Dentro!..Bienvenido!!');
										break;
						}
					}
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
?>