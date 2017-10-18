<?php

namespace Mibici;

class Estacion implements EstacionInterface {

    protected $anclajeLibres;
    protected $anclajeTotales;
    public $bicicletas = [];
    protected $estado = True; 

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

        return $this->estado;
    }

    public function desactivarEstacion() { 

        $this->estado = False;
    }
    public function __construct($a,$b){
        $this->anclajeLibres=$a;
        $this->anclajeTotales=$b;
    }

    public function activarEstacion() {
        $this->estado = True;
    }

}
