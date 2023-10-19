<?php

    include_once 'producto.php';

    class Hamburguesa extends Producto{
        private $tipohamburguesa;

        public function __construct($id, $name, $tipo,$tipohamburguesa){
            parent::__construct($id, $name, $tipo);
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