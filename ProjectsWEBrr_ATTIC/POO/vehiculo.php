<?php //CLASES Y OBJETOS,PROPIEDADES Y METODOS

class vehiculo{
	public $color;
	public $velocidad;
	public $posX;
	public $posY;

	public function __construct($col,$pox,$poy){
		$this->color=$col;
		$this->posX=$pox;
		$this->posY=$poy;
		$this->velocidad=0;
	}

	public function cambiarColor($col){
		$this->color = $col;
	}

	public function getVelocidad(){
		return $this->velocidad;
	}

	public function getColor(){
		return $this->color;
	}

	public function getPosX(){
		return $this->posX;
	}

	public function getPosY(){
		return $this->posY;
	}
}
?>