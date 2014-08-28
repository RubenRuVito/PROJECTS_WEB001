<?php
function cargarCabecera($titulo){
?>
	<!-- código Html para visualizar en navegador -->
	<!DOCTYPE html>
	<html>
	<head><title>Marcadores - <?php echo $titulo; ?></title>
		<meta charset="utf-8">
		<!-- Incluiyendo archivos CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/miestilo.css">
		<!-- incluyendo archivos Java Script -->
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	</head>
	<body>
		<div class="container">

<?php
cargarBarraNav(); //poniendola aqui, no la tendrias que invocar en el fichero index.php
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

function cargarBarraNav(){ //Barra tipica de las pg Web en la parte superior del navegador.(contendra un sistema de login)
?>

<!-- Código html que interpretara el navegador del usuario (sacado de la pg de bootstrap/css y adaptado).-->
	<nav class="navbar navbar-inverse" role="navigation">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Marcadores</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!--<li class="active"><a href="#">Link</a></li> -->
	        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
	        <li><a href="#2">Página 02</a></li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php 
	      		if(isset($_SESSION['usuario'])){
	      	?>
	      	<li><a href="XXXX1">Cerrar Sesión</a></li>
	      	<?php
	      		}else{
	      	?>
			<form class="navbar-form form-inline" role="login" name="login" action="XXXXX2" method="post">
			  <div class="form-group">
			    <input type="text" class="form-control input-sm" placeholder="Email" name="email">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control input-sm" placeholder="Password" name="pass">
			  </div>
			  <button type="submit" class="btn btn-success btn-sm">Login</button>
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
	<h2>Crear Cuenta:</h2>
	<div class="row">
		<div class="col-md-6">
			<form class="form-horizontal" role="form" name="form" action="registrodb.php" method="post">
		  			<div class="form-group">
		    			<label for="inputNombreReg" class="col-sm-2 control-label">Nombre:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="15" name="inputNombreReg" placeholder="Introduce Nombre">
		    			</div>
		 			</div>
		 			<div class="form-group">
		    			<label for="inputApellidosReg" class="col-sm-2 control-label">Apellidos:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="25" name="inputApellidosReg" placeholder="Introduce Apellidos">
		    			</div>
		 			</div>
		 			<div class="form-group">
		    			<label for="inputNickReg" class="col-sm-2 control-label">Nick:</label>
		    			<div class="col-sm-10">
		      				<input type="text" class="form-control" maxlength="10" name="inputNickReg" placeholder="Introduce Nick">
		    			</div>
		 			</div>
		  			<div class="form-group">
		    			<label for="inputEmailReg" class="col-sm-2 control-label">Email:</label>
		    			<div class="col-sm-10">
		      				<input type="email" class="form-control" maxlength="25"name="inputEmailReg" placeholder="Introduce Email">
		    			</div>
		 			</div>
		  			<div class="form-group">
		    			<label for="inputPasswordReg1" class="col-sm-2 control-label">Password:</label>
		    			<div class="col-sm-10">
		      				<input type="password" class="form-control" maxlength="20" name="inputPasswordReg1" placeholder="Introduce Password">
		    			</div>
		    		</div>
		    		<div class="form-group">
		    			<label for="inputPasswordReg2" class="col-sm-2 control-label">Confirma Password:</label>
		    			<div class="col-sm-10">
		  					<input type="password" class="form-control" maxlength="20" name="inputPasswordReg2" placeholder="Confirma Password">
		  				</div>
		  			</div>
		  			<div class="form-group">
		    			<div class="col-sm-1 col-sm-10">
		      				<button type="submit" class="btn btn-info">Sign In</button>
		    			</div>
		  			</div>
		  		</form>
		</div>
	</div>

<?php
}
?>