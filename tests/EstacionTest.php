<?php

namespace Mibici;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {

    public function testEstacionEnServicio() {
        // Las estaciones nuevas siempre están en servicio.
        // Primero en el construct es anclajes disponibles y el segundo es anclajes totales
        $estacion = new Estacion(10,18);
        $this->assertEquals($estacion->anclajesDisponibles(),10);
        $this->assertEquals($estacion->anclajesTotales(),18);
        $this->assertTrue($estacion->enServicio());
    }

}
