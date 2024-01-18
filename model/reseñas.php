<?php
class Reseña{
    protected $ID_RESEÑA;
    protected $ID_CLIENTE;
    protected $COMENTARIO;
    protected $VALORACION;
    protected $NOMBRE;


    public function __construct(){
        
    }
    /**
     * Get the value of ID_RESEÑA
     */ 
    public function getID_RESEÑA()
    {
        return $this->ID_RESEÑA;
    }

    /**
     * Set the value of ID_RESEÑA
     *
     * @return  self
     */ 
    public function setID_RESEÑA($ID_RESEÑA)
    {
        $this->ID_RESEÑA = $ID_RESEÑA;

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
     * Get the value of COMENTARIO
     */ 
    public function getCOMENTARIO()
    {
        return $this->COMENTARIO;
    }

    /**
     * Set the value of COMENTARIO
     *
     * @return  self
     */ 
    public function setCOMENTARIO($COMENTARIO)
    {
        $this->COMENTARIO = $COMENTARIO;

        return $this;
    }

    /**
     * Get the value of VALORACION
     */ 
    public function getVALORACION()
    {
        return $this->VALORACION;
    }

    /**
     * Set the value of VALORACION
     *
     * @return  self
     */ 
    public function setVALORACION($VALORACION)
    {
        $this->VALORACION = $VALORACION;

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
}
