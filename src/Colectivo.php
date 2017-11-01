<?php
namespace MiBici;
class Colectivo {
    protected $num;
    
    public function get_linea() {
        return $this->num;
    }
    
    public function __construct ($linea) {
        $this->num = $linea;
    }
}
