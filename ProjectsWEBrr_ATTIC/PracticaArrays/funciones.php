<?php 
//Archivo que contienen la lógia y métodos xa cargar las paginas de nuestro proyecto.

if(!isset($_SESSION['id'])){
$idsesion=0;
$nameSesion='primeraSesion';
session_start($idsesion);
session_name($nameSesion);
}else{
$idsesion=$_SESSION['id'];
$nameSesion=$_SESSION['email'];
session_start($idsesion);
session_name($nameSesion);
}
//include 'funciones_out.php';
//include 'funciones_val.php';
include 'funciones_db.php';
//include 'funciones_utils.php';
?>