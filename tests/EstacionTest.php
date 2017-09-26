<?php

namespace Mibici;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {

    public function testEstacionEnServicio() {
        // Las estaciones nuevas siempre están en servicio.
        // Primero en el construct es anclajes disponibles y el segundo es anclajes totales
        $anclajesdisp = 10;
        $anclajestota = 18;
        $estacion = new Estacion($anclajesdisp,$anclajestota);
        $this->assertEquals($estacion->anclajesDisponibles(),$anclajesdisp);
        $this->assertEquals($estacion->anclajesTotales(),$anclajestota);
        $this->assertTrue($estacion->enServicio());
    }

}
