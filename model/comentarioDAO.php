<?php
include_once 'config/db.php';
include_once 'reseñas.php';
include_once 'clientes.php';
class ComentarioDAO
{
    public static function AllComentarios()
    {
        $con = db::connect();

        $query = "SELECT reseñas.ID_RESEÑA, reseñas.ID_CLIENTE, reseñas.COMENTARIO, reseñas.VALORACION, usuarios.NOMBRE 
         FROM reseñas JOIN usuarios ON reseñas.ID_CLIENTE = usuarios.ID_CLIENTE;";

        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $comentario = [];
        while ($row = $result->fetch_object('Reseña')) {
            $comentario[] = $row;
        }

        return $comentario;
    }

    public static function insertarComentario($id_cliente, $id_pedido, $comentario, $valoracion)
    {
        // Conexión a la base de datos
        $con = db::connect();
    
        // Preparar la consulta
        $stmt = $con->prepare("INSERT INTO reseñas (ID_CLIENTE, ID_PEDIDO, COMENTARIO, VALORACION) VALUES (?, ?, ?, ?)");
    
        // Vincular los parámetros
        $stmt->bind_param('iisi', $id_cliente, $id_pedido, $comentario, $valoracion);
    
        // Ejecutar la consulta
        $stmt->execute();
    }
    
    public static function obtenerPedidos($idCliente)
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM pedido WHERE ID_CLIENTE = ?");
        $stmt->bind_param("i", $idCliente);

        if (!$stmt->execute()) {
            $con->close();
            return "No se pudo obtener los pedidos de la base de datos.";
        }

        $resultadoPedidos = $stmt->get_result();
        $pedidos = $resultadoPedidos->fetch_all(MYSQLI_ASSOC);

        $con->close();
        return $pedidos;
    }
   
    
    public static function existeResena($idPedido)
    {
        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM reseñas WHERE ID_PEDIDO = ?");
        $stmt->bind_param("i", $idPedido);
    
        if (!$stmt->execute()) {
            $con->close();
            return false;
        }
    
        $resultado = $stmt->get_result();
        $existe = $resultado->num_rows > 0;
    
        $con->close();
        return $existe;
    }
    
}
