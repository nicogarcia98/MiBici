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
        $tarjeta->pagarbus("2017/09/03 13:40",1,$colectivo);
		$this->assertEquals($tarjeta->getSaldo(),45.15);
        $tarjeta->pagarbus("2017/09/03 14:12",1,$colectivo);
    	$this->assertEquals($tarjeta->getSaldo(),40.3);       
    }
    
    public function testTrasbordo(){
        $tarjeta = new Tarjeta(1234, 0);
        $tarjeta->recargar(50);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus("2017/09/03 13:02",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),40.3);
        $tarjeta->pagarbus("2017/09/03 14:12",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),37.1);
	$tarjeta->pagarbus("2017/09/03 14:30",0,$colectivo);
	$this->assertEquals($tarjeta->getSaldo(),27.4);
	    
        
    }
    
    public function testPlus(){
        $tarjeta = new Tarjeta(1234, 0);
        $tarjeta->recargar(10);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus("2017/09/03 13:02",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),0.3);
        $tarjeta->pagarbus("2017/09/03 14:12",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),0.3);
        $tarjeta->pagarbus("2017/09/03 17:52",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),0.3);
        $tarjeta->recargar(30);
	$this->assertEquals($tarjeta->getSaldo(),30.3);
        $tarjeta->pagarbus("2017/09/03 23:32",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),1.2);
        $tarjeta->pagarbus("2017/09/04 11:47",0,$colectivo);
        $this->assertEquals($tarjeta->getSaldo(),1.2);
	$tarjeta->pagarbus("2017/09/04 12:00",0,$colectivo);
	$this->assertEquals($tarjeta->getSaldo(),1.2);     
    }
    public function testGet(){
        $tarjeta = new Tarjeta(1234, 0);
        $tarjeta->recargar(40);
        $colectivo = new Colectivo ("133 negro");
        $tarjeta->pagarbus("2017/09/03 23:54",0,$colectivo);
        $this->assertEquals($tarjeta->getCosto(),9.7);
        $this->assertEquals($tarjeta->getID(),1234);
        $this->assertEquals($tarjeta->getTipo(),"Normal");
        $this->assertEquals($tarjeta->getFecha(),"03-09-2017 23:54:00");
    
        }
     public function testBici(){
        $bici = new Bicicleta(1234);
        $tarjeta= new Tarjeta(3423, 0);
        $tarjeta->recargar(30);
        $tarjeta->pagarbici("2017/09/03 23:54",$bici);
        $this->assertEquals($tarjeta->getSaldo(),15.45);
        $tarjeta->pagarbici("2017/09/04 13:34",$bici);
        $this->assertEquals($tarjeta->getSaldo(),15.45);
     }

	public function testReali(){
        	$bici = new Bicicleta(9797);
    	    	$tarjeta = new Tarjeta(1234, 1);
    	    	$tarjeta->recargar(100);
     	  	$colectivo = new Colectivo ("122 verde");
     	   	$tarjeta->pagarbici("2017/08/03 19:54",$bici);
		$tarjeta->pagarbus("2013/09/03 20:54",0,$colectivo);
		$lista = $tarjeta->viajesRealizados();
        	$this->assertEquals($lista[1]->getTipo(),"Normal");
        	$this->assertEquals($lista[1]->getCosto(),9.7);
       		$this->assertEquals($lista[1]->getTrans(),"122 verde");
      		$this->assertEquals($lista[1]->getFecha(),"03-09-2013 20:54:00");
		$this->assertEquals($lista[1]->getSaldo(),75.75);
        	$this->assertEquals($lista[0]->getCosto(),14.55);
       		$this->assertEquals($lista[0]->getTrans(),"Bicicleta " . 9797);
      		$this->assertEquals($lista[0]->getFecha(),"03-08-2017 19:54:00");
	
	}
	public function testViajeMedio(){
        $tarjeta= new Tarjeta(3423, 0);
	$colectivo = new Colectivo ("122 verde");
        $tarjeta->recargar(30);
	$tarjeta->pagarbus("2013/09/03 20:54",1,$colectivo);
	$tarjeta->pagarbus("2013/09/03 21:20",1,$colectivo);
	$lista = $tarjeta->viajesRealizados();
	$this->assertEquals($lista[0]->getTipo(),"Medio");
	$this->assertEquals($lista[1]->getTipo(),"Medio y trasbordo");	
     }
	public function testViajeTrasbordo(){
        $tarjeta= new Tarjeta(3423, 0);
	$colectivo = new Colectivo ("122 verde");
        $tarjeta->recargar(30);
	$tarjeta->pagarbus("2013/09/03 20:54",0,$colectivo);
	$tarjeta->pagarbus("2013/09/03 21:20",0,$colectivo);
	$lista = $tarjeta->viajesRealizados();
	$this->assertEquals($lista[0]->getTipo(),"Normal");
	$this->assertEquals($lista[1]->getTipo(),"Trasbordo");	
     }
	
               
}                               
                              
