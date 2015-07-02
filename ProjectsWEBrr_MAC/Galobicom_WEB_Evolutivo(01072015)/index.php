<?php 
require_once 'funciones.php';
$pag=1;
cargarCabecera('Inicio',$pag);
//cargarBarraNav(); lo invocamos al final de la fincion de cargarCabecera en el fichero de "funciones_out.php"
?> 
	<script type="text/javascript">
 		document.writeln("<p>"+screen.width+" x "+screen.height+"</p>");// Resolución del Navegador y personalizamos el Canvas.
 		document.writeln("<canvas class='row container' id='theMatrix' width="+screen.width+" height='+200+'></canvas>");
 	</script>
 	<script type="text/javascript">

 	$(document).ready(function(){ //Sistema Jquery y Ajax para recoger variables trás un evento de un elemento.
  		$("#btnAceptarModal01").click(function(){
  			var funcion = 7;
  			var emailReg = $("#emailRegis").val();
  			var newPas1 = $("#nuevoPass").val();
  			var newPas2 = $("#nuevoPass2").val();

  			//var patronPass = '#^[A-Za-z0-9]{8,20}$#';
  			var patronPass = /[A-Za-z0-9]{8,20}/;

  			//alert ("Email: "+emailReg+" Pas1: "+newPas1+" Pas2: "+newPas2);

  			if(emailReg!=''){
  				if(newPas1!='' && newPas2!=''){
  					if(newPas1 == newPas2){
  						if(patronPass.test(newPas1)){
  							//Aqui va la chicha de AJAX..
  							//alert('todo ok reseteamos la pass enviando la info por AJAX..');
  							$.ajax({ //Funcion ajax para la cual configuramos sus parámetros para indicarle el que,como queremos que realice y donde redireccionar.
                    			type: "post",   
			                    url: "funciones_out3.php",    //Entrada del AJAX,configu de parámetros y donde redireccionar y que valores enviar.
			                    dataType: "html",
			                    data: {funcion: funcion, emailreg: emailReg, pass: newPas1},
			                    success: function(datosTabla){   //Salida del AJAX, lo que "escupe" el archivo al que hemos redireccionado, y
			                        $("#mensajeModal01").html(datosTabla); // le indicamos donde queremos que lo "escupa", indicandole 
			                    },                                      // el "id" del atributo o etiqueta en el que queremos que pinte la Salida.
			                    error: function(){
			                        //alert("Error al cargar datos..");
			                    }

			                });
  						}else{
  							$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Las contraseña No cumple el patrón. [de 8 a 15 caracteres, solo letras y números]</div>");
  						}
  					}else{
  						//alert("Passwords insertado diferentes.");
  						$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Las contraseñas no coinciden.</div>");
  					}
  				}else{
  					//alert('Campos "e-mail" y "Contraseñas", obligatorios.');
  					$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Campos 'contraseñas', obligatorios.</div>");
  				}
  			}else{
  				//alert('Campos "e-mail" obligatorio.');
  				$("#mensajeModal01").html("<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><strong>Atención!</strong> Campo 'e-mail', obligatorio.</div>");
  			}
  	    });
	});
 	</script>

<?php
	if(!isset($_SESSION['id'])){
?>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Crea tu cuenta en Galobicom</h1>
	  <p style="color: #777;">Regístrate y hazte Galobic@ digital, una vez dentro, tendrás acceso al contenido, y a las utilidades necesarias para entrenerte
	  	y a la vez enriquecer, dulce/ácida/picante-mente este espacio dedicado a la comunidad, y sentimiento Galobianista.</p>
	  <p><a class="btn btn-success btn-lg" role="button" href="formRegistro.php">Crear Cuenta!</a></p>
	</div>
<?php
	}else{
?>
	<div class="container-fluid jumbotron" style="border-radius: 10px; background-color: #77b300;">
		<h1>Datos de Usuario:</h1>
	 	<h2><?php echo '<strong>Nombre Completo:</strong> '.$_SESSION['nom'].' '.$_SESSION['ape'];?></h2>
	  	<h2><?php echo '<strong>Nick:</strong> '.$_SESSION['nic'].' <strong>E-mail:</strong> '.$_SESSION['email'];?></h2>
	  	<h2><?php echo '<strong>Fecha de Alta:</strong> '.$_SESSION['fecAlta'].' <strong>Nivel de Acceso:</strong> '.$_SESSION['nivAcceso'];?></h2>
	  	<p><a class="btn btn-primary btn-lg" role="button" href="#perfil" disabled>Zona Personal</a><p style="font-family: cursive;"> En construcción...</p></p>
	</div>
<?php
	}
