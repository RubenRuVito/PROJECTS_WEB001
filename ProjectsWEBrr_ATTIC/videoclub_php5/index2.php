<?php 
include("class.videoclub.php");

//creamos una instancia de la clase videoclub
$videoclub=new videoclub("VideoClub php");

$videoclub->incluir_video("Los Otros",100,3.5,"115 minutos");
$videoclub->incluir_juego("Final Fantasy",200,2.5,"Playstation",1,3);
$videoclub->incluir_dvd("Los Intocables",300,3,"90 minutos","Inglés y español","16:9");
$videoclub->incluir_dvd("El Imperio Contraataca",301,3,"83 minutos","Inglés y español","16:9");
$videoclub->listarProductos();

$videoclub->incluirCliente("jose");
$videoclub->incluirCliente("luis");
$videoclub->incluirCliente("maria");
$videoclub->listarClientes();

if($videoclub->clientesAlquilar(1,200))
	$videoclub->listarClientes();

if($videoclub->clientesAlquilar(2,300))
	$videoclub->listarClientes();

if($videoclub->clientesAlquilar(1,301))
	$videoclub->listarClientes();

if($videoclub->clientesDevolver(2,300))
	$videoclub->listarClientes();

$videoclub->clienteListarAlquileres(1);
?>