<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php //si el usuario ya se logeo y tiene una sesion con su maquina se le envia a index02
session_start();
if(isset($_SESSION['usuario'])){
	header('location: index02.php');
	exit();
}
?>
<!-- CAMBIAR EL ARCHIVO AL QUE APUNTA EL FORM DEPENDIENDO SI EL LOGIN ES A TRAVÉS DE BBDD(usuarios) o archivo de configuracion..-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Galobicom</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
	<div class="row">
	  <div class="col-xs-12 col-sm-6 col-md-8"><a href="index01.php"><img src="img/tunneltube04.jpg" class="img-responsive" alt="Responsive image"></a></div>
	  <div><img src="img/Modeselektor-Logo01.jpg" class="img-responsive" alt="Responsive image"><strong>Logeate Mon@!</strong></div>
	  <div class="col-xs-6 col-md-4">
	  	<form class="form-horizontal" role="form" name="form" action="logindb.php" method="post">
		  <div class="form-group">
		    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" maxlength="25" name="inputEmail" placeholder="Introduce Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword" class="col-sm-2 control-label">Password:</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" maxlength="20" name="inputPassword" placeholder="Introduce Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-1 col-sm-10">
		      <button type="submit" class="btn btn-default">Login</button>
		    </div>
		  </div>
		  <?php 
			if(isset($_GET['error'])){
				switch($_GET['error']){
					case 1: echo '<div class="alert alert-danger" role="alert">Datos de Login incorrectos!!</div>';
							break;
					case 2: echo '<div class="alert alert-danger" role="alert">Usuario NO registrado.</div>';
							break;
				}
			}
		   ?>
		</form>
		<div class="btn-group">
			<button class="btn btn-primary">Sing Up</button>
			<button class="btn dropdown-toggle btn-primary" data-toggle="collapse" data-target="#reg"><span class="caret"></span></button>
		</div>
		    <div id="reg" class="collapse"><br>
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
		  </div><br><br>
		  <?php 
			if(isset($_GET['erroreg'])){
				switch($_GET['erroreg']){
					case 0: echo '<div class="alert alert-danger" role="alert">Confirmación de Password Incorrecta!!</div>';
							break;
					case 1: echo '<div class="alert alert-danger" role="alert">Datos de Registro No cumplen los Patrones!![Ayuda:....]</div>';
							break;
					case 2: echo '<div class="alert alert-danger" role="alert">Usuario registrado.</div>';
							break;
					case 3: echo '<div class="alert alert-danger" role="alert">Error en BBDD, inténtelo más tarde.</div>';
							break;
				}
			}
		  ?>
	  </div>
	</div>
  	</div>
</body>
</html>



<?php 

?>