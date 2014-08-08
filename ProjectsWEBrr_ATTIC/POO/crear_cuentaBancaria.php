<?php 
include 'cuentaBancaria.php';

$titular = 'Pepe';
$numCuenta = 'xxxxxxxxxxxxxxx';
$saldo = 600;

$c1 = new cuentaBancaria($titular, $numCuenta, $saldo);
echo $c1-> consultarSaldo();
$c1->retirar(50);
echo '<br>';
echo $c1->consultarSaldo();
?>