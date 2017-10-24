<?php

namespace MiBici;

class Tarjeta {
	private $saldo=0;
	private $lastime=0;
	private $tras1=0;
	private $trasbordo=0;
	private $tarifa=9,7;

 public function pagarbus($fecha_y_hora, $medio){

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
	
	
		if($medio==1){
			if($this->trasbordo==1){
				if($this->tarifa*0.5*0.33 <= $this->saldo)					{
					return ($this->tarifa*0.5*0.33);
				}else{
					return -1;
				}
			}
		}




 public function recargar($monto);
 public function viajesRealizados();

}
