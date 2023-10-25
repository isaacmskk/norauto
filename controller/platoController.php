<?php
//Creamos el controlador de pedidos
include_once 'model/plato.php';
include_once 'model/platoDAO.php';

class platoController{

    public function index(){
        
        $allPlatos = PlatoDAO::getAllPlatos();

        include_once 'views/cabecera.php';
        include_once 'views/panelpedido.php';

    }

}




?>