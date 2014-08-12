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
	<form class="navbar-form navbar-left" role="search" action="insertarRegistro.php" method="post">
  		<div class="form-group">
    		<input type="text" class="form-control" name="titulo" placeholder="Título">
    		<input type="text" class="form-control" name="autor" placeholder="Autor">
    		<input type="text" class="form-control" name="ano" placeholder="Año">
  		</div>
  			<button type="submit" class="btn btn-default">Insertar</button>
	</form>
</body>
</html>
