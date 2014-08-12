<?php
$id_cds=addslashes(strip_tags($_GET['id']));
$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
$resultado = $conexion->query("SELECT * FROM cds01 WHERE id_cd='$id_cds'");
$registro = $resultado->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Nuevo CD</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<form class="navbar-form navbar-left" role="search" action="editarRegistro.php" method="post">
  		<div class="form-group">
  			<input type="text" class="form-control" name="id_cd" placeholder="id" value="<?php echo $registro['id_cd']; ?>">
    		<input type="text" class="form-control" name="titulo" placeholder="Título" value="<?php echo $registro['titulo']; ?>">
    		<input type="text" class="form-control" name="autor" placeholder="Autor" value="<?php echo $registro['autor']; ?>">
    		<input type="text" class="form-control" name="ano" placeholder="Año" value="<?php echo $registro['ano']; ?>">
  		</div>
  			<button type="submit" class="btn btn-default">Modificar</button>
	</form>
</body>
</html>