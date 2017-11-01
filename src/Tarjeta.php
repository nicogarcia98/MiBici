<?php

namespace MiBici;

class Tarjeta {
	private $saldo=0;
	private $lastime=0;
	private $tras1=0;
	private $trasbordo=0;
	private $tarifa=9.7;
	private $costo;
	private $plus=0;
	private $id;
	private $linea;
	private $tipo;
	private $time1;
	private $viajes = array();
	private $lastbici=0;
public function __construct($id){
	$this->id = $id;
}

public function pagarbici($fecha_y_hora, $paten){
	$time1=strtotime($fecha_y_hora);
	if($this->lastbici-$this->$time1>3600){
		$this->saldo= $this->saldo - $this->tarifa* 1.5;
	}
	

}
 public function pagarbus($fecha_y_hora, $medio, $linea){
 		$this->time1=strtotime($fecha_y_hora);
		if((date('D', $this->time1)=='Sat' && date('h', $this->time1)<=14 && date('h', $this->time1)>=6) || ((date('D', $this->time1)!='Sun' && date('D', $this->time1)!='Sat') && date('h', $this->time1)<=22 && date('h', $this->time1)>=6))){
			if($this->time1-$this->lastime <= 3600){
				$this->trasbordo=1;				
			}else{
				$this->trasbordo=0;
			}
		}else{
			if($this->time1-$this->lastime <= 5400){
				$this->trasbordo=1;
			}		
		}else{
			$this->trasbordo=0;
		}	
	


			if($this->tras1 == 1){
			$this->trasbordo=0;		
		}


		$this->costo=$this->tarifa;
		if($medio==1){
			$this->costo=$this->costo* 0.5;
		}
		if($this->trasbordo==1 && $this->tras1 == 0){
			$this->costo=$this->costo* 0.33;
			$this->tras1 = 1;
		}else{
			$this->tras1=0;
		}

		if($this->plus > 0 && $this->saldo >= $this->costo + $this->tarifa * $this->plus){
			$this->costo=$this->costo + $this->tarifa * $this->plus;
			$this->plus=0;
		}else{
			if($this->plus==1){
			}else{
			echo "Saldo insuficiente";
			return;
			}
		}
			if($this->costo <= $this->saldo ){
				$this->saldo=$this->saldo-$this->costo;
				$this->lastime=$time1;
				$boleto= new boleto($this->tras1, $this->lastime, $this->linea, $this->plus, $medio, $this->id,$this->costo, $this->saldo);
				array_push($viajes, $boleto);
				$boleto->imprimir();
				return;
			}else{		
				if($this->plus<2){
						$this->plus++;
						$this->tras1=0;
						$this->lastime=$time1;
						$boleto= new boleto($this->tras1, $this->lastime, $this->linea, $this->plus, $medio, $this->id, 0, $this->saldo);
						array_push($viajes, $boleto);
						$boleto->imprimir();
						return;
						}else{
							echo "Saldo insuficiente";
							return;
						}
			}	
	}


 public function recargar($monto){
 	if($monto==332){
 		$this->saldo=$this->saldo + 388;
 		return;
 	}
 	if($monto==624){
 		$this->saldo= $this->saldo + 776;
 		return;
 	}
 	$this->saldo=$this->saldo + $monto;
 	return;

 }
public function viajesRealizados();
	for($i=0;$i<count($viajes);$i++){
		$viajes[$i]->imprimir();
	}
	}
}


