<?php

namespace MiBici;

class Tarjeta {
	private $saldo=0;
	private $lastime=0;
	private $tras1=0;
	private $trasbordo=0;

 public function pagar(Transporte $transporte, $fecha_y_hora){
	if($transporte->tipo=='Colectivo'){

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
	}


	}		if($this->tras1 == 1){
			$this->trasbordo=0;		
		}
		




}
 public function recargar($monto);
 public function viajesRealizados();

}
