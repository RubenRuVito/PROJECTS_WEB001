<?php
## Publicado en La Web del Programador: http://www.lawebdelprogramador.com
## clase mejorada del manual de php5 de la web: http://www.desarrolloweb.com/manuales/58/

//clase que contiene la información de los juegos
//hereda de la clase soporte
class juego extends soporte
{
	//variable que determina el tipo de consola
	private $consola;
	//variable que determina el numero minimo de jugadores
	private $jugadoresMin;
	//variable que determina el numero maximo de jugadores
	private $jugadoresMax;

	public function __construct($titulo,$numero,$precio,$consola,$jugadoresMin,$jugadoresMax)
	{
		//llamamos al constructor de la clase extendida "soporte"
		parent::__construct($titulo,$numero,$precio);
		$this->consola=$consola;
		$this->jugadoresMin=$jugadoresMin;
		$this->jugadoresMax=$jugadoresMax;
	}

	private function devolverJugadoresPosibles()
	{
		if($this->jugadoresMin==$this->jugadoresMax)
			return "Para ".$this->jugadoresMin." jugadores\n";
		else
			return "De ".$this->jugadoresMin." a ".$this->jugadoresMax." jugadores\n";
	}

	//funcion que imprime las caracteristicas
	//esta funcion existe en soporte, dvd, video y juegos
	public function imprimeCaracteristicas()
	{
		echo "<br />--------------------------------\n";
		echo "<br />Juego para: ".$this->consola."\n";
		//ejecutamos la funciona "imprimeCaracteristicas()" de la clase
		// extendida "soporte"
		parent::imprimeCaracteristicas();
		echo "<br />".$this->devolverJugadoresPosibles()."\n";
		echo "<br />--------------------------------\n";
	}
}
?>
