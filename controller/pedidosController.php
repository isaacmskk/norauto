<?php

class pedidosController
{
    public function aceptarPedido()
    {
        session_start();
        if (!isset($_SESSION['repartidor'])) {
            header("Location: ?controller=repartidores&action=login");
            exit();
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_pedido = $_POST["ID_PEDIDO"];
            $accion = $_POST["accion"];
            $id_repartidor = $_SESSION['repartidor']['ID_REPARTIDOR'];
    
            $con = db::connect();
    
            if ($accion == 'aceptar') {
                $con->query("UPDATE pedido SET ID_REPARTIDOR = '$id_repartidor', ESTADO = 'asignado' WHERE ID_PEDIDO = '$id_pedido'");
            } else if ($accion == 'rechazar') {
                $con->query("UPDATE pedido SET ESTADO = 'rechazado' WHERE ID_PEDIDO = '$id_pedido'");
            }
    
            header("Location: ?controller=repartidores&action=profile");
            exit();
        }
    }
}    