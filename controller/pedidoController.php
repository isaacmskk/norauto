<?php
//Creamos el controlador de pedidos
include_once 'model/producto.php';
include_once 'model/productoDAO.php';

class pedidoController{

    public function index(){
        //cabecera

        //panel

        $pedido = new Producto(0,'Hamburguesa','Vacuno');
        //footer
        echo 'Pagina principal pedidos';
    }


        /**
         * Summary of compra
         * @return void
         */
        public function compra(){
            echo 'Pagina de compra';
        }
}




?>