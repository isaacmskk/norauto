<?php

class Pizzas extends Plato {
    public $esVegana;

    public function __construct($ID_PLATO,$NOMBRE,$FOTO,$PRECIO,$ID_CAT,$isVegana) {
        parent::__construct($ID_PLATO,$NOMBRE,$FOTO,$PRECIO,$ID_CAT,$isVegana);
        $this->esVegana = $isVegana;
    }


    /**
     * Get the value of esVegana
     */ 
    public function getEsVegana()
    {
        return $this->esVegana;
    }

    /**
     * Set the value of esVegana
     *
     * @return  self
     */ 
    public function setEsVegana($esVegana)
    {
        $this->esVegana = $esVegana;

        return $this;
    }
}


