<?php
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com
## clase mejorada del manual de php5 de la web: http://www.desarrolloweb.com/manuales/58/

//clase que contiene la información de los videos
//hereda de la clase soporte
class video extends soporte
{
	//variable que determina la duración del video
	private $duracion;

	public function __construct($titulo,$numero,$precio,$duracion)
	{
		//llamamos al constructor de la clase extendida "soporte"
		parent::__construct($titulo,$numero,$precio);
		$this->duracion=$duracion;
	}

	//funcion que imprime las caracteristicas
	//esta funcion existe en soporte, dvd, video y juegos
	public function imprimeCaracteristicas()
	{
		echo "<br />--------------------------------\n";
		echo "<br />Pelicula en VHS:\n";
		//ejecutamos la funciona "imprimeCaracteristicas()" de la clase
		// extendida "soporte"
		parent::imprimeCaracteristicas();
		echo "<br />Duracion: ".$this->duracion."\n";
		echo "<br />--------------------------------\n";
	}
}
?>
