<?php 
//Página principoal, típco index con diseño bootstrap3.
require 'funciones.php';
//session_start();
cargarCabecera('Inicio');
//cargarBarraNav(); lo invocamos al final de la funcion de cargarCabecera en el fichero de "funciones_out.php"

if(isset($_GET['mns'])){
	switch($_GET['mns']){
		case '0a': cargarAlerts('success','Bienvenido!!');
				break;
		case '1a': cargarAlerts('danger','Usuario NO registrado');
				break;
	}
}

if(!isset($_SESSION['email'])){
?>
	<div class="jumbotron">
	  <h1>Mis Favoritos - Crea tu cuenta</h1>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  consequat.</p>
	  <p><a class="btn btn-success btn-lg" role="button" href="formRegistro.php">Registrate!</a></p>
	</div>
<?php
}else{
?>
	<div class="jumbotron">
	  <h1><?php echo 'Usuario: '.$_SESSION['email'];?></h1>
	  <h2><?php echo 'Fecha de Alta: '.$_SESSION['fecAlta'];?></h2>
	  <p><a class="btn btn-success btn-lg" role="button" href="#blog">Blog..</a></p>
	</div>
<?php
	}
?>
	<div class="row">
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img data-src="holder.js/300x300" alt="...">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img data-src="holder.js/300x300" alt="...">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img data-src="holder.js/300x300" alt="...">
	      <div class="caption">
	        <h3>Thumbnail label</h3>
	        <p>...</p>
	        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	      </div>
	    </div>
	  </div>
    </div>

<?php
cargarPie();

?>