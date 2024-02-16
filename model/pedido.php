<?php
include_once 'platoDAO.php';
class Pedido{
    private $plato;
    private $cantidad = 1;
    private $ID_PEDIDO;

    private $ID_CLIENTE;

    private $FECHA;
    private $TOTAL;
    private $PROPINA;
    private $PUNTOS;



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
public function devuelvePrecio(){
    return $this->plato->getPRECIO()*$this->cantidad;
}

    /**
     * Get the value of ID_PEDIDO
     */ 
    public function getID_PEDIDO()
    {
        return $this->ID_PEDIDO;
    }

    /**
     * Set the value of ID_PEDIDO
     *
     * @return  self
     */ 
    public function setID_PEDIDO($ID_PEDIDO)
    {
        $this->ID_PEDIDO = $ID_PEDIDO;

        return $this;
    }

    /**
     * Get the value of ID_CLIENTE
     */ 
    public function getID_CLIENTE()
    {
        return $this->ID_CLIENTE;
    }

    /**
     * Set the value of ID_CLIENTE
     *
     * @return  self
     */ 
    public function setID_CLIENTE($ID_CLIENTE)
    {
        $this->ID_CLIENTE = $ID_CLIENTE;

        return $this;
    }

    /**
     * Get the value of FECHA
     */ 
    public function getFECHA()
    {
        return $this->FECHA;
    }

    /**
     * Set the value of FECHA
     *
     * @return  self
     */ 
    public function setFECHA($FECHA)
    {
        $this->FECHA = $FECHA;

        return $this;
    }

    /**
     * Get the value of TOTAL
     */ 
    public function getTOTAL()
    {
        return $this->TOTAL;
    }

    /**
     * Set the value of TOTAL
     *
     * @return  self
     */ 
    public function setTOTAL($TOTAL)
    {
        $this->TOTAL = $TOTAL;

        return $this;
    }

    /**
     * Get the value of PROPINA
     */ 
    public function getPROPINA()
    {
        return $this->PROPINA;
    }

    /**
     * Set the value of PROPINA
     *
     * @return  self
     */ 
    public function setPROPINA($PROPINA)
    {
        $this->PROPINA = $PROPINA;

        return $this;
    }

    /**
     * Get the value of PUNTOS
     */ 
    public function getPUNTOS()
    {
        return $this->PUNTOS;
    }

    /**
     * Set the value of PUNTOS
     *
     * @return  self
     */ 
    public function setPUNTOS($PUNTOS)
    {
        $this->PUNTOS = $PUNTOS;

        return $this;
    }
}
