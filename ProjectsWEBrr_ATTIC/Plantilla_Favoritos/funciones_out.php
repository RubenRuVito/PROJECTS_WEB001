<?php
require_once 'funciones.php';
//session_start();

function cargarCabecera($titulo){
?>
	<!-- código Html para visualizar en navegador -->
	<!DOCTYPE html>
	<html>
	<head><title>Favoritos- <?php echo $titulo; ?></title>
		<meta charset="utf-8">
		<!-- Incluiyendo archivos CSS -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" type="text/css" href="css/rrestilo.css">
		<!-- incluyendo archivos Java Script -->
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
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

function cargarAlerts($tipo,$mensaje){
      switch($tipo){
      	case 'success':
      		$clase = 'alert alert-success alert-dismissible';
      		break;
      	case 'warning':
      		$clase = 'alert alert-warning alert-dismissible';
      		break;
      	case 'danger':
      		$clase = 'alert alert-danger alert-dismissible';
      		break;
      }
?>
		<div class="<?php echo $clase; ?>" role="alert">
		  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		  <strong>Atención!</strong> <?php echo $mensaje; ?>.
		</div>
	
<?php
}

function cargarBarraNav(){ //Barra tipica de las pg Web en la parte superior del navegador.(contendra un sistema de login)
?>

<!-- Código html que interpretara el navegador del usuario (sacado de la pg de bootstrap/css y adaptado).-->
	<nav class="nav navbar navbar-inverse" role="navigation" style="border-radius: 10px;">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Plantilla-Favoritos</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <!--<li class="active"><a href="#">Link</a></li> -->
	        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
	        <li><a href="favoritos.php">Mis Favoritos</a></li>
	        <li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></a>
	        	<ul class="dropdown-menu navbar-inverse" role="menu" style="border-radius: 10px;">
	        		<li><a style="color: #777;" href="formRegistro.php">A <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu02">B <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu03">C <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu04">D <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        		<li><a style="color: #777;" href="#menu05">E <small><span class="glyphicon glyphicon-arrow-right"></span></small></a></li>
	        	</ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<?php 
	      		if(isset($_SESSION['email'])){
	      	?>
	      	<li><a href="logout.php">Cerrar Sesión</a></li>
	      	<?php
	      		}else{
	      	?>
			<form class="navbar-form form-inline" role="login" name="login" action="login.php" method="post">
			  <div class="form-group">
			    <input type="email" class="form-control input-sm" placeholder="Email" name="inputEmail">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control input-sm" placeholder="Password" name="inputPass">
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

function cargarFormRegistro(){//formulario de registro de usuario completo.
?>
	<h2>Crear Cuenta:</h2>
	<div class="row">
		<div class="col-md-6">
			<form class="form-horizontal" role="form" name="form" action="registro.php" method="post">
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

function cargarFormRegistroCorto(){//formulario de registro para el alta de usuario "corto".
?>
	<h2>Crear Cuenta:</h2>
	<div class="col-sm-6 navbar-nav jumbotron" style="border-radius: 10px;">
		<form class="form-horizontal" role="form" name="form" action="registro.php" method="post">
			<div class="form-group">
		    		<label for="inputEmailReg" class="col-sm-2 control-label">Email:</label>
		    		<div class="col-sm-10">
		      			<input type="email" class="form-control" maxlength="25" name="inputEmailReg" placeholder="Introduce Email">
		    		</div>
		 	</div>
		  	<div class="form-group">
		    		<label for="inputPasswordReg1" class="col-sm-2 control-label">Password:</label>
		    		<div class="col-sm-10">
		      			<input type="password" class="form-control" maxlength="20" name="inputPassReg1" placeholder="Introduce Password">
		    		</div>
		    </div>
		    <div class="form-group">
		    		<label for="inputPasswordReg2" class="col-sm-2 control-label">Confirmar Password:</label>
		    		<div class="col-sm-10">
		  				<input type="password" class="form-control" maxlength="20" name="inputPassReg2" placeholder="Vuelve a ingresar el Password">
		  			</div>
		  	</div>
		  	<?php
		  		if(!isset($_SESSION['id'])){
		  	?>
		  	<div class="form-group">
		    		<div class="col-sm-1 col-sm-10">
		      			<button type="submit" class="btn btn-info">Sign In</button>
		    		</div>
		  	</div>
		  	<?php 
		  		}else{
		  	?>
		  	<div class="form-group">
		    		<div class="col-sm-1 col-sm-10">
		      			<button type="submit" class="btn btn-info" disabled>Sign In</button>
		    		</div>
		  	</div>
		  	<?php
		  		}
		  	?>
		</form>
	</div>
	<div class="row"></div>
	
<?php
}

function cargarFavoritos($maxelempag){
	$iduser = $_SESSION['id'];
	if(!isset($_GET['npag'])){//Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagina = 1;
	}else{
		$pagina = addslashes(strip_tags($_GET['npag']));
	}
	$posicion = ($pagina - 1) * $maxelempag;

	$conexion = conectarDB01();
	$configDatos = $conexion->query("SET NAMES 'utf8';");//Realizar esta instrucción siempre antes de recuperar,modificar,crear registros en las tablas(entidades).
	$consulta = $conexion->query("SELECT * FROM links WHERE id_user2='$iduser' LIMIT $posicion, $maxelempag; ");//Consultar para poder realizar Paginacion a través de los parámetros enviados 
	if($consulta->num_rows == 0){																	//en la clausula "limit", que sirve para traer los datos x bloques [$posicion_inicial, $num_elem_x_bloque].
		cargarAlerts('warning','No tienes favoritos almacenados en la bbdd');
	}else{
			echo '<table class="table table-striped">';
		while($link = $consulta->fetch_assoc()){
			echo '<tr>';
			echo '<td><a href="'.$link['url'].'" target="_blank">'.$link['url'].'</a></td>';//Muestra las url como un link y si las pulsas se abren en otra pestaña(_blank).
			echo '<td class="text-right"><a href="borrarFavorito.php?idl='.$link['id_link'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></td>';
			echo '</tr>';
		}
			echo '</table>';
	}
}

function cargarPaginacion($maxelempag){
	$iduser = $_SESSION['id'];
	if(!isset($_GET['npag'])){ //Sirve para posicionar la consulta a la bbdd para que envie los registros de la paginación correspondiente.
		$pagActual = 1;
	}else{
		$pagActual = addslashes(strip_tags($_GET['npag']));
	}


	$conexion = conectarDB01();
	$configDatos = $conexion->query("SET NAMES 'utf8';");
	$consulta = $conexion->query("SELECT COUNT(*) as total FROM links WHERE id_user2='$iduser'; "); //esta consulta devuelve un registro con un dato, con el número de resultados que ha recuperado.
	//$registro = mysqli_fetch_assoc($consulta); //
	$registro = $consulta->fetch_assoc();
	desconectarDB($conexion);
	$totalRegistros = $registro['total']; //cálculo del num de páginas a partir del num de registros recuperados.
	
	$paginas = ceil($totalRegistros / $maxelempag);

			echo '<div class="row text-center">'; //pintamos el bloque de botones para la paginación.
			echo '<ul class="pagination">';
	for($cnt = 1; $cnt <= $paginas; $cnt++){
		if($cnt == $pagActual){ //Pintamos los botones de paginación, e inhabilitamos el botón del num de páginación en la que nos encontramos.
			echo '<li class="disabled"><a href="">'.$cnt.'</a></li>';
		}else{
			echo '<li><a href="favoritos.php?npag='.$cnt.'">'.$cnt.'</a></li>';
		}

	}
			echo '</ul>';
			echo '</div>';
}

?>