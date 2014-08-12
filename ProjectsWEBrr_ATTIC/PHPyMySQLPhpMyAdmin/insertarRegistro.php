<?php
$titulo=addslashes(strip_tags($_POST['titulo']));
$autor=addslashes(strip_tags($_POST['autor']));
$ano=addslashes(strip_tags($_POST['ano']));

$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
//$res = $conexion->query("INSERT INTO cds01 VALUES ('','$titulo','$autor','$ano')");
$res = $conexion->query("INSERT INTO cds01 (id_cd,titulo,autor,ano) VALUES (NULL,'$titulo','$autor',$ano);");
//codigo generado con phpMyAdmin --> "INSERT INTO `bbdd01`.`cds01` (`id_cd`, `titulo`, `autor`, `ano`) VALUES (NULL, \'OK Computer\', \'Radiohead\', \'1997\');";

if(!$res){
	echo 'El registro no se ha podido eliminar..';
}else{
	echo 'El registro ha sido eliminado..';
	header('location: indexAdminTabla.php');
	exit();
}
$conexion->close();
?>