<?php
//logout, cerrar sesión.
require_once 'funciones.php';
//session_start(); No lo invocamos xq ya lo hacemos en el archivo de funciones.php
session_destroy();
header('location: index.php?mns=2a');
exit();
?>