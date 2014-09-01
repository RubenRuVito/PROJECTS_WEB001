<?php
//logout, cerrar sesión.
require 'funciones.php';
session_start();
session_destroy();
header('location: index.php?mns=2a');
exit();
?>