?>
	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">Real Galobo C.F.</h1>
	  <p style="color: #777;">La joya de la corona. Sección dedicada al Real Galobo C.F., equipo de fútbol que representa el sentimiento y los valores
	   de la cultura GAlobianista.Aquí te informaremos de partidos, resultados, clasificación, fichajes, bajas, 3ºs tiempos..y más.</p>
<?php
	if(!isset($_SESSION['id'])){
?>
	  <p><a class="btn btn-success btn-lg" role="button" href="realGalobo.php" disabled>Ir..</a></p>
<?php
	}else{
?>	
	<p><a class="btn btn-success btn-lg" role="button" href="realGalobo.php?p=<?php echo $pag; ?>">Ir..</a></p>
<?php
	}
?>
	</div>

	<div class="navbar-inverse jumbotron" style="border-radius: 10px;">
	  <h1 style="color: #777;">"Galobiteca"</h1>
	  <p style="color: #777;">Lugar donde cada galobico puede poner sus bienes materiales o digitales al servicio de la comunidad, pelis, libros, música…o 
	  	cualquier cosa que queráis compartir u ofrecer, y dependiendo del formato, con vuelta o sin ella. </p>
	   <p><a class="btn btn-success btn-lg disabled" role="button" href="realGalobo.php" disabled>Ir..</a></p><p style="font-family: cursive; color: white;"> En construcción...</p>
	</div>

	<div class="row">
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;" >
	      <img data-src="holder.js/300x300" alt="" src="imgruvio/events01.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Eventos!!</h3>
	        <p>Quieres juntar a la camaradería Galobica??, este es el lugar indicado.</p>
	        <p><a href="#events" class="btn btn-success" role="button" disabled>Ir..</a></p><p style="font-family: cursive;"> En construcción...</p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="navbar-inverse thumbnail" style="border-radius: 10px;">
	      <img data-src="holder.js/300x300" alt="" src="imgruvio/world02.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3 style="color: #777;">Galobic@s around the World!!</h3>
	        <p style="color: #777;">Si estás conquistando el mundo, y quieres contárnoslo, aquí tienes un espacio en el que informar, a la 
	        	comunidad Galobica, de tus hazañas y anécdotas más locuelieskas..y porque no, de tu día a día lejos de los tuy@s!!</p>
<?php
	if(!isset($_SESSION['id'])){
?>
	  <p><a href="indexga.php?cat=galobosWorld" class="btn btn-primary" role="button" disabled>Ir..</a></p>
<?php
	}else{
?>	
	<p><a href="indexga.php?cat=galobosWorld" class="btn btn-primary" role="button">Ir..</a></p>
<?php
	}
?>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="" src="imgruvio/rombos01.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3>Galobas!!</h3>
	        <p>Exquisita Zona restringida, de calidad y para los más exigentes; a la que solo podrás acceder cuando alcances 
	        	el nivel de Mr.GA! que quiere decir Galán al Acecho. Registraté y enterate de como alcanzar tales niveles de privilegios y empezar a gozar</p>
	        <p><a href="#galobas" class="btn btn-danger" role="button" disabled>Ir..</a></p><p style="font-family: cursive;"> En construcción...</p>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6 col-md-3">
	    <div class="navbar-inverse thumbnail" style="border-radius: 10px; background-color: #58D3F7;">
	      <img data-src="holder.js/300x300" alt="" src="imgruvio/juegos-de-azar.jpg" style="border-radius: 10px;">
	      <div class="caption">
	        <h3 style="color: #777;">Juegos!!</h3>
	        <p style="color: #777;">Espacio dedicado a la mente, su entretenimiento y entrenamiento en el arte del azar, la destreza, la estrategia, 
	        	la agilidad y habilidades...vengaaa! de momento una quiniela en base a la liga del Real Galobo C.F., con un añadido. Y por supuesto habrá
	        	extraordinarios premios cada semana, a los más “jugones”, y un premios final, que muchos quisieran...echar la quinielaGA! y disfrutar.</p>
<?php
	if(!isset($_SESSION['id'])){
?>
	  <p><a href="quinielaGa.php?p=<?php echo $pag; ?>" class="btn btn-warning" role="button" disabled>Quiniela GA!</a></p>
<?php
	}else{
?>	
	<p><a href="quinielaGa.php?p=<?php echo $pag; ?>" class="btn btn-warning" role="button">Quiniela GA!</a></p>
<?php
	}
?>
	      </div>
	    </div>
	  </div>
    </div>

<?php
cargarPie();

?>