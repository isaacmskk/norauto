<?php

    include_once '../model/plato.php';

    class Hamburguesa extends Plato{
        private $tipohamburguesa;

        public function __construct($id, $name, $tipo,$tipohamburguesa){
            parent::__construct($id, $name);
            $this->$tipohamburguesa;
        }

        /**
         * Get the value of tipohamburguesa
         */ 
        public function getTipohamburguesa()
        {
                return $this->tipohamburguesa;
        }

        /**
         * Set the value of tipohamburguesa
         *
         * @return  self
         */ 
        public function setTipohamburguesa($tipohamburguesa)
        {
                $this->tipohamburguesa = $tipohamburguesa;

                return $this;
        }
        public function calculaPrecioTotal($numdias){
            $precioTotal = $numdias*self::PRECIOFILM;
            return $precioTotal;
        }
        public function devuelvePrecioDia(){
            return self::PRECIOFILM;
        }


    }
?>