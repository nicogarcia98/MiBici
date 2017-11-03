<?php

namespace MiBici;

class Bicicleta {
    private $pat;
    public function get_pat() {
        return $this->pat;
    }
    public function __construct ($patente) {
        $this->pat = $patente;
    }
}
