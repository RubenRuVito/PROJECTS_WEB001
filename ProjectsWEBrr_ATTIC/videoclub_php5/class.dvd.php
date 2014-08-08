<?php
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com
## clase mejorada del manual de php5 de la web: http://www.desarrolloweb.com/manuales/58/

//clase que contiene la información de los dvd's
//hereda de la clase soporte
class dvd extends soporte
{
	//variable que almacena el numero de idiomas disponibles
	private $idiomas;
	//variable que almacena el format de pantalla
	private $pantalla;
	//variable que determina la duración del video
	private $duracion;

	public function __construct($titulo,$numero,$precio,$duracion,$idiomas,$pantalla)
	{
		//llamamos al constructor de la clase extendida "soporte"
		parent::__construct($titulo,$numero,$precio);
		$this->duracion=$duracion;
		$this->idiomas=$idiomas;
		$this->pantalla=$pantalla;
	}

	//funcion que imprime las caracteristicas
	//esta funcion existe en soporte, dvd, video y juegos
	public function imprimeCaracteristicas()
	{
		echo "<br />--------------------------------\n";
		echo "<br />Pelicula en DVD:\n";
		//ejecutamos la funciona "imprimeCaracteristicas()" de la clase
		// extendida "soporte"
		parent::imprimeCaracteristicas();
		echo "<br />Duracion: ".$this->duracion."\n";
		echo "<br />Idiomas: ".$this->idiomas."\n";
		echo "<br />formato de Pantalla: ".$this->pantalla."\n";
		echo "<br />--------------------------------\n";
	}
}
?>
