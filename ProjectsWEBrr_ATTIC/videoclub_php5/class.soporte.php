<?php
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com
## clase mejorada del manual de php5 de la web: http://www.desarrolloweb.com/manuales/58/

//clase que es heredada por el dvd, video y juegos
//esta clase, contiene información igual a los tres tipos de soportes.
class soporte
{
	//contiene el titulo del soporte (dvd, video o juego)
	public $titulo;
	//identificador numero del soporte, que puede ser accedido desde esta clase, y 
	// desde las clases que la hereden
	protected $numero;
	//valor que unicamente puede ser accedido desde dentro de la clase que
	// a sido definido
	private $precio;

	public function __construct($titulo,$numero,$precio)
	{
		$this->titulo=$titulo;
		$this->numero=$numero;
		$this->precio=$precio;
	}

	public function devolverPrecioSinIva()
	{
		return $this->precio;
	}

	public function devolverPrecioConIva()
	{
		return ($this->precio*1.16);
	}

	public function devolverNumeroIdentificacion()
	{
		return $this->numero;
	}

	//funcion que imprime las caracteristicas
	//esta funcion existe en soporte, dvd, video y juegos
	public function imprimeCaracteristicas()
	{
		echo "<br />Titulo: ".$this->titulo."\n";
		echo "<br />Precio: ".$this->precio." (IVA no incluido)\n";
		echo "<br />Numero: ".$this->numero."\n";
	}
}
?>
