<?php

    abstract class Plato{
        const NOMBRE = 3;
        const DESCRIPCION = 2;

        protected $ID_PLATO;
        protected $NOMBRE;

        protected $tipo;

        
        public abstract function calculaPrecioTotal($numdias);
        public abstract function devuelvePrecioDia();
    }

?>