<?php

namespace Mibici;

class Estacion implements EstacionInterface {

    protected Bicicletas = [];
    
    public function sacarBici(BicicletaInterface $bici) {

    }

    public function dejarBici(BicicletaInterface $bici) {
            
    }

    public function anclajesDisponibles() {

    }

    public function anclajesTotales() {

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

}
