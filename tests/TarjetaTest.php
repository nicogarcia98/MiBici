<?php

namespace MiBici;

use PHPUnit\Framework\TestCase;

class EstacionTest extends TestCase {
    /**
     * Comprueba que el saldo de una tarjeta nueva sea cero.
     */
    public function testSaldoCero() {
        $tarjeta = new Tarjeta(1234,1);
        $this->assertEquals($tarjeta->getSaldo(), 0);
    }
       
    public function testSaldoMedio() {
        $tarjeta = new Tarjeta(1234,1);
        $this->assertEquals($tarjeta->getID(),1234);
        $this->assertEquals($tarjeta->getTipo(),"Medio");
    }
    public function testSaldoCincuenta(){
        $tarjeta = new Tarjeta(1234,0);
        $tarjeta->recargar(50);
        $this->assertEquals($tarjeta->getSaldo(),50);
    }
    public function testTrasbordo(){
        $tarjeta = new Tarjeta(1234, 0);
        $tarjeta->recargar(50);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus(time(),0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),50);
        $tarjeta->pagarbus("2017/09/03 14:12",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),17.1);
        
    }

    
               
}                               
                               
