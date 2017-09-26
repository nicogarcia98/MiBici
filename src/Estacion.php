<?php

namespace Mibici;

class Estacion implements EstacionInterface {



    protected $anclajeLibres;
    protected $anclajeTotales;
    protected $Bicicletas = [];
  
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
        $patentes = [];
        foreach(Bicicletas as bici){
           $patentes->append($bici->patente());
        }
        return $patentes;
    }

    public function enServicio() {
        return TRUE;
    }
    public function __construct($a,$b){
        $this->anclajeLibres=$a;
        $this->anclajeTotales=$b;
    }

}
