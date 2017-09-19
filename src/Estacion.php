<?php

namespace Mibici;

class Estacion implements EstacionInterface {
    private $anclajeLibres;
    private $anclajesTotales;
    public function sacarBici(BicicletaInterface $bici) {
    
    }

    public function dejarBici(BicicletaInterface $bici) {

    }

    public function anclajesDisponibles() {
    return $this->anclajesLibres;
    }

    public function anclajesTotales() {
    return $this->anclajesTotales; 
    }

    public function bicicletasDisponibles() {

    }

    public function enServicio() {
        return TRUE;
    }

}
