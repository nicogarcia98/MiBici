<?php
namespace MiBici;


date_default_timezone_set('America/Argentina/Buenos_Aires');



class boleto{
	private $fecha;
	private $saldo;
	private $ID;
	private $linea;
	private $tarifa;
	private $plus;
	private $medio;
	private $trasbordo;
	
	public function __construct($trasbordo, $fecha, $linea, $plus, $medio, $id, $costo, $saldo){
		$this->trasbordo=$trasbordo;
		$this->fecha=$fecha;
		$this->ID=$id;
		$this->linea=$linea;
		$this->tarifa=$costo;
		$this->plus=$plus;
		$this->medio=$medio;
		$this->trasbordo=$trasbordo;
		$this->saldo=$saldo;
		}
	public function imprimir(){
		echo date("d-m-Y H:i:s", $fecha);
		echo "Linea " . $this->linea;
		echo $this->tarifa;
		if($this->plus > 0){
			echo "Plus " . $this->plus;
		}
		if($this->trasbordo==1){
		echo "Trasbordo";
		}
		if($this->medio == 1){
		echo "Medio"
		}
		if($this->medio == 0 && $this->trasbordo==0 && $this->plus==0){
		echo "Normal";
		}
		echo $this->ID;
		echo $this->saldo;
		
	}
}

