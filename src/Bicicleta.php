<?php

namespace Mibici;

class Bicicleta implements BicicletaInterface{
    protected $pat = -1;
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
