<?php 
$id_cds=addslashes(strip_tags($_GET['id']));

$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
$resultado = $conexion->query("DELETE FROM cds01 WHERE id_cd='$id_cds'");

if(!$resultado){
	echo 'No se pudo eliminar el registro seleccionado..';
}else{
	echo 'Registro eliminado..';
	header ('location: indexAdminTabla.php');
	exit();
}
?>