<?php
namespace MiBici;


date_default_timezone_set('America/Argentina/Buenos_Aires');



class boleto{
	private $fecha=time();
	private $tipo;
	private $saldo;
	private $ID;
	private $linea;	
	private $tras;
	private $monto;
	public function trasbordo($last, $tras1){
		if($tras1 == 1){
			return 0;		
		}
		if((date('D')=='Sat' && date('h')<14 && date('h')>6) || ((date('D')!='Sun' && date('D')!='Sat') && date('h')<22 && date('h')>6))){
			if(time()-$last <= 3600){
				return 1;				
			}else{
				return 0;
			}
		}else{
			if(time()-$last <= 5400){
				return 1;
			}		
		}else{
			return 0;
		}	
	}
}

