<?php

namespace MiBici;

class Tarjeta {
	private $saldo=0;
	private $lastime=0;
	private $tras1=0;
	private $trasbordo=0;
	private $tarifa=9,7;
	private $plus=0;
	private $id;
	private $linea;
	private $tipo;

public function __construct($id){
	$this->id = $id;
}

 public function pagarbus($fecha_y_hora, $medio, $linea, $idboleto){
 		$time1=strtotime($fecha_y_hora);
		if((date('D')=='Sat' && date('h')<14 && date('h')>6) || ((date('D')!='Sun' && date('D')!='Sat') && date('h')<22 && date('h')>6))){
			if(time()-$lastime <= 3600){
				$this->trasbordo=1;				
			}else{
				$this->trasbordo=0;
			}
		}else{
			if(time()-$lastime <= 5400){
				$this->trasbordo=1;
			}		
		}else{
			$this->trasbordo=0;
		}	
	


			if($this->tras1 == 1){
			$this->trasbordo=0;		
		}
	
	
		if($medio==1){
			if($this->trasbordo==1){
				if($this->tarifa*0.5*0.33 <= $this->saldo){
					$this->saldo=$this->saldo-$this->tarifa*0.5*0.33;
					$this->tras1=1;
					$this->lastime=$time1;
					return;
				}else{
					if($this->plus<2){
						$this->plus++;
						echo "Plus " . $this->plus;
						$this->tras1=0;
						$this->lastime=$time1;

						return;
					}else{
						echo "Saldo insuficiente";
						return;
					}
				}
				}else{
				if($this->tarifa*0.5 <= $this->saldo){
					$this->saldo=$this->saldo-$this->tarifa*0.5;
					$this->lastime=$time1;
				}else{
					if($this->plus<2){
						$this->lastime=$time1;
						$this->plus++;
						echo "Plus " . $this->plus;
						$this->tras1=0;
						return;
					}else{
						echo "Saldo insuficiente";
						return;
					}

				}
				}
		}else{
					if($this->trasbordo==1){
				if($this->tarifa*0.33 <= $this->saldo){
					$this->saldo=$this->saldo-$this->tarifa*0.33;
					$this->tras1=1;
					$this->lastime=$time1;

					return;
				}else{
					if($this->plus<2){
						$this->plus++;
						echo "Plus " . $this->plus;
						$this->lastime=$time1;
						$this->tras1=0;
						return;
					}else{
						echo "Saldo insuficiente";
						return;
					}
				}
				}else{
				if($this->tarifa <= $this->saldo){
					$this->saldo=$this->saldo-$this->tarifa;
					$this->lastime=$time1;
				}else{
					if($this->plus<2){
						$this->plus++;
						echo "Plus " . $this->plus;
						$this->tras1=0;
						$this->lastime=$time1;
						return;
					}else{
						echo "Saldo insuficiente";
						return;
					}

				}
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
 public function get_saldo(){
 	return $this->saldo;
 }
 public function get_fecha(){
 	return $this->lastime;
 }
 public function get_tipo(){
 	return $this->tipo;
 }
 public function get_id(){
 	return $this->id;
 }
 public function get_linea(){
 	return $this->linea;
 }
}


