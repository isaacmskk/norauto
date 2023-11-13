<?php
include_once 'platoDAO.php';
class Pedido{
    private $plato;
    private $cantidad = 1;


    public function __construct($plato){
        $this->plato = $plato;
    }

    /**
     * Get the value of plato
     */ 
    public function getPlato()
    {
        return $this->plato;
    }

    /**
     * Set the value of plato
     *
     * @return  self
     */ 
    public function setPlato($plato)
    {
        $this->plato = $plato;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }
}
