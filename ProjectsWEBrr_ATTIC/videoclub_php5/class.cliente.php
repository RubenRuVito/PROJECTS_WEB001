<?php
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com
## clase mejorada del manual de php5 de la web: http://www.desarrolloweb.com/manuales/58/

//clase que contiene los clientes del videoclub, y los sopoertes adquiridos
class cliente
{
	//variable que determina el nombre del cliente
	public $nombre;
	//variable que determina el numero de cliente
	private $numero;
	//variable que contendra un array con apuntadores a la clase soporte
	private $soportesAlquilados;
	//variable que determina el numero maximo de soportes alguilados que puede
	// tener un cliente a la vez
	private $maxAlquilerConcurrente;

	public function __construct($nombre,$numero,$maxAlquilerConcurrente=3)
	{
		$this->nombre=$nombre;
		$this->numero=$numero;
		//inicializamos la variable peliculasAlquiladas como un array
		$this->soportesAlquilados=array();
		$this->maxAlquilerConcurrente=$maxAlquilerConcurrente;
		//inicializamos las casillas del array a null
		for($i=0;$i<$maxAlquilerConcurrente;$i++)
		{
			$this->soportesAlquilados[$i]=null;
		}
	}

	//funcion que devuelve el numero de cliente
	public function devolverNumero()
	{
		return $this->numero;
	}

	//funcion que comprueba si un soporte en concreto esta alquilado
	//Tiene que recibir una variable del tipo clase soporte
	public function tieneAlquiladoSoporte(soporte $soporte)
	{
		//bucle hasta el final del array que hemos generado en el __constructor
		for($i=0;$i<$this->maxAlquilerConcurrente;$i++)
		{
			//Si es null, no tiene soporte alquilado
			if(!is_null($this->soportesAlquilados[$i]))
			{
				//comparamos el identificador del apuntador a la clase soporte
				// con el apuntador que ha recibido la funcion. En los dos,
				// utilizamos la funcion "devolverNumeroIdentificacion" de la
				// clase soporte.
				if($this->soportesAlquilados[$i]->devolverNumeroIdentificacion()==$soporte->devolverNumeroIdentificacion())
					return true;
			}
		}
		//si se llega a esta linea, es que no se tiene alquilado el soporte
		return false;
	}

	//funcion que devuelve el numero de soportes alquilados
	private function numeroSoportesAlquilados()
	{
		$cont=0;
		//bucle hasta el final del array que hemos generado en el __constructor
		for($i=0;$i<$this->maxAlquilerConcurrente;$i++)
		{
			//Si es null, no tiene soporte alquilado
			if(!is_null($this->soportesAlquilados[$i]))
				$cont++;
		}
		return $cont;
	}

	//funcion que tiene que recibir una variable del tipo clase soporte
	public function alquilar(soporte $soporte)
	{
		echo "<p>&nbsp;</p>\n";
		if($this->tieneAlquiladoSoporte($soporte))
		{
			echo "<br />El cliente ya tiene alquilado este soporte\n";
		}elseif($this->numeroSoportesAlquilados()==$this->maxAlquilerConcurrente)
		{
			echo "<br />Este cliente ha llegado al maximo de soportes alquilados\n";
		}else{
			//buscamos la primera posicion del array que sea null para
			// añadir este nuevo soporte
			$cont=0;
			while(!is_null($this->soportesAlquilados[$cont]))
			{
				$cont++;
			}
			//almacenamos el apuntador a la clase soporte
			$this->soportesAlquilados[$cont]=$soporte;

			echo "<br />El soporte ha sido alquilado a: ".$this->nombre."\n";
			//ejecutamos la funcion imprimeCaracteristicas() de la clase soporte
			$soporte->imprimeCaracteristicas();
		}
	}

	//funcion que se ejecuta cuando el usuario devuelve un soporte
	//Recibe el identificador del soporte devuelto
	public function devolver($identificadorSoporte)
	{
		if($this->numeroSoportesAlquilados()==0)
		{
			echo "<br />Este cliente no tiene ningun soporte alquilado\n";
			return false;
		}
		//buscamos el identificador a eliminar del array
		for($i=0;$i<$this->maxAlquilerConcurrente;$i++)
		{
			if(!is_null($this->soportesAlquilados[$i]))
			{
				if($this->soportesAlquilados[$i]->devolverNumeroIdentificacion()==$identificadorSoporte)
				{
					echo "<br />Soporte devuelto por: ".$this->nombre." (".$this->soportesAlquilados[$i]->titulo." - ".$identificadorSoporte.")\n";
					//colocamos a null el soporte devuelto
					$this->soportesAlquilados[$i]=null;
					return true;
				}
			}
		}
		//si llego aqui, es que el cliente no tiene este soporte alquilado
		echo "<br />No se ha encontrado el soporte en este cliente\n";
		return false;
	}

	//funcion que devuelve el nombre de los soportes alquilados por el cliente
	public function listaAlquileres()
	{
		if($this->numeroSoportesAlquilados()==0)
		{
			echo "<br />Este cliente no tiene ningun soporte alquilado\n";
		}else{
			echo "<br />Listado de soportes alquilados por: ".$this->nombre."\n";
			for($i=0;$i<$this->maxAlquilerConcurrente;$i++)
			{
				if(!is_null($this->soportesAlquilados[$i]))
				{
					echo "<p>";
					echo $this->soportesAlquilados[$i]->imprimeCaracteristicas();
					echo "</p>";
				}
			}
		}
	}

	//imprime las caracteristicas del cliente
	public function imprimeCaracteristicas()
	{
		echo "<br />--------------------------------\n";
		echo "<br />Cliente: ".$this->nombre." (".$this->numero.")\n";
		echo "<br />Alquileres actuales: ".$this->numeroSoportesAlquilados()."\n";
		echo "<br />--------------------------------\n";
	}
}
?>
