<?php

    abstract class Producto{
        const PRECIOFILM = 3;
        const PRECIOGAME = 2;

        protected $id;
        protected $name;

        protected $tipo;

        public function __construct($id, $name, $tipo){
            $this->id = $id;
            $this->name = $name;
            $this->tipo = $tipo;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of tipo
         */ 
        public function getTipo()
        {
                return $this->tipo;
        }

        /**
         * Set the value of tipo
         *
         * @return  self
         */ 
        public function setTipo($tipo)
        {
                $this->tipo = $tipo;

                return $this;
        }
        public abstract function calculaPrecioTotal($numdias);
        public abstract function devuelvePrecioDia();
    }

?>