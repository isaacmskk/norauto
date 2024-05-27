<?php

class Repartidor {

    protected $ID_REPARTIDOR;
    protected $NOMBRE;
    protected $USERNAME;
    protected $PASSWORD;
    protected $METODOTRANSPORTE;
    protected $ROL;
    protected $DISPONIBLE;

    public function __construct($ID_REPARTIDOR, $NOMBRE, $USERNAME, $PASSWORD, $METODOTRANSPORTE, $ROL, $DISPONIBLE) {
        $this->ID_REPARTIDOR = $ID_REPARTIDOR;
        $this->NOMBRE = $NOMBRE;
        $this->USERNAME = $USERNAME;
        $this->PASSWORD = $PASSWORD;
        $this->METODOTRANSPORTE = $METODOTRANSPORTE;
        $this->ROL = $ROL;
        $this->DISPONIBLE = $DISPONIBLE;
    }

    // Getters and Setters...

    public function getID_REPARTIDOR() {
        return $this->ID_REPARTIDOR;
    }

    public function setID_REPARTIDOR($ID_REPARTIDOR) {
        $this->ID_REPARTIDOR = $ID_REPARTIDOR;
        return $this;
    }

    public function getNOMBRE() {
        return $this->NOMBRE;
    }

    public function setNOMBRE($NOMBRE) {
        $this->NOMBRE = $NOMBRE;
        return $this;
    }

    public function getUSERNAME() {
        return $this->USERNAME;
    }

    public function setUSERNAME($USERNAME) {
        $this->USERNAME = $USERNAME;
        return $this;
    }

    public function getPASSWORD() {
        return $this->PASSWORD;
    }

    public function setPASSWORD($PASSWORD) {
        $this->PASSWORD = $PASSWORD;
        return $this;
    }

    public function getMETODOTRANSPORTE() {
        return $this->METODOTRANSPORTE;
    }

    public function setMETODOTRANSPORTE($METODOTRANSPORTE) {
        $this->METODOTRANSPORTE = $METODOTRANSPORTE;
        return $this;
    }

    public function getROL() {
        return $this->ROL;
    }

    public function setROL($ROL) {
        $this->ROL = $ROL;
        return $this;
    }

    public function getDISPONIBLE() {
        return $this->DISPONIBLE;
    }

    public function setDISPONIBLE($DISPONIBLE) {
        $this->DISPONIBLE = $DISPONIBLE;
        return $this;
    }
}
?>
