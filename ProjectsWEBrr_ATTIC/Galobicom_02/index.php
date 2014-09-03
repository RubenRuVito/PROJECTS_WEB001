<?php 
include 'funciones.php';

cargarCabecera('Inicio');
//cargarBarraNav(); lo invocamos al final de la fincion de cargarCabecera en el fichero de "funciones_out.php"
?>
	<canvas id="theMatrix" width="1140" height="200"></canvas>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Crea tu cuenta en Galobicom</h1>
	  <p style="color: #777;">Regístrate y hazte Galobic@ digital, una vez dentro tendrás acceso al contenido y las utilidades para enriquecer
	  	este espacio, dedicado a la comunidad Galobica.</p>
	  <p><a class="btn btn-success btn-lg" role="button" href="formRegistro.php">Crear Cuenta!</a></p>
	</div>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Real Galobo C.F.</h1>
	  <p style="color: #777;">La joya de la corona. Sección dedicada al Real Galobo F.C., equipo de fútbol que representa el sentimiento y los valores
	   de la religión GAlobianista.Aquí te informaremos de partidos, resultados, clasificación, fichajes, bajas, 3ºs tiempos..y más.</p>
	  <p><a class="btn btn-success btn-lg" role="button" href="realGalobo.php">Ir..</a></p>
	</div>

	<div class="row">
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;" >
	      <img data-src="holder.js/300x300" alt="" src="img/events01.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Eventos!!</h3>
	        <p>Quieres juntar a la camadería Galobica??, este es el lugar indicado.</p>
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
	        	a la comunidad Galobica, de tus hazañas y anécdotas más locuelieskas..!!</p>
	        <p><a href="#trip" class="btn btn-primary" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="" src="img/rombos01.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Galobas!!</h3>
	        <p>Exquisita Zona restringida, de calidad y para los más exigentes; a la que solo podrás acceder cuando alcances 
	        	el nivel de Mr.GA! que quiere decir Galán al acecho. Accede y enterate de como alcanzar tales niveles de privilegios</p>
	        <p><a href="#galobas" class="btn btn-danger" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="navbar-inverse thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="" src="img/juegos-de-azar.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3 style="color: #777;">Juegos!!</h3>
	        <p style="color: #777;">Espacio dedicado a la mente, su entretenimiento y entrenamiento en el arte del azar, la destreza, la estrategía, la agilidad y habilidades</p>
	        <p><a href="#galobas" class="btn btn-warning" role="button">Ir..</a></p>
	      </div>
	    </div>
	  </div>
    </div>

<?php
cargarPie();

?>