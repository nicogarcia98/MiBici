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
    
    public function testSaldoPromo(){
        $tarjeta = new Tarjeta(1234,0);
        $tarjeta->recargar(332);
        $this->assertEquals($tarjeta->getSaldo(),388);
        $tarjeta1 = new Tarjeta(1235,0);
        $tarjeta1->recargar(624);
        $this->assertEquals($tarjeta1->getSaldo(),776);
        
    }
    
    public function testTrasbordoyMedio(){
        $tarjeta = new Tarjeta(1234, 1);
        $tarjeta->recargar(50);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus("2017/09/04 13:40",1,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),45.15);
        $tarjeta->pagarbus("2017/09/04 14:12",1,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),43.55);
        
    }
    
    public function testTrasbordo(){
        $tarjeta = new Tarjeta(1234, 0);
        $tarjeta->recargar(50);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus("2017/09/03 13:02",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),40.3);
        $tarjeta->pagarbus("2017/09/03 14:12",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),37.1);
        
    }
    public function testGet(){
        $tarjeta = new Tarjeta(1234, 0);
        $tarjeta->recargar(40);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus("2017/09/03 23:54",0,$colectivo);
        $this->assertEquals($tarjeta->getCosto(),9.7);
        $this->assertEquals($tarjeta->getID(),1234);
        $this->assertEquals($tarjeta->getTipo(),"Normal");
        $this->assertEquals($tarjeta->getFecha(),"03/09/2017 23:54:00");
    
        }
     public function testBici(){
        $bici = new Bicicleta(1234);
        $tarjeta= new Tarjeta(3423, 0)
        $tarjeta->recargar(30);
        $tarjeta->pagarbici("2017/09/03 23:54",$bici);
        $this->assertEquals($tarjeta->getSaldo(),15.45);
        $tarjeta->pagarbici("2017/09/04 13:34",$bici);
        $this->assertEquals($tarjeta->getSaldo(),15.45);
     }
               
}                               
                               
