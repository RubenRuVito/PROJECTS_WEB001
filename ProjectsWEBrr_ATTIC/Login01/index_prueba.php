<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
	<title>Probando Diseño</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<form name="f1" action="login.php" method="post">
		Nombre: <input type="text" name="nom">
		Pasword: <input type="text" name="pass">
		<input type="submit" value="Enviar">
	</form>
	<div class="row">
	  <div class="col-xs-12 col-sm-6 col-md-8"><a href="index01.php"><img src="img/tunneltube04.jpg" class="img-responsive" alt="Responsive image"></a></div>
	  <div><img src="img/Modeselektor-Logo01.jpg" class="img-responsive" alt="Responsive image"><strong>Logeate Mon@!</strong></div>
	  <div class="col-xs-6 col-md-4">
	  	<form class="form-horizontal" role="form" name="form" action="logindb.php" method="post">
		  <div class="form-group">
		    <label for="inputEmail" class="col-sm-2 control-label">Email:</label>
		    <div class="col-sm-10">
		      <input type="email" class="form-control" name="inputEmail" placeholder="Introduce Email">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword" class="col-sm-2 control-label">Password:</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" name="inputPassword" placeholder="Introduce Password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-1 col-sm-10">
		      <button type="submit" class="btn btn-default">Entra</button>
		    </div>
		  </div>
		</form>
	  </div>
	</div>
</body>
</html>