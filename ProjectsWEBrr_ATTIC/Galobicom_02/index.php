<?php 
include 'funciones.php';

cargarCabecera('Inicio');
//cargarBarraNav(); lo invocamos al final de la fincion de cargarCabecera en el fichero de "funciones_out.php"
?>
	<canvas id="theMatrix" width="1140" height="200"></canvas>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Crea tu cuenta en Galobicom</h1>
	  <p style="color: #777;">Regístrate y hazte Galobic@ digital, una vez dentro tendrás acceso a las utilidades de la comunidad.</p>
	  <p><a class="btn btn-success btn-md" role="button" href="formRegistro.php">Crear Cuenta!</a></p>
	</div>

	<div class="row">
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;" >
	      <img data-src="holder.js/300x300" alt="" src="img/events01.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Friendly Events!!</h3>
	        <p>Quieres juntar a la camadería Galobica??, este es el lugar indicado..</p>
	        <p><a href="#events" class="btn btn-success" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="navbar-inverse thumbnail" style="border-radius: 10px;">
	      <img data-src="holder.js/300x300" alt="" src="img/world02.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3 style="color: #777;">Galobic@s around the World!!</h3>
	        <p style="color: #777;">Si estás conquistando el mundo, y quieres contarnoslo, aqui tienes un epacio en el que informar
	        	a la camadería Galobica de tus hazañas y anécdotas más locuelieskas..!!</p>
	        <p><a href="#trip" class="btn btn-primary" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="" src="img/rombos01.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Galobas!!</h3>
	        <p>Zona restringida, a la que solo podrás acceder cuando tu estatus alcanze el nivel de Mr.LoboloGaloba!</p>
	        <p><a href="#galobas" class="btn btn-danger" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="" src="img/juegos-de-azar.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Juegos!!</h3>
	        <p>Espacio dedicado a la mente y su entretenimiento en las artes del azar, destreza, estrategía y habilidades</p>
	        <p><a href="#galobas" class="btn btn-warning" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
    </div>

<?php
cargarPie();

?>