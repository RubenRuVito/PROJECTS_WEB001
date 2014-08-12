<?php
$id=addslashes(strip_tags($_GET['id']));
$id_cds=addslashes(strip_tags($_POST['id_cd']));
$titulo=addslashes(strip_tags($_POST['titulo']));
$autor=addslashes(strip_tags($_POST['autor']));
$ano=addslashes(strip_tags($_POST['ano']));

echo $id;
echo $id_cds;
echo $titulo;
echo $autor;
echo $ano;

//sleep(5);

$conexion = new mysqli('localhost','root_ruben01','ruben01','bbdd01');
$resultado = $conexion->query("UPDATE cds01 SET titulo='$titulo', autor='$autor', ano='$ano' WHERE id_cd='$id_cds'");
//UPDATE `bbdd01`.`cds01` SET `titulo` = 'Unknown Pleasure', `ano` = '1979' WHERE `cds01`.`id_cd` = 5;

if(!$resultado){
	echo 'No se ha modificado el registro..';
}else{
	echo 'El registro se ha modificado..';
	header('location: indexAdminTabla.php');
	exit();
}
?>