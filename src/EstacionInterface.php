<?php

namespace Mibici;

interface EstacionInterface {

    public function sacarBici(BicicletaInterface $bici);

    public function dejarBici(BicicletaInterface $bici);

    public function anclajesDisponibles();

    public function anclajesTotales();

    public function bicicletasDisponibles();

    public function enServicio();

}