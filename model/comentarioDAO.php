<?php
include_once 'config/db.php';
include_once 'reseñas.php';
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

    public static function insertarComentario($id_cliente, $comentario, $valoracion)
        {
            // Conexión a la base de datos
            $con = db::connect();
        
            // Preparar la consulta
            $stmt = $con->prepare("INSERT INTO reseñas (ID_CLIENTE, COMENTARIO, VALORACION) VALUES (?, ?, ?)");
        
            // Vincular los parámetros
            $stmt->bind_param('isi', $id_cliente, $comentario, $valoracion);
        
            // Ejecutar la consulta
            $stmt->execute();
        }
}
