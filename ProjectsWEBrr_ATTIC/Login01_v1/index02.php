<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php //si el usuario intenta acceder a index02 sin haberse logeado 1º(iniciada una sesion),se le envia ala pagina de logeo index01
include_once 'funciones.php';
session_start(); // con el error 2.
if(!isset($_SESSION['usuario'])){
	header('location: index01.php?error=2');
	exit();
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Galobicom</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<?php echo 'Usuario: '.$_SESSION['usuario'];?>
	<h3><strong>Bienvenido Monete!!</strong></h3><a href="logout.php">Cerrar Sesión.</a>
	<img src="img/modeselekçtor.jpg" class="img-responsive" alt="Responsive image">
</body>
</html>
