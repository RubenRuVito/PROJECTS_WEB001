<?php
//crear y ver los Favoritos del Usuario..
require_once 'funciones.php';

//session_start();
if(!isset($_SESSION['email'])){ //NO Hacking Gracias!!.seguridad xa que no puedan agregar sin estar registrados, a través del método get y la dirección remota.
	header('location: index.php?mns=1b');
	exit();
}
cargarCabecera('Mis Favoritos');
if(isset($_GET['mnsf'])){
	switch($_GET['mnsf']){
		case '0a': cargarAlerts('success', 'Favorito agregado correctamente!!'); 
					break;
		case '0b': cargarAlerts('success', 'Favorito eliminado correctamente!!');
					break;
		case '1a': cargarAlerts('danger', 'Error en Base de Datos(db), inténtelo de nuevo más tarde'); 
					break;
		case '1b': cargarAlerts('danger', 'Hacking de Usuario Si regístrado,no borres lo que no es tuyo cabrón..'); 
					break;
		case '2a': cargarAlerts('warning', 'El Favorito o página web introducido,NO es válido'); 
					break;
		case '2b': cargarAlerts('warning', 'El Favorito o página web introducido,Ya existe'); 
					break;
	}
}
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form class="form-inline" role="form" name="nuevoFavorito" action="nuevoFavorito.php" method="post">
			<input type="text" class="form-inline input-lg url" name="url" placeholder="http://">
			<button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span></button>
		</form>
	</div>
</div> 

<!-- <div class="input-group input-group-lg">
 	<form class="input-group"> 
  		<input type="text" class="form-control" placeholder="Username">
  		<span class="input-group-addon">@</span>
  	</form>
</div> -->
<p>&nbsp;</p>
<?php
$numRegistrosBloque = 5; //numero máximo de elementos que la página web va a mostrar por paginación.
cargarFavoritos($numRegistrosBloque);
cargarPaginacion($numRegistrosBloque);
cargarPie();
?>