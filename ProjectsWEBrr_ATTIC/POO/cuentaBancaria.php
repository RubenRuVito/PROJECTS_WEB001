<?php 
class CuentaBancaria{
	private $titular;
	private $num_cuenta;
	private $saldo;

	public function __construct($titu,$numCuen,$sal){
		$this->titular = $titu;
		$this->num_cuenta = $numCuen;
		$this->saldo = $sal;
	}

	public function consultarSaldo(){
		return $this->saldo;
	}

	public function ingreso($importe){
		$this->saldo += $importe;
	}

	public function retirar($importe){
		if($this->saldo < $importe){
			return false;
		}else{
			$this->saldo -= $importe;
		}
	}

	public function cambiarTitular($nombre){
		$this->titular = $nombre;
	}

	//public function getTitular(){

	//}
}
?>