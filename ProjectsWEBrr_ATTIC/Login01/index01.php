<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php //si el usuario ya se logeo y tiene una sesion con su maquina se le envia a index02
session_start();
if(isset($_SESSION['usuario'])){
	header('location: index02.php');
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
	<div class="row">
	  <div class="col-xs-12 col-sm-6 col-md-8"><img src="img/tunneltube04.jpg" class="img-responsive" alt="Responsive image"></div>
	  <div class="col-xs-6 col-md-4"><br><img src="img/modeselektor03.jpg" class="img-responsive" alt="Responsive image"><br><strong>Logeate Mono!</strong><br>
	  	<form class="form-horizontal" role="form" name="form" action="login.php" method="post">
		  <div class="form-group">
		    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="inputEmail" placeholder="Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" name="inputPassword" placeholder="Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Sign in</button>
		    </div>
		  </div>
		  <?php 
			if(isset($_GET['error'])){
				switch($_GET['error']){
					case 1: echo '<div class="alert alert-danger" role="alert">Datos de Login incorrectos!!</div>';
							break;
					case 2: echo '<div class="alert alert-danger" role="alert">Usuario NO registrado.</div>';
							break;
				}
			}
		   ?>
		</form>
		<!--<?php 
			if(isset($_GET['error'])){
				switch($_GET['error']){
					case 1: echo '<div class="alert alert-danger" role="alert">Datos de Login incorrectos!!</div>';
							break;
					case 2: echo '<div class="alert alert-danger" role="alert">Usuario NO registrado.</div>';
							break;
				}
			}
		?>-->
	  </div>
	</div>

</body>
</html>



<?php 

?>