<?php

namespace Mibici;

class Estacion implements EstacionInterface {
    
    protected $anclajeLibres;
    protected $anclajeTotales;
    public $bicicletas = [];
  
    public function sacarBici(BicicletaInterface $bici) {
    
    }

    public function dejarBici(BicicletaInterface $bici) {
            
    }

    public function anclajesDisponibles() {
        return $this->anclajeLibres;
    }

    public function anclajesTotales() {
        return $this->anclajeTotales; 
    }

    public function bicicletasDisponibles() {
        
        return count($this->bicicletas);
    }

    public function enServicio() {
        return TRUE;
    }
    public function __construct($a,$b){
        $this->anclajeLibres=$a;
        $this->anclajeTotales=$b;
    }

}
class Bicicleta implements BicicletaInterface{
    public $pat = -1;
    public function patente($patt){
        
	if($patt < 10000){
	    $patt++;
        }
        return sprintf ("&04d",$patt);
    }
    function __construct($pate){
	$this->pat = patente($pate);

    }
}
