<?php //HERENCIA
include 'vehiculo.php';

class coche extends vehiculo{
	/*private $color;
	private $velocidad;
	private $posX;
	private $posY;*/
	static $num_ruedas=4;//funciona como una constante.

	public function acelerar(){
		$this->velocidad += 10;
	}

	public function frenar(){
		if($this->velocidad < 10){
			$this->velocidad=0;
		}else{
			$this->velocidad-=10;
		}
	}

	/*public function cambiarColor($col){
		parent::cambiarColor();
	}

	public function getVelocidad(){
		parent::getVelocidad();
	}

	public function getColor(){
		parent::getColor();
	}

	public function getPosX(){
		parent::getPosX();
	}

	public function getPosY(){
		parent::getPosY();
	}*/
}

?>