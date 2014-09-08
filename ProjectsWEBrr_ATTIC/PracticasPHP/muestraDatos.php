<!DOCTYPE html>
<html>
<head>
	<title>AJAX practica-1</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-xs-6 col-xs-offset-3">
			<button id="carga" class="btn btn-warning">Carga datos</button>
			<div id="listado"></div>
		</div>
	</div>

	<script type"text/javascript">
		$("#carga").click(function(){
			$.ajax({
				url: "datosTabla.php",
				dataType: "html",
				success: function(datos){
					$("#listado").html(datos);
				},
				error: function(){
					alert("Error al cargar datos..");
				}
			});
		});
	</script>
</body>
</html>
