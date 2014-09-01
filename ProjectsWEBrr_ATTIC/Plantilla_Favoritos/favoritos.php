<?php
//crear y ver los Favoritos del Usuario..
require 'funciones.php';

//session_start();
if(!isset($_SESSION['email'])){
	header('location: index.php?mns=1a');
	exit();
}
cargarCabecera('Galobicom-Favoritos');
if(isset($_GET['mnsf'])){
	switch($_GET['mnsf']){
		case '0a': cargarAlerts('success', 'Usuario registrado correctamente,[identificate en la barra de inicio..]'); 
					break;
	}
}
?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form class="form-inline" role="form" name="nuevoFavorito" action="nuevoFavorito.php" method="post">
			<input type="url" class="form-control input-lg url" name="url" placeholder="http://">
			<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
		</form>
	</div>
</div>
<p>&nbsp;</p>
<?php
cargarFavoritos();
cargarPie();
?>