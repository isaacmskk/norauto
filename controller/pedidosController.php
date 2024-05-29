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
                $stmt = $con->prepare("UPDATE pedido SET ID_REPARTIDOR = ?, ESTADO = 'asignado' WHERE ID_PEDIDO = ?");
                $stmt->bind_param("ii", $id_repartidor, $id_pedido);
                $stmt->execute();
                $stmt->close();
            } else if ($accion == 'rechazar') {
                $stmt = $con->prepare("UPDATE pedido SET ESTADO = 'rechazado' WHERE ID_PEDIDO = ?");
                $stmt->bind_param("i", $id_pedido);
                $stmt->execute();
                $stmt->close();
            }
    
            $con->close();
            header("Location: ?controller=repartidores&action=profile");
            exit();
        }
    }

    public function obtenerPlatosPorPedido($idPedido) {
        // Conexión a la base de datos (ajusta según tu configuración)
        $con = db::connect();
    
        // Consulta a la base de datos
        $sql = "SELECT * FROM platos_pedido WHERE ID_PEDIDO = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $idPedido);
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        // Obtener resultados
        $platos = array();
        while ($fila = $resultado->fetch_assoc()) {
            $platos[] = $fila;
        }
    
        // Cerrar conexión
        $stmt->close();
        $con->close();
    
        return $platos;
    }

    public function manejarSolicitudAjax() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idPedido'])) {
            $idPedido = $_POST['idPedido'];
            $platos = $this->obtenerPlatosPorPedido($idPedido);
            echo json_encode($platos);
        }
    }
}

// Punto de entrada para solicitudes AJAX
if (isset($_POST['idPedido'])) {
    $controller = new pedidosController();
    $controller->manejarSolicitudAjax();
}
