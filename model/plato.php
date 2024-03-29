<?php

class Plato
{
        protected $ID_PLATO;
        protected $NOMBRE;
        protected $FOTO;
        protected $PRECIO;
        protected $ID_CAT;
        protected $vegana;


        
        public function __construct($ID_PLATO,$NOMBRE,$FOTO,$PRECIO,$ID_CAT,$vegana){
                $this->ID_PLATO = $ID_PLATO;
                $this->NOMBRE = $NOMBRE;
                $this->FOTO = $FOTO;
                $this->PRECIO = $PRECIO;
                $this->ID_CAT = $ID_CAT;
                $this->vegana = $vegana;

        }
        /**
         * Get the value of ID_PLATO
         */
        public function getID_PLATO()
        {
                return $this->ID_PLATO;
        }

        /**
         * Set the value of ID_PLATO
         *
         * @return  self
         */
        public function setID_PLATO($ID_PLATO)
        {
                $this->ID_PLATO = $ID_PLATO;

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
         * Get the value of FOTO
         */
        public function getFOTO()
        {
                return $this->FOTO;
        }

        /**
         * Set the value of FOTO
         *
         * @return  self
         */
        public function setFOTO($FOTO)
        {
                $this->FOTO = $FOTO;

                return $this;
        }

        /**
         * Get the value of PRECIO
         */
        public function getPRECIO()
        {
                return $this->PRECIO;
        }

        /**
         * Set the value of PRECIO
         *
         * @return  self
         */
        public function setPRECIO($PRECIO)
        {
                $this->PRECIO = $PRECIO;

                return $this;
        }

        /**
         * Get the value of ID_CAT
         */
        public function getID_CAT()
        {
                return $this->ID_CAT;
        }

        /**
         * Set the value of ID_CAT
         *
         * @return  self
         */
        public function setID_CAT($ID_CAT)
        {
                $this->ID_CAT = $ID_CAT;

                return $this;
        }

        /**
         * Get the value of vegana
         */ 
        public function getVegana()
        {
                return $this->vegana;
        }

        /**
         * Set the value of vegana
         *
         * @return  self
         */ 
        public function setVegana($vegana)
        {
                $this->vegana = $vegana;

                return $this;
        }
}
