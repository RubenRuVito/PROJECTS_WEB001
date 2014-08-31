<?php
//FUNCIONES PARA CREAR LA PARTE VISUAL DE LA WEB(por partes)(para no escribir el mismo código varias
//veces, como en el caso de las cabeceras y pies de página).
session_start();
function cargarCabecera($titulo){
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
	<body onload="init();">
		<div class="container" style="background-color: black; border-radius: 10px;">
		  <!--<canvas id="theMatrix" width="1150" height="200"></canvas> -->

<?php
cargarBarraNav(); //poniendola aqui, no la tendrias que invocar en el fichero index.php
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

function cargarBarraNav(){ //Barra tipica de las pg Web en la parte superior del navegador.(contendra un sistema de login)
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
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utilidades <span class="caret"></a>
	        	<ul class="dropdown-menu navbar-inverse" role="menu" style="border-radius: 10px;">
	        		<li><a style="color: #777;" href="indexga.php">Blog <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu02">Events <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu03">Por el Mundo <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu04">Juegos <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu05">Galobas <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        	</ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php 
	      		if(isset($_SESSION['nom'])){
	      	?>
	      	<!--<li><br><p style="color: #777;"><?php echo 'Hola!' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';?></p></li> -->
	      	<li><a class="navbar-brand"><?php echo 'Hola! ' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';?></a></li>
	      	<li><a href="logout.php">Cerrar Sesión</a></li>
	      	<?php
	      		}else{
	      	?>
			<form class="navbar-form form-inline" role="login" name="login" action="login.php" method="post">
			  <div class="form-group">
			    <input type="text" class="form-control input-sm" placeholder="Email" name="inputEmail">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control input-sm" placeholder="Password" name="inputPassword">
			  </div>
			  <button type="submit" class="btn btn-success btn-sm">Login</button>
			  <?php 
				if(isset($_GET['error'])){
					switch($_GET['error']){
						case 1: echo '<br></br><div class="alert-md alert-danger" role="alert" style="border-radius: 5px;">Datos de Login incorrectos!!</div>';
								break;
						case 2: echo '<br></br><div class="alert-md alert-danger" role="alert" style="border-radius: 5px;">Usuario NO registrado.</div>';
								break;
					}
				}
			  ?>
			</form>
			<?php
				}
			?>
		   </ul>
		  </div>
		 </nav>
<?php
}

function cargarFormRegistro(){//formulario de registro de usuario.
?>
	<br>
	<div class="row">
		<h2>Crear Cuenta:</h2>
		<div class="col-md-6 navbar-inverse jumbotron" style="border-radius: 10px;">
			<form class="form-horizontal" role="form" name="form" action="registrodb.php" method="post">
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
		    			<label for="inputPasswordReg2" class="col-sm-2 control-label" style="color: black">Confirma Password:</label>
		    			<div class="col-sm-10">
		  					<input type="password" class="form-control" maxlength="20" name="inputPasswordReg2" placeholder="Confirma Password">
		  				</div>
		  			</div>
		  			<?php 
	      				if(isset($_SESSION['nom'])){
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