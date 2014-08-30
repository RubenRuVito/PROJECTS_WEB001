<?php 
include 'funciones.php';

cargarCabecera('Inicio');
//cargarBarraNav(); lo invocamos al final de la fincion de cargarCabecera en el fichero de "funciones_out.php"
?>

	<div class="jumbotron" style="background-color: #58D3F7;">
	  <h1>Galobicom - Crea tu cuenta</h1>
	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	  consequat.</p>
	  <p><a class="btn btn-success btn-md" role="button" href="formRegistro.php">Registrate!</a></p>
	</div>

	<div class="row">
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;" >
	      <img data-src="holder.js/300x300" alt="...">
	      <div class="caption">
	        <h3>Friendly Events!!</h3>
	        <p>Quieres juntar a la camadería Galobica??, este es el lugar indicado..</p>
	        <p><a href="#events" class="btn btn-success" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="...">
	      <div class="caption">
	        <h3>Trip!!</h3>
	        <p>Dí donde vas, con que tipo de monchis y podrás ir acompañado y compartir gastos</p>
	        <p><a href="#trip" class="btn btn-primary" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-4">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="...">
	      <div class="caption">
	        <h3>Galobas!!</h3>
	        <p>Zona restringida, a la que solo podrás acceder cuando tu estatus alcanze el nivel de Mr.LoboloGaloba!</p>
	        <p><a href="#galobas" class="btn btn-danger" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
    </div>

<?php
cargarPie();

?>