<?
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com

include("class.videoclub.php");

//creamos una instancia de la clase videoclub
$videoclub=new videoclub("VideoClub php");

//añadimos varios soportes...
$videoclub->incluir_video("Los Otros",100,3.5,"115 minutos");
$videoclub->incluir_juego("Final Fantasy",200,2.5,"Playstation",1,3);
$videoclub->incluir_dvd("Los Intocables",300,3,"90 minutos","Inglés y español","16:9");
$videoclub->incluir_dvd("El Imperio Contraataca",301,3,"83 minutos","Inglés y español","16:9");

//añadimos varios clientes...
$videoclub->incluirCliente("jose");
$videoclub->incluirCliente("luis");
$videoclub->incluirCliente("maria");

//mostramos la lista de productos
$videoclub->listarProductos();
//mostramos la lista de clientes
$videoclub->listarClientes();

//alquilamos al cliente 1 el soporte 200. Si todo va ok, muestra el listado de
// clientes con el numero de soportes alquilados 
if($videoclub->clientesAlquilar(1,200))
	$videoclub->listarClientes();
//alquilamos al cliente 2 el soporte 300. Si todo va ok, muestra el listado de
// clientes con el numero de soportes alquilados 
if($videoclub->clientesAlquilar(2,300))
	$videoclub->listarClientes();
//alquilamos al cliente 1 el soporte 301. Si todo va ok, muestra el listado de
// clientes con el numero de soportes alquilados 
if($videoclub->clientesAlquilar(1,301))
	$videoclub->listarClientes();

//eliminamos del cliente 2 el soporte 300. Si todo va ok, muestra el listado de
// clientes con el numero de soportes alquilados 
if($videoclub->clientesDevolver(2,300))
	$videoclub->listarClientes();

//Mostramos los soportes alquilados por el cliente 1
$videoclub->clienteListarAlquileres(1);

//eliminamos el cliente 3
$videoclub->eliminarCliente(3);

//eliminamos el producto 200
$videoclub->eliminarProducto(300);

echo $videoclub->__destruct();
?>
