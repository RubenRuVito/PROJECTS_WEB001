<?php

function conexion() {
	$con = mysql_connect("localhost", "root_ruben01", "ruben01");
	if (!$con) {
		die('Could not connect: ' . mysql_error());
	}
	//mysql_select_db("edg_dbadmi_dump01", $con);
	mysql_select_db("cdcol", $con);
	return ($con);
}

function generaCentros()
{
	conexion();
	$consulta=mysql_query("SELECT id, titel FROM cds");
	echo "<select name='cds' id='cds' onChange='cargaContenido(this.id)' multiple data-rel='chosen'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>

		<!-- start: Meta -->
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Metro Admin Template - Metro UI Style Bootstrap Admin Template</title>
		<meta name="description" content="Metro Admin Template.">
		<meta name="author" content="ï¿½ï¿½ï¿½ï¿½ï¿½ï¿½ukasz Holeczek">
		<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
		<!-- end: Meta -->

		<!-- start: Mobile Specific -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- end: Mobile Specific -->

		<!-- start: CSS -->
		<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link id="base-style" href="css/style.css" rel="stylesheet">
		<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
		<!-- end: CSS -->

		<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
		<![endif]-->

		<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
		<![endif]-->

		<!-- start: Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico">
		<!-- end: Favicon -->
		
		<!-- start: JavaScript-->

			<script src="js/jquery-1.9.1.min.js"></script>
			<script src="js/jquery-migrate-1.0.0.min.js"></script>
			<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
			<script src="js/jquery.ui.touch-punch.js"></script>
			<script src="js/modernizr.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/jquery.cookie.js"></script>
			<script src='js/fullcalendar.min.js'></script>
			<script src='js/jquery.dataTables.min.js'></script>
			<script src="js/excanvas.js"></script>
			<script src="js/jquery.flot.js"></script>
			<script src="js/jquery.flot.pie.js"></script>
			<script src="js/jquery.flot.stack.js"></script>
			<script src="js/jquery.flot.resize.min.js"></script>
			<script src="js/jquery.chosen.min.js"></script>
			<script src="js/jquery.uniform.min.js"></script>
			<script src="js/jquery.cleditor.min.js"></script>
			<script src="js/jquery.noty.js"></script>
			<script src="js/jquery.elfinder.min.js"></script>
			<script src="js/jquery.raty.min.js"></script>
			<script src="js/jquery.iphone.toggle.js"></script>
			<script src="js/jquery.uploadify-3.1.min.js"></script>
			<script src="js/jquery.gritter.min.js"></script>
			<script src="js/jquery.imagesloaded.js"></script>
			<script src="js/jquery.masonry.min.js"></script>
			<script src="js/jquery.knob.modified.js"></script>
			<script src="js/jquery.sparkline.min.js"></script>
			<script src="js/counter.js"></script>
			<script src="js/retina.js"></script>
			<script src="js/custom.js"></script>
			<script src="js/select_dependientes.js"></script>			

			<!-- end: JavaScript-->
		
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="col-md-12">
				<h2>Listados Brains</h2>
				<div class="box-content">
					<form class="form-horizontal">
						<div class="row-fluid">
      						<div class="col-md-4">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="selectError">A–o</label>
										<div class="controls">
											<select id="selectError" data-rel="chosen">
												<option>2014</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="selectError1">Selecciona Colegio</label>
										<div class="controls">
											<?php generaCentros(); ?>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="selectError4">Selecciona Curso Verano</label>
										<div class="controls">
											<select disabled="disabled" multiple data-rel="chosen" name="cursos" id="cursos">
												<option value="0">Selecciona opci—n...</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-4">								
									<div class="control-group">
										<label class="control-label" for="selectError5">Selecciona Nivel Alumo</label>
										<div class="controls">
											<select id="selectError5" multiple data-rel="chosen">
												<option>La Moraleja</option>
												<option>Lombillo</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="selectError2">Selecciona Grupo</label>
										<div class="controls">
											<select id="selectError2" multiple data-rel="chosen">
												<option>La Moraleja</option>
												<option>Lombillo</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="selectError3">Nivel de Ingles</label>
										<div class="controls">
											<select id="selectError3" multiple data-rel="chosen">
												<option>La Moraleja</option>
												<option>Lombillo</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-4">										
									<div class="control-group">
										<label class="control-label" for="selectError6">Periodo</label>
										<div class="controls">
											<select id="selectError6"  data-rel="chosen">
												<option>Mes</option>
												<option>Quincena 1</option>
												<option>Quincena 2</option>
												<option>3 Semanas 1</option>
												<option>3 Semanas 2</option> 
											</select>
										</div>
									</div>
									<div class="controls">
									  <label class="checkbox inline">
										<div class="checker" id="uniform-inlineCheckbox1"><span class="checked"><input type="checkbox" id="inlineCheckbox1" value="option1"></span></div> Con Comedor
									  </label>
									  <label class="checkbox inline">
										<div class="checker" id="uniform-inlineCheckbox2"><span class="checked"><input type="checkbox" id="inlineCheckbox2" value="option2"></span></div> Sin Comedor
									  </label>
									</div>
									<div class="controls">
									  <label class="checkbox inline">
										<div class="checker" id="uniform-inlineCheckbox1"><span class="checked"><input type="checkbox" id="inlineCheckbox1" value="option1"></span></div> Por Padres
									  </label>
									  <label class="checkbox inline">
										<div class="checker" id="uniform-inlineCheckbox2"><span class="checked"><input type="checkbox" id="inlineCheckbox2" value="option2" checked="checked"></span></div> Por Alumnos
									  </label>
									</div>									
									<div class="controls">
										<label>
											<input type="checkbox"> Requiere Atenci—n Especial
									    </label>
									</div>
									<div class="controls">
										<label>
											<input type="checkbox"> Horario Extra
									    </label>
									</div>
								</div>									
								<button type="submit" class="btn btn-default">
									Filtrar
								</button>																
								</fieldset>	
							</div>
						</div>
					</form>
				</div>
				</div>
				<div class="clearfix"></div>
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header" data-original-title>
							<h2><i class="halflings-icon user"></i><span class="break"></span>Alumnos</h2>
							<div class="box-icon">
								<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
								<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
							</div>
						</div>
						
						<div class="box-content">
							<table id="lista Cds" class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th>ID</th>
										<th>Titulo</th>
										<th>Autor</th>
										<th>A–o</th>
										<th>Status</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
								<?php
								
								$con=conexion();
								mysql_query("SET NAMES 'utf8'");
								//$res=mysql_query("select * from cv_solicitud_curso_verano INNER JOIN alumnos ON cv_solicitud_curso_verano.id_alumno=alumnos.id WHERE fecha_solicitud >'2014-01-01' LIMIT 1000",$con);
								$res=mysql_query("select * from cds");
								while($fila=mysql_fetch_array($res)){
								
								?>
									<tr>
										<td><?php echo $fila['id']; ?></td>
										<td><?php echo $fila['titel']; ?>, <?php echo $fila['apellidos']; ?> <?php echo $fila['apellidos2']; ?></td>
										<td class="center"><?php echo $fila['interpret']; ?></td>
										<td class="center"><?php echo $fila['jahr']; ?></td>
										<td class="center">
											<?php if ($fila['estado']=="baja"){?>
											<span class="label label-default"><?php echo $fila['estado']; ?></span></td>
											<?php }elseif ($fila['estado']=="aprobada") {?>
											<span class="label label-info"><?php echo $fila['estado']; ?></span></td>
											<?php }else {?>
											<span class="label label-success"><?php echo $fila['estado']; ?></span></td>
											<?php } ?>
										<td class="center">
											<a class="btn btn-success" href="#"> <i class="halflings-icon white zoom-in"></i> </a>
											<a class="btn btn-info" href="#"> <i class="halflings-icon white edit"></i> </a>
											<a class="btn btn-danger" href="#"> <i class="halflings-icon white trash"></i> </a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div><!--/span-->

				</div><!--/row-->

			</div>
			<div class="clearfix"></div>

			<footer>
				<p>
					<span style="text-align:left;float:left">&copy; <a href="" target="_blank">Dioxinet</a> 2014</span>
					<span class="hidden-phone" style="text-align:right;float:right">Realizado por: <a href="#">Dioxinet</a></span>
				</p>

			</footer>
	</body>
</html>

