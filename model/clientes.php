<?php

class Clientes{

    protected $ID_CLIENTE;
    protected $NOMBRE;
    protected $APELLIDO;
    protected $MAIL;
    protected $PASSWORD;
    protected $ROL;
    protected $PUNTOS;


    public function __construct($ID_CLIENTE,$NOMBRE,$APELLIDO,$MAIL,$PASSWORD,$ROL,$PUNTOS){
        $this->ID_CLIENTE = $ID_CLIENTE;
        $this->NOMBRE = $NOMBRE;
        $this->APELLIDO = $APELLIDO;
        $this->MAIL = $MAIL;
        $this->PASSWORD = $PASSWORD;
        $this->ROL = $ROL;
        $this->PUNTOS = $PUNTOS;


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
     * Get the value of NOMBRE
     */ 
    public function getNOMBRE()
    {
        return $this->NOMBRE;
    }

    /**
     * Set the value of NOMBRE
     *
     * @return  self
     */ 
    public function setNOMBRE($NOMBRE)
    {
        $this->NOMBRE = $NOMBRE;

        return $this;
    }

    /**
     * Get the value of APELLIDO
     */ 
    public function getAPELLIDO()
    {
        return $this->APELLIDO;
    }

    /**
     * Set the value of APELLIDO
     *
     * @return  self
     */ 
    public function setAPELLIDO($APELLIDO)
    {
        $this->APELLIDO = $APELLIDO;

        return $this;
    }

    /**
     * Get the value of MAIL
     */ 
    public function getMAIL()
    {
        return $this->MAIL;
    }

    /**
     * Set the value of MAIL
     *
     * @return  self
     */ 
    public function setMAIL($MAIL)
    {
        $this->MAIL = $MAIL;

        return $this;
    }

    /**
     * Get the value of PASSWORD
     */ 
    public function getPASSWORD()
    {
        return $this->PASSWORD;
    }

    /**
     * Set the value of PASSWORD
     *
     * @return  self
     */ 
    public function setPASSWORD($PASSWORD)
    {
        $this->PASSWORD = $PASSWORD;

        return $this;
    }

    /**
     * Get the value of ROL
     */ 
    public function getROL()
    {
        return $this->ROL;
    }

    /**
     * Set the value of ROL
     *
     * @return  self
     */ 
    public function setROL($ROL)
    {
        $this->ROL = $ROL;

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