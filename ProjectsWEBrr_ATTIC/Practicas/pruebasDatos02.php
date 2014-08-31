<?php
session_start();
echo 'Hola!' . $_SESSION['nom'] . ' ' . $_SESSION['ape'] . '.';
?>