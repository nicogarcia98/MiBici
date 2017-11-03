<?php
namespace MiBici;


date_default_timezone_set('America/Argentina/Buenos_Aires');



class boleto{
	private $fecha;
	private $saldo;
	private $ID;
	private $lineaopat;
	private $tarifa;
	private $plus;
	private $medio;
	private $trasbordo;
	private $bob=1;
	public function __construct($trasbordo, $fecha, $lineaopat, $plus, $medio, $id, $costo, $saldo, $bob){
		$this->trasbordo=$trasbordo;
		$this->fecha=$fecha;
		$this->ID=$id;
		$this->lineaopat=$lineaopat;
		$this->tarifa=$costo;
		$this->plus=$plus;
		$this->medio=$medio;
		$this->trasbordo=$trasbordo;
		$this->saldo=$saldo;
		$this->bob=$bob;
		}
	public function imprimir(){
		if($this->bob==1){
			echo date("d-m-Y H:i:s", $this->fecha);
			echo "Linea " . $this->lineaopat;
			echo "  " . $this->tarifa;
			if($this->plus > 0){
				echo " Plus " . $this->plus;
			}
			if($this->trasbordo==1){
			echo " Trasbordo ";
			}
			if($this->medio == 1){
			echo " Medio ";
			}
			if($this->medio == 0 && $this->trasbordo==0 && $this->plus==0){
			echo " Normal ";
			}
			echo $this->ID . " ";
			echo $this->saldo . "<br>";
		}else{
			echo "Viaje en la bici ";
			echo " Patente " . $this->lineaopat;
			echo " el dia ";
			echo $this->fecha;
			echo $this->tarifa;
			echo $this->ID;
			echo $this->saldo . "<br>";
		}
	
		
	}
	
	public function getTrans(){
		if($this->bob==1){
			return $this->lineaopat;
		}
		return "Bicicleta " . $this->lineaopat;
	}
	
	public function getSaldo(){
		return $this->saldo;
	}
	
	public function getCosto(){
		return $this->tarifa;
	}
	public function getTipo(){
		if($this->medio == 1){
			if($this->trasbordo == 1){
				return "Medio y Trasbordo";
			}
			return "Medio";
		}
		if($this->trasbordo == 1){
			return "Trasbordo";
		}
		return "Normal";
	}
		
	public function getFecha(){
		return date("d-m-Y H:i:s",$this->fecha);
	}

}
