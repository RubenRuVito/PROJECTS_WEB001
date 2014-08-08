<?php
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com
## clase mejorada del manual de php5 de la web: http://www.desarrolloweb.com/manuales/58/

include_once("class.soporte.php");
include_once("class.cliente.php");
include_once("class.video.php");
include_once("class.dvd.php");
include_once("class.juego.php");

//clase principal
class videoclub
{
	//determina el nombre del videoclub
	public $nombre;
	//variable que contiene un array con los productos en alquiler
	private $productos;
	//variable que contiene un array con los clientes del videoclub
	private $clientes;

	public function __construct($nombre)
	{
		$this->nombre=$nombre;
		$this->productos=array();
		$this->clientes=array();

		//generamos la cabecera HTML
		echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>$nombre</title>\n";
		echo "</head>\n";
		echo "<body>\n";
	}

	public function __destruct()
	{
		//generamos el pie de pagina HTML
		echo "<p>&nbsp;</p><center><a href='http://www.ruvito.com' target='_blank'>http://www.ruvito.com</a><p>&nbsp;</p>\n";
		echo "</body>\n";
		echo "</html>\n";
	}

	//Agrega un nuevo apuntador a un producto dado (dvd, video o juego)
	//Tiene que recibir un apuntador a una clase
	private function incluirProducto($apuntadorProducto)
	{
		echo "<br />Incluido Producto (Numero: ".$apuntadorProducto->devolverNumeroIdentificacion().")\n";
		$this->productos[]=$apuntadorProducto;
	}

	//Funcion para añadir un nuevo dvd
	public function incluir_dvd($titulo,$numero,$precio,$duracion,$idiomas,$pantalla)
	{
		//creamos una instancio de la clase dvd
		$newProduct=new dvd($titulo,$numero,$precio,$duracion,$idiomas,$pantalla);
		//Añadimos el producto al listado de productos
		$this->incluirProducto($newProduct);
	}

	//Funcion para añadir un nuevo video
	public function incluir_video($titulo,$numero,$precio,$duracion)
	{
		//creamos una instancio de la clase video
		$newProduct=new video($titulo,$numero,$precio,$duracion);
		//Añadimos el producto al listado de productos
		$this->incluirProducto($newProduct);
	}

	//Funcion para añadir un nuevo juego
	public function incluir_juego($titulo,$numero,$precio,$consola,$jugadoresMin,$jugadoresMax)
	{
		//creamos una instancio de la clase juego
		$newProduct=new juego($titulo,$numero,$precio,$consola,$jugadoresMin,$jugadoresMax);
		//Añadimos el producto al listado de productos
		$this->incluirProducto($newProduct);
	}

	//funcion para listar todos los productos
	public function listarProductos()
	{
		for($i=0;$i<count($this->productos);$i++)
		{
			if(!is_null($this->productos[$i]))
			{
				$this->productos[$i]->imprimeCaracteristicas();
			}
		}
	}

	//funcion para eliminar un producto
	public function eliminarProducto($numProducto)
	{
		$posProducto=$this->productosComprovar($numProducto);
		if($posProducto>=0)
		{
			//comprovamos que ningun cliente tenga alquilado el producto...
			for($i=0;$i<count($this->clientes);$i++)
			{
				if(!is_null($this->clientes[$i]))
				{
					$existe=$this->clientes[$i]->tieneAlquiladoSoporte($this->productos[$posProducto]);
					if($existe)
					{
						echo "<br />Por lo menos un cliente tiene el soporte: ".$this->productos[$posProducto]->titulo." ($numProducto) alquilado. No se puede eliminar\n";
						return;
					}
				}
			}
			echo "<br />Se ha eliminado el producto: ".$this->productos[$posProducto]->titulo." ($numProducto)\n";
			//eliminamos la variable del producto
			unset($this->productos[$posProducto]);
			//colocamos null en el array de productos
			$this->productos[$posProducto]=null;
		}else
			echo "<br />No existe el producto con el identificador: ".$numProducto."\n";
	}

	//funcion para añadir un nuevo cliente
	public function incluirCliente($nombre,$maxAlquilerConcurrente=3)
	{
		$newCliente=new cliente($nombre,(count($this->clientes)+1),$maxAlquilerConcurrente=3);
		//añadimos el apuntador del cliente ($newCliente) en el array
		$this->clientes[]=$newCliente;
		echo "<br />Incluido Cliente (Numero: ".count($this->clientes).")\n";
	}

	//funcion para eliminar un cliente
	public function eliminarCliente($numCliente)
	{
		$posCliente=$this->clientesComprovar($numCliente);
		if($posCliente>=0)
		{
			echo "<br />Se ha eliminado el usuario: ".$this->clientes[$posCliente]->nombre." ($numCliente)\n";
			//eliminamos la variable del cliente
			unset($this->clientes[$posCliente]);
			//colocamos null en el array de clientes
			$this->clientes[$posCliente]=null;
		}else
			echo "<br />No existe el cliente con el identificador: ".$numCliente."\n";
	}

	//funcion para listar todos los clientes
	public function listarClientes()
	{
		for($i=0;$i<count($this->clientes);$i++)
		{
			if(!is_null($this->clientes[$i]))
			{
				$this->clientes[$i]->imprimeCaracteristicas();
			}
		}
	}

	//alquilar un soporte (dvd, video o juego)
	public function clientesAlquilar($numCliente,$numProducto)
	{
		$posCliente=$this->clientesComprovar($numCliente);
		$posProducto=$this->productosComprovar($numProducto);
		//si hemos encontrado el cliente y producto...
		if($posCliente>=0 && $posProducto>=0)
		{
			$this->clientes[$posCliente]->alquilar($this->productos[$posProducto]);
			return true;
		}else{
			echo "<br />Ha habido un error en el numero del cliente o producto...\n";
			return false;
		}
	}

	//devolver un soporte (dvd, video o juego)
	public function clientesDevolver($numCliente,$numProducto)
	{
		$posCliente=$this->clientesComprovar($numCliente);
		$posProducto=$this->productosComprovar($numProducto);
		//si hemos encontrado el cliente y producto...
		if($posCliente>=0 && $posProducto>=0)
		{
			$this->clientes[$posCliente]->devolver($this->productos[$posProducto]->devolverNumeroIdentificacion());
			return true;
		}else{
			echo "<br />Ha habido un error en el numero del cliente o producto...\n";
			return false;
		}
	}

	//lista los productos alquilados por un cliente
	public function clienteListarAlquileres($numCliente)
	{
		$posCliente=$this->clientesComprovar($numCliente);
		if($posCliente>=0)
		{
			$this->clientes[$posCliente]->listaAlquileres();
		}else
			echo "<br />No existe el cliente con el identificador: ".$numCliente."\n";
	}

	//comprovamos que exista el numero de cliente
	//si lo encuentra, devuelve la posicion del array donde se encuentra almacenado
	private function clientesComprovar($numCliente)
	{
		for($i=0;$i<count($this->clientes);$i++)
		{
			if(!is_null($this->clientes[$i]))
			{
				if($this->clientes[$i]->devolverNumero()==$numCliente)
					return $i;
			}
		}
		return -1;
	}

	//comprovamos que exista el numero de productos
	//si lo encuentra, devuelve la posicion del array donde se encuentra almacenado
	private function productosComprovar($numProducto)
	{
		for($i=0;$i<count($this->productos);$i++)
		{
			if(!is_null($this->productos[$i]))
			{
				if($this->productos[$i]->devolverNumeroIdentificacion()==$numProducto)
					return $i;
			}
		}
		return -1;
	}

}
?>
