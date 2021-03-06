<?php

namespace MiBici;

class Tarjeta {
    private $medio=0;
    private $saldo=0;
    private $lastime=0;
    private $tras1=0;
    private $trasbordo=0;
    private $tarifa=9.7;
    private $costo;
    private $plus=0;
    private $id;
    private $tipo;
    private $time1;
    private $viajes = array();
    private $lastbici=0;
	
    public function __construct($id, $medio){
        $this->id = $id;
        $this->medio=$medio;
    }
    public function pagarbici($fecha_y_hora, Bicicleta $paten){
        $this->time1=strtotime($fecha_y_hora);
        if($this->time1-$this->lastbici>86400){
            $this->costo= $this->tarifa * 1.5;
            $this->saldo= $this->saldo - $this->costo;
            $this->lastbici=$this->time1;
            $boleto= new boleto(0, $this->time1, $paten->get_pat(),0,0, $this->id,$this->costo, $this->saldo, 0);
            array_push($this->viajes, $boleto);
            return;
        }
	else{
            $boleto= new boleto(0, $this->time1, $paten->get_pat(),0,0, $this->id,$this->costo, $this->saldo, 0);
            array_push($this->viajes, $boleto);
            return;
        }	
    }
    public function pagarbus($fecha_y_hora, $medio, Colectivo $linea){
        $this->time1=strtotime($fecha_y_hora);
        if((date('D', $this->time1)=='Sat' && date('h', $this->time1)<=14 && date('h', $this->time1)>=6) || ((date('D', $this->time1)!='Sun' && date('D', $this->time1)!='Sat') && date('h', $this->time1)<=22 && date('h', $this->time1)>=6)){
            if($this->time1-$this->lastime <= 3600){
                $this->trasbordo=1;				
            }else{
                $this->trasbordo=0;
            }
        }else{
            if($this->time1-$this->lastime <= 5400){
                $this->trasbordo=1;
            }		
            else{
                $this->trasbordo=0;
	    }	
        }
        if($this->tras1 == 1){
             $this->trasbordo=0;		
        }
        $this->costo=$this->tarifa;
        if($medio==1 && $this->medio==1){
             $this->costo=round($this->costo * 0.5,2);
        }
        if($this->trasbordo==1 && $this->tras1 == 0){
             $this->costo=round($this->costo * 0.33,2);
             $this->tras1 = 1;
        }else{
             $this->tras1=0;
        }
        if($this->plus > 0){
            $this->costo=$this->costo + $this->tarifa * $this->plus;
        }
        if($this->costo <= $this->saldo ){
            $this->saldo=$this->saldo-$this->costo;
            if($this->costo > $this->tarifa){
                $this->plus=0;
            }
            $this->lastime=$this->time1;
            $boleto= new boleto($this->tras1, $this->lastime, $linea->get_linea(), $this->plus, $medio, $this->id,$this->costo, $this->saldo, 1);
            array_push($this->viajes, $boleto);
            $boleto->imprimir();
            return;
        }else{		
            if($this->plus<2){
                $this->plus++;
                $this->tras1=0;
                $this->lastime=$this->time1;
                $boleto= new boleto($this->tras1, $this->lastime, $linea->get_linea(), $this->plus, $medio, $this->id, 0, $this->saldo, 1);
                array_push($this->viajes, $boleto);
                $boleto->imprimir();
                return;
            }else{
                echo "Saldo insuficiente";
                return;
            }
        }	
    }
    public function getSaldo(){
        return $this->saldo;
    }
	
    public function getCosto(){
        return $this->costo;
    }
    public function getTipo(){
        if($this->medio == 1){
             return "Medio";
        }
    return "Normal";
    }
    public function getID(){
        return $this->id;	
    }
    public function getFecha(){
        return date("d-m-Y H:i:s",$this->lastime);
    }
    public function recargar($monto){
        if($monto==332){
            $this->saldo=$this->saldo + 388;
            return;
        }
        if($monto==624){
            $this->saldo= $this->saldo + 776;
            return;
        }
        $this->saldo=$this->saldo + $monto;
        return;
    }
    public function viajesRealizados(){
        for($i=0;$i<count($this->viajes);$i++){
            $this->viajes[$i]->imprimir();
        }
        return $this->viajes;
    }
}
