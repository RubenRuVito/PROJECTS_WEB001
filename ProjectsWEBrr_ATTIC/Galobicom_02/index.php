<?php 
require_once 'funciones.php';

cargarCabecera('Inicio',1);
//cargarBarraNav(); lo invocamos al final de la fincion de cargarCabecera en el fichero de "funciones_out.php"
?> 
	<script type="text/javascript">
 		document.writeln("<p>"+screen.width+" x "+screen.height+"</p>");// Resolución del Navegador y personalizamos el Canvas.
 		document.writeln("<canvas class='row container' id='theMatrix' width="+screen.width+" height='+200+'></canvas>");
 	</script>

<?php
	if(!isset($_SESSION['id'])){
?>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Crea tu cuenta en Galobicom</h1>
	  <p style="color: #777;">Regístrate y hazte Galobic@ digital, una vez dentro tendrás acceso al contenido y las utilidades para enriquecer
	  	este espacio, dedicado a la comunidad Galobiana.</p>
	  <p><a class="btn btn-success btn-lg" role="button" href="formRegistro.php">Crear Cuenta!</a></p>
	</div>
<?php
	}else{
?>
	<div class="container-fluid jumbotron" style="border-radius: 10px;">
		<h1>Datos de Usuario:</h1>
	 	<h2><?php echo '<strong>Nombre Completo:</strong> '.$_SESSION['nom'].' '.$_SESSION['ape'];?></h2>
	  	<h2><?php echo '<strong>Nick:</strong> '.$_SESSION['nic'].' <strong>E-mail:</strong> '.$_SESSION['email'];?></h2>
	  	<h2><?php echo '<strong>Fecha de Alta:</strong> '.$_SESSION['fecAlta'];?></h2>
	  	<p><a class="btn btn-success btn-lg" role="button" href="#perfil" disabled>Zona Personal</a></p>
	</div>
<?php
	}
?>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Real Galobo C.F.</h1>
	  <p style="color: #777;">La joya de la corona. Sección dedicada al Real Galobo F.C., equipo de fútbol que representa el sentimiento y los valores
	   de la cultura GAlobianista.Aquí te informaremos de partidos, resultados, clasificación, fichajes, bajas, 3ºs tiempos..y más.</p>
	  <p><a class="btn btn-success btn-lg" role="button" href="realGalobo.php" disabled>Ir..</a></p>
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
	        	el nivel de Mr.GA! que quiere decir Galán al Acecho. Registraté y enterate de como alcanzar tales niveles de privilegios y empezar a gozar</p>
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