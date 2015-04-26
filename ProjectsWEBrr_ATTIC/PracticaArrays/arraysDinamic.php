<!DOCTYPE html>
<html>
<head>
	<title>AJAX practica-1</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/mootools-core-1.3.2-full-compat-yc.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-xs-6 col-xs-offset-3">
			 <label for="" class="">Cuantos Jugadores diferentes han Marcado:</label>
             <select id="selNumJugadoresGol" class="col-sm-6 form-control"> <!-- Select dinámico, x jquery -->
                <option value=''>Selecciona cuantos jugadores han marcado gol:</option>
                <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option>
                <option value='4'>4</option><option value='5'>5</option><option value='6'>6</option>
                <option value='7'>7</option><option value='8'>8</option><option value='9'>9</option>
             </select>
		</div>
		<div class="col-xs-6 col-xs-offset-3">
			<div id="listado"></div>
			<button id="enviaArrays" class="btn btn-warning">Enviar Arrays</button>
			<div id="listado2"></div>
		</div>
	</div>

	<script type="text/javascript">
		$("#selNumJugadoresGol").change(function(){
			var funcion = 0;
			var numJug = $("#selNumJugadoresGol").val();
			$.ajax({
				type: "post",
                datatype: "html",
                url: "funcionesPhp.php",
                data: {funcion: funcion, numJuGol: numJug},
				success: function(datos){
					$("#listado").html(datos);
				},
				error: function(){
					alert("Error al cargar datos..");
				}
			});
		});

		var numJugaGol = $("#selNumJugadoresGol").val(); 
		var idJugadoresGol = [];
		var goles = [];
		function valoresIdJugadoresGol(valor){   //Problema: Si en los select de jugadores Goleadores, eliges en uno de ellos a un jugador
		    idJugadoresGol.push(valor.value);    // y luego a otro, el id del jugador no se resetea y se estaría guardando el id de los 2
			alert(idJugadoresGol);				// cuando lo correcto es enviar o guardar solo uno.
		}                                       
		function valoresGolesJugador(valor){
		    goles.push(valor.value);
		    alert(goles);
		}

		$("#enviaArrays").click(function(){
			var funcion = 1;
			//var numJug = $("#selNumJugadoresGol").val();
			var jsonidJugadoresGol = JSON.encode(idJugadoresGol); //Array de id de jugadores que han marcado gol.codificado para
    		var jsongoles = JSON.encode(goles);					// poder ser enviado por ajax.
			
			$.ajax({
				type: "post",
                datatype: "html",
                url: "funcionesPhp.php",
                data: {funcion: funcion, ArayIds: jsonidJugadoresGol, ArayGoles: jsongoles},
				success: function(datos){
					$("#listado2").html(datos);
				},
				error: function(){
					alert("Error al cargar datos..");
				}
			});
		});

	</script>
</body>
</html>