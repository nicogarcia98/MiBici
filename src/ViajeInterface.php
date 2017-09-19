<?php

namespace Mibici;

interface ViajeInterface {

    public function iniciar(
        BicicletaInterface $bici,
        EstacionInterface $estacion,
        PasajeroInterface $pasajero,
        $timestamp);

    public function terminar(
        BicicletaInterface $bici,
        EstacionInterface $estacion,
        PasajeroInterface $pasajero,
        $timestamp);

    /*
     * Devuelve un array con el siguiente contenido
     * [
     * 'desde' => 'Estacion 01 (Fac. de Ingeniería)',
     * 'hasta' => 'Estacion 19 (Parque Independencia I)',
     * 'tiempo' => '20 minutos',
     * 'dni_pasajero' => 12345678
     * ];
     */
    public function datos();
}